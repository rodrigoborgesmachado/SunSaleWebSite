<?php
include 'bd.php';

$codigoSuporte = isset($_POST['codigoSuporte']) ? $_POST['codigoSuporte'] : '0';
echo getRespostas($codigo);

function getRespostas($codigo)
{
	$pdo = Conectar();

	if($pdo == null)
	{
		echo '<br>deu ruim';
	}
	else
	{
		$sql = 'SELECT CODIGO, CODIGOSUPORTE, DATARESPOSTA, RESPOSTA FROM SUPORTERESPOSTAS WHERE CODIGOSUPORTE = ?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $codigoSuporte);
		$stm->execute();
		$pdo = null;	

		return json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
	}
}

?>