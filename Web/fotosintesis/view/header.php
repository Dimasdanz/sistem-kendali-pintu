<script>
	function get_lux_setting(){
		$('.lux_setting').load('/fotosintesis/view/lux_setting');
	}
	setInterval('get_lux_setting()', 100);
</script>
<div class="page-header">
	<h3>Fotosintesis</h3>
</div>
<div class="lux_setting" id="lux_setting"><br></div>
<hr>