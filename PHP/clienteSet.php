<?php

include 'bd.php';

$cnpj = $email = $nomeFantasia = $razaoSocial = $telefone = '';
$cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : '-';
$email = isset($_POST['email']) ? $_POST['email'] : '-';
$nomeFantasia = isset($_POST['nomeFantasia']) ? $_POST['nomeFantasia'] : '-';
$razaoSocial = isset($_POST['razaoSocial']) ? $_POST['razaoSocial'] : '-';
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '-';

echo setChave($chaveGuid, $ativo);

function setChave($chaveGuid, $ativo){
	$pdo = Conectar();
	$result = 'True';
	
	if($pdo == null || $cnpj == '-')
	{
		$result = 'False';
	}
	else
	{
		$sql = 'INSERT INTO CLIENTESINTERESSADOS (CNPJ, EMAIL, NOMEFANTASIA, RAZAOSOCIAL, TELEFONE) VALUES (?, ?, ?, ?, ?)';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $cnpj);
		$stm->bindValue(2, $email);
		$stm->bindValue(3, $nomeFantasia);
		$stm->bindValue(4, $razaoSocial);
		$stm->bindValue(5, $telefone);
		
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