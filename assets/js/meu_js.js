
var base_url = "http://localhost/analytics_solarview/";
var count = 1;

$('#add').click(function(e){
	e.preventDefault();

	count++;
	if(count <= 3){
		$.get( base_url+"parametros", function() {
		}).done(function(data){
			var tamanho = Object.keys(data).length;

			var html = '<br><div id="select_'+count+'"><select name="parametro_'+count+'" id="parametro_'+count+'"><option>Selecione</option>';

			for (var i = 1; i < tamanho; i++) {
				html += '<option>'+data[i]+'</option>';
			}
			html += '</select></div>';


			$('#select_'+(count-1)).after(html);
		});
	}

});


$('#selecionar').click(function(){
	var data = $('#div_parametros').serialize();
	console.log(data);
	var parametro  = $('select[name=select_1]').val();
	
	 $.ajax({
        async: false,
        type: "POST",
        url:base_url + "busca_informacoes",
        data: data,
        success: function (response) {
           
        }
    });
});