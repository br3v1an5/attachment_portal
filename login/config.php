<?php

// use includes\DotEnv;

session_start();

include_once('includes/Database.php');
include_once('includes/class.phpmailer.php');
include_once('includes/class.smtp.php');
include('../includes/DotEnv.php');


(new DotEnv('../.env'))->load();

define('DB_NAME', getenv('DB_DATABASE'));
define('DB_USER', getenv('DB_USERNAME'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_HOST', getenv('DB_HOST'));

/**
 ** Change below url with your url
 **/

define('HOME_URL', getenv('APP_URL'), false);

$dsn	= 	"mysql:dbname=" . DB_NAME . ";host=" . DB_HOST . "";
$pdo	=	"";
try {
	$pdo	=	new PDO($dsn, DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
if ($pdo !== "") {
	$db 	=	new Database($pdo);
}
$mail	=	new PHPMailer;


/*
*** You can set SMTP if you want
*** Change below code as per your need
*/

/*
$mail->IsSMTP();													// Set mailer to use SMTP
$mail->SMTPDebug	=	2;											// debugging: 1 = errors and messages, 2 = messages only
$mail->Host 		=	'YOUR_HOST';								// Specify main and backup server
$mail->Port 		=	587;										// Set the SMTP port
$mail->SMTPAuth 	=	true;										// Enable SMTP authentication
$mail->Username 	=	'YOUR@EMAIL>COM';							// SMTP username
$mail->Password 	=	'YOUR_PASS';								// SMTP password
$mail->SMTPSecure	=	'tls';										// Enable encryption, 'ssl' also accepted
*/
