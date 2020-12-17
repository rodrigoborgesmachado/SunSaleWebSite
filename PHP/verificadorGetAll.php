<?php
include 'bd.php';

echo getChaves($chave);

function getChaves($chave){
	$pdo = Conectar();
	if($pdo == null)echo '<br>deu ruim';
	else{
		$sql = 'SELECT * FROM KEYS_SYSTEM';
		$stm = $pdo->prepare($sql);
		//$stm->bindValue(1, $chave);
		$stm->execute();
		$pdo = null;	
		//sleep(1);
		return json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		
	}
}

?>