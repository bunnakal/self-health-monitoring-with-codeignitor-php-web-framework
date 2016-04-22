<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $this->lang->line('title'); ?></title>
<link rel="stylesheet" type="text/css"
	href="<?=base_url();?>/assets/css/homePage.css" media="screen" />
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="<?=base_url();?>/assets/js/jquery.modal_box.js"></script>
<script src="<?=base_url();?>/assets/js/jquery.modal_box2.js"></script>
<script>function setTest(test,progress,max) {
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
}</script>
</head>
<body>
	<div id="content-wrapper">
		<header>
			<div id="container">
				<img alt="homepage" id="image" src="../../assets/images/homep.png" />
				<p id="text">
        			<?php echo $this->lang->line('welcome') . $this->session->userdata('user') . $this->lang->line('welcome_message')?>

        			
    			</p>
			</div>

			<a id="help" class="modalhelp butn"> </a>
		</header>
		<section>
			<!--** Loop through all records in tests table and display it in each button** -->
			<?php
			$i = 1;
			foreach ( $query as $row ) :
				$cls = "";
				if ($row->status == "0")
					$cls = $cls . " opas";
				?>	
			<button href="" id="test<?php echo $i; ?>"
				class="test<?php echo $cls; ?>" type="submit">
				<div class="innerbutn modal<?php echo $i; ?>"></div>
				<h2 id="title<?php echo $i; ?>" class="innertitle"><?php echo $row->testname; ?></h2>
				<h2 id="time<?php echo $i; ?>" class="innertime"> <?php echo $row->testduration . " minute(s)"; ?> </h2>
				<h2 id="price<?php echo $i;?>" class="innerprice"><?php echo $row->testprice; ?></h2>
			</button>
			<?php
				$i ++;
			endforeach
			;
			?>	
		</section>
		<footer>
			<div id="hometext">
        		<?php echo $this->lang->line('explanation'); ?>
        	</div>
			<a href='<?php echo base_url();?>index.php/beWell/checkOut' id="exit"
				class="butn"></a> <a
				onclick="location.href='<?php echo base_url();?>index.php/beWell/testprogres'"
				id="start" class="butn invis"></a>

		</footer>
	</div>

	<script>
	var p = <?php if ($this->session->userdata('price')==''){echo 0;} else echo $this->session->userdata('price'); log_message('error','price ' . $this->session->userdata('price'));?>;
	var totalprice=0+p;
	var priceInt = new Array;
	var testSelected = ["false","false","false","false"];
	//console.log(totalprice);
	for(i = 1; i <9; i ++){
		var name = "test"+i;

		var priceString = document.getElementById(name).getElementsByClassName("innerprice")[0].innerHTML;
		priceInt[i] = parseInt(priceString);
		
		//alert(princeInt);
		document.getElementById(name).getElementsByClassName("innerprice")[0].innerHTML = priceString + " euro";
		
		
		//Apparently its better practice to use addeventlistener, functionality is the same
		document.getElementById(name).addEventListener("click",	function (event)
		{

			var coords = getCursorPosition(this, event)
			if(coords[0] >220 && coords[1] <60){
				return;
			}
			// this returns the element the click event was fired on
			var element = this;
			//console.log(element);
			var price = element.getElementsByClassName("innerprice")[0];
			//var priceInt = parseInt(element.getElementsByClassName("innerprice")[0].innerHTML.charAt(0));
			//priceInt = 1;
		   
			//testbutton
		    
		    if(element.className == "test"){
		    	//price tag
		    	totalprice=totalprice+priceInt[element.id.charAt(4)];
		    	
				//document.getElementById("hometext").innerHTML="Total price = " + totalprice + " euro.";

				
		    	
			    //for(j=1;j<9;j++) {
			    //	var test = "test"+j;
				 //   if(document.getElementById(test).className == "test testpressed") {
				//		document.getElementById(test).className = "test";
				//		priceInt = parseInt(document.getElementById(test).getElementsByClassName("innerprice")[0].innerHTML.charAt(0));
				//		totalprice=totalprice-priceInt;
				 //   }
			    //}
			    setTest(element.id.charAt(4), -1, 10);
			    testSelected[element.id.charAt(4)] = "true";
			    element.className = element.className + " testpressed";
				
			    price.className = price.className + " godown"+element.id.charAt(4);
			    setTimeout(function(){
			        price.className = "innerprice";
			     }, 1000);
			    setTimeout(function(){
			        document.getElementById("hometext").innerHTML="Total price = " + totalprice + " euro.";
			     }, 800);
			
			    var start = document.getElementById("start");
			    start.className = "butn";
// 				var n = this.id.charAt(4);
// 				switch(n) {
// 				case '1':
//				    document.getElementById("start").onclick = function(){ window.location='<?php echo base_url();?>index.php/beWell/testprogres'};
// 				    break;
// 				case '2':
//				   document.getElementById("start").onclick = function(){ window.location='<?php echo base_url();?>index.php/beWell/weighttest'};
// 				   break;
// 				case '3':
//					document.getElementById("start").onclick = function(){ window.location='<?php echo base_url();?>index.php/beWell/testBlood1'};
// 					break;
// 				case '4':
//					document.getElementById("start").onclick = function(){ window.location='<?php echo base_url();?>index.php/beWell/testBlood2'};
// 					break;
// 				default:
// 				}	
				if(testSelected[3] == "true"){
					document.getElementById("start").onclick = function(){ window.location='<?php echo base_url();?>index.php/beWell/testBlood1'};
					return;
				}else if(testSelected[4] == "true"){
					document.getElementById("start").onclick = function(){ window.location='<?php echo base_url();?>index.php/beWell/testBlood2'};
					return;
				}else if(testSelected[1] == "true"){
				    document.getElementById("start").onclick = function(){ window.location='<?php echo base_url();?>index.php/beWell/testprogres'};
				    return;
				}else{
					document.getElementById("start").onclick = function(){ window.location='<?php echo base_url();?>index.php/beWell/weighttest'};
					return;
				}
		    }
		    else if(element.className == "test testpressed"){
		    	setTest(element.id.charAt(4), 0, 10);
		    	testSelected[element.id.charAt(4)] = "false";
		        element.className = "test";
				totalprice=totalprice-priceInt[element.id.charAt(4)];
		        document.getElementById("hometext").innerHTML="Total price = " + totalprice + " euro.";
		        if(totalprice==0){
		        	var start = document.getElementById("start");
		        	start.className = start.className + " invis";
		        }
		     }
		});
	}

	function getCursorPosition(canvas, event) {
		var x, y;

		var canoffset = $(canvas).offset();
		x = event.clientX + document.body.scrollLeft + document.documentElement.scrollLeft - Math.floor(canoffset.left);
		y = event.clientY + document.body.scrollTop + document.documentElement.scrollTop - Math.floor(canoffset.top) + 1;

		return [x,y];
		}
		
