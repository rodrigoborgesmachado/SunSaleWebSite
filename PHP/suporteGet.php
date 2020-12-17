<?php
include 'bd.php';

$cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : 'hehe';
echo getChamados($cnpj);

function getChamados($cnpj)
{
	$pdo = Conectar();
	if($pdo == null)
	{
		echo '<br>deu ruim';
	}
	else
	{
		$sql = 'SELECT S.CNPJ, S.CODIGO, S.DATAABERTURA, S.STATUS, S.TEXTO, T.DESCRICAO, S.TITULO FROM SUPORTE S INNER JOIN TIPOSUPORTE T ON (T.CODIGO = S.TIPOSUPORTE) WHERE CNPJ = ?';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $cnpj);
		$stm->execute();
		$pdo = null;	
		//sleep(1);
		return json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
	}
}

?>