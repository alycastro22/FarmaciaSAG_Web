<?php require_once "ControlUsuario.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/stylesss.css">
    
</head>
<body>
    <section>
      <div class="container">
        <div class="user login">
            <div class="img-box">
                <img src="../../images/farmacia.jpg" alt="" />
            </div>
            <div class="form-box">
               
                <form action="LoginUsuario.php" method="POST" autocomplete="">
                    <div class="form-group">
                        <h2>Iniciar Sesión</h2>
                    </div>
                        <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php
                                foreach($errors as $showerror){
                                    echo $showerror;
                                }
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="form-group">
                            <input class="form-control" type="email" name="email" placeholder="Correo Electronico" required value="<?php echo $email ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="password" placeholder="Contraseña" required>
                        </div>
                        
                            <div class="link forget-pass text-left"><a href="RecuperarContraseña.php">¿Se te olvidó tu contraseña?</a></div>
                        
                            <input type="submit" name="login" value="Ingresar">
                        
                            <div class="link login-link text-center">¿Todavía no eres miembro? <a href="RegistroUsuario.php"> <br>Regístrate ahora</a></div>
                        
                    </form>
            </div>
        </div>
    </section>
    
</body>
</html>