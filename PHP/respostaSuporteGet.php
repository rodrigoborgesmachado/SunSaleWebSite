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