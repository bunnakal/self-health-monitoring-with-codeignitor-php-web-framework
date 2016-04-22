<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Bewell_model extends CI_Model {
	function __construct() {
		parent::__construct ();
		$this->load->library ( 'session' );
	}
	
	/**
	 *
	 * @return boolean the flag to indicate weather the user input the correct username and password or not?
	 *         Check to see wheather the given user name and password exist in database or not
	 *         if already exist it will return true; otherwise it return false
	 */
	public function validate() {
		// grab user input
		$username = $this->security->xss_clean ( $this->input->post ( 'username' ) );
		$password = $this->security->xss_clean ( $this->input->post ( 'password' ) );
		
		// Prep the query
		$this->db->where ( 'username', $username );
		$this->db->where ( 'password', $password );
		
		// Run the query
		$query = $this->db->get ( 'credentials' );
		
		// Let's check if there are any results
		if ($query->num_rows == 1) {
			// If there is a user, then create session data
			$row = $query->row ();
			
			// get the user with a gievn user_id
			$user = $this->getUser ( $row->user_id );
			// get the user email with a given user_id
			$email = $this->getEmail ( $row->user_id );
			
			$data = array (
					'id' => $row->id,
					'user_id' => $row->user_id,
					'user' => $user,
					'email' => $email,
					'validated' => true 
			);
			$this->session->set_userdata ( $data );
			return true;
		}
		// If the previous process did not validate
		// then return false.
		return false;
	}
	
	/**
	 *
	 * @param int $userId
	 *        	user_id
	 * @return the first name of the user corresponding to user_id
	 */
	public function getUser($userId) {
		// Prep the query
		$this->db->where ( 'id', $userId );
		
		// Run the query
		$query = $this->db->get ( 'users' );
		$row = $query->row ();
		$user = $row->firstname;
		
		return $user;
	}
	
	/**
	 *
	 * @param int $userId
	 *        	user_id use to query email address
	 * @return the email address corresponding to user_id
	 */
	public function getEmail($userId) {
		// Prep the query
		$this->db->where ( 'id', $userId );
		
		// Run the query
		$query = $this->db->get ( 'users' );
		$row = $query->row ();
		$email = $row->email;
		
		return $email;
	}
	
	/**
	 *
	 * @return all test available in the BeWell both avialable and unavailable
	 *         it return all records in the table tests
	 */
	public function getAllTest() {
		// $query = $this->db->select('*')->from('tests')->get();
		$query = $this->db->select ( array (
				'id',
				'testname',
				'testduration',
				'testprice',
				'status' 
		) )->get ( 'tests' );
		$result = $query->result ();
		return $result;
	}
	
	/**
	 *
	 * @param int $user_id
	 *        	user_id use as filter
	 * @param string $test_id
	 *        	test_id use as fiter
	 * @return the previous result of the the current test_id within this user_id limited only 3 current test rows
	 */
	public function getPreviousResults($user_id, $test_id = NULL) {
		$this->db->select ( 'date, result' );
		$this->db->from ( 'testrecords' );
		if ($test_id == NULL)
			$this->db->where ( array (
					'user_id' => $user_id 
			) );
		else
			$this->db->where ( array (
					'user_id' => $user_id,
					'test_id' => $test_id 
			) );
		$this->db->order_by ( "date", "desc" );
		$this->db->limit ( 3 );
		$query = $this->db->get ();
		$result = $query->result ();
		return $result;
	}
	/**
	 *
	 * @param int $testId
	 *        	test_id
	 * @param int $userId
	 *        	user_id
	 * @param date $date
	 *        	test date
	 * @param string $result
	 *        	the result of each test
	 *        	this function use to insert the result into the database
	 */
	public function save($testId, $userId, $date, $result) {
		try {
			
			$this->db->set ( 'test_id', $testId );
			$this->db->set ( 'user_id', $userId );
			$this->db->set ( 'date', $date );
			$this->db->set ( 'result', $result );
			
			$this->db->insert ( 'testrecords' );
		} catch ( Exception $e ) {
			echo $e->getMessage ();
		}
	}
	/**
	 *
	 * @return boolean indicate the flag to check wheather the username already exist one.
	 *         true it mean already exist otherwise return false.
	 */
	public function checkExistUsername() {
		$username = $this->input->post ( 'username' );
		$this->db->where ( 'username', $username );
		$query = $this->db->get ( 'credentials' );
		if ($query->num_rows () == 1)
			return true;
		return false;
	}
	
	/**
	 *
	 * @return boolean indicate flag to check wheather the password and confirm password are match.
	 *         if mathch it return true otherwise return false.
	 */
	public function checkMatchPassword() {
		$password = $this->input->post ( 'password' );
		$confirm = $this->input->post ( 'confirm' );
		if (strcmp ( $password, $confirm ) == 0)
			return true;
		return false;
	}
	/**
	 *
	 * @return boolean indicate flag to check wheather the email address is correct format or not.
	 *         if input the incorrect email format it will be returned true otherwise it return false.
	 */
	public function checkEmail() {
		$error = false;
		// check if e-mail address is well-formed
		if (! filter_var ( $this->input->post ( 'email' ), FILTER_VALIDATE_EMAIL )) {
			$error = true;
		}
		return $error;
	}
	/**
	 * user to save the news user infomation to database.
	 * at the sametime we have to save the data into
	 * two separet table. save into table users and credentials.
	 */
	public function insertValues() {
		$username = $this->input->post ( 'username' );
		$firstname = $this->input->post ( 'firstname' );
		$lastname = $this->input->post ( 'lastname' );
		$email = $this->input->post ( 'email' );
		$password = $this->input->post ( 'password' );
		
		$this->db->set ( 'firstname', $firstname );
		$this->db->set ( 'lastname', $lastname );
		$this->db->set ( 'email', $email );
		$this->db->set ( 'privilage', "user" );
		$this->db->insert ( 'users' );
		
		$this->db->select_max ( 'id' );
		$query = $this->db->get ( 'users' );
		$user_id = $query->row ()->id;
		// put the user_id into session and set create accout flag to true
		$this->session->set_userdata ( 'user_id', $user_id );
		$this->session->set_userdata ( 'createAcc', true );
		$this->db->set ( 'username', $username );
		$this->db->set ( 'password', $password );
		$this->db->set ( 'user_id', $user_id );
		$this->db->insert ( 'credentials' );
		return $this->db->affected_rows ();
	}
}
?>