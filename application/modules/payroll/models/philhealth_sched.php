<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Philhealth_sched extends DataMapper{

	var $table  = 'payroll_philhealth_schedules';
	
	//var $has_many = array('deductions_information');
	
	// --------------------------------------------------------------------
	
	
	function __construct()
	{
		parent::__construct();
		
		//$this->load->helper('security');
	}
	
	// --------------------------------------------------------------------
	
}

/* End of file user.php */
/* Location: ./application/models/pages.php */