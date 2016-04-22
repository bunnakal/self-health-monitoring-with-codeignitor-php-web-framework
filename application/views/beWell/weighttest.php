<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Be Well</title>
<link rel="stylesheet" type="text/css"
	href="<?=base_url();?>/assets/css/testprogres.css" media="screen" />
<link rel="stylesheet" type="text/css"
	href="<?=base_url();?>/assets/css/Main.css" media="screen" />
<link rel="stylesheet"
	href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
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
      'type' : 'POST', //the way you want to send data to your URL
      'data' : {'id' : '2', 'results':results},
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
	max: 30,
	value: 10
	});
	document.getElementById("back").style.visibility = "hidden";

	$("#next").button().click(function () {
		
		<?php
		$this->session->set_userdata ( 'checkTest2', 'Weight test' );
		$this->session->set_userdata ( 'test', 2 );
		?>;
	    currValue = $("#progressbar").progressbar("value");
	    if (currValue + 10 <= 30) {
	        toValue = currValue + 10;
	        animateProgress();
	        document.getElementById("stap").innerHTML="Step " + toValue/10 + " of 3";
	        document.getElementById("back").style.visibility = "visible";
	        document.getElementById("home").href = "<?=base_url();?>index.php/beWell/homePage";
	        if (toValue == 30 ) {
	        	getEvents();
	        	document.getElementById("next").style.visibility = "hidden";
		        document.getElementById("home").style.backgroundImage = "url('../../assets/images/buttons/homeknop.png')";
		        document.getElementById("home").href = "<?=base_url();?>index.php/beWell/homePage";
	        	if(jsArray[1][0] <0){
	        		document.getElementById("home").href = "<?=base_url();?>index.php/beWell/testprogres";
	        	}else if(jsArray[3][0] <0){
	        		document.getElementById("home").href = "<?=base_url();?>index.php/beWell/testBlood1";
	        	}else if(jsArray[4][0] <0){
	        		document.getElementById("home").href = "<?=base_url();?>index.php/beWell/testBlood2";
	        	}
	        }
	        // Send to the server which step we are at, what the max number of steps is, floor( step) so we dont get doubles
	        setTest(2,parseInt(toValue/10, 10) ,3);
	        display();
	    }  
	});


	function jump(status){
        console.log(jsArray);
	    currValue = $("#progressbar").progressbar("value");
	    
	    if (currValue + status*10 <= 30) {
	        toValue = currValue + 10*status;
	        animateProgress();
	        document.getElementById("stap").innerHTML="Step " + toValue/10 + " of 3";
	        document.getElementById("back").style.visibility = "visible";
	        document.getElementById("home").href = "<?=base_url();?>index.php/beWell/homePage";
	        if (toValue == 30 ) {
	        	document.getElementById("next").style.visibility = "hidden";
		        document.getElementById("home").style.backgroundImage = "url('../../assets/images/buttons/homeknop.jpg')";
		        document.getElementById("home").href = "<?=base_url();?>index.php/beWell/homePage";

		        display();

	        }
	        
	    }
	}

	$("#back").button().click(function () {
	    currValue = $("#progressbar	").progressbar("value");
	    if (currValue - 10 >= 10) {
	        toValue = currValue - 10;
	        animateProgress();
	        document.getElementById("stap").innerHTML="Step " + toValue/10 + " of 3";
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
		switch(toValue) {
	    case 10:
	    	document.getElementById("test-beschrijving").innerHTML="<?php $step=1; echo $this->config->item('weighttest-step'.$step.''); ?>";
	    	document.getElementById("image").innerHTML="<img src='<?=base_url();?>/assets/images/test/weight/1.png' alt=''/>";
	        break;
	    case 20:
	    	document.getElementById("test-beschrijving").innerHTML="<?php $step=2; echo $this->config->item('weighttest-step'.$step.''); ?>";
	    	document.getElementById("image").innerHTML="<img src='<?=base_url();?>/assets/images/test/weight/2.png' alt=''/>";
	        break;
	    case 30:
	    	document.getElementById("test-beschrijving").innerHTML="<?php $step=3; echo $this->config->item('weighttest-step'.$step.''); ?>";
	    	document.getElementById("image").innerHTML="<img src='<?=base_url();?>/assets/images/test/weight/thumbs.png'  alt=''/>";
	        break;
	    default:
	     
		} 
	}

	$(document).ready(function(){
		var x = location.search.substr(1);
		if (x != ""){
			var status = 0+<?php
			
if (isset ( $_GET ['status'] )) {
				echo $_GET ['status'];
			} else {
				echo "0";
			}
			?>;
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
	    javaToPHP(jsdata.milliseconds_since_epoch,2);
	    console.log(jsdata);
	    saveResults(jsdata);
	   // document.getElementById("container").innerHTML=jsdata[0].systric;
	    //document.getElementById("container").innerHTML=jsdata.time;
	}

</script>

</head>
<body>
	<div id="content-wrapper">
		<header>
			<div id="welcome"><?php echo $this->lang->line('weighttest-title'); ?></div>

			<a id="help" class="butn modal"></a>

		</header>
		<div id="wrap">
			<section>
				<div class="section" id="stap">Step 1 of 3</div>
				<div class="section" id="progressbar"></div>
				<div id="test-beschrijving">
				<?php $step=1; echo $this->config->item('weighttest-step'.$step.''); ?>
			</div>
				<div id="image" class="image">
					<img alt="weighttest"
						src="<?=base_url();?>/assets/images/test/weight/1.png">
				</div>
				<button id="back" class="butn" type="submit"></button>
				<button id="next" class="butn" type="submit"></button>

			</section>
			<br> <a href="<?=base_url();?>index.php/beWell/homePage" id="home"
				class="butn"></a>
		</div>
	</div>
	<script>
$(document).ready(function(){
	$('.modal').modal_box({description: "<?php echo $this->lang->line('weighttest-help_regel1'); ?><br><?php echo $this->lang->line('weighttest-help_regel2'); ?><br><?php echo $this->lang->line('weighttest-help_regel3'); ?><br>",title:"<center><?php echo $this->lang->line('weighttest-help_title'); ?><center>", image: "../../assets/images/popup/weighttest.png"});
});
</script>
</body>
</html>