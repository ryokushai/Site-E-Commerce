<?php

$to = "nizar.shaco@gmail.com";
$subject = "Php Mail";
$body = "Test Message From PHP";

$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Your name <info@address.com>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

mail($to, $subject, $body, $headers);
?>