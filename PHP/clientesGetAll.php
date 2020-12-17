<?php
include 'bd.php';

echo getChaves();

function getChaves(){
	$pdo = Conectar();
	if($pdo == null)echo '<br>deu ruim';
	else{
		$sql = 'SELECT CNPJ, RAZAOSOCIAL, NOMEFANTASIA, EMAIL, TELEFONE FROM CLIENTESINTERESSADOS';
		$stm = $pdo->prepare($sql);
		//$stm->bindValue(1, $chave);
		$stm->execute();
		$pdo = null;	
		//sleep(1);
		return json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
		
	}
}

?>