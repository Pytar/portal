<!DOCTYPE HTML>
<html class="no-js" lang="pt-BR">
	<head>
		<?php include_once "include/head.php"; ?>
	</head>
	<body class="texture">
		<!-- BEGIN div Carregando -->
		<div id="windCarregando" style="display: none;">
			<div class="divCarregando">
				<span class="SpanGifCarregando"></span>
			</div>
			<div class="divTotalCarregando"></div>
		</div>
		<!-- END div Carregando -->
		<div class="container">
			<div class="row">
				<div class="panel-wrapper panel-login">
					<div class="panel">
						<div class="title">
							<h4>Acesso ao Gerenciador</h4>
							<div class="option">
								<img src="images/icone_consulticart.png" />
							</div>
						</div>
						<div class="content">
							<!-- ## Panel Content  -->
							<form id="frmLogin" onsubmit="loginUsuario(); return false; ">
								<div>
									<input type="text" name="inputLogin" id="inputLogin" required="required" placeholder="Informe o login" />
								</div>
								<div style="margin-top: 10px">
									<input type="password" name="inputSenha" id="inputSenha"
										required="required" placeholder="Informe a senha" />
								</div>
								<div align="right" style="margin-top: 10px">
									<input type="submit" value="Entrar" class="button-blue"
										style="cursor: pointer;" />
								</div>
							</form>
							<!-- ##  Panel Content  -->
						</div>
					</div>
					<div class="shadow"></div>
				</div>
				<div class="login-details"></div>
			</div>
		</div>
	</body>
</html>