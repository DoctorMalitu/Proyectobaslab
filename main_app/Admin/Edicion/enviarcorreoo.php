<?php
require '../functions.php';
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';



// Valores enviados desde el formulario
if ( !isset($_POST["nameemail"]) || !isset($_POST["emailresul"])) {
    die ("Es necesario completar todos los datos del formulario");
}
if ($_FILES['archivopdf']['name'] != null) {
echo "Tiene datos La variable <br>";
}else{
echo "No hay datos <br>";
}
$nameemail = $_POST["nameemail"];
$emailresul = $_POST["emailresul"];
$archivopdf = $_FILES["archivopdf"];

$contador=count($_FILES['archivopdf']['name']);
echo "<br>"; printf($nameemail); echo "<br>";
echo "<br>"; printf($emailresul); echo "<br>";
echo "<br>"; printf($contador); echo "<br>";

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
   $mail->From = 'joselmr96@gmail.com'; // Email desde donde env铆o el correo.
	$mail->FromName = $nameemail;
	$mail->AddAddress($emailresul,"$emailresul");
$mail->WordWrap   = 80;
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
   $mail->Subject = "Envio de resultados"; // Este es el titulo del email.
	// $mensajeHtml = nl2br($mensaje);
    $mail->Body = "
		<html> 

		<body> 

		<h1>Recibiste un nuevo mensaje desde el formulario de contacto</h1>

		<p>Informacion enviada por el usuario de la web:</p>

		<p>nombre: {$nameemail}</p>

		<p>email: {$emailresul}</p>

		</body> 

		</html>";

        $mail->CharSet = "utf-8"; 
        foreach ($_FILES["archivopdf"]["name"] as $k => $v) {
    $mail->AddAttachment( $_FILES["archivopdf"]["tmp_name"][$k], $_FILES["archivopdf"]["name"][$k] );
    }

   
     $estadoEnvio = $mail->Send(); 
if($estadoEnvio){
    echo"se envio";
   exit;
} else {
    echo "Ocurrio un error inesperado.";
}

    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
