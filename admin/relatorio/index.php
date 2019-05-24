<?php
include_once "../../config/AutoLoad.php";
use config\AutoLoad;
$obj = new AutoLoad();
?>
<!DOCTYPE HTML>
<html class="no-js" lang="pt-BR">
	<head>
		<?php include_once "../include/head.php"; ?>
	</head>
	<body>
		<div id="header-wrapper" class="container">
			<?php include_once "../include/topo.php";?>
			<?php include_once "../include/menuHorizontal.php";?>
		</div>
		<div class="container">
			<div class="row">
				<?php include_once "../include/menuLateral.php";?>
				<div id="content" class="ninecol last">
					<div class="panel-wrapper">
						<div class="panel">
							<div class="title">
								<h4>Lista de Professor - </h4>
							</div>
							<div class="content">
								<form id="formPesquisa" name="formPesquisa" action="">
								<table class="sortable resizable" id="sample-table-sortable">
									
									<tr>
										<td>
											<select id="tipoRelatorio" name="tipoRelatorio" class="comboBox" style="margin-top: 8px;">
												<option value="1">Curso</option>
												<option value="2">Aluno</option>
												<option value="3">Professor</option>
											</select>
										</td>
										<td>
											<select id="tipoCampo" name="tipoCampo" class="comboBox" style="margin-top: 8px;">
												<option value="1">Nome</option>
											
											</select>
										</td>
										<td>
											<input id="campo" name="campo" type="text" size="10px">
										</td>
										<td>
											<input id="btoPesquisa" name="btoPesquisa" type="button" value="pesquisar" class="button-blue" style="margin-top: 5px;" onClick="relatorio()">
										</td>
									</tr>
									<tr id="resultado">
										<td>
										</td>	
									</tr>	
								</table>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>