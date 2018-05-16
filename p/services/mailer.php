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

// configuration
$to = "=?UTF-8?B?".base64_encode('Contacto Ciudadano')."?=".'<contacto@ricardoastudillo.info>';

//$recipients = "oscar@wm4.mx,maru@wm4.mx,bety@wm4.mx, pepe@wm4.mx";
$recipients = "oscar@wm4.mx";

$subject = "=?UTF-8?B?".base64_encode('WM4 - nuevo registro en forma de contacto')."?=";
$email_from = $correo;

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8". "\r\n";
$headers .= 'From: wm4.mx<no-reply@wm4.mx>'. "\r\n";
$headers .= 'BCC: '.$recipients.' '. "\r\n";

//plantilla de correo de acuerdo al tipo de forma registrado
switch($cat){
    case "buzon":
        require_once ("../mailings/mail_inbound.php");
        if (mail($to,$subject,$message,$headers)){

            $to = "=?UTF-8?B?".base64_encode($nombre)."?=".'<'.$correo.'>';
            $subject = "Gracias por su contacto";
            require_once ("../mailings/mail_onboarding.php");

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8". "\r\n";
            $headers .= 'From: wm4.mx<contacto@wm4.mx>'. "\r\n";
            //$headers .= 'to: '.$to.' '. "\r\n";

            if (mail($to,$subject,$message,$headers)){
                echo "Gracias, su solicitud ha sido enviada";
            }else{echo "error de envío de bienvenida";}
        }
        else{
            echo "hemos tenido algún problema con tu envío, por favor intenta nuevamente"."<br />\r\n";
            echo " | PARAMETERS INTENDED: to= ".$to." <br />\r\n/ subject= ".$subject." <br />\r\n/ email_mesagge= ".$email_message." <br />\r\n/ headers= ".$headers;
            die();
        }
        break;
    case "registro":
        require_once ("../mailings/mail_inbound.php");
        if (mail($to,$subject,$message,$headers)){

            $to = "=?UTF-8?B?".base64_encode($nombre)."?=".'<'.$correo.'>';
            $subject = "Gracias por su contacto";
            require_once ("../mailings/mail_onboarding.php");

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8". "\r\n";
            $headers .= 'From: wm4.mx<contacto@wm4.mx>'. "\r\n";
            //$headers .= 'to: '.$to.' '. "\r\n";

            if (mail($to,$subject,$message,$headers)){
                echo "Gracias, su solicitud ha sido enviada";
            }else{echo "error de envío de bienvenida";}
        }
        else{
            echo "hemos tenido algún problema con tu envío, por favor intenta nuevamente"."<br />\r\n";
            echo " | PARAMETERS INTENDED: to= ".$to." <br />\r\n/ subject= ".$subject." <br />\r\n/ email_mesagge= ".$email_message." <br />\r\n/ headers= ".$headers;
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
