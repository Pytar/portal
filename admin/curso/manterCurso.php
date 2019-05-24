<?php
	include_once "../../config/AutoLoad.php";
	use config\AutoLoad;
	use config\Constantes;
	use config\Util;
	$objAuto = new AutoLoad();
	$StatusForm = Constantes::FORM_STATUS_INSERT;
	$objCurso = new Curso();
	try{
		if(isset($_GET['hash'])){
			$StatusForm = Constantes::FORM_STATUS_UPDATE;
			$objCurso->setHash($_GET['hash']);
			$objCurso = CursoControlador::Consultar($objCurso);
			if( count($objCurso) == 0 ){
				throw new Exception('Curso não encontrado');
			}
			$objCurso = $objCurso[0];
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
		<script type="text/javascript" src="js/Curso.js"></script>
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
								<h4>Formulário de Cadastro de Curso</h4>
							</div>
							<div class="content">
								<form id="form-Curso" name="form-Curso">
									<fieldset>
									<input type="hidden" id="statusForm" name="statusForm" value="<?=$StatusForm;?>">
										<?php if(isset($_GET['hash'])){?>
										<input type="hidden" id="hash" name="hash" value="<?=$_GET['hash'];?>">
										<?php }?>
										<legend>Campos do Cadastro de Curso</legend>
										<table>											
											<tr>
												<td width="100" height="22" align="right" bgcolor="#E9ECED">Nome:</td>
												<td bgcolor="#FFFFFF">
													<input type="text" id="nome" name="nome" value="<?=$objCurso->GetNome();?>" >
												</td>
											</tr>
											<tr>
												<td width="100" height="22" align="right" bgcolor="#E9ECED">Número Periodos:</td>
												<td bgcolor="#FFFFFF">
													<input type="number" id="numeroPeriodos" name="numeroPeriodos"  value="<?=$objCurso->GetNumeroPeriodos();?>">
												</td>
											</tr>
											<tr>
												<td width="100" height="22" align="right" bgcolor="#E9ECED">Turno:</td>
												<td bgcolor="#FFFFFF">
													
													<select id="turno" name="turno" class="comboBox">
														
													<?php 
													   if(isset($_GET['hash'])){
													       $obsConsultaTurno = TurnoControlador::Consultar(new Turno());
													       foreach ($obsConsultaTurno as $objTurno){
													           $valor = "";
													           if($objCurso->GetTurno()->getId() == $objTurno->getId()){
													               $valor = "selected='selected'";
													           }
													?>
														<option value="<?=$objTurno->getId();?>" <?=$valor;?>><?=$objTurno->getNome();?></option>
														
													<?php
													       }
													   }else {
													           $obsConsultaTurno = TurnoControlador::Consultar(new Turno());
													           foreach ($obsConsultaTurno as $objTurno){
													      
														?>
																<option value="<?=$objTurno->getId();?>" ><?=$objTurno->getNome();?></option>
																
														<?php }
													   }
														?>
													</select>
												</td>
											</tr>
											<tr>
												<td colspan="2" align="right">
													<input type="button" class="button-blue" id="btoCurso" name="btoCurso" value="Enviar" onClick="manterCurso()">
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