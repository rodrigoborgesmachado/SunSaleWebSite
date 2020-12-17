<?php
include 'bd.php';

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