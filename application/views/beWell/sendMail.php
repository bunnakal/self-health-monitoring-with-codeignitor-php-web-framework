<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Send Mail</title>
<link rel="stylesheet" type="text/css"
	href="<?=base_url();?>/assets/css/Main.css" media="screen">
<link type="text/css" rel="stylesheet"
	href="<?=base_url();?>/assets/css/sendMail.css">
<link type="text/css" rel="stylesheet"
	href="<?=base_url();?>/assets/css/jquery-te-1.4.0.css">
<link rel="stylesheet" type="text/css"
	href="<?=base_url();?>/assets/css/keyboard/jkeyboard.css">
<script type="text/javascript"
	src="http://code.jquery.com/jquery.min.js" charset="utf-8"></script>
<script type="text/javascript"
	src="<?=base_url();?>/assets/js/jquery-te-1.4.0.min.js" charset="utf-8"></script>
<script type="text/javascript"
	src="<?=base_url();?>/assets/js/jquery.modal_box.js"></script>
<script type="text/javascript">var current = 2;</script>
</head>
<body>
	<div id="content-wrapper">
		<header>
			<div id="welcome">Send Email</div>

			<a id="help" class="butn modalhelp"></a>
		</header>
		<form action='<?php echo base_url();?>index.php/beWell/send'
			method="POST">
			<section>
				<div id="mail">
					<p>
						<label class="field" for="to">To</label> <input type="text"
							class="textbox" id="to" name="to" required
							value="<?php echo $this->session->userdata('email');?>"
							onclick="refreshKeyboard(1)">
					</p>
					<p>
						<label class="field" for="from">From</label> <input type="text"
							class="textbox" id="from" name="from"
							value="bewell.point@gmail.com" autofocus required
							onclick="refreshKeyboard(2)">
					</p>
					<p>
						<label class="field">Subject</label> <input type="text"
							class="textbox" id="subject" name="subject" autofocus required
							onclick="refreshKeyboard(3)">
					</p>
					<p>
						<label class="field" style="height: 1px"> </label> <input
							type="text" name="msg" id="msg" class="textbox"
							style="padding: 15px 6px" onclick="refreshKeyboard(4)"
							placeholder="Free Message">
					</p>
				</div>
				<div id="keyboardcase">
					<div id="keyboard"></div>
					<script src="<?=base_url();?>/assets/js/keyboard/jkeyboard.js"></script>
				</div>
			</section>
			<button type="submit" id="send" name="send" value="" class="butn"></button>
			<button
				onclick="location.href='<?php echo base_url();?>index.php/beWell/checkOut'"
				id="cancel" name="cancel" class="butn"></button>
		</form>
	</div>
	<script>
	function createTo(){
		$('#keyboard').jkeyboard({
		  // 'english', 'azeri', or 'russian'
		  layout: "english",
		  input: $('#to')
		});
	}
	function createFrom(){
		$('#keyboard').jkeyboard({
		  // 'english', 'azeri', or 'russian'
		  layout: "english",
		  input: $('#from')
		});
	}
	function createSubject(){
		$('#keyboard').jkeyboard({
		  // 'english', 'azeri', or 'russian'
		  layout: "english",
		  input: $('#subject')
		});
	}
	function createText(){
		$('#keyboard').jkeyboard({
		  // 'english', 'azeri', or 'russian'
		  layout: "english",
		  input: $('#msg')
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
	        createTo();
	        break;
	    case 2:
	    	createFrom();
	        break;
	    case 3:
	    	createSubject();
	        break;
	    case 4:
	    	createText();
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
		input: $('#from')
	});
</script>
	<script>
	$('.jqte-test').jqte();
	
	// settings of status
	var jqteStatus = true;
	$(".status").click(function()
	{
		jqteStatus = jqteStatus ? false : true;
		$('.jqte-test').jqte({"status" : jqteStatus})
	});
</script>
	<script>
	$('.modalhelp').modal_box({description: "<?php echo $this->lang->line('help_text_regel1'); ?><br><?php echo $this->lang->line('help_text_regel2'); ?><br><?php echo $this->lang->line('help_text_regel3'); ?><br>",title:"<center><?php echo $this->lang->line('help_title'); ?><center>", image: "../../assets/images/popup/info.png"});
	</script>
</body>
</html>