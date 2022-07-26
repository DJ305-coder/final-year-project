<!DOCTYPE html>
<html>
<head>
  <title>Welcome Trenta Life-style</title>
	<meta content="width=device-width" name="viewport">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<link rel="stylesheet" href="{{URL::asset('assets/frontend/css/style.css')}}" />
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300&display=swap" rel="stylesheet">
</head>
<style type="text/css">
 body {
       font-family: 'Poppins', sans-serif;
        color: #444444;
      }
</style>
<body style="background: #f1f1f1; margin: 0px auto; padding: 0px;font-family: 'Poppins', sans-serif;">
	<div style="background-color: #fff; margin: 0px auto; max-width: 800px; height: auto;overflow: hidden;">
		<div style="width: 100%;padding: 40px;background: #383838;" >
	<img src="{{URL::asset('assets/frontend/img/logo-light.png')}}"  alt="" width="120px"> 
		</div>
		
	<div style="width: 100%; display: block;"></div>
<div class="" style="padding: 40px 40px 3px;">
	<div style="width: 100%; display: block; margin-bottom: 10px;">
		<div style="font-size: 16px; color: #000;">
			<p>Use the following OTP to complete your reset password procedures</p>
		</div>
	</div>

	

	<div style="width: 100%; margin-bottom: 30px;">
		<div style="font-size: 16px; color: #000;">
            <p style="margin-bottom: 0px;margin-top: 5px;"><b>Your OTP is  –</b> {{$otp}}</p>
           
		</div>
	</div>

</div>
<div style="width: 100%;background: #383838;background-repeat: no-repeat;height: 20px;">
</div>
	</div>

</div>
</div>

</body>
</html>
