<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_us extends CI_Controller {

	public $user_id ='';
	public $user_name ='';
	public $loggedInData ='';
	
	function __construct()
	{
    	parent::__construct();
	}

	public function index()
	{
		//$this->load->view('view_contact_us');
	}
}