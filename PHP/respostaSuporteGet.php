<?php
include 'bd.php';

$codigoSuporte = isset($_POST['codigoSuporte']) ? $_POST['codigoSuporte'] : '1010';
echo getRespostas($codigoSuporte);

function getRespostas($codigoSuporte)
{
	$pdo = Conectar();

	if($pdo == null)
	{
		echo '<br>deu ruim';
	}
	else
	{
		$sql = 'SELECT * FROM SUPORTERESPOSTAS WHERE CODIGOSUPORTE = ?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $codigoSuporte);
		$stm->execute();
		$pdo = null;	

		return json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
	}
}

?>