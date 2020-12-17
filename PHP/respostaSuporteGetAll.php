<?php
include 'bd.php';

echo getRespostas();

function getRespostas()
{
	$pdo = Conectar();

	if($pdo == null)
	{
		echo '<br>deu ruim';
	}
	else
	{
		$sql = 'SELECT * FROM SUPORTERESPOSTAS';
		$stm = $pdo->prepare($sql);
		$stm->execute();
		$pdo = null;	

		return json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
	}
}

?>