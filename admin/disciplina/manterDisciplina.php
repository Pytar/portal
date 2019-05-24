<?php
	include_once "../../config/AutoLoad.php";
	use config\AutoLoad;
	use config\Constantes;
	use config\Util;
	$objAuto = new AutoLoad();
	$StatusForm = Constantes::FORM_STATUS_INSERT;
	$objDisciplina = new Disciplina();
	try{
		if(isset($_GET['hash'])){
			$StatusForm = Constantes::FORM_STATUS_UPDATE;
			$objDisciplina->setHash($_GET['hash']);
			$objDisciplina = DisciplinaControlador::Consultar($objDisciplina);
			if( count($objDisciplina) == 0 ){
				throw new Exception('Disciplina não encontrado');
			}
			$objDisciplina = $objDisciplina[0];
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
		<script type="text/javascript" src="js/Disciplina.js"></script>
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
								<h4>Formulário de Cadastro de Disciplina</h4>
							</div>
							<div class="content">
								<form id="form-Disciplina" name="form-Disciplina">
									<fieldset>
									<input type="hidden" id="statusForm" name="statusForm" value="<?=$StatusForm;?>">
										<?php if(isset($_GET['hash'])){?>
										<input type="hidden" id="hash" name="hash" value="<?=$_GET['hash'];?>">
										<?php }?>
										<legend>Campos do Cadastro de Disciplina</legend>
										<table>											
											<tr>
												<td width="100" height="22" align="right" bgcolor="#E9ECED">Nome:</td>
												<td bgcolor="#FFFFFF">
													<input type="text" id="nome" name="nome" value="<?=$objDisciplina->GetNome();?>" >
												</td>
											</tr>
											<tr>
												<td width="100" height="22" align="right" bgcolor="#E9ECED">Curso:</td>
												<td bgcolor="#FFFFFF">
													
													<select id="idCurso" name="idCurso" bgcolor="#E9ECED" class="comboBox">
														<?php
														if(isset($_GET['hash'])){
    														$objCursos = array();
    														$objCursos = CursoControlador::Consultar(new Curso());
    														foreach ($objCursos as $obj){
    														    $valor = "";
    														    if($obj->getId() == $objDisciplina->GetCurso()->getId()){
    														        $valor = "selected='selected'";
    														    }
    														
														?>
														<option value="<?=$obj->getId();?>" <?=$valor;?>><?=$obj->GetNome();?></option>
												<?php       }
														}else {
														    $objCursos = array();
														    $objCursos = CursoControlador::Consultar(new Curso());
														    foreach ($objCursos as $obj){
												?>
														<option value="<?=$obj->getId();?>" ><?=$obj->GetNome();?></option>
												<?php       }
														}
												?>	
													</select>
												</td>
											</tr>
											<tr>
												<td colspan="2" align="right">
													<input type="button" class="button-blue" id="btoDisciplina" name="btoDisciplina" value="Enviar" onClick="manterDisciplina()">
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