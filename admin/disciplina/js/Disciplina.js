function manterDisciplina(){
	$(EnumDivsID.divLoading).show();
	$.ajax({
		type      : 'POST',
		url       : '../disciplina/DoDisciplina.php',
		data	  : $("#form-Disciplina :input").serialize(),
		dataType  : 'html',
		beforeSend : function() {
			$('#btoDisciplina').attr('disabled', true);
		},
		success : function(pResponse) {

			switch (parseInt(Trim(pResponse))) {

				case EnumRetornoAjax.Sucesso:

					$(EnumDivsID.divLoading).hide();
					$(EnumDivsID.divAlert).html('<h3 style="color:#578BB9;">Salvo com sucesso!</h3>');
					fnAlert(EnumDivsID.divAlert);
					break;

				case EnumRetornoAjax.Falha:
					$(EnumDivsID.divLoading).hide();
					$(EnumDivsID.divAlert).html('<h3 style="color:red">Erro ao Salvar Disciplina!</h3>');
					fnAlert(EnumDivsID.divAlert);
					break;

			}
		},
		error : function(pResponse) {
			$('#btoDisciplina').attr('disabled', false);
			$(EnumDivsID.divLoading).hide();
			$(EnumDivsID.divAlert).html('<h3 style="color:red">' + pResponse + '</h3>');
			fnAlert(EnumDivsID.divAlert);
		},
		complete : function() {
			$('#btoDisciplina').attr('disabled', false);
		}
	 });
	return false;
};