<form id="div_parametros" method='post'>
	<div id="select_1">
		<select class="seleciona" id="parametro_1" name="parametro_1">
			<option> Selecione</option>
			<?php foreach ($parametros as $parametro) { ?>
				<option value="<?=$parametro ?>"><?=$parametro ?></option>
			<?php } ?>
		</select>
	</div>

	<button id="add">Adicionar</button>

	<br>
	<div id="div_intervalodatas">
		<label>Data1</label>
		<input type="text" name="data1" id="data1">
		<label>Data2</label>
		<input type="text" name="data2" id="data2">
	</div>
</form>





<button id="selecionar">Selecionar</button>


<div id="container"></div>

<script src="<?=base_url()?>assets/js/meu_js.js"></script>
<script src="<?=base_url()?>assets/js/meu_highcharts.js"></script>