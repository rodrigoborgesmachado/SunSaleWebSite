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

$chaveGuid = $ativo = $cnpj = $diaVencimento = '';
$chaveGuid = isset($_POST['chaveGuid']) ? $_POST['chaveGuid'] : '000';
$cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : '-';
$diaVencimento = isset($_POST['diaVencimento']) ? $_POST['diaVencimento'] : '10';
$ativo = isset($_POST['ativo']) ? $_POST['ativo'] : '0';
$pcName = isset($_POST['pcName']) ? $_POST['pcName'] : '-';

echo setChave($chaveGuid, $ativo, $cnpj, $diaVencimento, $pcName);

function TrataCNPJ($cnpj){
    $cnpj = str_replace('.', '', $cnpj);
    $cnpj = str_replace('/', '', $cnpj);
    $cnpj = str_replace('-', '', $cnpj);
	return $cnpj;
}

/** 
 * recursively create a long directory path
 */
function createPath($path) {
    if (is_dir($path)) {
        return true;
    }    
    $prev_path = substr($path, 0, strrpos($path, '/', -2) + 1 );
    $return = createPath($prev_path);
    return ($return && is_writable($prev_path)) ? mkdir($path) : false;
}

function setChave($chaveGuid, $ativo, $cnpj, $diaVencimento, $pcName)
{
	$pdo = Conectar();
	$result = 'True';

	$caminhoArquivo = '../Clientes/Arquivos/' . TrataCNPJ($cnpj);

	if(!is_dir($caminhoArquivo)){
		$result = createPath($caminhoArquivo) ? 'True' : 'False';
	}
	
	if($pdo == null || $chaveGuid == '-' || $result == 'False')
	{
		$result = 'False';
	}
	else
	{
		$sql = 'INSERT INTO KEYS_SYSTEM (VALORGUID, ATIVO, CNPJ, DIAVERIFICACAO, PC_NAME, CAMINHO_ARQUIVOS) 
			    VALUES (?, ?, ?, ?, ?, ?)';
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $chaveGuid);
		$stm->bindValue(2, $ativo);
		$stm->bindValue(3, $cnpj);
		$stm->bindValue(4, $diaVencimento);
		$stm->bindValue(5, $pcName);
		$stm->bindValue(6, $caminhoArquivo);
		
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