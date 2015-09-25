$(document).ready(function () {

	// Code to post data over Ajax

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

	// Code to remove \n from code field

		$("#code").keypress(function(e) {
			if(e.keyCode == 13) {
				var msg = $("#code").val().replace(/\n/g, "");
				if (!util.isBlank(msg)) {
					send(msg);
					$("#code").val("");
				}
			}
			else if(e.keyCode == 9) {
				var start = this.selectionStart;
				var end = this.selectionEnd;
				var $this = $(this);
				var value = $this.val();
				$this.val(value.substring(0, start) + "    " + value.substring(end));
				this.selectionStart = this.selectionEnd = start + 4;
				e.preventDefault();
			}
			else {
				return;
			}
			return false;
		});
});
