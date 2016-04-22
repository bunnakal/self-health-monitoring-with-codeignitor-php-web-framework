<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
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

			<div id="welcome"><?php echo $this->lang->line('login_title'); ?></div>

			<a id="help" class="butn modal"></a>

		</header>

		<form action='<?php echo base_url();?>index.php/beWell/process'
			method='post' name='process'>
			<section>
				<fieldset id="loginInputs">
					<input id="username" onClick="refreshKeyboard(1)" name="username"
						type="text" placeholder="Username" autofocus required> <input
						id="password" onClick="refreshKeyboard(2)" name="password"
						type="password" placeholder="Password" required><br /> <span
						style="margin-left: 180px;"><?php if(! is_null($msg)) echo $msg;?></span>
				</fieldset>

				<div id="keyboardcase">
					<div id="keyboard"></div>
					<script src="<?=base_url();?>/assets/js/keyboard/jkeyboard.js"></script>
				</div>

			</section>
			<input type="submit" name="login" value="" id="start" class="butn"> <input
				onclick="location.href='<?php echo base_url();?>index.php/beWell/loginOption'"
				id="back" class="butn"></input>
		</form>
	</div>
	<script>
	function createPass(){
		$('#keyboard').jkeyboard({
		  // 'english', 'azeri', or 'russian'
		  layout: "english",
		  input: $('#password')
		});
	}
	function createUser(){
		$('#keyboard').jkeyboard({
		  // 'english', 'azeri', or 'russian'
		  layout: "english",
		  input: $('#username')
		});
	}
	</script>
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
	function createNew(c){
		switch(c) {
	    case 1:
	    	createUser();
	        break;
	    case 2:
	    	createPass();
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
				  input: $('#username')
				});
</script>
	<script>
$(document).ready(function(){
	$('.modal').modal_box({description: "<?php echo $this->lang->line('login_help_text_regel1'); ?><br><?php echo $this->lang->line('login_help_text_regel2'); ?><br><?php echo $this->lang->line('login_help_text_regel3'); ?><br>",title:"<center><?php echo $this->lang->line('login_help_title'); ?><center>", image: "../../assets/images/popup/Login.jpg"});
});
</script>
</body>
</html>