<html>
	<head>
		<title>Test page | wowJudge</title>
		<script src="js/jquery-1.11.3.js"></script>
	</head>
	<body>
		<textarea id="code" rows="20" cols="80"></textarea><br />
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
			<?php
				include 'js/functionality.js';
			?>
		</script>
	</body>
</html>
