<?php
if(isset($_POST["data"])) {
	$code = $_POST["data"];
	echo "code : " + $code;
	if(!is_dir('/tmp/wowJudge')) {
		mkdir("/tmp/wowJudge");
	}
	file_put_contents("/tmp/wowJudge/log-process-c", $code);
}
else {
	echo "Error! Code field is empty.";
}
?>
