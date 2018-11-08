<?php

require __DIR__.'/vendor/autoload.php';

if(!empty($_POST)){
	$datas = array_map('htmlspecialchars', $_POST);
	
	$credential = [
		'clientId' => 'Client_ID',
		'clientSecret' => 'Client_Secret'
	];
	$osms = new Osms\Osms($credential);

	$token = $osms->getTokenFromConsumerKey();

	$osms->sendSMS('tel:+243894066153', 'tel:' . $datas['tel'], $datas['content'], 'Informagenie');
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Envoie sms via Orange</title>
</head>
<body>
	<div class="container">
		<form method="post">
			<div class="form-group">
				<label for="tel">Phone</label>
				<input type="tel" name="tel" />
			</div>
			<div class="form-group">
				<label for="message">Texte</label>
				<textarea name="content"></textarea>
			</div>
			<button type="submit">Envoyer le mesasge</button>
		</form>
	</div>
</body>
</html>
