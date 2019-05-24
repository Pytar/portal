<?php
	include_once "../../config/AutoLoad.php";
	use config\AutoLoad;
	use config\Constantes;
	use config\Util;
	$objAuto = new AutoLoad();
	$StatusForm = Constantes::FORM_STATUS_INSERT;
	$objProfessor = new Professor();
	try{
		if(isset($_GET['hash'])){
			$StatusForm = Constantes::FORM_STATUS_UPDATE;
			$objProfessor->setHash($_GET['hash']);
			$objProfessor = ProfessorControlador::Consultar($objProfessor);
			if( count($objProfessor) == 0 ){
				throw new Exception('Professor não encontrado');
			}
			$objProfessor = $objProfessor[0];
		}
	}catch (Exception $ex){
		header("Location:../error.php?error=".$ex->getMessage());
	}
?>
<!DOCTYPE HTML>
<html class="no-js" lang="pt-BR">
	<head>
		<?php include_once "../include/head.php"; ?>
		<script type="text/javascript" src="../js/geral.js"></script>
		<script type="text/javascript" src="js/Professor.js"></script>
	</head>
	<body>
		<div id="header-wrapper" class="container">
			<?php include_once "../include/topo.php";?>
			<?php include_once "../include/menuHorizontal.php";?>
		</div>
		<div class="container">
			<div class="row">
				<?php include_once "../include/menuLateral.php";?>
				<div id="<?=Constantes::DIV_LOADING;?>" style="display: none;"><img alt="Carregando" src="../images/ajax-loader.gif"></div>
				<div id="content" class="ninecol last">
					<div class="panel-wrapper">
						<div class="panel">
							<div class="title">
								<h4>Formulário de Cadastro de Professor</h4>
							</div>
							<div class="content">
								<form id="form-Professor" name="form-Professor">
									<fieldset>
									<input type="hidden" id="statusForm" name="statusForm" value="<?=$StatusForm;?>">
										<?php if(isset($_GET['hash'])){?>
										<input type="hidden" id="hash" name="hash" value="<?=$_GET['hash'];?>">
										<?php }?>
										<legend>Campos do Cadastro de Professor</legend>
										<table>											
											<tr>
												<td width="100" height="22" align="right" bgcolor="#E9ECED">Nome:</td>
												<td bgcolor="#FFFFFF">
													<input type="text" id="nome" name="nome" value="<?=$objProfessor->GetNome();?>" >
												</td>
											</tr>
											<tr>
												<td width="100" height="22" align="right" bgcolor="#E9ECED">Email:</td>
												<td bgcolor="#FFFFFF">
													<input type="email" id="email" name="email" value="<?=$objProfessor->GetEmail();?>" >
												</td>
											</tr>
											<tr>
												<td width="100" height="22" align="right" bgcolor="#E9ECED">Telefone:</td>
												<td bgcolor="#FFFFFF">
													<input type="text" id="telefone" name="telefone" maxlength="14" value="<?=$objProfessor->GetTelefone();?>" onkeypress="MascaraTelefone(this);" onblur="ValidaTelefone(this);" >
												</td>
											</tr>
											<tr>
												<td colspan="2" align="right">
													<input type="button" class="button-blue" id="btoProfessor" name="btoProfessor" value="Enviar" onClick="manterProfessor()">
												</td>
											</tr>
										</table>
									</fieldset>
								</form>
							</div>
						</div>
						<div class="shadow"></div>
						<div id="<?=Constantes::DIV_ALERT;?>"></div>
						
					</div>
					<div class="panel-wrapper"></div>
				</div>
			</div>
		</div>
	</body>
</html>