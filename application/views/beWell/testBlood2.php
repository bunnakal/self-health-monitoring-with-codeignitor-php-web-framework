<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Be Well</title>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/css/testprogres.css" media="screen"  />
<link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/css/Main.css" media="screen"  />
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

<script src="<?=base_url();?>/assets/js/jquery.modal_box.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
function saveResults(results) {
	 var p = {};
	 var controller = 'beWell';
  var base_url = '<?php echo site_url(); //you have to load the "url_helper" to use this function ?>';
  $.ajax({
      'url' : base_url + '/' + controller + '/saveResults',
      'type' : 'GET', //the way you want to send data to your URL
      'data' : {'id' : '4', 'results':results},
      'success' : function(){
          console.log('succesful AJAX call');
      }
  });
}
<?php
		$arr;
		for($x = 1; $x <= 9; $x ++) {
			$arr [$x] [0] = $this->session->userdata ( 'test' . $x );
			$arr [$x] [1] = $this->session->userdata ( 'test' . $x . 'Max' );
		}
		$JSON_Array = json_encode ( $arr );
		?>
		jsArray = <?php echo $JSON_Array?>;
function setTest(test,progress,max) {
	 var p = {};
	 var controller = 'beWell';
    var base_url = '<?php echo site_url(); //you have to load the "url_helper" to use this function ?>';
    $.ajax({
        'url' : base_url + '/' + controller + '/setTest',
        'type' : 'GET', //the way you want to send data to your URL
        'data' : {'test' : test, 'progress':progress, 'max':max},
        'success' : function(){
            console.log('succesful AJAX call');
        }
    });
}

function javaToPHP(result,test) {
	var controller = 'beWell';
    var base_url = '<?php echo site_url(); //you have to load the "url_helper" to use this function ?>';
    $.ajax({
        'url' : base_url + '/' + controller + '/javaToPHP',
        'type' : 'GET', //the way you want to send data to your URL
        'data' : {'result' : result, 'test' : test},
        'success' : function(){
            console.log('succesful AJAX call');
        }
    });
}

