<html>
	<head>
		<title>Test page | wowJudge</title>
		<script src="jquery-1.11.3.js"></script>
	</head>
	<body>
		<textarea id="code" cols="40" rows="10"></textarea><br />
		<select id="lang">
			<option value="c">C</option>
			<option value="cpp">C++</option>
			<option value="py">Python</option>
			<option value="java">Java</option>
		</select><br />
		<input type="submit" id="codeSubmit">
		</input>
		<div id="responseHolder"></div>
		<script>

			$(document).ready(function () {

				<!-- Code to post data over Ajax -->

				$('#codeSubmit').click(function () {
					var code_val = $('textarea[id="code"]').val();
					var lang_val = $('select[id="lang"]').val();
					$.ajax({
						type: 'POST',
						url: 'process/'+lang_val+'.php',
						data: {
							"data": code_val
						},
						success: function (response) {
							if(response == 0) {
								$("#responseHolder").html("Submitted successfully!");
							}
							else {
								$("#responseHolder").html("Oops! Something went wrong.");
							}
						}
					});
				});

				<!-- Code to remove \n from code field -->

				$("#code").keypress(function(e) {
					if(e.keyCode != 13) return;
					var msg = $("#code").val().replace(/\n/g, "");
					if (!util.isBlank(msg)) {
						send(msg);
						$("#code").val("");
					}
					return false;
				});

				<!-- Code to remove \t but also allow ident in code field -->

				$("#code").keydown(function(e) {
					if(e.keyCode == 9) {
						var start = this.selectionStart;
						var end = this.selectionEnd;
						var $this = $(this);
						var value = $this.val();
						$this.val(value.substring(0, start) + "    " + value.substring(end));
						this.selectionStart = this.selectionEnd = start + 4;
						e.preventDefault();
					}
				});
			});

		</script>
	</body>
</html>
