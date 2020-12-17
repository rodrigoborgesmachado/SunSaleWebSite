<?php
include 'bd.php';

$chaveGuid = $ativo = $cnpj = $diaVencimento = $pcName = '';
$chaveGuid = isset($_POST['chaveGuid']) ? $_POST['chaveGuid'] : '-';
$cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : '-';
$diaVencimento = isset($_POST['diaVencimento']) ? $_POST['diaVencimento'] : '-';
$pcName = isset($_POST['pcName']) ? $_POST['pcName'] : '-';
$ativo = isset($_POST['ativo']) ? $_POST['ativo'] : '0';

echo setChave($chaveGuid, $ativo, $cnpj, $diaVencimento, $pcName);

function setChave($chaveGuid, $ativo, $cnpj, $diaVencimento, $pcName)
{
	$pdo = Conectar();
	$result = 'True';
	
	if($pdo == null || $chaveGuid == '-')
	{
		$result = 'False';
	}
	else
	{
		$sql = 'UPDATE KEYS_SYSTEM SET ATIVO = ?, CNPJ = ?, DIAVERIFICACAO = ?, PC_NAME = ? WHERE VALORGUID = ?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $ativo);
		$stm->bindValue(2, $cnpj);
		$stm->bindValue(3, $diaVencimento);
		$stm->bindValue(4, $pcName);
		$stm->bindValue(5, $chaveGuid);

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