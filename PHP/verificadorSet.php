<?php
global $servidor, $usuario, $senha, $nomeBD;


function Conectar(){
$servidor = "mysql:dbname=sunsale;host=50.62.209.185:3306";
$usuario = "system";
$senha = "Masterkey1";

	try{
		$con = new PDO($servidor, $usuario, $senha);
		return $con;
	} catch (Exception $e){
		echo 'Erro: '.$e->getMessage();
		return null;
	}
}
$chaveGuid = $ativo = '';
$chaveGuid = isset($_POST['chaveGuid']) ? $_POST['chaveGuid'] : '-';
$ativo = isset($_POST['ativo']) ? $_POST['ativo'] : '0';
echo setChave($chaveGuid, $ativo);

function setChave($chaveGuid, $ativo){
	$pdo = Conectar();
	$result = 'True';
	
	if($pdo == null || $chaveGuid == '-')
	{
		$result = 'False';
	}
	else
	{
		$sql = 'INSERT INTO KEYS_SYSTEM (VALORGUID, ATIVO) VALUES (?, ?)';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $chaveGuid);
		$stm->bindValue(2, $ativo);
		
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