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
  $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername('unmailfulano@gmail.com')
    ->setPassword('996666567');

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
