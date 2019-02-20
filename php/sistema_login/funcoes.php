<?php
 
//Conecta com o MySQL usando PDO
function db_connect()
{
    try {
	    $conexao = new PDO("mysql:host=localhost;port=3306;dbname=login", "root", "");
	    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $conexao->exec("set names utf8");
	    return $conexao;
	} catch (PDOException $erro) {
	    echo "Erro na conexão:".$erro->getMessage();
	}
}
 
//Cria o hash da senha, usando MD5 e SHA-1
function make_hash($str)
{
    return sha1(md5($str));
}
 
//Verifica se o usuário está logado
function isLoggedIn()
{
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
    {
        return false;
    }
    
    return true;
}

function showError($message){
	require_once './assets/header.php';
    echo "
    	<h1 class='text-center mt-4'>
    		{$message}
    		<br>
    		<a href='javascript:history.back()''>
    			Voltar
			</a>
		</h1>
	";
	require_once './assets/footer.php';
    exit;
}

function showBadge($message, $color){
	echo "
	<div class='alert alert-{$color}' role='alert'>
		{$message}
	</div>
	";
}

?>