$(function() {
	$( "#progressbar" ).progressbar({
	max: 170,
	value: 10
	});
	document.getElementById("back").style.visibility = "hidden";

	$("#next").button().click(function () {
		<?php $this->session->set_userdata('checkTest4', 'Lipides');?>;
	    currValue = $("#progressbar").progressbar("value");
	    if (currValue + 10 <= 170) {
	        toValue = currValue + 10;
	        animateProgress();
	        document.getElementById("stap").innerHTML="Step " + toValue/10 + " of 17";
	        document.getElementById("back").style.visibility = "visible";
	        document.getElementById("home").href = "<?=base_url();?>index.php/beWell/homePage";
	        if (toValue == 170 ) {
	        	getEvents();
	        	document.getElementById("next").style.visibility = "hidden";
		        document.getElementById("home").style.backgroundImage = "url('../../assets/images/buttons/homeknop.png')";
		        document.getElementById("home").href = "<?=base_url();?>index.php/beWell/homePage";
		        	if(jsArray[1][0] <0){
		        		document.getElementById("home").href = "<?=base_url();?>index.php/beWell/testprogres";
		        	}else if(jsArray[2][0] <0){
		        		document.getElementById("home").href = "<?=base_url();?>index.php/beWell/weighttest";
		        	}else if(jsArray[3][0] <0){
		        		document.getElementById("home").href = "<?=base_url();?>index.php/beWell/testBlood1";
		        	}
	        }
	        display();
	        
	    }  
	});

	function jump(status){
	    currValue = $("#progressbar").progressbar("value");
	    if (currValue + status*10 <= 170) {
	        toValue = currValue + 10*status;
	        animateProgress();
	        document.getElementById("stap").innerHTML="Step " + toValue/10 + " of 17";
	        document.getElementById("back").style.visibility = "visible";
	        document.getElementById("home").href = "<?=base_url();?>index.php/beWell/homePage";
	        if (toValue == 170 ) {
	        	document.getElementById("next").style.visibility = "hidden";
		        document.getElementById("home").style.backgroundImage = "url('../../assets/images/buttons/homeknop.png')";
		        document.getElementById("home").href = "<?=base_url();?>index.php/beWell/homePage";
	        }
	        display();
	    }
	}

	$("#back").button().click(function () {
	    currValue = $("#progressbar	").progressbar("value");
	    if (currValue - 10 >= 10) {
	        toValue = currValue - 10;
	        animateProgress();
	        document.getElementById("stap").innerHTML="Step " + toValue/10 + " of 17";
	        document.getElementById("next").style.visibility = "visible";
	        document.getElementById("home").style.backgroundImage = "url('../../assets/images/buttons/exitknop.png')";
	        if (toValue == 10) {
	        	document.getElementById("back").style.visibility = "hidden";

	        }
	        display();
	    }
	});

	function animateProgress() {
	    if (currValue < toValue) {
	        $("#progressbar").progressbar("value", currValue + 1);
	        currValue = $("#progressbar").progressbar("value");
	        setTimeout(animateProgress, 5);
	    } else if (currValue > toValue) {
	        $("#progressbar").progressbar("value", currValue - 1);
	        currValue = $("#progressbar").progressbar("value");
	        setTimeout(animateProgress, 5);
	    }
	}

	function display() {
		setTest(4,parseInt(toValue/10, 10),17);
		switch(toValue) {
		case 10:
			document.getElementById("test-beschrijving").innerHTML="<?php $step=1; echo $this->config->item('bloodtest2-step'.$step.''); ?>"
			document.getElementById("image").innerHTML="<img src='<?=base_url();?>/assets/images/test/bloodtest2/1.png' alt=''/>";
			break;
		case 20:
			document.getElementById("test-beschrijving").innerHTML="<?php $step=2; echo $this->config->item('bloodtest2-step'.$step.''); ?>";
			document.getElementById("image").innerHTML="<img src='<?=base_url();?>/assets/images/test/bloodtest2/2.png' alt=''/>";
			break;
		case 30:
			document.getElementById("test-beschrijving").innerHTML="<?php $step=3; echo $this->config->item('bloodtest2-step'.$step.''); ?>";
			document.getElementById("image").innerHTML="<img src='<?=base_url();?>/assets/images/test/bloodtest2/3.png'  alt=''/>";
			break;
		case 40:
			document.getElementById("test-beschrijving").innerHTML="<?php $step=4; echo $this->config->item('bloodtest2-step'.$step.''); ?>";
			document.getElementById("image").innerHTML="<img src='<?=base_url();?>/assets/images/test/bloodtest2/4.png' alt=''/>";
			break;
		case 50:
			document.getElementById("test-beschrijving").innerHTML="<?php $step=5; echo $this->config->item('bloodtest2-step'.$step.''); ?>";
			document.getElementById("image").innerHTML="<img src='<?=base_url();?>/assets/images/test/bloodtest2/5.png' alt=''/>";
			break;
		case 60:
			document.getElementById("test-beschrijving").innerHTML="<?php $step=6; echo $this->config->item('bloodtest2-step'.$step.''); ?>";
			document.getElementById("image").innerHTML="<img src='<?=base_url();?>/assets/images/test/bloodtest2/6.png'  alt=''/>";
			break;
		case 70:
			document.getElementById("test-beschrijving").innerHTML="<?php $step=7; echo $this->config->item('bloodtest2-step'.$step.''); ?>";
			document.getElementById("image").innerHTML="<img src='<?=base_url();?>/assets/images/test/bloodtest2/7.png' alt=''/>";
			break;
		case 80:
			document.getElementById("test-beschrijving").innerHTML="<?php $step=8; echo $this->config->item('bloodtest2-step'.$step.''); ?>";
			document.getElementById("image").innerHTML="<img src='<?=base_url();?>/assets/images/test/bloodtest2/8.png' alt=''/>";
			break;
		case 90:
			document.getElementById("test-beschrijving").innerHTML="<?php $step=9; echo $this->config->item('bloodtest2-step'.$step.''); ?>";
			document.getElementById("image").innerHTML="<img src='<?=base_url();?>/assets/images/test/bloodtest2/9.png' alt=''/>";
			break;
		case 100:
			document.getElementById("test-beschrijving").innerHTML="<?php $step=10; echo $this->config->item('bloodtest2-step'.$step.''); ?>";
			document.getElementById("image").innerHTML="<img src='<?=base_url();?>/assets/images/test/bloodtest2/10.png' alt=''/>";
			break;
		case 110:
			document.getElementById("test-beschrijving").innerHTML="<?php $step=11; echo $this->config->item('bloodtest2-step'.$step.''); ?>";
			document.getElementById("image").innerHTML="<img src='<?=base_url();?>/assets/images/test/bloodtest2/11.png' alt=''/>";
			break;
		case 120:
			document.getElementById("test-beschrijving").innerHTML="<?php $step=12; echo $this->config->item('bloodtest2-step'.$step.''); ?>";
			document.getElementById("image").innerHTML="<img src='<?=base_url();?>/assets/images/test/bloodtest2/12.png' alt=''/>";
			break;
		case 130:
			document.getElementById("test-beschrijving").innerHTML="<?php $step=13; echo $this->config->item('bloodtest2-step'.$step.''); ?>";
			document.getElementById("image").innerHTML="<img src='<?=base_url();?>/assets/images/test/bloodtest2/13.png' alt=''/>";
			break;
		case 140:
			document.getElementById("test-beschrijving").innerHTML="<?php $step=14; echo $this->config->item('bloodtest2-step'.$step.''); ?>";
			document.getElementById("image").innerHTML="<img src='<?=base_url();?>/assets/images/test/bloodtest2/14.png' alt=''/>";
			break;
		case 150:
			document.getElementById("test-beschrijving").innerHTML="<?php $step=15; echo $this->config->item('bloodtest2-step'.$step.''); ?>";
			document.getElementById("image").innerHTML="<img src='<?=base_url();?>/assets/images/test/bloodtest2/15.png' alt=''/>";
			break;
		case 160:
			document.getElementById("test-beschrijving").innerHTML="<?php $step=16; echo $this->config->item('bloodtest2-step'.$step.''); ?>";
			document.getElementById("image").innerHTML="<img src='<?=base_url();?>/assets/images/test/bloodtest2/16.png' alt=''/>";
			break;
		case 170:
			document.getElementById("test-beschrijving").innerHTML="<?php $step=17; echo $this->config->item('bloodtest2-step'.$step.''); ?>";
			document.getElementById("image").innerHTML="<img src='<?=base_url();?>/assets/images/test/bloodtest2/17.png' alt=''/>";
			break;
	    default:
	     
		} 
	}

	$(document).ready(function(){
		var x = location.search.substr(1);
		if (x != ""){
			var status = 0+<?php if(isset($_GET['status'])){ echo $_GET['status']; }
			else{
				echo "0";
			} ?>;
			status--;
		   jump(status);
		}
	});
});

