function manterProfessor(){
	$(EnumDivsID.divLoading).show();
	$.ajax({
		type      : 'POST',
		url       : '../professor/DoProfessor.php',
		data	  : $("#form-Professor :input").serialize(),
		dataType  : 'html',
		beforeSend : function() {
			$('#btoProfessor').attr('disabled', true);
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
					$(EnumDivsID.divAlert).html('<h3 style="color:red">Erro ao Salvar Professor!</h3>');
					fnAlert(EnumDivsID.divAlert);
					break;

			}
		},
		error : function(pResponse) {
			$('#btoProfessor').attr('disabled', false);
			$(EnumDivsID.divLoading).hide();
			$(EnumDivsID.divAlert).html('<h3 style="color:red">' + pResponse + '</h3>');
			fnAlert(EnumDivsID.divAlert);
		},
		complete : function() {
			$('#btoProfessor').attr('disabled', false);
		}
	 });
	return false;
};
function mascaraInteiro(){
    if (event.keyCode < 48 || event.keyCode > 57){
            event.returnValue = false;
            return false;
    }
    return true;
};
function MascaraTelefone(tel){  
    if(mascaraInteiro(tel)==false){
            event.returnValue = false;
    }       
    return formataCampo(tel, '(00) 0000-0000', event);
};
function formataCampo(campo, Mascara, evento) { 
    var boleanoMascara; 

    var Digitato = evento.keyCode;
    exp = /\-|\.|\/|\(|\)| /g
    campoSoNumeros = campo.value.toString().replace( exp, "" ); 

    var posicaoCampo = 0;    
    var NovoValorCampo="";
    var TamanhoMascara = campoSoNumeros.length;; 

    if (Digitato != 8) { // backspace 
            for(i=0; i<= TamanhoMascara; i++) { 
                    boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
                                                            || (Mascara.charAt(i) == "/")) 
                    boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 
                                                            || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 
                    if (boleanoMascara) { 
                            NovoValorCampo += Mascara.charAt(i); 
                              TamanhoMascara++;
                    }else { 
                            NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
                            posicaoCampo++; 
                      }              
              }      
            campo.value = NovoValorCampo;
              return true; 
    }else { 
            return true; 
    }
};