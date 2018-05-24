<?php

// ++++++++++++++++++++++++++++++++++++
error_reporting(0);

//ini_set('display_errors', 1);
//error_reporting(E_ALL);


// retrieving input data from http header and parsing as user defined variables
if(!empty($_POST['inputs'])){
    extract((array)(json_decode($_POST['inputs'])));}
else{die();}

//+++++++++++++++++++++++++++++++++++++++++++++
$error_message = "Por favor complete la información en la forma";

if(!isset($rnd) || !isset($cat)) {
    echo $error_message;
    die();
}

date_default_timezone_set('America/Mexico_City');
$date = date('l, M d, Y / h:i:s a', time());


//$email_from = $correo;

//  set content-type
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8". "\r\n";
$headers .= 'From: ricardoastudillo.info<no-reply@ricardoastudillo.info>'. "\r\n";

//plantilla de correo de acuerdo al tipo de forma registrado
switch($cat){
    case "buzon":
        $to = "=?UTF-8?B?".base64_encode('Contacto Ciudadano')."?=".'<contacto@ricardoastudillo.info>';
        $recipients = "oscar@wm4.mx,mmonroy.lan@gmail.com,pepemolinatorres@gmail.com,grubicamargo@gmail.com";
        //$recipients = "oscar@wm4.mx";
        $subject = "=?UTF-8?B?".base64_encode('Nuevo registro en Buzón Ciudadano - ricardoastudillo.info')."?=";
        $headers .= 'BCC: '.$recipients.' '. "\r\n";

        require_once ("../mailings/mail_inbound_buzon.php");
        if (mail($to,$subject,$message,$headers)){
            $to = "=?UTF-8?B?".base64_encode($nombre)."?=".'<'.$correo.'>';
            $subject = "Gracias por su contacto";
            require_once ("../mailings/mail_thankyou_buzon.php");

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8". "\r\n";
            $headers .= 'From: Ricardo Astudillo<contacto@ricardoastudillo.info>'. "\r\n";
            $headers .= 'to: '.$to.' '. "\r\n";

            if (mail($to,$subject,$message,$headers)){
                echo "<h3>Gracias por tu aportación.</h3><br />
                <p>Con tu participación lograremos el Corregidora Posible.</p>";
            }else{echo "<div class='error_message'>error de envío de bienvenida</div>";}
        }
        else{
            echo "<div class='error_message'>Hemos tenido algún problema con tu envío, por favor intenta nuevamente"."</div>\r\n";
            /*echo "to: ".$to."\r\n";
            echo "subject: ".$subject."\r\n";
            echo "message: ".$message."\r\n";
            echo "headers: ".$headers."\r\n";*/
            die();
        }
        break;
    case "registro":
        $to = "=?UTF-8?B?".base64_encode('Equipo Astudillo')."?=".'<contacto@ricardoastudillo.info>';
        $recipients = "oscar@wm4.mx,mmonroy.lan@gmail.com,pepemolinatorres@gmail.com,grubicamargo@gmail.com";
        //$recipients = "oscar@wm4.mx";
        $subject = "=?UTF-8?B?".base64_encode('Registro de colaborador - ricardoastudillo.info')."?=";
        $headers .= 'BCC: '.$recipients.' '. "\r\n";


        require_once ("../mailings/mail_inbound_registro.php");
        if (mail($to,$subject,$message,$headers)){

            $to = "=?UTF-8?B?".base64_encode($nombre)."?=".'<'.$correo.'>';
            $from = "=?UTF-8?B?".base64_encode('Contacto Ciudadano')."?=".'<contacto@ricardoastudillo.info>';
            $subject = "Gracias por por registrarte,";
            require_once ("../mailings/mail_onboarding.php");

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8". "\r\n";
            $headers .= 'From: Ricardo Astudillo<contacto@ricardoastudillo.info>'. "\r\n";
            $headers .= 'to: '.$to.' '. "\r\n";

            if (mail($to,$subject,$message,$headers)){
                echo "<h3>¡Bienvenido al equipo!</h3><br />
                <p>
                  En breve recibirás información y comunicación del equipo de campaña.
                </p>";
            }else{echo "<div class='error_message'>error de envío de bienvenida</div>";}
        }
        else{
            echo "<div class='error_message'>Hemos tenido algún problema con tu registro, por favor intenta nuevamente"."</div>\r\n";
            die();
        }
        break;
    default:
        $message = $mensaje;
        if (mail($to,$subject,$message,$headers)){
            echo "enviado";
        }else{
            echo "error de envío";
            die();
        }
}

?>
