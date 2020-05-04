<?php
global $servidor, $usuario, $senha, $nomeBD;

function Conectar()
{
	$servidor = "mysql:dbname=sunsale;host=50.62.209.185:3306";
	$usuario = "system";
	$senha = "Masterkey1";

	try
	{
		$con = new PDO($servidor, $usuario, $senha);
		return $con;
	} 
	catch (Exception $e)
	{
		echo 'Erro: '.$e->getMessage();
		return null;
	}
}

$codigo = $codigSuporte = $dataresporta = $resposta = $codigoUsuario = '';

$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '-';
$codigSuporte = isset($_POST['codigSuporte']) ? $_POST['codigSuporte'] : '-';
$dataresporta = isset($_POST['dataresporta']) ? $_POST['dataresporta'] : '0';
$codigoUsuario = isset($_POST['codigoUsuario']) ? $_POST['codigoUsuario'] : '-';
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
		$sql = 'UPDATE SUPORTE SET CODIGOSUPORTE = ?, DATARESPOSTA = ?, RESPOSTA = ?, CODIGOUSUARIO = ? WHERE CODIGO = ?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $codigSuporte);
		$stm->bindValue(2, $dataresporta);
		$stm->bindValue(3, $resposta);
		$stm->bindValue(4, $codigo);
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