<!DOCTYPE html>
<html>
<head>
	<title>Wrong Attempt</title>
  <script src="js/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="js/jquery.countdownTimer.js"></script>
  <link rel="stylesheet" type="text/css" href="css/jquery.countdownTimer.css" />
  <link rel="STYLESHEET" type="text/css" href="css/cd.css" />

</head>
<body>
  <div class="center">
  <div class="frame">
  <div class="countdown">
  <div class="margin10" style="margin-top: 250px;">
   
	<div class="margin10">
		<h2 style="text-transform: uppercase; color: #ff0000; font-size: 30px">You are blocked</h2> </div>
   <span style="color: #ff0000; font-weight: 100" id="ms_timer"></span>
   
   <div class="margin10">
   <p class="redirect" style="color: #ff0000; font-size: 20px;">You will be automatically redirected to LOGIN page.</p>
   </div>

   <script>
    $(function(){
      $('#ms_timer').countdowntimer({
        minutes :0,
        seconds : 30,
        size : "lg"
      });
    });
      setTimeout(function(){window.location.href="index.php"},30000);
  </script>

</div>
	</div>
	</div>
</body>
</html>

