<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Be Well</title>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/css/helpInfo.css" media="screen"  />
<link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/css/Main.css" media="screen"  />
<link rel="stylesheet"	href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
</head>
<body>
    <div id="content-wrapper">	
    	<header>
			<div id="welcome" align="center" ><?php echo $this->lang->line('title'); ?></div>
    	</header>
		<section>
			 <div id="info" align="center" ><?php echo $this->lang->line('info'); ?></div>
			 <div id="help"></div>	
        	</button>
		</section>
	</div>
<script> 
$(window).load(function() {
    window.setTimeout(function(){
       window.location.href = "<?=base_url();?>index.php/beWell/loginOption";
    }, 5000);
});</script>
</body>
</html>