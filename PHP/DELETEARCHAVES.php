<?php

include 'bd.php';

echo DeletarChaves();

function DeletarChaves(){
	$pdo = Conectar();
	$result = 'True';
	
	if($pdo == null)
		echo '<br>deu ruim';
	else
	{
		$sql = 'DELETE FROM KEYS_SYSTEM';
		$stm = $pdo->prepare($sql);
		
		if($stm->execute() == false)
		{
			$result = 'False';
		}
		
		$pdo = null;	
		$r['Result'] = $result;
		
		return json_encode($r);
	}
}

?>