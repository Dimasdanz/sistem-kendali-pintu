<script>
	function get_selected(){
		$('.selected').load('/kelembaban/view/selected');
	}
	setInterval('get_selected()', 100);
</script>
<div class="page-header">
	<h3>kelembaban</h3>
</div>
<div class="selected" id="selected"><br></div>
<hr>