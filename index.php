<?php 
require_once 'CLASSES/usuarios.php';
$u = new Usuario();
?>

<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<title>Projeto Login</title>
	<link rel="stylesheet" href="CSS/estilo.css">
	<meta name="viewport" content="width=device-width">
</head>
<body>
<div id="corpo-form" class="corpo-form">
	<h1>Entrar</h1>
	<form method="POST">
	<div class="textbox">
    <i class="fas fa-user"></i>
		<input type="email" placeholder="Usuário" name="email">
		</div>
		<div class="textbox">
    <i class="fas fa-lock"></i>
		<input type="password" placeholder="Senha" name="senha">
		</div>
		<input type="submit" value="ACESSAR">
		<a href="cadastrar.php" id="a1">Ainda não é inscrito?<strong>Cadastre-se!</strong></a>
	</form>
</div>
<?php
if(isset($_POST['email']))
{
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	
	if(!empty($email) && !empty($senha))
	{
		$u->conectar("tela_login","localhost","root","");
		if($u->msgErro == "")
		{
			if($u->logar($email,$senha))
			{
				header("location:loading2.html");
			}
			else
			{
				?>
				<div class="msg-erro">
					Email e/ou senha estão incorretos!
				</div>
				<?php
			}
		}
		else
		{
			?>
			<div class="msg-erro">
				<?php echo "Erro: ".$u->msgErro; ?>
			</div>
			<?php
		}
	}else
	{
		?>
		<div class="msg-erro">
			Preencha todos os campos!
		</div>
		<?php
	}
}
?>
</body>
</html>