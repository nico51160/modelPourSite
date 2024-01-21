<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>REGEX</title>
</head>

<body>
<?php
function immatriculation($plaque) {
	$regex = "#^[A-Za-z]{2}-[0-9]{3}-[A-Za-z]{2}$#";
	$result = preg_match($regex, $plaque);
	if($result) {
		$msg = "Ceci est bien une plaque d'immatriculation";
	} else {
		$msg = "Ceci n'est pas une plaque d'immatriculation";
	}
	return $msg;
}

$plaque = "RE-605-YT";
echo immatriculation($plaque);
?>
</body>
</html>