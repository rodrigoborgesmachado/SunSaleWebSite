<?php 
    $nomeClinica = 'Sun Sale System';
    $inicio="";
	$softwares="";
	$blog="";
	$contatos="active";
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
            if(@$_REQUEST['func'] == '1'){
				alert("Cliente cadastrado! Nossa equipe entrará em contato!");
			}
			if(@$_REQUEST['func'] == '2'){
				alert("Erro");
			}
		?>
		
			<div class="interna" style="background-color: #dddddd;" align="justify">
                <div id="contact" class="container-fluid bg-grey">
                    <div class="row">
	    				<div class="col-sm-12">
    						<h2>
                               Contatos
                               </h2>
                               <hr>
			    			<h4>
                            </h4>
                            <br>					
    					</div>
                        <div class="col-sm-10">
						    	<div class="col-sm-10"><h4>
					    			<p>Mande-nos um email que respondemos em até 1 dia útil</p>
				    				<p><span class="glyphicon glyphicon-map-marker"></span> Uberlândia, MG</p>
			    					<p><span class="glyphicon glyphicon-phone"></span> +55 34 999798100</p>
		    						<p><span class="glyphicon glyphicon-envelope"></span> sunsalesystem@gmail.com</p>
                                    <p><span class="glyphicon fa fa-linkedin"><a href="https://www.linkedin.com/company/sunsale-system" target="_blank"> LinkedIn</a></span></p>
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

