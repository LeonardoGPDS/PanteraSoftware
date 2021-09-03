<?php
	require_once 'CLASSES/usuarios.php';
	$u = new Usuario();
?>
<?php
	session_start();
	if(!isset($_SESSION['id_usuario']))
	{
		header("location: index.php");
		exit;
	}
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Acesso Restrito</title>
	<link rel="stylesheet" href=css/estilo.css>
</head>
<body id="areaP">

	<h1>SEJAM BEM VINDOS ANO NOSSO SITE!</h1>
	<h3>DESENVOLVIMENTO EM HTML, CSS, JS e PHP</h3>
	<H2>TADS 202.2</H2>
	<br>   

	<br>
<a href="sair.php"> Sair </a>
</body>
</html>