<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 23/01/18
 * Time: 04:41 PM
 */

require_once '../vendor/autoload.php';

function meow($destinatario,$asunto,$cuerpo,$headers) {
  // Create the Transport
  $transport = (new Swift_SmtpTransport(getenv("MAILGUN_SMTP_SERVER"), getenv("MAILGUN_SMTP_PORT"), 'ssl'))
    ->setUsername(getenv("MAILGUN_SMTP_LOGIN"))
    ->setPassword(getenv("MAILGUN_SMTP_PASSWORD"));

  // Create the Mailer using your created Transport
  $mailer = new Swift_Mailer($transport);

  // Create a message
  $message = (new Swift_Message($asunto))
    ->setFrom(['cesar@tineo.mobi' => 'Cesar Gutierrez Tineo ;D'])
    ->setTo([$destinatario])
    ->setBody($cuerpo, 'text/html');

  // Send the message
  return $mailer->send($message);
}
//no pe, no es ajax
if(isset($_SERVER['REQUEST_METHOD'])) http_response_code(404);
