<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/meu_css.css">
<script src="<?=base_url()?>assets/font-awesome.js"></script>

<div class="container">

	<div class="starter-template">
		<h1>Infoinversor </h1>
		<form id="div_parametros" method='post'>
			<label>Parâmetros:</label>

			<div class="row" id="select_1">
				<div  class="form-group col-md-9">
					<select class="form-control js-example-basic-single" id="parametro_1" name="parametro_1">
						<option> Selecione</option>
						<?php foreach ($parametros as $parametro) { ?>
						<option value="<?=$parametro ?>"><?=$parametro ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-md-3" id="botao_add">
					<button title="Adicionar parâmetros" class="btn btn-md btn-success" onclick="addParametro(event)">
						<i class="fas fa-plus"></i>
					</button>
				</div>

			</div>

			<label>Intervalo de datas</label>
			<div class="row" class="form-group">
				<div class="col-md-5">
					<label>De:</label>
					<input type="text" class="form-control" name="data1" id="data1">
				</div>

				<div class="col-md-5">
					<label>Até:</label>
					<input type="text" class="form-control" name="data2" id="data2">
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-offset-1 col-md-5">
					<button class="btn btn-lg btn-info" id="selecionar">Exibir</button>
				</div>
			</div>

		</form>
		<hr>
		
		<div id="container"></div>

	</div>

<script src="<?=base_url()?>assets/jquery.mask.js"></script>
<script src="<?=base_url()?>assets/jquery-validate/jquery.validate.min.js"></script>
<script src="<?=base_url()?>assets/jquery-ui/jquery-ui.min.js"></script>
<script src="<?=base_url()?>assets/js/meu_highcharts.js"></script>
<script src="<?=base_url()?>assets/js/meu_js.js"></script>