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
$chaveGuid = isset($_POST['chaveGuid']) ? $_POST['chaveGuid'] : 'f77156eb-eab2-4ca3-8a9e-22e895f7c9a1';
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
		$sql = 'UPDATE KEYS_SYSTEM SET ATIVO = ? WHERE VALORGUID = ?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $ativo);
		$stm->bindValue(2, $chaveGuid);
		
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