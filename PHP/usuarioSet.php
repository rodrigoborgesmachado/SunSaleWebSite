<?php
include 'bd.php';

$codigo = $codigSuporte = $dataresporta = $resposta = '';

$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '-';
$codigSuporte = isset($_POST['codigSuporte']) ? $_POST['codigSuporte'] : '-';
$dataresporta = isset($_POST['dataresporta']) ? $_POST['dataresporta'] : '0';
$resposta = isset($_POST['resposta']) ? $_POST['resposta'] : '-';

echo insertResposta($codigo, $codigSuporte, $dataresporta, $resposta);

function insertResposta($codigo, $codigSuporte, $dataresporta, $resposta)
{
	$pdo = Conectar();
	$result = 'True';
	
	if($pdo == null || $chaveGuid == '-')
	{
		$result = 'False';
	}
	else
	{
		$sql = 'UPDATE SUPORTE SET CODIGOSUPORTE = ?, DATARESPOSTA = ?, RESPOSTA = ? WHERE CODIGO = ?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $codigSuporte);
		$stm->bindValue(2, $dataresporta);
		$stm->bindValue(3, $resposta);
		$stm->bindValue(4, $codigo);
		
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