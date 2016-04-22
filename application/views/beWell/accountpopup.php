<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" type="text/css"
	href="<?=base_url();?>/assets/css/popup.css" media="screen" />
</head>
<body>
	<div id="boxes">
		<div style="top: 199.5px; left: 551.5px; display: none;" id="dialog"
			class="window">
			Confirmation
			<div id="lorem">
				<br/><p style="margin-left: 100px;">You account has been created succefully.</p>
			</div>
			<div id="popupfoot">
				<br/><a href="<?=base_url();?>index.php/beWell/homePage" class="btn">DONE</a>
			</div>
		</div>
		<div
			style="width: 1478px; font-size: 32pt; color: white; height: 602px; display: none; opacity: 0.8;"
			id="mask"></div>
	</div>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script> 
	<script src="<?=base_url();?>/assets/js/popup.js"></script>
</body>
</html>