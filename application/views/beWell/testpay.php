<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8" />
<title>TestPay</title>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/css/testpay.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/css/Main.css" media="screen"  />
</head>
<body>
    <div id="wrapper">
        <header>
            
        </header>
        <div id="content-wrapper">
            <section>
            	<h1>Payment</h1>
                <p>Summary of taken tests:</p>
                <table id="table">
                	<tr>
                		<td>Blood preasure</td>
                		<td> 0.5 euro</td>
                	</tr>
                	<tr>
                		<td>Cholesterol test</td>
                		<td>0.9 euro</td>	
                	</tr>
                	<tr>
                		<td>Totaal</td>
                		<td>1.4 euro</td>	
                	</tr>
                </table>
          		<p>Please follow the instructions on the payment terminal!</p>
            </section>
            <aside>
				<p><a href="english.html" target="_parent"><button class="btn" type="submit"> <img src="<?=base_url();?>/assets/images/visa.gif" width="60" height="60"></button></a></p>
				<br />
				<p><a href="deutsch.html" target="_parent"><button class="btn" type="submit"> <img src="<?=base_url();?>/assets/images/mastercard.gif" width="60" height="60"></button></a></p>
				<br />
				<p><a href="english.html" target="_parent"><button class="btn" type="submit"> <img src="<?=base_url();?>/assets/images/bancontact.jpeg" width="60" height="60"></button></a></p>
				<br />
				<p><a href="deutsch.html" target="_parent"><button class="btn" type="submit"> <img src="<?=base_url();?>/assets/images/paypal.jpg" width="60" height="60"></button></a></p>    
            </aside>
            <!-- div style="clear: both; height: 1px"></div-->
        </div>
        <footer><p>Copyright © 2014 BeWell. All Rights Reserved.  <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a></p></footer>
    </div>
    
    <script> 

$('.modalhelp').modal_box({description: "<?php echo $this->lang->line('help_text_regel1'); ?><br><?php echo $this->lang->line('help_text_regel2'); ?><br><?php echo $this->lang->line('help_text_regel3'); ?><br>",title:"<center><?php echo $this->lang->line('help_title'); ?><center>", image: "../../assets/images/popup/info.png"});
</script>
</body>
</html>