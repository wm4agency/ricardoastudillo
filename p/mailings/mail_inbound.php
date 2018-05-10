<?php
    $email_message_headers="<HTML>
    <head>
    <style>
        body{font-family:helvetica, arial, sans-serif;}
    </style>
    </head>
    <BODY>
        ";
    $email_message_body="
            <h2>Información del prospecto</2>
            <br>
            <p>
                <strong>NOMBRE:</strong> ".$nombre."<br>
                <strong>EMPRESA:</strong> ".$empresa."<br>
                <strong>EMAIL:</strong> ".$correo."<br>
                <strong>TELÉFONO:</strong> ".$telefono."<br>
                <strong>CIUDAD:</strong> ".$ciudad."<br>
                <strong>INTERESADOS EN:</strong> ".$seleccion."<br>
                <strong>MOTIVO DE INTERÉS: </strong>".$intencion."<br>
                <strong>GRADO DE INTENCIÓN: </strong>".$grado."<br>
                <strong>Presupuesto: </strong>".$presupuesto."<br>
                <br>
                <strong>COMENTARIOS ADICIONALES:</strong> ".$mensaje."
                <br>
            </p>
            <hr>";


$email_message_footer="registro creado el ".date("d/m/Y")."\n\n"."</BODY></HTML>";
$message =$email_message_headers.$email_message_body.$email_message_footer."\n\n";
