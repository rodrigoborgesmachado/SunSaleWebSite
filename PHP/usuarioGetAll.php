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
		$sql = 'SELECT CODIGO, CODIGOSUPORTE, DATARESPOSTA, RESPOSTA FROM SUPORTERESPOSTAS';
		$stm = $pdo->prepare($sql);
		$stm->execute();
		$pdo = null;	

		return json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
	}
}

?>