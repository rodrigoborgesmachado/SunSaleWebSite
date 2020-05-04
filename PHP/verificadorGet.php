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

$chave = isset($_POST['chave']) ? $_POST['chave'] : 'hehe';
$ip = (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) ? $_SERVER['HTTP_CF_CONNECTING_IP'] : (isset($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : '0.0.0.0';
setChave($chave, $ip);
echo getChaves($chave);

function getChaves($chave){
	$pdo = Conectar();
	if($pdo == null)echo '<br>deu ruim';
	else{
		$sql = 'SELECT * FROM KEYS_SYSTEM WHERE VALORGUID = ?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $chave);
		$stm->execute();
		$pdo = null;	
		//sleep(1);
		return json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		
	}
}

function setChave($chaveGuid, $ip)
{

	$pdo = Conectar();
	$result = 'True';
	
	if($pdo == null || $chaveGuid == '-')
	{
		$result = 'False';
	}
	else
	{
		date_default_timezone_set('America/Sao_Paulo');
		
		$sql = 'INSERT INTO ACESSO_KEY (DATA_ACESSO, IP, CHAVE) VALUES (?, ?, ?)';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, date('Y-m-d H:i'));
		$stm->bindValue(2, $ip);
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