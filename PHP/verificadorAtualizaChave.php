<?php
include 'bd.php';

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