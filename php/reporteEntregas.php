<?php
    session_start();
    require 'conexion.php';
    ob_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entregas</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleT.css">
    <script src='../js/jquery.min.js'></script>
    <script src="https://kit.fontawesome.com/e1d55cc160.js" crossorigin="anonymous"></script>
   
    
</head>
<body>
<div class="formulario"> 
        <h1 class="titulo">Reporte de Entregas</h1>
        <br>

        <div class="superior"> 
                <table class ='table'>
                    <thead>
                        <tr>
                            <th>Id Entrega</th>
                            <th>Número Factura</th>
                            <th>Cliente</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Estado</th>
                        </tr>

                    </thead>
                    <tr>
                        <td>1</th>

                    </tr>
                    <tbody id="entregas">


                    </tbody>

                </table>   


         </div>
    </div>

</div>  


</body>
</html>

<script>

		(function(){
				getListaEntregas();
			})();

		function getListaEntregas(){
			$.post("../WebServices/ListarEntregas.php",
			{},
			function(data){
				var respuesta = JSON.parse(data);
				html = "";
				for(var i in respuesta){
				html += "<tr><td>"+respuesta[i].identrega+"</td>";
				html += "<td>"+respuesta[i].idfactura+"</td>";
				html += "<td>"+respuesta[i].nombreu+"</td>";
				html += "<td>"+respuesta[i].direccion+"</td>";
				html += "<td>"+respuesta[i].telefono+"</td>";
				html += "<td>"+respuesta[i].estado+"</td>";
				}
				document.getElementById('entregas').innerHTML = html;
			}
			);
		}
	
	</script>

    <?php
    $html=ob_get_clean();
   // echo $html;

    require_once '../Librerias/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf= new Dompdf();

    
    $options = $dompdf->getOptions();
    $options->set(array('isRemoteEnabled' => true));
    $dompdf->setOptions($options); 
    
    $dompdf->loadHtml($html);
    $dompdf->setPaper('letter');
   // $dompdf->setPaper('A4','Landscape');
   $dompdf->render();
   $dompdf->stream("reporte_entregas.pdf", array("Attachment" => false));



    
    
    ?>