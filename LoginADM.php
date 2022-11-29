<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="js/jquery.min.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./css/styles.css" />
    <title>Inicio Sesión </title>
  </head>
  <body>
    <section>
      <div class="container">
        <div class="user login">
          <div class="img-box">
            <img src="./images/portada.jpg" alt="" />
          </div>
          <div class="form-box">
            <div class="top">
              <p>

              </p>
            </div>
            <form action="">
              <div class="form-control">
                <br>
                <h2>Iniciar Sesión</h2>
                <br>
                <input id="correo" type="text" placeholder="Correo Electrónico" />
                <div>
                  <input id="contrasena" type="password" placeholder="Contraseña" />
                  <div class="icon form-icon">
                  </div>
                </div>

                <input type="Button" onclick="Login()" value="Ingresar"/>
              </div>
            </form>
          </div>
        </div>
  </body>
</html>

<script>

    function Login()
    {

        var Correo = document.getElementById('correo').value;
        var Password = document.getElementById('contrasena').value;


        $.post(
        "php/loginADMWS.php",
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
        }
      );
    }


</script>
