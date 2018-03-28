
var base_url = "http://localhost/analytics_solarview/";
var count = 1;

$('#data1').mask('00/00/0000');
$('#data2').mask('00/00/0000');

$( "#data1" ).datepicker({
	dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
	dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
	dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
	monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
	monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
	nextText: 'Próximo',
	prevText: 'Anterior',
	dateFormat: 'dd/mm/yy'
});
$( "#data2" ).datepicker({
	dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
	dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
	dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
	monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
	monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
	nextText: 'Próximo',
	prevText: 'Anterior',
	dateFormat: 'dd/mm/yy'
});

function addParametro(event){
	event.preventDefault();

	if(count <= 3){
		count++;
	}

	if(count <= 3){
		$.get( base_url+"parametros", function() {
		}).done(function(data){

			var tamanho = Object.keys(data).length;

			var html = '<div class="row" id="select_'+count+'"><div  class="form-group col-md-9"><select class="form-control" name="parametro_'+count+'" id="parametro_'+count+'"><option>Selecione</option>';

			for (var i = 1; i < tamanho; i++) {
				html += '<option>'+data[i]+'</option>';
			}
			html += '</select></div><div class="col-md-3" id="remove_'+count+'"><button class="btn btn-md btn-danger" onclick="removeParametro('+count+', event)"><i class="fas fa-minus"></i></button></div></div>';


			$('#select_'+(count-1)).after(html);
		});
	}

};

function removeParametro(div, event){
	event.preventDefault();
	$("#select_"+div).remove();
	$("#select_"+div).empty();
	if(count == 4){
		count -=2;
	}else{
		count -= 1;
	}

}

var form = $('#div_parametros');

$('#div_parametros').validate({
	rules: {
		parametro_1:{
			required: true,
			valueNotEquals: 'Selecione'
		},
		parametro_2:{
			required: true,
			valueNotEquals: 'Selecione'
		},
		parametro_3:{
			required: true,
			valueNotEquals: 'Selecione'
		},
		data1:{
			required: true
		},
		data2:{
			required: true
		},
	},	

	errorPlacement: function(error, element) {
		error.insertAfter(element);
	},
	highlight: function(element) {
		$(element).closest('.form-group').addClass('has-error');
	},
	unhighlight: function(element) {
		$(element).closest('.form-group').removeClass('has-error');
	}
});
jQuery.validator.addMethod("valueNotEquals", function(value, element, param) {
	return this.optional(element) || value != param;
}, "Favor informar um valor diferente de 'Selecione'");



$('#selecionar').click(function(e){
	e.preventDefault();
	if (form.valid()) {

		var data = $('#div_parametros').serialize();

		var parametro  = $('select[name=select_1]').val();

		$.ajax({
			async: false,
			type: "POST",
			url:base_url + "busca_informacoes",
			data: data,
			success: function (result) {
				
				$.each(result, function(i, item){
					var arrayOfNumbers = result[i].map(Number);
					console.log(arrayOfNumbers);
					
				});


				Highcharts.chart('container', {

				    title: {
				        text: 'Gráfico Infoinversor'
				    },

				    yAxis: {
				        title: {
				            text: 'Parâmetros'
				        }
				    },
				    legend: {
				        layout: 'vertical',
				        align: 'right',
				        verticalAlign: 'middle'
				    },

				    plotOptions: {
				        series: {
				            label: {
				                connectorAllowed: false
				            },
				            pointStart: 2010
				        }
				    },

				    series: [{
				        name: 'Installation',
				        data: arrayOfNumbers
				    }],

				    responsive: {
				        rules: [{
				            condition: {
				                maxWidth: 500
				            },
				            chartOptions: {
				                legend: {
				                    layout: 'horizontal',
				                    align: 'center',
				                    verticalAlign: 'bottom'
				                }
				            }
				        }]
				    }

				});
			}
		});
	}
});
