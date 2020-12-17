<?php
include 'bd.php';

echo getCodigo();

function getCodigo()
{
	$pdo = Conectar();
	if($pdo == null)
	{
		echo '<br>deu ruim';
	}
	else
	{
		$sql = 'SELECT CODIGO FROM SUPORTECODIGO';
		$stm = $pdo->prepare($sql);
		$stm->execute();

		setCodigo($pdo);	
		$pdo = null;

		return json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
	}
}

function setCodigo($pdo2)
{
	if($pdo2 == null)
	{
		echo '<br>deu ruim';
	}
	else
	{
		$sql = 'UPDATE SUPORTECODIGO SET CODIGO = CODIGO + 1';
		$stmt = $pdo2->prepare($sql);
		$stmt->execute();
	}
}

?>