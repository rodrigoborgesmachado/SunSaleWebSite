<?php
include 'bd.php';

$cnpj = $codigo = $dataabertura = $status = $texto = $tiposuporte = $titulo ='';
$cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : '-';
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '0';
$dataabertura = isset($_POST['dataabertura']) ? $_POST['dataabertura'] : '-';
$status = isset($_POST['status']) ? $_POST['status'] : '-';
$texto = isset($_POST['texto']) ? $_POST['texto'] : '-';
$tiposuporte = isset($_POST['tiposuporte']) ? $_POST['tiposuporte'] : '-';
$titulo = isset($_POST['titulo']) ? $_POST['titulo'] : '-';

echo insertChamado($cnpj, $codigo, $dataabertura, $status, $texto, $tiposuporte, $titulo);

function insertChamado($cnpj, $codigo, $dataabertura, $status, $texto, $tiposuporte, $titulo)
{
	$pdo = Conectar();
	$result = 'True';
	
	if($pdo == null || $chaveGuid == '-')
	{
		$result = 'False';
	}
	else
	{
		$sql = 'INSERT INTO SUPORTE (CNPJ, CODIGO, DATAABERTURA, STATUS, TEXTO, TIPOSUPORTE, TITULO) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $cnpj);
		$stm->bindValue(2, $codigo);
		$stm->bindValue(3, $dataabertura);
		$stm->bindValue(4, $status);
		$stm->bindValue(5, $texto);
		$stm->bindValue(6, $tiposuporte);
		$stm->bindValue(7, $titulo);
		
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