<?php
include 'bd.php';

$codigo = $codigSuporte = $dataresporta = $resposta = $codigoUsuario = '';

$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '-';
$codigSuporte = isset($_POST['codigSuporte']) ? $_POST['codigSuporte'] : '-';
$codigoUsuario = isset($_POST['codigoUsuario']) ? $_POST['codigoUsuario'] : '-';
$dataresporta = isset($_POST['dataresporta']) ? $_POST['dataresporta'] : '0';
$resposta = isset($_POST['resposta']) ? $_POST['resposta'] : '-';

echo insertResposta($codigo, $codigSuporte, $dataresporta, $resposta, $codigoUsuario);

function insertResposta($codigo, $codigSuporte, $dataresporta, $resposta, $codigoUsuario)
{
	$pdo = Conectar();
	$result = 'True';
	
	if($pdo == null || $chaveGuid == '-')
	{
		$result = 'False';
	}
	else
	{
		$sql = 'INSERT INTO SUPORTERESPOSTAS (CODIGO, CODIGOSUPORTE, DATARESPOSTA, RESPOSTA, CODIGOUSUARIO) VALUES (?, ?, ?, ?, ?)';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $codigo);
		$stm->bindValue(2, $codigSuporte);
		$stm->bindValue(3, $dataresporta);
		$stm->bindValue(4, $resposta);
		$stm->bindValue(5, $codigoUsuario);
		
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