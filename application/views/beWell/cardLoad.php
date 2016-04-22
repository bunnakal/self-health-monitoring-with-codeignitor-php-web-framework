<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Be Well</title>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/css/cardload.css" media="screen"  />
<link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/css/Main.css" media="screen"  />
<link rel="stylesheet"	href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="<?=base_url();?>/assets/js/jquery.modal_box.js"></script>
</head>
<body>
    <div id="content-wrapper">	
    	<header>
			<div id="welcome"></div>
    	</header>
    	<script src="https://www.java.com/js/deployJava.js"></script>
    	
		<section>
			 <h2 id="info" >Please wait while your card is being read...</h2>
			 <br>
			 <div id="loading"></div>	
			 <button onclick="location.href='<?php echo base_url();?>index.php/beWell/loginOption'" id="skip" class="butn" type="submit">
        	</button>
		</section>
	</div>
<script> 
$('.modalhelp').modal_box({description: "<?php echo $this->lang->line('help_text_regel1'); ?><br><?php echo $this->lang->line('help_text_regel2'); ?><br><?php echo $this->lang->line('help_text_regel3'); ?><br>",title:"<center><?php echo $this->lang->line('help_title'); ?><center>", image: "../../assets/images/popup/info.png"});
</script>
</body>
</html>