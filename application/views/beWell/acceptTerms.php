<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Be Well</title>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/css/acceptTerms.css" media="screen"  />
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
			
			<button id="help" class="butn modalhelp" type="submit"></button>
    	</header>
    	
		<section>
			 <h2 id="info" ><?php echo $this->lang->line('info'); ?></h2>
			 <br>
				 <div id="buttons">
				 <button id="up" class="scrollbutn" type="submit"></button>
				 <button id="down" class="scrollbutn" type="submit"></button>
				 </div>
			 <div id="terms"><?php echo $this->lang->line('terms'); ?>
			</div>
			<br> <a href="<?=base_url();?>index.php/beWell/createAccount" id="next" class="butn" type="submit"></a>
		</section>
		<button onclick="location.href='<?php echo base_url();?>index.php/beWell/loginOption'" type="submit"  id="back" class="butn"></button>
		
	</div>
<script> 
var scrolled=0;

$(document).ready(function(){

    	
    $("#down").on("click" ,function(){
                scrolled=scrolled+150;
        
				$("#terms").animate({
				        scrollTop:  scrolled
				   });

			});

    
    $("#up").on("click" ,function(){
				scrolled=scrolled-150;
				
				$("#terms").animate({
				        scrollTop:  scrolled
				   });

			});
});

$('.modalhelp').modal_box({description: "<?php echo $this->lang->line('help_text_regel1'); ?><br><?php echo $this->lang->line('help_text_regel2'); ?><br><?php echo $this->lang->line('help_text_regel3'); ?><br>",title:"<center><?php echo $this->lang->line('help_title'); ?><center>", image: "../../assets/images/popup/info.png"});
</script>
</body>
</html>