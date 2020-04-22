<?php
global $servidor, $usuario, $senha, $nomeBD;


function Conectar(){
$servidor = "mysql:dbname=sunsale;host=50.62.209.185:3306";
$usuario = "system";
$senha = "Masterkey1";

	try{
		$con = new PDO($servidor, $usuario, $senha);
		return $con;
	} catch (Exception $e){
		echo 'Erro: '.$e->getMessage();
		return null;
	}
}

echo DeletarChaves();

function DeletarChaves(){
	$pdo = Conectar();
	$result = 'True';
	
	if($pdo == null)
		echo '<br>deu ruim';
	else
	{
		$sql = 'DELETE FROM KEYS_SYSTEM';
		$stm = $pdo->prepare($sql);
		
		if($stm->execute() == false)
		{
			$result = 'False';
		}
		
		$pdo = null;	
		$r['Result'] = $result;
		
		return json_encode($r);
	}
}

?>