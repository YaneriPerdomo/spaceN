<?php
require_once './../../dompdf/autoload.inc.php';
session_start();

// Incluimos el archivo donde se establece la conexión a la base de datos
include "../connectionBD.php";

         
$accessLevel = $_POST["accessLevel"];
$id_admin = $_SESSION["id_profesional"];

$sql = "SELECT usuario, nombre, apellido from ninos INNER join usuarios on ninos.id_usuario = usuarios.id_usuario 
        WHERE ninos.id_nivel_acceso = :accessLevel and id_profesional = :idP";

$pdfE = $pdo->prepare($sql);
$pdfE->bindParam('accessLevel', $accessLevel, PDO::PARAM_INT);
$pdfE->bindParam('idP', $id_admin, PDO::PARAM_INT);
$pdfE->execute();
$showChilds = $pdfE->fetchAll(PDO::FETCH_ASSOC);
$valuesChilds = "";
 

if($pdfE->rowCount() == 0){
    echo "<script> alert('No existen registros.')
         window.location.href = './../../view/admin/reports.php'
    </script>";
    exit();
}

foreach ($showChilds as $value) {
    $valuesChilds .= "<tr class='show'>
                          <td >" . $value['usuario'] . "</td>
                          <td>" . $value['nombre'] . "</td>
                          <td>" . $value['apellido'] . "</td>
                      </tr>";
}

// Contenido HTML
$html = '
    <head>
    <style>
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        thead > tr > th {
            background: #b195ff ;
            color:white;
            text-align: left;
        }
        .table th, .table td {
            padding: 8px;
        }

        .dataTable tr:nth-child(2n+1) {
  background: rgba(0, 0, 0, 0.07);
}
    </style>
</head>
<body>
    <div style="width: 100%;">
        <table class="table">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                </tr>
            </thead>
            <tbody class="dataTable">
                '. $valuesChilds .'
            </tbody>
        </table>
    </div>
</body>
    ';

// Crear una instancia de DOMPDF

use Dompdf\Dompdf;
$dompdf = new Dompdf(); //Objeto domPdf

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

// Cargar el contenido HTML
$dompdf->loadHtml($html);

// (Opcional) Configurar el tamaño del papel, orientación, etc.
$dompdf->setPaper('letter');

// Renderizar el PDF
$dompdf->render();

// Descargar el PDF
$dompdf->stream("my_pdf.pdf", array("Attachment" => 1));

?>