</script>

<script>


</script>


<script>
	var xhr;
	function getEvents() {
	    xhr = new XMLHttpRequest();
	    xhr.onreadystatechange = eventsCallback;
	    //var url = "http://localhost:8000/BPM/download";
	    var url = "http://date.jsontest.com";
	    xhr.open("GET", url, true); // asynchronuous
	    xhr.send();
	}
	function eventsCallback() {
	    if (xhr.readyState == 4) {
	        if (xhr.status == 200) {
	            // here it comes!!!!
	            consumeTheEvents(xhr.responseText);
	        } else {
	            alert("Message returned, with error status "
	                    + xhr.status + ".");
	        }
	    }
	}
	function consumeTheEvents(jsondata) {
	    var jsdata = JSON.parse(jsondata);
	    var string;

	    for (var i = 0; i < 2; i++) {
	        string=+jsdata;
	    }
	    javaToPHP(jsdata.date,4);
	    saveResults(jsdata);
	    //document.getElementById("container").innerHTML=jsdata[0].systric;
	    //document.getElementById("container").innerHTML=jsdata.time;
	}

</script>

</head>
<body>
    <div id="content-wrapper">	
    	<header>
			<div id="welcome"><?php echo $this->lang->line('bloodtest2'); ?></div>
			
			<a id="help" class="butn modal" ></a>
			
    	</header>
    	<div id="wrap">
		<section>
			<div class="section" id="stap">Step 1 of 17</div>
			<div class="section" id="progressbar"></div>
			<div id="test-beschrijving">
				<?php $step=1; echo $this->config->item('bloodtest2-step'.$step.''); ?>
			</div>
			<div id="image" class="image">
					<img alt="bloodtest" src="<?=base_url();?>/assets/images/test/bloodtest2/1.png">
			</div>		
			<button  id="back" class="butn" type="submit"></button>
			<button  id="next" class="butn" type="submit"></button>
		</section>
		<br>
			<a href="<?=base_url();?>index.php/beWell/homePage" id="home" class="butn" ></a>	
		</div>
	</div>
	<script>
$(document).ready(function(){
	$('.modal').modal_box({description: "<?php echo $this->lang->line('bloodtest2-help_regel1'); ?><br><?php echo $this->lang->line('bloodtest2-help_regel2'); ?><br><?php echo $this->lang->line('bloodtest2-help_regel3'); ?><br>",title:"<center><?php echo $this->lang->line('bloodtest2-help_title'); ?><center>", image: "../../assets/images/popup/bloodtesthelp.png"});
});
</script>
</body>
</html>