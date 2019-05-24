<?php
	include_once "../../config/AutoLoad.php";
	use config\AutoLoad;
	use config\Constantes;
	use config\Util;
	$objAuto = new AutoLoad();
	
	
	
?>
<!DOCTYPE HTML>
<html class="no-js" lang="pt-BR">
	<head>
		<?php include_once "../include/head.php"; ?>
		<script type="text/javascript" src="../js/geral.js"></script>
		<script type="text/javascript" src="js/TurmaAluno.js"></script>
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
								<h4>Associar Turma x Aluno</h4>
							</div>
							<div class="content">
								<form id="form-TurmaAluno" name="form-TurmaAluno">
									<fieldset>
									<input type="hidden" id="statusForm" name="statusForm" value="<?=$StatusForm;?>">
										<?php if(isset($_GET['hash'])){?>
										<input type="hidden" id="hash" name="hash" value="<?=$_GET['hash'];?>">
										<?php }?>
										<legend>Campos do Cadastro de TurmaAluno</legend>
										<table>											
											<tr>
												<td width="100" height="22" align="right" bgcolor="#E9ECED">Turma:</td>
												<td bgcolor="#FFFFFF">
												<?php
														  $objConsultaTurma = new Turma();
														  $objConsultaTurma->SetIsConsultarPreenchimento(TRUE);
														  $objTurmas = TurmaControlador::Consultar($objConsultaTurma);
														  
														  //Util::fnDebugg($objTurmas[0]->GetDisciplina()->GetNome());
												?>		  
													<select id="idTurma" name="idTurma">
														
												<?php 		  
														  foreach ($objTurmas as $obj){
														      
														 ?>
														<option value="<?=$obj->getId();?>"><?=$obj->getDisciplina()->getNome();?> - <?=$obj->getProfessor()->getNome();?> </option>
														<?php }?>
													</select>
												</td>
											</tr>
											
												<td width="100" height="22" align="right" bgcolor="#E9ECED">Aluno:</td>
												<td bgcolor="#FFFFFF">
												<?php
														  $objConsultaAluno = new Aluno();
														 
														  $objAlunos = AlunoControlador::Consultar($objConsultaAluno);
														  
														  //Util::fnDebugg($objTurmas[0]->GetDisciplina()->GetNome());
												?>		  
													<select id="idAluno" name="idAluno">
														
												<?php 		  
												        foreach ($objAlunos as $obj){
														      
														 ?>
														<option value="<?=$obj->getId();?>"><?=$obj->getNome();?></option>
														<?php }?>
													</select>
												</td>
											</tr>
											
											<tr>
												<td colspan="2" align="right">
													<input type="button" class="button-blue" id="btoTurmaAluno" name="btoTurmaAluno" value="Enviar" onClick="manterTurmaAluno()">
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