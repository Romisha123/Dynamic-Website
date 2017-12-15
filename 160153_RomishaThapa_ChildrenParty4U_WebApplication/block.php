<!DOCTYPE html>
<html>
<head>
	<title>BLOCKED</title>
	<script src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/jquery.countdownTimer.js"></script>
</head>
<body>
<h1>Block</h1>
<div>
	<p><span class="countdown" id="ms_timer"></span></p>
</div>

<script type="text/javascript">
	$(function(){
		$('#ms_timer').countdowntimer( {
			minutes: 0;
			seconds: 30;
			size: "lg";
		});
	});
	setTimeout(function(){
		window.location.href="index.php"}, 30000);
</script>
</body>
</html>