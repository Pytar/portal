function manterAluno(){
	$(EnumDivsID.divLoading).show();
	$.ajax({
		type      : 'POST',
		url       : '../aluno/DoAluno.php',
		data	  : $("#form-Aluno :input").serialize(),
		dataType  : 'html',
		beforeSend : function() {
			$('#btoAluno').attr('disabled', true);
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
					$(EnumDivsID.divAlert).html('<h3 style="color:red">Erro ao Salvar Aluno!</h3>');
					fnAlert(EnumDivsID.divAlert);
					break;

			}
		},
		error : function(pResponse) {
			$('#btoAluno').attr('disabled', false);
			$(EnumDivsID.divLoading).hide();
			$(EnumDivsID.divAlert).html('<h3 style="color:red">' + pResponse + '</h3>');
			fnAlert(EnumDivsID.divAlert);
		},
		complete : function() {
			$('#btoAluno').attr('disabled', false);
		}
	 });
	return false;
};
function MascaraCPF(cpf){
    if(mascaraInteiro(cpf)==false){
            event.returnValue = false;
    }       
    return formataCampo(cpf, '000.000.000-00', event);
};
function mascaraInteiro(){
    if (event.keyCode < 48 || event.keyCode > 57){
            event.returnValue = false;
            return false;
    }
    return true;
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
function MascaraTelefone(tel){  
    if(mascaraInteiro(tel)==false){
            event.returnValue = false;
    }       
    return formataCampo(tel, '(00) 0000-0000', event);
};
function ValidarCPF(Objcpf){
    var cpf = Objcpf.value;
    exp = /\.|\-/g
    cpf = cpf.toString().replace( exp, "" ); 
    var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
    var soma1=0, soma2=0;
    var vlr =11;

    for(i=0;i<9;i++){
            soma1+=eval(cpf.charAt(i)*(vlr-1));
            soma2+=eval(cpf.charAt(i)*vlr);
            vlr--;
    }       
    soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
    soma2=(((soma2+(2*soma1))*10)%11);

    var digitoGerado=(soma1*10)+soma2;
    if(digitoGerado!=digitoDigitado)        
            alert('CPF Invalido!');         
};
function ValidaTelefone(tel){
    exp = /\(\d{2}\)\ \d{4}\-\d{4}/
    if(!exp.test(tel.value))
            alert('Numero de Telefone Invalido!');
};

