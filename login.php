<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <script src="js/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./css/styles.css" />
    <title>Inicio Sesión | Registrarse</title>
  </head>
  <body>
    <section>
      <div class="container">
        <div class="user login">
          <div class="img-box">
            <img src="./images/farmacia.jpg" alt="" />
          </div>
          <div class="form-box">
            <div class="top">
              <p>
                <span data-id="#ff0066">Regístrate ahora</span>
              </p>
            </div>
            <form method="POST">
              <div class="form-control">
                <br>
                <h2>Iniciar Sesión</h2>
                <br>
                <input name="Correo" id="correo" type="text" placeholder="Correo Electrónico" />
                <div>
                  <input name="Password" id="contrasena" type="password" placeholder="Contraseña" />
                  <div class="icon form-icon">
                  </div>
                </div>
                <span>¿Olvidaste tu contraseña?</span>
                <input type="button" onclick="login();" value="Ingresar"/>
              </div>
            </form>
          </div>
        </div>

        <!-- Registrarse -->
        <div class="user signup">
          <div class="form-box">
            <div class="top">
              <p>
                <span data-id="#1a1aff">Inicia sesión ahora</span>
              </p>
            </div>
            <form action="">
              <div class="form-control">
                <br>
                <h2>Registrate</h2>
                <br>

                <input id="correo1" type="email" placeholder="Ingrese un correo" />
                <div>
                  <input id="contrasena1" type="password" placeholder="Ingrese una contraseña" />
                  <div class="icon form-icon">
                    <img src="./images/eye.svg" alt="" />
                  </div>
                </div>
                <div>
                  <input id="contrasena2" type="password" placeholder="Confirme la contraseña" />
                  <div class="icon form-icon">
                    <img src="./images/eye.svg" alt="" />
                  </div>
                </div>
                <input type="button" value="Registrarse" onclick="RegistrarUsuario()" />
              </div>
            </form>
          </div>
          <div class="img-box">
            <img src="./images/r.webp" alt="" />
          </div>
        </div>
      </div>
    </section>
    <!-- IndexJs -->
    <script src="./js/index.js"></script>
  </body>
</html>

<script type="text/javascript">

    function login()
    {
        var evento = "Inicio de Sesion";
        var Correo = document.getElementById('correo').value;
        var Password = document.getElementById('contrasena').value;                                        

        //FECHA                
        const formatDate = (current_datetime)=>{
          let formatted_date = current_datetime.getFullYear() + "-" + (current_datetime.getMonth() + 1) + "-" + current_datetime.getDate() + " " + current_datetime.getHours() + ":" + current_datetime.getMinutes() + ":" + current_datetime.getSeconds();
          return formatted_date;
        }

        var fechaH = new Date();
        var fechaAct = formatDate(fechaH);
                
        console.log(fechaAct);

        $.post(
        "php/loginWS.php",
        {
            "Correo" : Correo,
            "Password" : Password
        },

        function(Data)
        {
          var login = JSON.parse(Data)

          if (login.Ok == 1)
          {            
                                                          
            location.href = "MenuPrincipal/menu.php";
            alert(login.Data);

          } else {
            Swal.fire({
            position: 'center',
            icon: 'error',
            title: login.Data,
            showConfirmButton: false,
            timer: 2000
            })
          }
        });
        
        $.post("php/insertarLog.php",
          {
            "Usuario" : Correo,
            "Evento" : evento, 
            "Fecha" : fechaAct
          },

          function(Data)
          {
            var notificacion = JSON.parse(Data);            

            if (notificacion.Ok == 0) 
            {
              console.log("Registro incorrecto.");          
            }else if (notificacion.Ok == 1){
              console.log("Registro correcto.");
            }
          }
        )       
      }


    function RegistrarUsuario()
    {
      var Correo = document.getElementById('correo1').value;
      var Password = document.getElementById('contrasena1').value;
      var Password1 = document.getElementById('contrasena2').value;


      if(Correo == "" || Password == "" || Password1 == ""){
        alert("Debes llenar todos los campos."+ Correo+ " "+Password + " " +Password1);
      }else if(Password != Password1){
        alert("La contraseña no coinciden.");
      }else{
        $.post("php/guardarusuarioWS.php",
        {
        'Correo': Correo,
         "Password": Password,
          },
          function(Data){
          var notificacion = JSON.parse(Data);
          if (notificacion.Ok == 0) {
            Swal.fire({
              icon: 'warning',
              title: 'Advertencia',
              text: notificacion.Data,
            })
          } else if (notificacion.Ok == 1){
            Swal.fire({
              icon: 'success',
              title: '¡Listo!',
              text: notificacion.Data,
            })
            cancelar();
          }
        }
      );
      }
    }
</script>
