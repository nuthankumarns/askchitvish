<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Link extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		//$this->load->helper('url');
		$this->load->view('url');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
