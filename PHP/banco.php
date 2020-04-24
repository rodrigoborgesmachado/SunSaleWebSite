<?php
function alert($mensagem)
{ 
	echo "<script language=\"javascript\" type=\"text/javascript\">";
	echo "alert(\"$mensagem\");";
	echo "</script>";
}

function Conectar(){
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
 
function cadastraCliente($cnpj, $email, $nomeFantasia, $razaoSocial, $telefone){
	
	$conn = Conectar();
	
	if($conn == null)
	{
		return false;
	} 
	
	$stmt = $conn->prepare('INSERT INTO CLIENTESINTERESSADOS (CNPJ, EMAIL, NOMEFANTASIA, RAZAOSOCIAL, TELEFONE) VALUES (?, ?, ?, ?, ?)');
	
	$stmt->bindValue(1, $cnpj);
	$stmt->bindValue(2, $email);
	$stmt->bindValue(3, $nomeFantasia);
	$stmt->bindValue(4, $razaoSocial);
	$stmt->bindValue(5, $telefone);

	return $stmt->execute();	
}
 
 
if(@$_REQUEST['id'] == '1')
{
	$cnpj = $email = $nomeFantasia = $razaoSocial = $telefone = '';
	$cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : '-';
	$email = isset($_POST['email']) ? $_POST['email'] : '-';
	$nomeFantasia = isset($_POST['nomeFantasia']) ? $_POST['nomeFantasia'] : '-';
	$razaoSocial = isset($_POST['razaoSocial']) ? $_POST['razaoSocial'] : '-';
	$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '-';
	
	if(cadastraCliente($cnpj, $email, $nomeFantasia, $razaoSocial, $telefone))
	{
		header('Location: ../index_contatos.php?func=1');
	}
	else
	{
		header('Location: ../index_contatos.php?func=2');
	}
}
 ?>
