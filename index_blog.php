<?php 
    $nomeClinica = 'Sun Sale System';
    $inicio="";
	$softwares="";
	$blog="active";
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
    <body id="top" data-spy="scroll" data-target=".navbar" data-offset="60">
        <div class="jumbotron">	
        <?php
			include 'php/navegacao.php';
			include 'php/cabecalho.php';
		?>
		
			<div class="interna" style="background-color: #dddddd;" align="justify">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-8">
							<h2>
                            <font size="+1">
                                <b>BLOG - Estudos de Tecnologias</b>
                            </font>
							</h2>
						</div>
					</div>
				</div>
				<div class="container-fluid">
					<div class="row" id="regularexpression">
						<div class="col-sm-4">
						<?php
							try
							{
								$conn = Conectar();
								
								if(!$conn->set_charset("utf8"))
								{
									echo 'Erro ao setar charset';
								}

								$result = $conn->query('SELECT M.TITULO, M.TAG FROM MATERIASBLOG M, PUBLICACOES P WHERE M.CODIGO = P.CODIGOPUBLICACAO AND M.APRESENTAR = "1"');
	
								if (! $result)
								{
									echo 'Ocorreu uma falha ao buscar os dados: ' . $conn->error;
								}
								else
								{
									echo '<center><h2>PUBLICAÇÕES</h2></center>';

									while($row = $result->fetch_assoc())
									{
										$titulo=$row["TITULO"];
										$tag =$row["TAG"];

										echo '		
														<h2>
														<font size="-1">
															<a href = "#'.$tag. '">' .$titulo. '</a>
														</font>
														</h2>
														<hr>';
									}
									$result->close();
	
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
						</div>
						<div class="col-sm-8">
						<?php
							try
							{
								$conn = Conectar();
								
								if(!$conn->set_charset("utf8"))
								{
									echo 'Erro ao setar charset';
								}

								$result = $conn->query('SELECT M.TITULO, M.SUBTITULO, P.TEXTO, M.DATAPUBLICACAO, M.TAG FROM MATERIASBLOG M, PUBLICACOES P WHERE M.CODIGO = P.CODIGOPUBLICACAO AND M.APRESENTAR = "1"');
	
								if (! $result)
								{
									echo 'Ocorreu uma falha ao buscar os dados: ' . $conn->error;
								}
								else
								{
									while($row = $result->fetch_assoc())
									{
										$titulo=$row["TITULO"];
										$subtitulo=$row["SUBTITULO"];
										$texto =$row["TEXTO"];
										$data =$row["DATAPUBLICACAO"];
										$tag =$row["TAG"];

										echo '	<div id = "' .$tag. '"
													<h2>
													<font size="+2" color="#303030">
														' .$titulo. '
													</font>
													<br>
													<font size="-1" color="#777">
														' .$subtitulo. '
													</font> 
													</h2>
													<hr>	
													<h4>
														' .$texto. '
														<br>
														<div align="right">
															<font size="-1" color="#777">
																By Rodrigo Machado
																<br>
																' .$data. '
															</font> 
														</div>
													</h4>
												</div>';
									}
									$result->close();
	
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
						</div>
					</div>
				</div>
				<div class="text-center">
					<a href="#top">
						<center><span class="glyphicon glyphicon-chevron-up"></span></center>
					</a>
				</div>
			</div>
		</div>

        <?php
			include 'php/rodape.php'
		?>
    </body>
</html>

