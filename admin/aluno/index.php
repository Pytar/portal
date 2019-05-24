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
								<h4>Lista de Aluno - <a href="manterAluno.php" style="text-decoration:none">Inserir</a></h4>
							</div>
							<div class="content">
								<table class="sortable resizable" id="sample-table-sortable">
									<thead>
										<th>Nome</th><th>Cpf</th><th>Email</th><th>Matricula</th><th>Telefone</th><th>Ações</th>
									</thead>
									<tbody>
										<?php
										try{
											$objAlunos = AlunoControlador::consultar(new Aluno() );
												foreach($objAlunos as $obj){
											?>
											<tr>
													
												<td><?=$obj->getNome();?></td>
												<td><?=$obj->getCpf();?></td>
												<td><?=$obj->getEmail();?></td>
												<td><?=$obj->getMatricula();?></td>
												<td><?=$obj->getTelefone();?></td>
												
												<td>
													<a href="manterAluno.php?hash=<?=$obj->getHash();?>">Alterar</a>
													<a href="?del=<?=$obj->getHash();?>">Excluir</a>
												</td>
											</tr>
											<?php } ?>
									<?php }catch (Exception $e){ ?>
											<tr>
												<td colspan="6"><?=$e->getMessage();?></td>
											</tr>
									<?php }?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>