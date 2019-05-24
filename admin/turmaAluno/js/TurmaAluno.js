function manterTurmaAluno(){
	$(EnumDivsID.divLoading).show();
	$.ajax({
		type      : 'POST',
		url       : '../turmaAluno/DoTurmaAluno.php',
		data	  : $("#form-TurmaAluno :input").serialize(),
		dataType  : 'html',
		beforeSend : function() {
			$('#btoTurmaAluno').attr('disabled', true);
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
					$(EnumDivsID.divAlert).html('<h3 style="color:red">Erro ao Salvar TurmaAluno!</h3>');
					fnAlert(EnumDivsID.divAlert);
					break;

			}
		},
		error : function(pResponse) {
			$('#btoTurmaAluno').attr('disabled', false);
			$(EnumDivsID.divLoading).hide();
			$(EnumDivsID.divAlert).html('<h3 style="color:red">' + pResponse + '</h3>');
			fnAlert(EnumDivsID.divAlert);
		},
		complete : function() {
			$('#btoTurmaAluno').attr('disabled', false);
		}
	 });
	return false;
};