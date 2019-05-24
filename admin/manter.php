<?php
	//include_once "../../config/Define.php";
?>
<!DOCTYPE HTML>
<html class="no-js" lang="pt-BR">
	<head>
		<?php include_once "include/head.php"; ?>
		<script type="text/javascript" src="../jsAjax/.js"></script>
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
							<div class="title">
								<h4>Formulário de Cadastro</h4>
							</div>
							<div class="content">
								<form id="form-" name="">
									<fieldset>
										<legend>Campos do Cadastro de </legend>
										<table>											
											<tr>
												<td colspan="2" align="right">
													<input type="button" id="bto" name="bto" value="Enviar" onClick="manter()">
												</td>
											</tr>
										</table>
									</fieldset>
								</form>
							</div>
						</div>
						<div class="shadow"></div>
					</div>
					<div class="panel-wrapper"></div>
				</div>
			</div>
		</div>
	</body>
</html>