</script>
	<script>
$(document).ready(function(){
	var x = location.search.substr(1);
		//get php values
		<?php
		$arr;
		for($x = 1; $x <= 9; $x ++) {
			$arr [$x] [0] = $this->session->userdata ( 'test' . $x );
			$arr [$x] [1] = $this->session->userdata ( 'test' . $x . 'Max' );
		}
		$JSON_Array = json_encode ( $arr );
		?>
		var jsArray = <?php echo $JSON_Array?>;
		for(i = 1; i <9; i ++){
			var testnr = i;
			var test = "test"+testnr;
			var status = jsArray[i][0];
			var max = jsArray[i][1];;
			if(status>1){
				if (status == max){
						var compl = document.getElementById(test);
						compl.className = "testcompleted modal"+testnr+"fin butn";
						document.getElementById("time"+testnr).innerHTML="";
						document.getElementById("time"+testnr).style.textTransform='uppercase';
						document.getElementById("price"+testnr).innerHTML= "Click to view your results!";
						
				}
				else{
					//console.log(status);
					var compl = document.getElementById(test);
					compl.className = "testcompleted butn";
					document.getElementById("time"+testnr).innerHTML="Unfinished ("+status+"/"+max+")";
					document.getElementById("price"+testnr).innerHTML= "Click to continue the test";
						compl.onclick = function(){ 
							var n = this.id.charAt(4);
							switch(n) {
							case '1':
								window.location='<?php echo base_url();?>'+'index.php/beWell/testprogres?status='+jsArray[n][0];
								break;
							case '2':
								window.location='<?php echo base_url();?>'+'index.php/beWell/weighttest?status='+jsArray[n][0];
								break;
							case '3':
								window.location='<?php echo base_url();?>'+'index.php/beWell/testBlood1?status='+jsArray[n][0];
								break;
							case '4':
								window.location='<?php echo base_url();?>'+'index.php/beWell/testBlood2?status='+jsArray[n][0];
								break;
							default:
							}
						};
				}
			}
	}
	$('.modalhelp').modal_box(
	{
		description: "<?php echo $this->lang->line('help_text_regel1'); ?><br/><?php echo $this->lang->line('help_text_regel2'); ?><?php echo $this->lang->line('help_text_regel3'); ?><br/>",
		title:"<center><?php echo $this->lang->line('help_title'); ?><center>", 
		image: "../../assets/images/popup/info.png"
	});
	$('.modal1').modal_box(
	{
		description: "<?php echo $this->lang->line('test1_regel1'); ?><br><?php echo $this->lang->line('test1_regel2'); ?><br><?php echo $this->lang->line('test1_regel3'); ?><br>",
		title:"<center><?php echo $this->lang->line('test1_title'); ?><center>", 
		image: "../../assets/images/popup/info.png"
	});
	$('.modal1fin').modal_box2(
	{
		description: "<?php echo $this->lang->line('test1_fin_regel1'); ?>: <?php echo $this->session->userdata("resultTest1");?><br/><br/><h2>Previous result of blood pressure:</h2><table class='tbl'cellspacing='5'><tr><th>Date</th><th>Result</th></tr><?php  foreach ( $test1 as $row ) :echo "<tr><td>" . $row->date . "</td><td>" . $row->result ."</td></tr>";?> <?php endforeach; $this->session->unset_userdata('test_id');?></table><br><?php echo $this->lang->line('test1_fin_regel2'); ?><br><?php echo $this->lang->line('test1_fin_regel3'); ?><br>",
		title:"<center><?php echo $this->lang->line('test1_fin_title'); ?><center>"
	});
	$('.modal2').modal_box(
	{
		description: "<?php echo $this->lang->line('test2_regel1'); ?><br><?php echo $this->lang->line('test2_regel2'); ?><br><?php echo $this->lang->line('test2_regel3'); ?><br>",
		title:"<center><?php echo $this->lang->line('test2_title'); ?><center>", 
		image: "../../assets/images/popup/info.png"
	});
	$('.modal2fin').modal_box2(
	{
		description: "<?php echo $this->lang->line('test2_fin_regel1'); ?>: <?php echo $this->session->userdata("resultTest2");?><br/><br/><h2>Previous result of Wieght:</h2><table class='tbl' cellspacing='5'><tr><th>Date</th><th>Result</th></tr><?php  foreach ( $test2 as $row ) :echo "<tr><td>" . $row->date . "</td><td>" . $row->result ."</td></tr>";?> <?php endforeach; $this->session->unset_userdata('test_id');?></table><br><?php echo $this->lang->line('test2_fin_regel2'); ?><br><?php echo $this->lang->line('test2_fin_regel3'); ?><br>",
		title:"<center><?php echo $this->lang->line('test2_fin_title'); ?><center>"
			});
	$('.modal3').modal_box(
	{
		description: "<?php echo $this->lang->line('test3_regel1'); ?><br><?php echo $this->lang->line('test3_regel2'); ?><br><?php echo $this->lang->line('test3_regel3'); ?><br>",
		title:"<center><?php echo $this->lang->line('test3_title'); ?><center>", 
		image: "../../assets/images/popup/info.png"});
	$('.modal3fin').modal_box2(
	{
		description: "<?php echo $this->lang->line('test3_fin_regel1'); ?>: <?php echo $this->session->userdata("resultTest3");?><br/><br/><h2>Previous result of Glycated Hemoglobin:</h2><table class='tbl' cellspacing='5'><tr><th>Date</th><th>Result</th></tr><?php  foreach ( $test3 as $row ) :echo "<tr><td>" . $row->date . "</td><td>" . $row->result ."</td></tr>";?> <?php endforeach; $this->session->unset_userdata('test_id');?></table><br><?php echo $this->lang->line('test3_fin_regel2'); ?><br><?php echo $this->lang->line('test3_fin_regel3'); ?><br>",
		title:"<center><?php echo $this->lang->line('test3_fin_title'); ?><center>"
	});
	$('.modal4').modal_box(
	{
		description: "<?php echo $this->lang->line('test4_regel1'); ?><br><?php echo $this->lang->line('test4_regel2'); ?><br><?php echo $this->lang->line('test4_regel3'); ?><br>",
		title:"<center><?php echo $this->lang->line('test4_title'); ?><center>", 
		image: "../../assets/images/popup/info.png"
	});
	$('.modal4fin').modal_box2(
	{
		description: "<?php echo $this->lang->line('test4_fin_regel1'); ?>: <?php echo $this->session->userdata("resultTest4");?><br/><br/><h2>Previous result of Lipides:</h2><table class='tbl' cellspacing='5'><tr><th>Date</th><th>Result</th></tr><?php if($test4 != NULL) { foreach ( $test4 as $row ) :echo "<tr><td>" . $row->date . "</td><td>" . $row->result ."</td></tr>";?> <?php endforeach;}  $this->session->unset_userdata('test_id');?></table><br><?php echo $this->lang->line('test4_fin_regel2');?><br><?php echo $this->lang->line('test4_fin_regel3'); ?><br>",
		title:"<center><?php echo $this->lang->line('test4_fin_title'); ?><center>"
	});
});
</script>
</body>
</html>