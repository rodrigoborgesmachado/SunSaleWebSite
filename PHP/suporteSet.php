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

$cnpj = $codigo = $dataabertura = $status = $texto = $tiposuporte = $titulo ='';
$cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : '-';
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '0';
$dataabertura = isset($_POST['dataabertura']) ? $_POST['dataabertura'] : '-';
$status = isset($_POST['status']) ? $_POST['status'] : '-';
$texto = isset($_POST['texto']) ? $_POST['texto'] : '-';
$tiposuporte = isset($_POST['tiposuporte']) ? $_POST['tiposuporte'] : '-';
$titulo = isset($_POST['titulo']) ? $_POST['titulo'] : '-';

echo atualizaChamado($cnpj, $codigo, $dataabertura, $status, $texto, $tiposuporte, $titulo);

function atualizaChamado($cnpj, $codigo, $dataabertura, $status, $texto, $tiposuporte, $titulo)
{
	$pdo = Conectar();
	$result = 'True';
	
	if($pdo == null || $chaveGuid == '-')
	{
		$result = 'False';
	}
	else
	{
		$sql = 'UPDATE SUPORTE SET CNPJ = ?, DATAABERTURA = ?, STATUS = ?, TEXTO = ?, TIPOSUPORTE = ?, TITULO = ? WHERE CODIGO = ?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $cnpj);
		$stm->bindValue(2, $dataabertura);
		$stm->bindValue(3, $status);
		$stm->bindValue(4, $texto);
		$stm->bindValue(5, $tiposuporte);
		$stm->bindValue(6, $titulo);
		$stm->bindValue(7, $codigo);

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