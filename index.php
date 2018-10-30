<?php

require __DIR__.'/vendor/autoload.php';

if(!empty($_POST)){
	$datas = array_map('htmlspecialchars', $_POST);
	
	$osms = new \Osms\Osms([
		'clientId' => 'QTv1rg2bwW4H28npH9P9F8oO0lknMIWk',
		'clientSecret' => 'ZQQYz5BauAAHWakA'
	]);

	$osms->getTokenFromConsumerKey();

	print_r($osms->sendSMS('Goms', 'tel:'.$datas['tel'], $datas['content']));
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
