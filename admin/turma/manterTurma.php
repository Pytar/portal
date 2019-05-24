<?php
	include_once "../../config/AutoLoad.php";
	use config\AutoLoad;
	use config\Constantes;
	use config\Util;
	$objAuto = new AutoLoad();
	$StatusForm = Constantes::FORM_STATUS_INSERT;
	$objTurma = new Turma();
	try{
		if(isset($_GET['hash'])){
			$StatusForm = Constantes::FORM_STATUS_UPDATE;
			$objTurma->setHash($_GET['hash']);
			$objTurma = TurmaControlador::Consultar($objTurma);
			if( count($objTurma) == 0 ){
				throw new Exception('Turma não encontrado');
			}
			$objTurma = $objTurma[0];
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
		<script type="text/javascript" src="js/Turma.js"></script>
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
								<h4>Formulário de Cadastro de Turma</h4>
							</div>
							<div class="content">
								<form id="form-Turma" name="form-Turma">
									<fieldset>
									<input type="hidden" id="statusForm" name="statusForm" value="<?=$StatusForm;?>">
										<?php if(isset($_GET['hash'])){?>
										<input type="hidden" id="hash" name="hash" value="<?=$_GET['hash'];?>">
										<?php }?>
										<legend>Campos do Cadastro de Turma</legend>
										<table>											
											<tr>
												<td width="100" height="22" align="right" bgcolor="#E9ECED">Disciplina:</td>
												<td bgcolor="#FFFFFF">
													<select id="idDisciplina" name="idDisciplina" class="comboBox">
														
													<?php 
													   if(isset($_GET['hash'])){
													       $obsConsultaDisciplina = DisciplinaControlador::Consultar(new Disciplina());
													       foreach ($obsConsultaDisciplina as $objDisciplina){
													           $valor = "";
													           if($objTurma->GetDisciplina()->getId() == $objDisciplina->getId()){
													               $valor = "selected='selected'";
													           }
													?>
														<option value="<?=$objDisciplina->getId();?>" <?=$valor;?>><?=$objDisciplina->getNome();?></option>
														
													<?php
													       }
													   }else {
													       $obsConsultaDisciplina = DisciplinaControlador::Consultar(new Disciplina());
													       foreach ($obsConsultaDisciplina as $objDisciplina){
													      
														?>
																<option value="<?=$objDisciplina->getId();?>" ><?=$objDisciplina->getNome();?></option>
																
														<?php }
													   }
														?>
													</select>
												</td>
											</tr>
											<tr>
												<td width="100" height="22" align="right" bgcolor="#E9ECED">Professor:</td>
												<td bgcolor="#FFFFFF">
													<select id="idProfessor" name="idProfessor" class="comboBox">
														
													<?php 
													   if(isset($_GET['hash'])){
													       $obsConsultaProfessor = ProfessorControlador::Consultar(new Professor());
													       foreach ($obsConsultaProfessor as $objProfessor){
													           $valor = "";
													           if($objTurma->GetProfessor()->getId() == $objProfessor->getId()){
													               $valor = "selected='selected'";
													           }
													?>
														<option value="<?=$objProfessor->getId();?>" <?=$valor;?>><?=$objProfessor->getNome();?></option>
														
													<?php
													       }
													   }else {
													       $obsConsultaProfessor = ProfessorControlador::Consultar(new Professor());
													       foreach ($obsConsultaProfessor as $objProfessor){
													      
														?>
																<option value="<?=$objProfessor->getId();?>" ><?=$objProfessor->getNome();?></option>
																
														<?php }
													   }
														?>
													</select>
												</td>
											</tr>
											<tr>
												<td colspan="2" align="right">
													<input type="button" class="button-blue" id="btoTurma" name="btoTurma" value="Enviar" onClick="manterTurma()">
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