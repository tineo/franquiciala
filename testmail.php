<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 26/01/18
 * Time: 03:00 PM
 */
require_once 'vendor/autoload.php';

$transport = (new Swift_SmtpTransport(getenv("MAILGUN_SMTP_SERVER"), getenv("MAILGUN_SMTP_PORT"), 'ssl'))
	->setUsername(getenv("MAILGUN_SMTP_LOGIN"))
	->setPassword(getenv("MAILGUN_SMTP_PASSWORD"));

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message("Test"))
	->setFrom(['cesar@tineo.mobi' => 'Cesar Gutierrez Tineo ;D'])
	->setTo(["itsudatte01@gmail.com"])
	->setBody("Desde heroku", 'text/html');

// Send the message
echo $mailer->send($message);