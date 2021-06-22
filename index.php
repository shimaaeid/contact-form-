<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$user = FILTER_VAR($_POST["username"], FILTER_SANITIZE_STRING);
	$email= FILTER_VAR($_POST["email"], FILTER_SANITIZE_EMAIL);
	$cell = FILTER_VAR($_POST["cellphone"], FILTER_SANITIZE_NUMBER_INT);
	$msg  = FILTER_VAR($_POST["message"], FILTER_SANITIZE_STRING);
	
	
	$formErrors = array();
	if(strlen($user) <= 3){
		$formErrors[]='usename must be more than <strong>3</strong> character';
	}
	if(strlen($msg) <= 10){
		$formErrors[] = 'message can\'t be less than <strong>10</strong> charachter ';
	}
	$headers = 'Form: '.$email. '\r\n';
	
	if(empty($formErrors)){
		mail('shimaae717@gmail.com','Contact Form',$msg, $headers);
		$user='';
		$email = '';
		$cell= '';
		$msg = '';
		$success = '<div class = "alert alert-success">We Recieved Your Message</div>';
		
		
		
	}
}
?>
<DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<title></title>
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.min.css">
			<link rel="stylesheet" href="css/contact.css">
			<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" >
			<style>
				.contact-form .astrex{
					float: right;
					color: red;
					font-size: 20px;
					position: relative;
					top: -43px;
					right: 25px;
					height: 0;					
				}
				.contact-form .custom-alert{
	                 padding: 5px 10px;
					display: none;
                }
			</style>
		</head>
		<body style="background-color:#F1F1F1;">
			<div class="container">
				<h1 class="text-center">Contact Me</h1>
				<form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
					<?php if(! empty($formErrors)){ ?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
						<?php 
	                    foreach($formErrors as $errors)
		                   echo $errors.'</br>';
					?>
                    </div>
					<?php } ?>
					<?php if(isset($success)) echo $success; ?>
					<div class="form-group">
					<input 
						   type="text" 
						   name="username" 
						   class="form-control username" 
						   placeholder="Type Your Name Here!!"
						   value="<?php if(isset($user))  echo $user ?>"
						   >
					<i class="fas fa-user"></i>
					<span class="astrex" style="">*</span>
					</div>
					<div class="alert alert-danger custom-alert">
						usename must be more than <strong>3</strong> character
					</div>
					<div class="form-group">
					<input 
						   type="email" 
						   name="email" 
						   placeholder="Type a Valid Email!!" 
						   class="form-control email"
						   value="<?php if(isset($email))  echo $email ?>"
						   >
					<i class="far fa-envelope"></i>
						<span class="astrex">*</span>
					</div>
					<div class="alert alert-danger custom-alert">
						Email can't be <strong>empty</strong> 
					</div>
					<input 
						   type="tel" 
						   name="cellphone" 
						   placeholder="Type Your Phone" 
						   class="form-control"
						   value="<?php if(isset($cell)) echo $cell ?>"
						   >
					<i class="fas fa-phone-alt"></i>
			<textarea class="form-control msg" name="message" placeholder="Type Your Message Here!!"><?php if(isset($msg)) echo $msg ?></textarea>
					<div class="alert alert-danger custom-alert">
						message can\'t be less than <strong>10</strong> charachter
					</div>
					<input 
						   type="submit" 
						   value="Send Message" 
						   class="btn btn-success btn-block">
					<i class="fas fa-paper-plane send-icon"></i>
				</form>
			</div>
		    <script src="js/jquery-3.4.1.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/jquery-3.5.1.min.js"></script>
			<script src="js/contact.js"></script>
			
		</body>
	</html>