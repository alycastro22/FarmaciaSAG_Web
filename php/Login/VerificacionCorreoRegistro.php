<?php require_once "ControlUsuario.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: LoginUsuario.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verificación de código</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/estiloR.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="VerificacionCorreoRegistro.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Verificación de código</h2>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
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
                        <input class="form-control" type="number" name="otp" placeholder="Introduce el código de verificación" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check" value="Continuar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>