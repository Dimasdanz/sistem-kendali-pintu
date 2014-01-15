<script>
	function get_device_status(){
		$('.device_status').load('/danzsecurity/view/device_status');
	}
	setInterval('get_device_status()', 100);
</script>
<div class="page-header">
	<h3>Danz Security</h3>
</div>
<div class="device_status" id="device_status"><br></div>
<hr>