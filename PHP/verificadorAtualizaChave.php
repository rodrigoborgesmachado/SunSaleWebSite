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

$chaveGuid = $ativo = '';
$chaveGuid = isset($_POST['chaveGuid']) ? $_POST['chaveGuid'] : '-';
$ativo = isset($_POST['ativo']) ? $_POST['ativo'] : '0';
$pcName = isset($_POST['pcName']) ? $_POST['pcName'] : '-';

echo setChave($chaveGuid, $ativo, $pcName);

function setChave($chaveGuid, $ativo, $pcName)
{
	$pdo = Conectar();
	$result = 'True';
	
	if($pdo == null || $chaveGuid == '-')
	{
		$result = 'False';
	}
	else
	{
		$sql = 'UPDATE KEYS_SYSTEM SET ATIVO = ?, PC_NAME = ? WHERE VALORGUID = ?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $ativo);
		$stm->bindValue(2, $pcName);
		$stm->bindValue(3, $chaveGuid);

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