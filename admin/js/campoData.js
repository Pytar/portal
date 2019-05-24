var zIndex = 999;
function geralExibirCalendario(pCalendario, pLeft, pTop) {
    if (($("#cal_" + pCalendario)[0] == undefined) && ($("#cal_" + pCalendario)[0] != "")) {
        $(this).calendario({
            target: '#' + pCalendario,
            closeClick: true,
            left: pLeft,
            top: pTop,
            referencePosition: '#' + pCalendario
        });
    }
    else
        $("#cal_" + pCalendario).remove();
}

function numeros(pId, pEvent) {
    var vEvento = pEvent.keyCode;
    //if ((!(((vEvento > 47) && (vEvento < 58)) || ((vEvento > 95) && (vEvento < 106)))) && (vEvento != 8) && (vEvento != 13) && (vEvento != 9) && (vEvento != 16) && (vEvento != 35) && (vEvento != 36) && (vEvento != 37) && (vEvento != 39) && (vEvento != 46) && (vEvento != 110) && (vEvento != 188))
    if ((!(((vEvento > 47) && (vEvento < 58)) || ((vEvento > 95) && (vEvento < 106)))) && (vEvento != 8) && (vEvento != 13) && (vEvento != 9) && (vEvento != 16) && (vEvento != 35) && (vEvento != 36) && (vEvento != 37) && (vEvento != 39) && (vEvento != 46) && (vEvento != 188))
        (navigator.appVersion.match(/\bMSIE\b/)) ? pEvent.returnValue = false : pEvent.preventDefault();
}

function mascara(pId, pMask, pEvent) {
    var vEvento = (pEvent.keyCode || pEvent.charCode);
    if (vEvento != 8) {
        var i = pId.value.length;
        var saida = pMask.substring(1, 2);
        var texto = pMask.substring(i);
        if (texto.substring(0, 1) != saida)
            pId.value += texto.substring(0, 1);
    }
}

function autoTab(input, pEvent) {
    if (pEvent.keyCode == 13) {
        if (!$("#" + input.form[(getIndex(input) + 1) % input.form.length].id).is(":hidden"))
            input.form[(getIndex(input) + 1) % input.form.length].focus();
    }
}