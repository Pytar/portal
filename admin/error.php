<?php
include_once "../config/AutoLoad.php";
use config\AutoLoad;
$obj = new AutoLoad();
?>
<!DOCTYPE HTML>
<html class="no-js" lang="pt-BR">
	<head>
		<?php include_once "include/head.php"; ?>
	</head>
	<body>
		<div id="header-wrapper" class="container">
			<?php include_once "include/topo.php";?>
			<?php include_once "include/menuHorizontal.php";?>
		</div>
		<div class="container">
			<div class="row">
				<?php include_once "include/menuLateral.php";?>
				<div id="content" class="ninecol last">
					<div class="panel-wrapper">
						<div class="panel">
							<div class="title" style="height: 318px;">
								<h4>OPS! Página não encontrada! </h4>
								<h4 style="margin-left: 50px;margin-bottom: 0px;">Ocorreu algo inesperado na sua solicitação.Veja abaixo a messagem de Erro</h4>
								<h4 style="color: red;margin-left: 50px;margin-bottom: 0px;"><?=$_GET['error'];?></h4>
							</div>
							<div class="content">
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>