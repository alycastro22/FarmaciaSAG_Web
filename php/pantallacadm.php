<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilo1.css" />
  <title>Pantalla Principal Administrador - Cliente</title>
</head>
<body>
  <section id="main-container">
    <article id="sedans">
      <img src="adm.png" alt="sendas icon">
      <h2>Administrador</h2>
      <button id="sedans-btn" onclick="admin()" >Ingresar</button>
    </article>
    <article id="suvs">
      <img src="cliente1.png" alt="suvs icon">
      <h2>Cliente</h2>
      <button id="suvs-btn" onclick="cliente()">Ingresar</button>
    </article>
</body>
</html>

<script type="text/javascript">

  function admin()
  {
      location.href = "../LoginADM.php";      
  }

  function cliente()
  {
    location.href = "../login.php";      
  }


</script>