// ===============================================================================
//


$('.form_date').datetimepicker({
	language:  'es',
	weekStart: 1,
	todayBtn:  1,
	autoclose: 1,
	todayHighlight: 1,
	startView: 2,
	minView: 2,
	forceParse: 0
});

function setValueSelect(SelectId, Value) {
	SelectObject = document.getElementById(SelectId);
	for (index = 0; index < SelectObject.length; index++) {
		if (SelectObject[index].value == Value) SelectObject.selectedIndex = index;
	}
}


var patrontelefono = new Array(4, 7);
var patrontexto = new Array(15);
var patronfecha = new Array(2, 2, 4);

function mascara(d, sep, pat, nums) {
 	if (d.valant != d.value) {
		val = d.value;
		largo = val.length;
		val = val.split(sep);
		val2 = '';
		for (r = 0; r < val.length; r++) {
			val2 += val[r];
		}
		if (nums) {
			for (z = 0; z < val2.length; z++) {
				if (isNaN(val2.charAt(z))) {
					letra = new RegExp(val2.charAt(z), 'g');
					val2 = val2.replace(letra, '');
				}
			}
		}
		val = '';
		val3 = new Array();
		for (s = 0; s < pat.length; s++) {
			val3[s] = val2.substring(0, pat[s]);
			val2 = val2.substr(pat[s]);
		}
		for (q = 0; q < val3.length; q++) {
			if (q == 0) {
				val = val3[q];
			} else {
				if (val3[q] != '') {
					val += sep + val3[q];
				}
			}
		}
		d.value = val;
		d.valant = val;
	}
}

function valnum(palabra) {
	var checkOK = '0123456789';
	var checkStr = palabra;
	var allValid = true;
	var decPoints = 0;
	var nuevoString = '';
	for (i = 0; i < checkStr.length; i++) {
		ch = checkStr.charAt(i);
		for (j = 0; j < checkOK.length; j++) {
			if (ch == checkOK.charAt(j)) {
				nuevoString = nuevoString + ch;
			}
		}
	}
	return nuevoString;
}

var formatNumber = {
	separador: '.', // separador para los miles
	sepDecimal: ',', // separador para los decimales
	formatear: function (num) {
		num += '';
		var splitStr = num.split('.');
		var splitLeft = splitStr[0];
		var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
		var regx = /(\d+)(\d{3})/;
		while (regx.test(splitLeft)) {
			splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
		}
		return this.simbol + splitLeft + splitRight;
	},
	new: function (num, simbol) {
		this.simbol = simbol || '';
		return this.formatear(num);
	}
};
// Initialize
$(function() {
  $('body > .px-nav').pxNav();
  $('body > .px-footer').pxFooter();
});


$(function() {

	$( "#infraestructura, #maquinariasEquipos, #mservicios, #insumosMateriaPrima, #FuerzaTrabajo, #tiempoinversion" ).change(function() {
		total()
	  });
	
    console.log( "ready!" );
});


function total(){

var Infraestructura  =$("#infraestructura").val(),
	maquinarias=$("#maquinariasEquipos").val(),
	insumos=$("#insumosMateriaPrima").val(),
	servicios=$("#mservicios").val(),
	fuerzaTrabajo=$("#FuerzaTrabajo").val(),
	tiempoinversion=$("#tiempoinversion").val();

	if(Number.isNaN(parseInt(Infraestructura)))
	Infraestructura=0;
	if(Number.isNaN(parseInt(maquinarias)))
	maquinarias=0;
	if(Number.isNaN(parseInt(servicios)))
	servicios=0;
	if(Number.isNaN(parseInt(fuerzaTrabajo)))
	fuerzaTrabajo=0;
	if(Number.isNaN(parseInt(insumos)))
	insumos=0;
	//if(Number.isNan(parseInt(tiempoinversion)))
	//tiempoinversion=0;

	var total =parseInt(Infraestructura) + parseInt(maquinarias) + parseInt(insumos) + parseInt(fuerzaTrabajo) + parseInt(servicios) /* parseInt(tiempoinversion)*/;
	$("#inversionTotal").val(total);
}