<!DOCTYPE HTML>
<html class="no-js" lang="pt-BR">
<head> 
	<?php include_once "include/head.php"; ?>
</head>


<body>

	<div id="header-wrapper" class="container">
		<div id="user-account" class="row">
			<div class="threecol">
				<span>Bem-vindo ao gerenciador Três Lados versão 1.0</span>
			</div>
			<div class="ninecol last">
				<a href="#">Sair</a> <span>|</span> <a href="#">25/07/2012</a> <span>|</span>
				<span>Olá, <strong>Thiago Sousa!</strong></span>
			</div>
		</div>
		<div id="user-options" class="row">
			<div class="threecol">
				<a href="dashboard.html"><img class="logo"
					src="images/back-logo.png" alt="QuickAdmin" /></a>
			</div>
			<div class="ninecol last fixed">
				<ul class="nav-user-options">
					<li><a href="#"><img src="images/icon-menu-profile.png"
							alt="Profile Settings" />&nbsp; Perfil</a></li>
					<li><a href="#"><img src="images/icon-menu-messages.png"
							alt="Messages" />&nbsp; Mensagens</a></li>
					<li><a href="#"><img src="images/icon-menu-tasks.png" alt="Tasks" />&nbsp;
							Anotações</a></li>
					<li><a href="#"><img src="images/icon-menu-users.png" alt="Users" />&nbsp;
							Lista de Usuários</a></li>
					<li><a href="#"><img src="images/icon-menu-settings.png"
							alt="Settings" />&nbsp; Configurações <img class="pin"
							src="images/back-nav-sub-pin.png" alt="" /></a>
						<ul>
							<li class="first"><a href="#">Teste 1</a></li>
							<li><a href="#">Teste 2</a></li>
							<li><a href="#">Teste 3</a></li>
							<li class="last"><a href="#">Teste 4</a></li>
							<li class="pin"></li>
						</ul></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div id="sidebar" class="threecol">
				<ul id="navigation">
					<li class="first active"><a href="dashboard.html">Menu <span
							class="icon-dashboard"></span>
					</a></li>
					<li><a href="charts.html">Clientes <span class="icon-charts"></span></a></li>
					<li><a href="form-elements.html">Notícias<span class="icon-forms"></span></a></li>
					<li><a href="interface-elements.html">Financeiro <span
							class="icon-elements"></span></a></li>
					<li><a href="tables.html">Agenda <span class="icon-tables"></span></a></li>
					<li><a href="gallery.html">Galeria de Fotos <span
							class="icon-gallery"></span></a></li>
					<li class="last"><a href="faq.html">F.A.Q. <span class="icon-faq"></span></a></li>
				</ul>
			</div>
			<div id="content" class="ninecol last" align="center">
				<form action="">
				<div class="panel-wrapper">
					<div class="panel">
						<div class="title">
							<h4>Formulário</h4>
						</div>

						<div class="content">
							<!-- ## Panel Content  -->

							<table>
								<tr>
									<td width="100" height="22" align="right" bgcolor="#E9ECED">Nome:</td>
									<td bgcolor="#FFFFFF"><input ty  name="nome" id="nome"
										class="text" style="width: 400px;" /></td>
								</tr>
								<tr>
									<td width="100" height="22" align="right" bgcolor="#E9ECED">Telefone:</td>
									<td bgcolor="#FFFFFF"><input type="text" name="telefone"
										id="telefone" class="text" style="width: 200px;" /></td>
								</tr>
								<tr>
									<td width="100" height="22" align="right" bgcolor="#E9ECED">Assunto:</td>
									<td bgcolor="#FFFFFF"><input type="text" name="assunto"
										id="assunto" class="text" style="width: 200px;" /></td>
								</tr>
								<tr>
									<td width="100" height="22" align="right" bgcolor="#E9ECED">Mensagem:</td>
									<td bgcolor="#FFFFFF"><textarea name="descricao" id="descricao"
											class="text" style="width: 400px; height: 200px"></textarea></td>
								</tr>
								<tr>
									<td colspan="2" bgcolor="#FFFFFF" style="padding-left: 125px"><input
										type="submit" class="button-blue" style="cursor: pointer"
										value="Enviar" /></td>
								</tr>
							</table>


						</div>
					</div>
					</form>
					<div class="shadow"></div>
				</div>
				<div class="panel-wrapper"></div>
			</div>
		</div>
	</div>
</body>
</html>
