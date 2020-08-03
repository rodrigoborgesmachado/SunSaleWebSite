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

$usu = $pass = '';
$usu = isset($_POST['usu']) ? $_POST['usu'] : '-';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '-';

echo insertVersao($usu, $pass);

function insertVersao($usu, $pass)
{
	$pdo = Conectar();
	$result = 'True';
	
	if($pdo == null)
	{
		echo '<br>deu ruim';
	}
	else
	{
		$sql = 'SELECT * FROM USUARIO WHERE LOGIN = ? AND SENHA = ?';
		
		$stm = $pdo->prepare($sql);
		$stm->bindValue(1, $usu);
		$stm->bindValue(2, $pass);

		$stm->execute();
		$pdo = null;	

		return json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
	}
}

?>