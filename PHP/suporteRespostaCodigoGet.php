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
		$sql = 'SELECT CODIGO FROM RESPOSTACODIGO';
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
		$sql = 'UPDATE RESPOSTACODIGO SET CODIGO = CODIGO + 1';
		$stmt = $pdo2->prepare($sql);
		$stmt->execute();
	}
}

?>