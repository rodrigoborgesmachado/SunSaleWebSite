<?php 
    $nomeClinica = 'Sun Sale System';
    $inicio="";
	$softwares="active";
	$blog="";
	$contatos="";

function Conectar()
{
	try
	{
		$con = new mysqli('50.62.209.185:3306', 'system', 'Masterkey1', 'sunsale');
		return $con;
	} 
	catch (Exception $e)
	{
		echo 'Erro: '.$e->getMessage();
		return null;
	}
}

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
		<?php
			include 'php/head.php'
		?>
    </head>
    <body id="about" data-spy="scroll" data-target=".navbar" data-offset="60">
        <div class="jumbotron">	
        	<?php
				include 'php/navegacao.php';
				include 'php/cabecalho.php';
			?>
			<div class="interna" style="background-color: #dddddd;" align="justify">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12">
							<h2>
                            Softwares
                            </h2>
                            <hr>
							<h4>
                            
                            </h4>
                            <br>					
						</div>
						<div class="row">
							<div class="col-sm-4">
								<img class = "imgGalery slideanim" src='images/logo400x300.png' alt="Paris">
							</div>	
							<div class="col-sm-8">
								<h2>SunSale</h2>
								<h4>
								Sistema para lojas de calçados e de roupas que fornece controle de vendas, clientes, produtos, caixa, títulos, etc.
								<br>
								<br>
								O <a href="../Módulos/apresentacao.pdf" target="_blank">documento de apresentação</a> do sistema mostra um pouco como o sistema funciona, assim como os módulos a seguir. Qualquer dúvida entre em <a href="index_contatos.php" target="_blank">contato</a> com nosso time.
								<br>
								<br>
								<br><br>
								Versões:
								<br><br>
								<?php
									try
									{
										$conn = Conectar();
										
										$result = $conn->query('SELECT CAMINHO, VERSAO FROM INSTALADORES WHERE CODIGOPROJETO = 0');

										if (! $result)
										{
											echo 'Ocorreu uma falha ao buscar o endereco: ' . $conn->error;
										}
										else
										{
											echo '<center>';
											echo '<table width="100%" cellpadding="0" cellspacing="0" border="1">';
											echo '	<tbody>';
											echo '		<tr>';
											echo '			<td> ';
											echo '				<font size="+1">';
											echo '					<b>VERSÃO</b>';
											echo '				</font>';
											echo '			</td>';
											echo '			<td>';
											echo '				<font size="+1">';
											echo '					<b>Instalador</b>';
											echo '				</font>';
											echo '			</td>';
											echo '		</tr>';

											while($row = $result->fetch_assoc())
											{
												$caminho=$row["CAMINHO"];
												$versao=$row["VERSAO"];

												echo '		<tr>
																<td>
																	<b>'.$versao.'</b>
																</td>
																<td>
																	<a href="'.$caminho.'" target="_blank">SunSale.exe</a>
																</td>
															</tr>';
											}
											$result->close();

											echo '</table>';
											echo '</center>';
										}
									
										if ($conn != null)
										{
											$conn->close();
										}
										
									}
									catch (Exception $e)
									{
										$msgErro = $e->getMessage();
										echo 'Error: '.$msgErro;
									}
									?>
								<br><br>
								</h4>
							</div>
						</div>
					</div>
				</div>				
			</div>
		</div>

        <?php
			include 'php/rodape.php'
		?>
    </body>
</html>

