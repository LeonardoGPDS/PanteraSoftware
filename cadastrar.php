<?php
	require_once 'CLASSES/usuarios.php';
	$u = new Usuario();
?>

<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<title>Projeto Login</title>
	<link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>

<div id="corpo-form-cad">
	
	<h1>Cadastrar</h1>
	<form method="POST">
	<div class="textbox">
    <i class="fas fa-user"></i>
		<input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
		</div>
		
		<div class="textbox">
    <i class="fas fa-phone"></i>
		<input type="text" name="telefone" placeholder="Telefone" maxlength="30">
		</div>

		<div class="textbox">
    <i class="fas fa-envelope"></i>
		<input type="email" name="email" placeholder="Usuário" maxlength="40">
		</div>

		<div class="textbox">
        <i class="fas fa-lock"></i>
		<input type="password" name="senha" placeholder="Senha" maxlength="15">
		</div>

		<div class="textbox">
        <i class="fas fa-lock"></i>
		<input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">

		</div>
		<input type="submit" value="Cadastrar">
	</form>
</div>
<?php
//verificar se clicou no botao
if(isset($_POST['nome']))
{
	$nome = addslashes($_POST['nome']);
	$telefone = addslashes($_POST['telefone']);
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	$confirmarSenha = addslashes($_POST['confSenha']);
	//verificar se esta preenchido
	if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
	{
		$u->conectar("tela_login","localhost","root","");
		if($u->msgErro == "")//se esta tudo ok
		{
			if($senha == $confirmarSenha)
			{
				if($u->cadastrar($nome,$telefone,$email,$senha))
				{
					
					?>
					<div id="msg-sucesso">
					<p class="mensagem">Cadastrado com sucesso!<a href="index.php" id="a2">Acesse já!</a></p>
					</div>
					
					<?php
					
				}
				else
				{
					?>
					<div class="msg-erro">
						Email ja cadastrado!
					</div>
					<?php
				}
			}
			else
			{
				?>
				<div class="msg-erro">
					Senha e confirmar senha não correspondem
				</div>
				<?php
			}
		}
		else
		{
			?>
			<div class="msg-erro">
				<?php echo "Erro: ".$u->msgErro;?>
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