<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Be Well</title>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/css/loginOption.css" media="screen"  />
<link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/css/Main.css" media="screen"  />
<link rel="stylesheet"	href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="<?=base_url();?>/assets/js/jquery.modal_box.js"></script>
</head>
<body>
	<div id="content-wrapper">
		<header>
			<div id="welcome"><?php echo $this->lang->line('title'); ?></div>
			
		<a id="help" class="butn modalhelp" type="submit"></a>
			
    	</header>
		<section>
			<button onclick="location.href='<?php echo base_url();?>index.php/beWell/cardRead'" id="eID" class="knop" type="submit">
        	</button>
        	
        	<button onclick="location.href='<?php echo base_url();?>index.php/beWell/login'" id="account" class="knop" type="submit">
        	</button>
        	
        	<button onclick="location.href='<?php echo base_url();?>index.php/beWell/acceptterms'" id="createaccount" class="knop" type="submit">
        	</button>
        	
		</section>
		<button onclick="location.href='<?php echo base_url();?>index.php/beWell/welcome'" type="submit"  id="back" class="butn"></button>
	</div>
	
<script> 

$('.modalhelp').modal_box({description: "<?php echo $this->lang->line('help_text_regel1'); ?><br><?php echo $this->lang->line('help_text_regel2'); ?><br><?php echo $this->lang->line('help_text_regel3'); ?><br>",title:"<center><?php echo $this->lang->line('help_title'); ?><center>", image: "../../assets/images/popup/info.png"});
</script>
			
</body>
</html>