
<?php 
    setlocale(LC_ALL, NULL);
    setlocale(LC_ALL, 'pt_BR.utf-8');
    $nomeClinica = 'SunSale System';	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<style>
			#img1 {
			 float: left;
			 border-radius: 5px;
			 margin-right: 10px;
			}
		</style>
		<script>
			topo();
		</script>
	</head>
    <body>
		<nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
					<a class="navbar-brand" href="index.php">SunSale System </a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
						<?php
							echo '<li class = "'.$inicio.'"><a href="index.php"><span class="glyphicon glyphicon-home"></span>INÍCIO</a></li>';
						?>
						<?php
							echo '<li class = "'.$softwares.'"><a href="index_softwares.php"><span class="glyphicon glyphicon-cloud"></span>SOFTWARES</a></li>';
						?>
						<?php
							echo '<li class = "'.$blog.'"><a href="index_blog.php"><span class="glyphicon glyphicon-list-alt"></span>BLOG</a></li>';
						?>
						<?php
							echo '<li class = "'.$contatos.'"><a href="index_contatos.php"><span class="glyphicon glyphicon-envelope"></span>CONTATO</a></li>';
						?>
					</ul>
                </div>
            </div>
        </nav>
	</body>
</html>