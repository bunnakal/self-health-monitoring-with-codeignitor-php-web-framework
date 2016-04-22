<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>BeWell</title>
<link rel="stylesheet" type="text/css"
	href="<?=base_url();?>/assets/css/checkOut.css" media="screen" />
<link rel="stylesheet" type="text/css"
	href="<?=base_url();?>/assets/css/Main.css" media="screen" />
<link rel="stylesheet"
	href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="<?=base_url();?>/assets/js/jquery.modal_box.js"></script>

<script>
var amount = 0.0;
function setEmail(content) {
	var controller = 'beWell';
    var base_url = '<?php echo site_url(); //you have to load the "url_helper" to use this function ?>';
    $.ajax({
        'url' : base_url + '/' + controller + '/setEmail',
        'type' : 'POST', //the way you want to send data to your URL
        'data' : {'content' : content},
        'success' : function(){
            console.log('succesful AJAX call');
        }
    });
}

function javaToPHP(variable) {
	var controller = 'beWell';
    var base_url = '<?php echo site_url(); //you have to load the "url_helper" to use this function ?>';
    $.ajax({
        'url' : base_url + '/' + controller + '/javaToPHP',
        'type' : 'POST', //the way you want to send data to your URL
        'data' : {'variable' : variable},
        'success' : function(){
            console.log('succesful AJAX call');
        }
    });
}

$(function() {
$( "#accordion" ).accordion({
	collapsible: true,
	active: false
	});

var name="";
var text="";
var result="";
name = "<?php echo $this->session->userdata('checkTest1');?>";
if(name!="") {
	text="<?php echo $this->session->userdata("resultTest1");?>"
	result="<h4><? echo $this->session->userdata ( 'checkTest1' );?></h4><h5><?echo $this->session->userdata ( 'resultTest1' );?></h5>";
	$( "<h3>" + name + "</h3>" ).appendTo( "#accordion" );
	$( "<div>" + text + "</div>" ).appendTo( "#accordion" );
	var icons = {
	         header: "iconClosed",    //custom icon class
	         activeHeader: "iconOpen" //custom icon class
	     };
	     $("#accordion").accordion({
	         icons: icons
	     });
	$( "#accordion" ).accordion( "refresh" );
}

name="";
var name = "<?php echo $this->session->userdata('checkTest2');?>";
if(name!="") {
	text="<?php echo $this->session->userdata('resultTest2');?>"
	result=result + "<h4><? echo $this->session->userdata ( 'checkTest2' );?></h4><h5><?echo $this->session->userdata ( 'resultTest2' );?></h5>";
	$( "<h3>" + name + "</h3>" ).appendTo( "#accordion" );
	$( "<div>" + text + "</div>" ).appendTo( "#accordion" );
	var icons = {
	         header: "iconClosed",    //custom icon class
	         activeHeader: "iconOpen" //custom icon class
	     };
	     $("#accordion").accordion({
	         icons: icons
	     });
	$( "#accordion" ).accordion( "refresh" );
}
name = "<?php echo $this->session->userdata('checkTest3');?>";
if(name!="") {
	text="<?php echo $this->session->userdata('resultTest3');?>"
	result=result + "<h4><? echo $this->session->userdata ( 'checkTest3' );?></h4><h5><?echo $this->session->userdata ( 'resultTest3' );?></h5>";
	$( "<h3>" + name + "</h3>" ).appendTo( "#accordion" );
	$( "<div>" + text + "</div>" ).appendTo( "#accordion" );
	var icons = {
	         header: "iconClosed",    //custom icon class
	         activeHeader: "iconOpen" //custom icon class
	     };
	     $("#accordion").accordion({
	         icons: icons
	     });
	$( "#accordion" ).accordion( "refresh" );
}
name = "<?php echo $this->session->userdata('checkTest4');?>";
if(name!="") {
	text="<?php echo $this->session->userdata("resultTest4");?>"
	result=result + "<h4><? echo $this->session->userdata ( 'checkTest4' );?></h4><h5><?echo $this->session->userdata ( 'resultTest4' );?></h5>";
	$( "<h3>" + name + "</h3>" ).appendTo( "#accordion" );
	$( "<div>" + text + "</div>" ).appendTo( "#accordion" );
	var icons = {
	         header: "iconClosed",    //custom icon class
	         activeHeader: "iconOpen" //custom icon class
	     };
	     $("#accordion").accordion({
	         icons: icons
	     });
	$( "#accordion" ).accordion( "refresh" );
}
// set all test result send from javascript to php (controller) via ajax.
setEmail(result);
});
		
function printResult(myDiv){
	var result = "";
	var test = "";
	var testResult = "";
	
	var pageRestore = document.body.innerHTML;
	var printContent = document.getElementById(myDiv);
	var hChilds = printContent.getElementsByTagName("h3");
	var divChilds = printContent.getElementsByTagName("div");
	var i;
	for(i = 0; i < hChilds.length; i++){
		test = hChilds[i].childNodes[1].nodeValue;
		testResult = divChilds[i].innerHTML;
		result += test + ":" + "<br>" + testResult + "<br>";
	}
	//alert(result);
	document.body.innerHTML = "<p>" + result + "</p>";
	window.print();
	document.body.innerHTML = pageRestore;	

	$( "#accordion" ).accordion({
		collapsible: true,
		active: true
		});
	$( "#accordion" ).accordion( "refresh" );
}
</script>
</head>
<body>
	<div id="content-wrapper">
		<header>
			<div id="welcome">Check Out</div>
			<a id="help" class="butn modalhelp" type="submit"></a>
		</header>
		<div id="wrap">
			<section>
				<div id="accordion"></div>
				<a onclick="printResult('accordion')" href="" id="print"
					class="butn" type="submit"></a>
				<button
					onclick="location.href='<?php echo base_url();?>index.php/beWell/send'"
					id="send" class="butn" type="submit"></button>
				<a href="<?=base_url();?>index.php/beWell/goodbye" id="checkout"
					class="butn" type="submit"></a>
			</section>
			<br> <a href="<?=base_url();?>index.php/beWell/homePage" id="home"
				class="butn" type="submit"></a>
		</div>
	</div>
	<script> 
$('.modalhelp').modal_box({description: "<?php echo $this->lang->line('help_text_regel1'); ?><br><?php echo $this->lang->line('help_text_regel2'); ?><br><?php echo $this->lang->line('help_text_regel3'); ?><br>",title:"<center><?php echo $this->lang->line('help_title'); ?><center>", image: "../../assets/images/popup/info.png"});
</script>
</body>
</html>
