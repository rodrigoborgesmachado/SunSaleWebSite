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

$chave = isset($_POST['chave']) ? $_POST['chave'] : 'hehe';
echo getChaves($chave);

function getChaves($chave){
	$pdo = Conectar();
	if($pdo == null)echo '<br>deu ruim';
	else{
		$sql = 'SELECT VALORGUID AS Chave, ATIVO AS Ativo FROM KEYS_SYSTEM WHERE VALORGUID = ?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $chave);
		$stm->execute();
		$pdo = null;	
		//sleep(1);
		return json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		
	}
}

?>