<?php 
	$emailErr = false;
	$email = "";
	$errors = array();
	
	if($_POST){
		if(empty($_POST['email'])){
			$emailErr = true;
			$errors['email'] = "Email cannot be empty";
			exit();
		}
		// check if e-mail address is well-formed
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$emailErr = true;
			$errors['email'] = "Invalid email format";
		}
		if($emailErr === false){
			$path = base_url().'index.php/beWell/createProcess';
			header("Location: $path");
			exit();
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Be Well</title>
<link rel="stylesheet" type="text/css"
	href="<?=base_url();?>/assets/css/login.css" media="screen" />
<link rel="stylesheet" type="text/css"
	href="<?=base_url();?>/assets/css/keyboard/jkeyboard.css">
<link rel="stylesheet" type="text/css"
	href="<?=base_url();?>/assets/css/Main.css" media="screen" />
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="<?=base_url();?>/assets/js/jquery.modal_box.js"></script>
<script>var current = 1;</script>
</head>
<body>
	<div id="content-wrapper">
		<header>

			<div id="welcome"><?php echo $this->lang->line('login_title2'); ?></div>
			<a id="help" class="butn modal"></a>

		</header>

		<form action='<?php echo base_url();?>index.php/beWell/createProcess'
			method='post' name='process'>
			<section>
				<fieldset id="createInputs">
					<fieldset class="field">
						<input id="firstname" onClick="refreshKeyboard(1)"
							name="firstname" type="text" placeholder="Firstname" autofocus
							required> <input id="lastname" onClick="refreshKeyboard(2)"
							name="lastname" type="text" placeholder="Lastname" required>
					</fieldset>

					<fieldset class="field">
						<input id="username" onClick="refreshKeyboard(3)" name="username"
							type="text" placeholder="Username" required> <input id="email"
							onClick="refreshKeyboard(4)" name="email" type="text"
							placeholder="Email" required>
					</fieldset>

					<fieldset class="field">
						<input id="password" onClick="refreshKeyboard(5)" name="password"
							type="password" placeholder="Password" required> <input
							id="confirm" onClick="refreshKeyboard(6)" name="confirm"
							type="password" placeholder="Confirm password" required>
					</fieldset>

					<span style="color: #FF0000;"><?php if(! is_null($msg)) echo $msg;?></span>
				</fieldset>

				<div id="keyboardcase">
					<div id="keyboard"></div>
					<script src="<?=base_url();?>/assets/js/keyboard/jkeyboard.js"></script>
				</div>

			</section>
			<button
				onclick="location.href='<?php echo base_url();?>index.php/beWell/loginOption'"
				type="submit" id="back" class="butn"></button>
			<input type="submit" name="createAcc" value="" id="start"
				class="butn"/>
		</form>
	</div>

	<script>
	function refreshKeyboard(a){
		removeCurrent();
		select(a);
		createNew(a);
	}
	function select(b){
		current = b;
	}
	function removeCurrent(){
	    var elem=document.getElementById("keyboard");
	    elem.parentNode.removeChild(elem);
		var iDiv = document.createElement('div');
		iDiv.id = 'keyboard';
		var cas = document.getElementById("keyboardcase");
		cas.appendChild(iDiv);
	}

	function createFirstname(){
		$('#keyboard').jkeyboard({
		  // 'english', 'azeri', or 'russian'
		  layout: "english",
		  input: $('#firstname')
		});
	}

	function createLastname(){
		$('#keyboard').jkeyboard({
		  // 'english', 'azeri', or 'russian'
		  layout: "english",
		  input: $('#lastname')
		});
	}

	function createUsername(){
		$('#keyboard').jkeyboard({
		  // 'english', 'azeri', or 'russian'
		  layout: "english",
		  input: $('#username')
		});
	}

	function createEmail(){
		$('#keyboard').jkeyboard({
		  // 'english', 'azeri', or 'russian'
		  layout: "english",
		  input: $('#email')
		});
	}
	
	function createPassword(){
		$('#keyboard').jkeyboard({
		  // 'english', 'azeri', or 'russian'
		  layout: "english",
		  input: $('#password')
		});
	}

	function createConfirm(){
		$('#keyboard').jkeyboard({
		  // 'english', 'azeri', or 'russian'
		  layout: "english",
		  input: $('#confirm')
		});
	}
	
	function createNew(c){
		switch(c) {
	    case 1:
	    	createFirstname();
	        break;
	    case 2:
	    	createLastname();
	        break;
	    case 3:
		    createUsername();
		    break;
	    case 4:
		    createEmail();
		    break;
	    case 5:
		    createPassword();
		    break;
	    case 6:
		    createConfirm();
		    break;
		default:
			break;

		}
	}

	</script>
	<script>
			$('#keyboard').jkeyboard({
				  // 'english', 'azeri', or 'russian'
				  layout: "english",
				  input: $('#firstname')
				});
</script>
	<script>
$(document).ready(function(){
	$('.modal').modal_box({description: "<?php echo $this->lang->line('login_help_text_regel4'); ?><br><?php echo $this->lang->line('login_help_text_regel5'); ?><br>",title:"<center><?php echo $this->lang->line('login_help_title'); ?><center>", image: "../../assets/images/popup/Login.jpg"});
});
</script>
</body>
</html>