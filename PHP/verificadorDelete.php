<?php
include 'bd.php';

$chaveGuid = $ativo = '';
$chaveGuid = isset($_POST['chaveGuid']) ? $_POST['chaveGuid'] : 'f77156eb-eab2-4ca3-8a9e-22e895f7c9a1';
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
		$sql = 'DELETE FROM KEYS_SYSTEM WHERE VALORGUID = ?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $chaveGuid);
		
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