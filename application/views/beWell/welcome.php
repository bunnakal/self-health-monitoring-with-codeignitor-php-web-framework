<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Be Well</title>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/css/welcome.css" media="screen"  />
<link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/css/Main.css" media="screen"  />
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="<?=base_url();?>/assets/js/jquery.modal_box.js"></script>

<?php if (isset($this->session)){$this->session->sess_destroy();}?>

<script type="text/javascript">
function setLanguage(language) {
	 var p = {};
	 var controller = 'bewell';
     var base_url = '<?php echo site_url(); //you have to load the "url_helper" to use this function ?>';
     p[language] = language
     $.ajax({
         'url' : base_url + '/' + controller + '/setLang',
         'type' : 'GET', //the way you want to send data to your URL
         'data' : {'language' : language},
         'success' : function(){
             console.log('succesful AJAX call');
         }
     });
}
</script>
</head>
<body>
    <div id="content-wrapper">	
    	<header>
            <br>
			<div id="welcome"> Welcome</div>
			
			<button id="help" class="butn modal" type="submit"></button>
    	</header>
    	
		<section>

			<button onclick="setLanguage('nederlands');location.href='<?php echo base_url();?>index.php/beWell/helpInfo'" id="Nederlands" class="vlag" type="submit">
        	</button>
        	
        	<button onclick="setLanguage('french');location.href='<?php echo base_url();?>index.php/beWell/helpInfo'" id="Frans" class="vlag" type="submit">
        	</button>
        	
        	<!-- button href="<?=base_url();?>login" id="other" class="butn modal" type="submit"></button-->
        	<br>
        	<br>
        	<br>
        	
        	<button onclick="setLanguage('german');location.href='<?php echo base_url();?>index.php/beWell/helpInfo'" id="Duits" class="vlag" type="submit">
        	</button>
        	<button onclick="setLanguage('english');location.href='<?php echo base_url();?>index.php/beWell/helpInfo'" id="Engels" class="vlag" type="submit">
        	</button>
        	
        	
		</section>
		<button id="other" class="butn modal" type="submit"></button>
	</div>
	<script>
$(document).ready(function(){
	$('.modal').modal_box({description: "<b>Nederlands</b>: Druk op de knop om de juiste taal te selecteren. Druk op <i>Other</i> als uw taal niet vermeld is.<br><b>English</b>: Tap a button to select your language. If your language is not listed, press the <i>Other</i> button.<br><b>Deutsch</b>: Tippen Sie auf eine Schaltflache, um Ihre Sprache auszuwahlen. Wenn Ihre Sprache nicht aufgefuhrt ist, drucken Sie die <i>Other</i> -Taste.<br><b>Francais</b>: Appuyez sur un bouton pour selectionner votre langue. Est votre langue ne est pas repertorie, appuyez sur la touche <i>Other</i>.",title:"<center>Welkom - Welcome - Willkommen - Bienvenu<center>", image: "../../assets/images/popup/language_help.png"});
});
</script>
</body>
</html>