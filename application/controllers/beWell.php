<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class BeWell extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->helper ( 'url' );
		$this->load->library ( 'session' );
	}
	
	/**
	 * this method user to load welcome page view
	 * welcome view loaded by welcome controller which clear and destroy the session data
	 */
	public function welcome() {
		$this->load->view ( 'beWell/welcome' );
	}
	
	/**
	 * this method user to load the home page and pe-query some need data
	 * such as all test, all previous test result.
	 * Also check wheather the user is login via create new account or
	 * login with existing account.
	 */
	public function homePage() {
		$this->lang->load ( 'home', $this->session->userdata ( 'lang' ) );
		$this->load->model ( 'bewell_model' );
		// check to see wheather it is automatic login after create account otherwise perform as login with username and password
		if ($this->session->userdata ( 'createAcc' ) == true) {
			$user = $this->bewell_model->getUser ( $this->session->userdata ( 'user_id' ) );
			$email = $this->bewell_model->getEmail ( $this->session->userdata ( 'user_id' ) );
			$this->session->set_userdata ( 'user', $user );
			$this->session->set_userdata ( 'email', $email );
		}
		$data ['query'] = $this->bewell_model->getAllTest ();
		$data ['test1'] = $this->bewell_model->getPreviousResults ( $this->session->userdata ( 'user_id' ), 1 );
		$data ['test2'] = $this->bewell_model->getPreviousResults ( $this->session->userdata ( 'user_id' ), 2 );
		$data ['test3'] = $this->bewell_model->getPreviousResults ( $this->session->userdata ( 'user_id' ), 3 );
		$data ['test4'] = $this->bewell_model->getPreviousResults ( $this->session->userdata ( 'user_id' ), 4 );
		$this->load->view ( 'beWell/homePage', $data );
	}
	
	/**
	 * this method use to load the read card view.
	 */
	public function cardRead() {
		$this->lang->load ( 'cardRead', $this->session->userdata ( 'lang' ) );
		$this->load->view ( 'beWell/cardRead' );
	}
	/**
	 * this method use to load the payment for test view
	 */
	public function testpay() {
		$this->lang->load ( 'testpay', $this->session->userdata ( 'lang' ) );
		$this->load->view ( 'beWell/testpay' );
	}
	
	/**
	 * this method use to load the the card loading view.
	 */
	public function cardload() {
		$this->lang->load ( 'cardload', $this->session->userdata ( 'lang' ) );
		$this->load->view ( 'beWell/cardLoad' );
	}
	
	/**
	 * this method use to load the accept term view
	 */
	public function acceptterms() {
		$this->lang->load ( 'acceptterms', $this->session->userdata ( 'lang' ) );
		$this->load->view ( 'beWell/acceptTerms' );
	}
	
	/**
	 * this method use to load the good bye view.
	 */
	public function goodbye() {
		$this->lang->load ( 'goodbye', $this->session->userdata ( 'lang' ) );
		$this->load->view ( 'beWell/goodbye' );
	}
	/**
	 * this method use to load the help info view.
	 */
	public function helpInfo() {
		$this->lang->load ( 'helpInfo', $this->session->userdata ( 'lang' ) );
		$this->load->view ( 'beWell/helpInfo' );
	}
	
	/**
	 * this method use to laod the blood pressure test view.
	 */
	public function testprogres() {
		$this->lang->load ( 'bloodpressuretest', $this->session->userdata ( 'lang' ) );
		$object['controller']=$this;
		$this->load->view ( 'beWell/bloodpressuretestprogress',$object );
	}
	
	/**
	 * this method use to load the weight test view.
	 */
	public function weighttest() {
		$this->lang->load ( 'weighttest', $this->session->userdata ( 'lang' ) );
		$this->load->view ( 'beWell/weighttest' );
	}
	
	/**
	 * this method use to load Glycated Hemoglobin test view.
	 */
	public function testBlood1() {
		$this->lang->load ( 'bloodtest1', $this->session->userdata ( 'lang' ) );
		$this->load->view ( 'beWell/testBlood1' );
	}
	
	/**
	 * this method use to load Lipides view.
	 */
	public function testBlood2() {
		$this->lang->load ( 'bloodtest2', $this->session->userdata ( 'lang' ) );
		$this->load->view ( 'beWell/testBlood2' );
	}
	public function checkOut() {
		$this->lang->load ( 'checkout', $this->session->userdata ( 'lang' ) );
		$this->load->view ( 'beWell/checkOut' );
	}
	
	/**
	 * this method use to load the a page option to select to enter the system.
	 * It provides three option
	 * one is by using eCard, login with username and password, and create a new account.
	 */
	public function loginOption() {
		$this->lang->load ( 'loginOption', $this->session->userdata ( 'lang' ) );
		$this->load->view ( 'beWell/loginOption' );
	}
	
	/**
	 *
	 * @param string $msg
	 *        	the error message in case the user and password are not exist in the database
	 *        	this method use to laod the login view then when the user click start button with type submit it will
	 *        	direct to call method process() in the bewell controller to process the input username and password to
	 *        	check it exist in the database or not by calling method validate in bewell_model.
	 */
	public function login($msg = NULL) {
		// Load our view to be displayed
		// to the user
		$this->lang->load ( 'login', $this->session->userdata ( 'lang' ) );
		$data ['msg'] = $msg;
		$this->load->view ( 'beWell/login_view', $data );
	}
	
	/**
	 * this method user to check the valid username and password to login into the system.
	 * if login infos are correctly it will redirect to home page view.
	 */
	public function process() {
		// Load the model
		$this->load->model ( 'bewell_model' );
		// Validate the user can login
		$result = $this->bewell_model->validate ();
		// Now we verify the result
		if (! $result) {
			// If user did not validate, then show them login page again
			$msg = '<font color=red>Invalid username and/or password.</font><br />';
			$this->login ( $msg );
		} else {
			// If user did validate,
			// Send them to home page
			redirect ( 'beWell/homePage' );
		}
	}
	public function setLang() {
		$l = $this->input->get ( 'language', TRUE );
		$this->config->set_item ( 'language', $l );
		$this->session->set_userdata ( 'lang', $l );
		// log_message ( 'error', $this->session->userdata ( 'lang' ) );
	}
	public function setTest() {
		$name = $this->input->get ( 'test', TRUE );
		$currStep = $this->input->get ( 'progress', TRUE );
		$maxStep = $this->input->get ( 'max', TRUE );
		$oldprice = $this->session->userdata ( 'price' );
		$newprice = 0;
		if ($currStep == $maxStep) {
			if ($this->session->userdata ( $name ) == 0) {
				switch ($name) {
					case 1 :
						$newprice = 5;
						break;
					case 2 :
						$newprice = 2;
						break;
				}
			}
		}
		$this->session->set_userdata ( 'price', $oldprice + $newprice );
		$this->session->set_userdata ( 'test' . $name, $currStep );
		$this->session->set_userdata ( 'test' . $name . 'Max', $maxStep );
		log_message ( 'error', 'testname : ' . $name . ' current step : ' . $this->session->userdata ( 'test' . $name ) );
	}
	/**
	 * this method is user to set the result of our test into the session
	 */
	public function setEmail() {
		$con = $this->input->POST ( 'content', TRUE );
		$this->config->set_item ( 'content', $con );
		$this->session->set_userdata ( 'content', $con );
		log_message ( 'error', $this->session->userdata ( 'content' ) );
	}
	
	/**
	 *
	 * @param string $msg
	 *        	the error message when the username already in the database.
	 *        	this method use to create new account to login into the system.This method will load the create
	 *        	account view and when we submit the create account button form will submit and then the method
	 *        	createProcess will be called.
	 */
	public function createAccount($msg = NULL) {
		// Load our view to be displayed
		// to the user
		$this->lang->load ( 'login', $this->session->userdata ( 'lang' ) );
		$data ['msg'] = $msg;
		$this->load->view ( 'beWell/createAcc', $data );
	}
	
	/**
	 * this method use to process some method in the bewell_model such as check the username before insert.
	 * and also check the matching between passwork and confirmation before insert as well.
	 */
	public function createProcess() {
		$this->load->model ( 'bewell_model' );
		// check if the user is unique
		if ($this->bewell_model->checkExistUsername ()) {
			$msg = '<font color=#FF0000>Username already exists. Choose another one.</font><br />';
			$this->createAccount ( $msg );
		} else if (! $this->bewell_model->checkMatchPassword ()) {
			$msg = '<font color=#FF0000>Passwords did not match, try again.</font><br />';
			$this->createAccount ( $msg );
		} else if ($this->bewell_model->checkEmail ()) {
			$msg = '<font color=#FF0000>Invalid email address, try again.</font><br />';
			$this->createAccount ( $msg );
		} else {
			$row = $this->bewell_model->insertValues ();
			if ($row >= 1) {
				$this->load->view ( 'beWell/accountpopup' );
			}
		}
	}
	
	/**
	 * this method use to load send email view in order to send our result to our mail box or send to
	 * another one that we want.
	 * we also use this view to make an appointment with dr as well.
	 */
	public function send() {
		$this->load->view ( 'beWell/sendMail' );
		// echo "Data send by :" . $this->session->userdata ( 'content' );
		if (isset ( $_POST ['send'] )) {
			$config = Array (
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => 'bewell.point@gmail.com',
					'smtp_pass' => 'BeWell123',
					'mailtype' => 'html',
					'charset' => 'iso-8859-1',
					'wordwrap' => TRUE 
			);
			$message = '<h3> The Test Result:</h3><br/>' . $this->session->userdata ( 'content' ) . '<h3>Free Message</h3>' . $_POST ['msg'];
			$this->load->library ( 'email', $config );
			$this->email->set_newline ( "\r\n" );
			$this->email->from ( $_POST ['from'], 'BeWell' );
			$this->email->to ( $_POST ['to'], 'BeWell' );
			$this->email->subject ( $_POST ['subject'] );
			$this->email->message ( $message );
			if ($this->email->send ()) {
				$this->load->view ( 'beWell/mailpopup' );
			} else {
				show_error ( $this->email->print_debugger () );
			}
		}
	}
	public function javaToPHP() {
		$result = $this->input->get ( 'result', TRUE );
		$test = $this->input->get ( 'test', TRUE );
		$this->session->set_userdata ( 'resultTest' . $test, $result );
	}
	public function saveResult() {
		// Load the model
		$this->load->model ( 'Bewell_model' );
		// Validate the user can login
		$result = $this->Bewell_model->save ( 1, $this->session->userdata ( 'user_id' ), date ( 'Y-m-d H:i:s' ), "Bad Result: 1122" );
	}
	public function saveResults() {
		$testid = $this->input->get ( 'id', TRUE );
		$results = $this->input->get ( 'results', TRUE );
		$this->load->model ( 'Bewell_model' );
		$result = $this->Bewell_model->save ( $testid, $this->session->userdata ( 'user_id' ), date ( 'Y-m-d H:i:s' ), $results );
	}
}