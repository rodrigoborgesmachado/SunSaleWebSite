<?php
function alert($mensagem){ 
	echo "<script language=\"javascript\" type=\"text/javascript\">";
	echo "alert(\"$mensagem\");";
	echo "</script>";
}
 function conecta(){
	$servidor = "fdb16.awardspace.net";
	$usuario = "2359910_jonasgabriela";
	$senha = "gabrielajonas123";
	$nomeBD = "2359910_jonasgabriela";
	

	$conn = new mysqli($servidor, $usuario, $senha, $nomeBD);

	if ($conn->connect_error)
	 return false;
	return $conn;

 }
 function SelecionaNome($login, $senha){
	$existe=false;
	$conn = conecta();
	if(!$conn) return false;
	$stmt = $conn->prepare("SELECT * FROM USUARIO WHERE LOGIN = ? AND SENHA = ?;");
	$stmt->bind_param("ss", $login, $senha);
	if(!$stmt->execute())return $existe;
	$stmt->bind_result($login, $senha);
	if ($stmt->fetch())
		$existe= true; 
	return $existe;
 }

 function loga(){
	if(conecta()){
		$login=$password="";
		$lo=false;
		$login= $_POST["UserLogin"];
		$password= $_POST["UserPassword"];
		$lo=SelecionaNome($login, $password);
		if($lo){
			if(!isset($_SESSION['logado']))session_start();
			$_SESSION['logado']=1;
			$_SESSION['login']=$login;
			$_SESSION['senha']=$password;
			$_SESSION['cont']=0;
			return true;
		}
	}
	return false;
 }

 function desloga(){
	 if(!isset($_SESSION['logado']))session_start();
	 $_SESSION['logado']=0;
	 session_destroy();
 }
 
 function envia_mensagem($nome, $email, $comentario){
	 $conn = conecta();
	 if(!$conn) return false;
	 $stmt = $conn->prepare("INSERT INTO CONTATO(NAME, EMAIL, COMENTARIO) VALUES (?, ?, ?);");
	 $stmt->bind_param("sss", $nome, $email, $comentario);
	 return $stmt->execute();	 
 }
 
 function agendar($especialidade,$medico,$data,$hora,$nome,$telefone){
	$conn = conecta();
	if(!$conn) return false;
	$codfuncionario=nomeFuncionario($medico);
	$codpaciente=nomePaciente($nome, $telefone);
	$stmt = $conn->prepare("INSERT INTO AGENDA(DATA, HORA, CODFUNCIONARIO, CODPACIENTE) VALUES (?, ?, ?, ?);");
	$stmt->bind_param("ssss", $data, $hora, $codfuncionario, $codpaciente);
	return $stmt->execute();	 
 }
 
 function nomeFuncionario($medico){
	$existe=false;
	$conn = conecta();
	if(!$conn) return false;
	$SQL="SELECT CODFUN FROM FUNCIONARIO WHERE NOME = '$medico';";
	if(!$result = $conn->query($SQL))
		throw new Exception('Ocorreu uma falha ao buscar o nome do médico: ' . $conn->error);
	if ($result->num_rows > 0){
		$row = $result->fetch_assoc();
		return $row["CODFUN"];
	}
	return 3;
 }
 
 function nomePaciente($nome, $telefone){
	$existe=false;
	$conn = conecta();
	if(!$conn) return false;
	$SQL="SELECT CODPACIENTE FROM PACIENTE WHERE NOME = '$nome';";
	if(!$result = $conn->query($SQL))
		throw new Exception('Ocorreu uma falha ao buscar o nome do paciente: ' . $conn->error);
	if ($result->num_rows > 0){
		$row = $result->fetch_assoc();
		return $row["CODPACIENTE"];
	}
	else{
		if(cadastraPaciente($nome, $telefone)){
			$conn->close();
			return nomePaciente($nome, $telefone);
		}
	}
	return 0;
 }
 
 function cadastraPaciente($nome, $telefone){
	$conn = conecta();
	if(!$conn) return false;
	$stmt = $conn->prepare("INSERT INTO PACIENTE(NOME, TELEFONE) VALUES (?, ?);");
	$stmt->bind_param("ss", $nome, $telefone);
	return $stmt->execute();	
 }
 
 function adiciona_contato($nome,  $data, $sexo, $estadocivil, $cargo, $especialidade, $email, $cpf, $rg, $outro, $cep, $tipodelogradouro, $logradouro, $numero, $complemento, $bairro, $cidade, $estado){
	 $resul=true;
	 if(!popula_endereco($cep, $logradouro, $bairro, $cidade)){
		$resul=true;
	 }
	 if(!popula_enderecofun($cep, $tipodelogradouro, $numero, $complemento, $logradouro, $bairro, $cidade, $estado)){
		$resul=false;
	 }
	 if(!popula_funcionario($nome, $data, $sexo, $estadocivil, $cargo, $especialidade, $email, $cpf, $rg, $outro)){
		$resul=false;
	 }
	 return $resul;
 }
 
 function popula_endereco($cep, $logradouro, $bairro, $cidade){
	 $conn =  conecta();
	 if(!$conn) return false;
	 $stmt =  $conn->prepare("INSERT INTO ENDERECO(CEP, LOUGRADOURO, BAIRRO, CIDADE) VALUES (?, ?, ?, ?);");
	 $stmt->bind_param("ssss", $cep, $logradouro, $bairro, $cidade);
	 return $stmt->execute();
 }
 
 function popula_enderecofun($cep, $tipodelogradouro, $numero, $complemento, $logradouro, $bairro, $cidade, $estado){
	 $conn =  conecta();
	 if(!$conn) return false;
	 $stmt =  $conn->prepare("INSERT INTO ENDERECOFUN(CEP, TIPO_DE_LOGRADOURO, LOGRADOURO, NUMERO, COMPLEMENTO, BAIRRO, CIDADE, ESTADO) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
	 $stmt->bind_param("ssssssss", $cep, $tipodelogradouro, $logradouro, $numero, $complemento, $bairro, $cidade, $estado);
	 return $stmt->execute();
 }

 function popula_funcionario($nome, $data, $sexo, $estadocivil, $cargo, $especialidade, $email, $cpf, $rg, $outro){
	 $idendereco="";
	 $resultado="";
	 $row=0;
	 $conn = conecta();
	 if(!$conn) return false;
	 $sql="SELECT * FROM ENDERECOFUN;";
	 $resultado = $conn->query($sql);
	 if(!$resultado)alert("Deu ruim");
	 if ($resultado->num_rows > 0)
	 {
		while ($row = $resultado->fetch_assoc())
			$idendereco=$row["IDENDERECO"];
	 }
	 $stmt =  $conn->prepare("INSERT INTO FUNCIONARIO (NOME, DATA_NASCIMENTO, SEXO, ESTADO_CIVIL, CARGO, ESPECIALIDADE, EMAIL, CPF, RG, OUTRO, IDENDERECO) VALUES(?,?,?,?,?,?,?,?,?,?,?);");
	 $stmt->bind_param("sssssssssss", $nome, $data, $sexo, $estadocivil, $cargo, $especialidade, $email, $cpf, $rg, $outro, $idendereco);
	 return $stmt->execute();
 }
 
 if(@$_REQUEST['id'] == '1'){
	if(loga())
		header('Location: ../index.php?<? SID ?>');
	else{
		if(!isset($_SESSION['logado']))session_start();
		$_SESSION['logado']=2;
		header('Location: ../index.php?<? SID ?>');
	}
}

 if(@$_REQUEST['id'] == '2'){
	desloga();
	header('Location: ../index.php?<? SID ?>');
} 

 if(@$_REQUEST['id'] == '3'){
	 $nome= $email= $comments="";
	 $nome= $_POST["name"];
	 $email= $_POST["email"];
	 $comments= $_POST["comments"];
	 if(envia_mensagem($nome, $email, $comments))header('Location: ../index_contatos.php?func=1');
	 else header('Location: ../index_contatos.php?func=2');
}

 if(@$_REQUEST['id'] == '4'){
	 $nome= $data=$sexo=$estadocivil=$cargo=$especialidade=$email=$cpf=$rg=$outro=$cep=$tipodelogradouro=$logradouro=$numero=$complemento=$bairro=$cidade=$estado="";
	 $nome= $_POST["nome"];
	 $data= $_POST["data"];
   	 $sexo= $_POST["sexo_masc"];
	 $estadocivil=$_POST["estadocivil"];
	 $cargo=$_POST["cargo"];
	 $especialidade=$_POST["especialidade"];
	 $email= $_POST["email"];
	 $cpf= $_POST["cpf"];
	 $rg= $_POST["rg"];
	 $outro= $_POST["outro"];
	 $cep= $_POST["cep"];
	 $logradouro= $_POST["logradouro"];
	 $numero= $_POST["numero"];
	 $complemento= $_POST["complemento"];
	 $bairro= $_POST["bairro"];
	 $cidade= $_POST["cidade"];
	 $estado= $_POST["estado"];
	 if(adiciona_contato($nome,  $data, $sexo, $estadocivil, $cargo, $especialidade, $email, $cpf, $rg, $outro, $cep, $tipodelogradouro, $logradouro, $numero, $complemento, $bairro, $cidade, $estado))
		header('Location: ../index_adicona_contatos.php?func=1');
	 else
		header('Location: ../index_adicona_contatos.php?func=2');
} 

if(@$_REQUEST['id'] == '5'){
	 $especialidade = $medico = $data = $hora = $nome= $telefone="Rodrigo";
	 $hora=10;
	 $especialidade= $_POST["cmbEspecialidade"];
	 $medico= $_POST["cmbMedico"];
	 $data= $_POST["e_data"];
	 $hora= $_POST["cmbHora"];
	 $nome= $_POST["nome"];
	 $telefone= $_POST["telefone"];
	 if(agendar($especialidade,$medico,$data,$hora,$nome,$telefone))header('Location: ../index_atendimento.php?func=1');
	 else header('Location: ../index_atendimento.php?func=2');
}
 ?>
