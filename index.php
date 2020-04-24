<?php 
    $nomeClinica = 'Sun Sale System';
    $inicio="active";
	$softwares="";
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
						<div class="col-sm-8">
							<h2>
                            Sobre nós
                            </h2>
                            <hr>
							<h4>
                            Empresa fundada em 16/03/2020 sob o CNPJ 36.683.102/0001-04, com o objetivo de desenvolvimento de sistemas para qualquer tipo de solução. Estamos no mercado a pouco e estamos criando nossos próprios softwares, a partir de nossa demanda. Temos um software no mercado, o SunSale, sistema que controla a parte de vendas de lojas de roupa e sapatos, com diversas funções listadas nesse site.
                            <br>
                            <br>
                            A empresa tem o objetivo também de divulgar tecnologias que estão entrando no mercado, assim como àquelas que já estão a um tempo. No nosso blog pode ser encontrado vários estudos de diferentes tecnologias e vários "passo a passo" de como desenvolver os sistemas.
                            </h4>
                            <br>					
						</div>
						<div class="col-sm-4">
							<center><span class="glyphicon fa fa-android logo slideanim"></span></center>
						</div>
					</div>
				</div>
		
				<div class="container-fluid bg-grey">
					<div class="row">
						<div class="col-sm-4">
							<center><span class="glyphicon glyphicon-globe logo slideanim"></span></center>
						</div>
						<div class="col-sm-8">
							<h2>
                            Automatização
                            </h2>
                            <hr>
							<h4>
                            <strong>Você precisa disso!</strong> 
                            <br>
                            <br>
                            <p>Nossas soluções tem como objetivo solucionar problemas para automatizar a vida do contratante. Quando se ganha tempo em processos o objetivo é alcançado mais rapidamente, então o foco é deixar o processo sempre rápido, seguro e objetivo. Essa ideia parte de nossa forma de desenvolver e interagir, uma vez que a política de processos mais rápidos já são aplicados internamente, seja com a utilização de modelo de desenvolvimento ágil, utilização do Kanban, ate na forma de comunicação com o cliente.</p>
                            </h4>
                            <br>
						</div>
					</div>
				</div>
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-8">
							<h2>Softwares</h2><hr>
							<h4><strong>SunSale:</strong> 
                            <br>
                            <br>
                            <p>
                            Sistema para gerenciamento de vendas para lojas de calçados e roupas. Contém controle de estoque, cadastro de produtos, cadastro de clientes, caixa, módulo de vendas, entre outros. O sistema permite que automatize toda parte de controle da loja, incluindo parte de precificação, através do módulo de mark-up. Para mais informações acesse: <a href="index_softwares.php">SOFTWARES</a>
                            </p>
                            </h4>
                            <br>
						</div>
						<div class="col-sm-4">
							<center><span class="glyphicon fa fa-github logo slideanim"></span></center>
						</div>
					</div>
				</div>
				<div class="container-fluid bg-grey">
					<div class="row">
						<div class="col-sm-4">
							<center><span class="glyphicon fa fa-home logo slideanim"></span></center>
						</div>
						<div class="col-sm-8">
							<h2>Ambiente</h2><hr>
							<h4><strong>Nossos Funcionários:</strong> 
                            <br>
                            <br>
                            Nosso ambiente de trabalho é a própria casa dos funcionários, não temos uma sede e não teremos, acreditamos no trabalho em home office e aplicamos isso de modo natural. Quando falar com um de nossos atendentes, ele estará no conforto do lar, e nada de robô conversando com você, somos humanos, educados e sempre gentis, a procura de fazer você se sentir em casa e confortável para falar da forma que quiser.
                            </h4>
                            <br>
						</div>
					</div>
				</div>
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-8">
							<h2>Nossa Ética</h2><hr>
							<h4><strong>Ética:</strong> Ser e agir de forma íntegra e responsável, atendendo aos preceitos de igualdade e transparência.</h4>
						</div>
						<div class="col-sm-4">
							<center><span class="glyphicon glyphicon-ok-sign logo slideanim"></span></center>
						</div>
					</div>
				</div>
				<div class="container-fluid bg-grey">
					<div class="row">
						<div class="col-sm-4">
							<span class="glyphicon glyphicon-plane logo slideanim"></span>
						</div>
						<div class="col-sm-8">
							<h2>Objetivo de Excelência</h2><hr>
							<h4><strong>Excelência:</strong> Atuar na satisfação das necessidades dos usuários e na melhoria contínua dos processos e dos resultados.</h4><br>
						</div>
					</div>
				</div>
				<div class="text-center">
					<a href="#about">
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

