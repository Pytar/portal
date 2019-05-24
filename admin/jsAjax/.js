function manter(){
	$('#resultadoAjax').html("<div style='width: 100%;height: 100%' align='center'><img src='images/ajax-loaderGrande.gif'></div>");
	$.ajax({
		type      : 'POST',
		url       : 'ajax/do.php',
		data	  : $("#frm :input").serialize(),
		dataType  : 'html',
		success : function(rs) {
			if(rs=='true'){
				window.location = "principal.php";
			}else{
				alert("Dados Incorretos");
			}
		}
	});
}function manter(){
	$('#resultadoAjax').html("<div style='width: 100%;height: 100%' align='center'><img src='images/ajax-loaderGrande.gif'></div>");
	$.ajax({
		type      : 'POST',
		url       : '../../ajax/do.php',
		data	  : $("#form- :input").serialize(),
		dataType  : 'html',
		success : function(rs) {
			if(rs=='true'){
				window.location = "principal.php";
			}else{
				alert("Dados Incorretos");
			}
		}
	});
}