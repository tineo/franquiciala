<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 26/01/18
 * Time: 03:00 PM
 */
require 'vendor/autoload.php';

$from = new SendGrid\Email(null, "cesar@franquiciala.heroku.com");
$subject = "Hello World from the SendGrid PHP Library!";
$to = new SendGrid\Email(null, "itsudatte01@gmail.com");
$content = new SendGrid\Content("text/plain", "Test email");
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = getenv('SENDGRID_API_KEY');
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
echo $response->statusCode();
echo $response->headers();
echo $response->body();