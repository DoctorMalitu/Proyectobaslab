<?php
require '../functions.php';
require '../../conexionbs.php';
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

if (isset($_GET['ids'])) {
	$dbho= new conexionbs();
	$ids=$_GET['ids'];
	$query="SELECT documento_cliente, ruta, tipo FROM archivos WHERE id = ".$ids;
	$res=$dbho->query($query);
	$datos=mysqli_fetch_array($res);
}
else {
	header("location:index.html");
}
//  echo $datos['documento_cliente'] ;
 $documento=$datos['documento_cliente'];
//  echo $documento;
$query1="SELECT `documento`, `nombre`, `apellido`, `correo` FROM clientes WHERE documento = ".$documento;
$dbho2= new conexionbs();
$res2=$dbho2->query($query1);
$datos1=mysqli_fetch_array($res2);

// echo $datos1['nombre'];
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
	
    //Server settings
    $mail->SMTPDebug = 0;     // Enable verbose debug output
    $mail->isSMTP(); // Esto es para enviar correos desde localhost
    $mail->smtpConnect([
   'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    ]
]);                                      // Set mailer to use SMTP
    $mail->Host='smtp.gmail.com' ; // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;         
    $mail->Username ='joselmr96@gmail.com';
	  $mail->Password ='__buchas__456';                              // SMTP password
     $mail->Port = 587;                                  // TCP port to connect to

    //Recipients
   $mail->From = 'joselmr96@gmail.com'; // Email desde donde envio el correo.
	$mail->FromName =$datos1['nombre'];
	$mail->AddAddress($datos1['correo']);
$mail->WordWrap   = 80;
    // Content
    $mail->isHTML(true);                                  // Establecer formato de correo electrónico a HTML
   $mail->Subject = "Envio de resultados"; // Este es el titulo del email.
	// $mensajeHtml = nl2br($mensaje);
    $mail->Body = "
		<html> 

		<body> 

		<h2>Recibiste un nuevo mensaje desde el formulario de contacto</h2>

		<p>Informacion enviada por el usuario de la web:</p>

        <p>Documento: {$datos1['documento']}</p>
		<p>nombre: {$datos1['nombre']}</p>
        <p>Apellidos: {$datos1['apellido']}</p>
		<p>email: {$datos1['correo']}</p>

		</body> 

		</html>";

        $mail->CharSet = "utf-8"; 
        // $emailAttachment = $datos['ruta']->Output('','S');
        $ruta = dirname(__FILE__). "/archivos/";
        $tipo=$datos['tipo'];
        $nombresin=$datos['ruta'];
        $nombrefinal= trim($nombresin); //Eliminamos los espacios en blanco
        $nombref= preg_replace('[\s+]',"", $nombrefinal);//Sustituye una expresión regular
        // echo $nombref;
    $mail->AddAttachment($ruta.$nombref, $nombref, 'base64', $tipo);
    // $mail->AddAttachment($datos['ruta']);
    // $mail->AddAttachment(($adjunto,$nombre,"base64","application/pdf"); 

   
     $estadoEnvio = $mail->Send(); 
if($estadoEnvio){
    // echo"se envio";
    header('Location: consult.php');
   exit;
} else {
    echo "Ocurrio un error inesperado.";
}

    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
