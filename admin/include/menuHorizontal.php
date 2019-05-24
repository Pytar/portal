<?php
if (basename(getcwd()) == "admin") {
    $barras = "";
} else {
    $barras = "../";
}

?>

<div id="user-options" class="row">
	<div class="threecol">
		<a href="index.php"> </a>
	</div>
	<div class="ninecol last fixed">
		<ul class="nav-user-options">
			<li><a href="../curso"><img
					src="<?=$barras;?>images/icon-menu-profile.png"
					alt="Profile Settings" />&nbsp; Curso</a></li>
			<li><a href="../disciplina"><img
					src="<?=$barras;?>images/icon-menu-messages.png" alt="Messages" />&nbsp;
					Disciplina</a></li>
			<li><a href="../aluno"><img
					src="<?=$barras;?>images/icon-menu-tasks.png" alt="Tasks" />&nbsp;
					Aluno</a></li>
			<li><a href="../professor"><img
					src="<?=$barras;?>images/icon-menu-users.png" alt="Tasks" />&nbsp;
					Professor</a></li>

			

			<li><a href="#"><img src="<?=$barras;?>images/icon-menu-settings.png"
					alt="Settings" />&nbsp; Gerência <img class="pin"
					src="<?=$barras;?>images/back-nav-sub-pin.png" alt="" /></a>
				<ul>
					<li class="first"><a href="../turma">Associar Turma</a></li>
					<li><a href="../turmaAluno">Associar Turma x Aluno</a></li>
					<li><a href="../relatorio">Relatório</a></li>
					<li class="last"><a href="#">Teste 4</a></li>
					<li class="pin"></li>
				</ul></li>
		</ul>
	</div>
</div>