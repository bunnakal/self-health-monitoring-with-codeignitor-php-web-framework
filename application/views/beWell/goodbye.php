<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Be Well</title>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/css/goodbye.css" media="screen"  />
<link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/css/Main.css" media="screen"  />
<link rel="stylesheet"	href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="<?=base_url();?>/assets/js/jquery.modal_box.js"></script>
</head>
<body>
    <div id="content-wrapper">	
    	<header>
			<div align="center" id="goodbye"><?php echo $this->lang->line('goodbye1'); ?></div>
			<div align="center" id="goodbye2"><?php echo $this->lang->line('goodbye2'); ?></div>
    	</header>
		
	</div>
<script> 
//if you want automatic redirection, use this:
/*
$(window).load(function() {
    window.setTimeout(function(){
       window.location.href = "<?=base_url();?>";
    }, 5000);
});
*/
</script>

</body>
</html>