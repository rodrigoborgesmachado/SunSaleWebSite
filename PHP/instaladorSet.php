<?php
global $servidor, $usuario, $senha, $nomeBD;


function Conectar()
{
	$servidor = "mysql:dbname=sunsale;host=50.62.209.185:3306";
	$usuario = "system";
	$senha = "Masterkey1";

	try
	{
		$con = new PDO($servidor, $usuario, $senha);
		return $con;
	} 
	catch (Exception $e)
	{
		echo 'Erro: '.$e->getMessage();
		return null;
	}
}

$versao = $projeto = $caminho = '';
$versao = isset($_POST['versao']) ? $_POST['versao'] : '-';
$caminho = isset($_POST['caminho']) ? $_POST['caminho'] : '0';
$projeto = isset($_POST['projeto']) ? $_POST['projeto'] : '-';

echo insertVersao($versao, $projeto, $caminho);

function insertVersao($versao, $projeto, $caminho)
{
	$pdo = Conectar();
	$result = 'True';
	
	if($pdo == null || $chaveGuid == '-')
	{
		$result = 'False';
	}
	else
	{
		$sql = 'INSERT INTO INSTALADORES (CODIGOPROJETO, VERSAO, CAMINHO) VALUES (?, ?, ?)';
		
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $projeto);
		$stm->bindValue(2, $versao);
		$stm->bindValue(3, $caminho);

		if($stm->execute() == false)
		{
			$result = 'False';
		}
		
		$pdo = null;	
	}
	
	$r['Result'] = $result;	
	return json_encode($r);
}

?>