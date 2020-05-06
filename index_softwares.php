<?php 
    $nomeClinica = 'Sun Sale System';
    $inicio="";
	$softwares="active";
	$blog="";
	$contatos="";
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

								Esse sistema possui os seguintes <a href="../Módulos/Módulo - Módulos.pdf" target="_blank">módulos</a>:
								<ul>
									<li>
										<a href="../Módulos/Módulo - Login.pdf" target="_blank">Login</a>
									</li>                                                   
									<li>                                                    
										<a href="../Módulos/Módulo - Cadastro de Formas de Pagamento.pdf" target="_blank">Cadastro de Formas de Pagamento</a>
									</li>                                                   
									<li>                                                    
										<a href="../Módulos/Módulo - Cadastro de Condições de Pagamento.pdf" target="_blank">Cadastro de Condições de Pagamento</a>
									</li>                                                   
									<li>                                                    
										<a href="../Módulos/Módulo - Controle de Caixa.pdf" target="_blank">Controle de Caixa</a>
									</li>                                                   
									<li>                                                    
										<a href="../Módulos/Módulo - Novo Pedido.pdf" target="_blank">Novo Pedido</a>
									</li>                                                   
									<li>                                                    
										<a href="../Módulos/Módulo - Listagem de Caixas.pdf" target="_blank">Listagem de Caixas</a>
									</li>                                                   
									<li>                                                    
										<a href="../Módulos/Módulo - Cadastro de Cliente.pdf" target="_blank">Cadastro de Cliente</a>
									</li>                                                   
									<li>                                                    
										<a href="../Módulos/Módulo - Visualizar Clientes.pdf" target="_blank">Visualizar Clientes</a>
									</li>                                                   
									<li>                                                    
										<a href="../Módulos/Módulo - Interesses do Cliente.pdf" target="_blank">Interesses do Cliente</a>
									</li>                                                   
									<li>                                                    
										<a href="../Módulos/Módulo - Cadastro de Títulos.pdf" target="_blank">Cadastro de Títulos</a>
									</li>                                                   
									<li>                                                    
										<a href="../Módulos/Módulo - Gerenciamento de Títulos.pdf" target="_blank">Gerenciamento de Títulos</a>
									</li>                                                   
									<li>                                                    
										<a href="../Módulos/Módulo - Listagem - Títulos.pdf" target="_blank">Listagem - Títulos</a>
									</li>                                                   
									<li>                                                    
										<a href="../Módulos/Módulo - Cadastro - Tipo Informação.pdf" target="_blank">Cadastro - Tipo Informação</a>
									</li>                                                   
									<li>                                                    
										<a href="../Módulos/Módulo - Cadastro do Mural.pdf" target="_blank">Cadastro do Mural</a>
									</li>                                                   
									<li>                                                    
										<a href="../Módulos/Módulo - Módulo Mural de Informações.pdf" target="_blank">Módulo Mural de Informações</a>
									</li>                                                   
									<li>                                                    
										<a href="../Módulos/Módulo - Módulo de cadastro de Marcas.pdf" target="_blank">Módulo de cadastro de Marcas</a>
									</li>                                                   
									<li>                                                    
										<a href="../Módulos/Módulo - Cadastro de Grupos de Produtos.pdf" target="_blank">Cadastro de Grupos de Produtos</a>
									</li>                                                   
									<li>                                                    
										<a href="../Módulos/Módulo - Cadastro de Tabela de Precos.pdf" target="_blank">Cadastro de Tabela de Preços</a>
									</li>                                                   
									<li>                                                    
										<a href="../Módulos/Módulo - Cadastro de Tamanho.pdf" target="_blank">Cadastro de Tamanho</a>
									</li>                                                   
									<li>                                                    
										<a href="../Módulos/Módulo - Cadastro de Produtos.pdf" target="_blank">Cadastro de Produtos</a>
									</li>                                                   
									<li>                                                    
										<a href="../Módulos/Módulo - Listagem de Produtos.pdf" target="_blank">Listagem de Produtos</a>
									</li>                                                   
									<li>                                                    
										<a href="../Módulos/Módulo - Controle de Estoque.pdf" target="_blank">Controle de Estoque</a>
									</li>                                                   
									<li>                                                    
										<a href="../Módulos/Módulo - Relatório de pedidos.pdf" target="_blank">Relatório de pedidos</a>
									</li>
								</ul>
								<br><br>
								Versões:
								<br><br>
								<center>
								<table width="100%" cellpadding="0" cellspacing="0" border="1">
									<tbody>
										<tr>
											<td> 
												<font size="+1">
													<b>VERSÃO</b>
												</font>
											</td>
											<td>
												<font size="+1">
													<b>Instalador</b>
												</font>
											</td>
										</tr>
										<tr>
											<td> 
												<b>3.0.5.0</b>
											</td>
											<td>
												<b><a href="Instaladores/Sunsale/3.0.5.0/sunsalePro.exe" target="_blank">sunsalePro.exe</a></b>
											</td>
										</tr>
										<tr>
											<td> 
												<b>3.0.6.0</b>
											</td>
											<td>
												<b><a href="Instaladores/Sunsale/3.0.6.0/sunsalePro.exe" target="_blank">sunsalePro.exe</a></b>
											</td>
										</tr>
										<tr>
											<td> 
												<b>3.0.6.1</b>
											</td>
											<td>
												<b><a href="Instaladores/Sunsale/3.0.6.1/sunsalePro.exe" target="_blank">sunsalePro.exe</a></b>
											</td>
										</tr>
									</tbody>
								</table>
								</center>
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

