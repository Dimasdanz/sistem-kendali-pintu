		<hr/>
		<div id="footer" class="footer text-center">
			<div class="container">
				<p class="text-muted credit">Copyright &copy; 2013 Two Taps Production</p>
				<p class="text-muted credit small">Programmed by Dimas Rullyan Danu | Designed by Afief Rahman & M. Lutfi Budiansyah</p>
				<p class="text-muted credit small">Powered by Bootstrap 3.0</p>
			</div>
		</div>

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="/assets/js/jquery.js"></script>
		<script src="/assets/js/bootstrap.min.js"></script>
		<script src="/assets/js/bootbox.min.js"></script>
		<script src="/assets/js/jquery.validate.js"></script>
		<script src="/assets/js/additional-methods.js"></script>
		<script>
			$(document).ready(function () {
			 	$('#device_power').on('click', function(){
	                bootbox.confirm("Are you sure?", function(result){
	                	if(result){
	                		$("#status").val("true");
							document.device_setting.submit();
			            }
	                });    
	            });
			 	$('#device_condition').on('click', function(){
	                bootbox.confirm("Are you sure?", function(result){
	                	if(result){
	                		$("#condition").val("true");
							document.device_setting.submit();
			            }
	                });    
	            });
				$("#user-form").validate({
					rules: {
						name: {
							required: true,
							lettersonly: true
						},
						password: {
							required: true,
							digits: true,
						},
					},
					messages: {
						password: {
							digits: "Password may contain only number"
						},
					},
					errorPlacement: function(error, element) {
						if(element.attr("name") == "password") {
							error.appendTo("#password-error");
						}
						if(element.attr("name") == "name") {
							error.appendTo("#name-error");
						}
			        },
				});
			});
		</script>
	</body>
</html>