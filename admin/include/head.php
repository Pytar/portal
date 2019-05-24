<?php 
	if(basename(getcwd())=="admin"){
		$barras = "";
	}else{
		$barras = "../";
	}
?>
	<meta charset="utf-8">
	<title>Administração :: Intranet</title>
	<style type="text/css">
		@import '<?=$barras;?>css/1140.css';
		@import '<?=$barras;?>css/colorbox.css';
		@import '<?=$barras;?>css/geral.css';
		@import '<?=$barras;?>css/jquery.click-calendario-1.0.css';
		@import '<?=$barras;?>css/styles.css';
		@import '<?=$barras;?>css/uniform.default.css';
	</style>
  	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold|PT+Sans+Narrow:regular,bold|Droid+Serif:iamp;v1' rel='stylesheet' type='text/css' />
  
  	<script type="text/javascript" src="<?=$barras;?>js/css3-mediaqueries.js"></script>

  	<script type='text/javascript' src='<?=$barras;?>js/raphael-min.js'></script>

  	<script type='text/javascript' src='<?=$barras;?>js/morris.min.js'></script>

  	<script type='text/javascript' src='<?=$barras;?>js/nicEdit.js'></script>

  	<script type='text/javascript' src='<?=$barras;?>js/jquery.uniform.min.js'></script>

  	<script type='text/javascript' src='<?=$barras;?>js/jquery.tablesorter.min.js'></script>

  	<script type='text/javascript' src='<?=$barras;?>js/resizable.tables.js'></script>

  	<script type='text/javascript' src='<?=$barras;?>js/jquery.colorbox-min.js'></script>

  	<script src="<?=$barras;?>js/jquery-1.8.3.min.js" type="text/javascript" language="javascript"></script>
        

