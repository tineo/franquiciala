<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 23/01/18
 * Time: 04:41 PM
 */

require_once '../vendor/autoload.php';

function meow($destinatario,$asunto,$cuerpo,$headers) {

	$from = new SendGrid\Email('Cesar Gutierrez Tineo ;D', "cesar@franquiciala.heroku.com");
	$to = new SendGrid\Email(null, $destinatario);
	$content = new SendGrid\Content("text/html", $cuerpo);
	$mail = new SendGrid\Mail($from, $asunto, $to, $content);

	$apiKey = getenv('SENDGRID_API_KEY');
	$sg = new \SendGrid($apiKey);

	$response = $sg->client->mail()->send()->post($mail);
	return ($response->statusCode()<300)?TRUE:FALSE;
	//echo $response->headers();
	//echo $response->body();

}
//no pe, no es ajax
if(isset($_SERVER['REQUEST_METHOD'])) http_response_code(404);
