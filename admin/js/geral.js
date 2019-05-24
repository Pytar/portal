var EnumRetornoAjax = {		  
		Sucesso: 1
		, Falha: 0
		, Session: 3
		, Captcha: 4
		, properties: {
			1  : {name: "Sucesso", value: 1, code: "S"}
			, 2: {name: "Falha"  , value: 0, code: "F"}
			, 3: {name: "Session", value: 3, code: "O"}		
			, 4: {name: "Captcha", value: 4, code: "C"}		
		}
};
var EnumDivsID = {		  
		  divLoading : "#divLoading"
		, divAlert : "#divAlert"	
};

function Trim(str) { return str.replace(/^s+|s+$/g, ""); }

function fnAlert(pDivName) {
	
	$(pDivName).fadeTo(2300, 700).slideUp(700, function(){
	    $(pDivName).slideUp(700);
	});
}
function fnRedirecionar(pUrl){
	window.location.href = pUrl;
}