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

echo getChamados($chave);

function getChamados($chave)
{
	$pdo = Conectar();
	if($pdo == null)
	{
		echo '<br>deu ruim';
	}
	else
	{
		$sql = 'SELECT S.CNPJ, S.CODIGO, S.DATAABERTURA, S.STATUS, S.TEXTO, T.DESCRICAO, S.TITULO FROM SUPORTE S INNER JOIN TIPOSUPORTE T ON (T.CODIGO = S.TIPOSUPORTE)';
		$stm = $pdo->prepare($sql);
		$stm->execute();
		$pdo = null;	
		return json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
	}
}

?>