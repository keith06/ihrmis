<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Integrated Human Resource Management Information System
 *
 * An Application Software use by Government agencies for management
 * of employees Attendance, Leave Administration, Payroll, Personnel
 * Training, Service Records, Performance, Recruitment and more...
 *
 * @package		iHRMIS
 * @author		Manolito Isles
 * @copyright	Copyright (c) 2008 - 2012, Charliesoft
 * @license		http://charliesoft.net/hrmis/user_guide/license.html
 * @link		http://charliesoft.net
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * iHRMIS Conversion Table Class
 *
 * This class use for converting number of minutes late
 * to the corresponding equivalent to leave credits.
 *
 * @package		iHRMIS
 * @subpackage	Models
 * @category	Models
 * @author		Manolito Isles
 * @link		http://charliesoft.net/hrmis/user_guide/models/conversion_table.html
 */
class Ajax extends MX_Controller {

	// --------------------------------------------------------------------
	
	function __construct()
    {
        parent::__construct();
		
		header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
		//$this->output->enable_profiler(TRUE);
    }  
	
	// --------------------------------------------------------------------
	
	function edit_place($mode = '')
	{
		
		if ($mode == 'tax_exempt')
		{
			$e = new Employee_m();
		
			$e->where('id', $this->input->post('rowid'));
			
			$e->get();
			
			if ( $this->input->post('colid') == 'tax_status' )
			{
				$e->tax_status = $this->input->post('new');
			}
			if ( $this->input->post('colid') == 'dependents' )
			{
				$e->dependents = $this->input->post('new');
			}
			
			$e->save();
			
			exit;
		}
		
	}
	
	// --------------------------------------------------------------------
	
	function tax($office_id = '')
	{
		//echo 'ee';
		$data 			= array();
		
		
		$this->Employee->fields = array(
                                'id',
                                'employee_id',
                                'office_id',
                                'lname',
                                'fname',
                                'mname',
								'tax_status',
								'dependents',
                                );
        
		$data['rows'] = $this->Employee->get_employee_list($this->session->userdata('office_id'), '');
		
		if ($office_id != '')
		{
			$data['rows'] = $this->Employee->get_employee_list($office_id, '');
		}
		
		// Lets get the personal additional exemption
		$p = new Pae();
		
		$data['options'] = $p->options();
		
		$this->load->view('ajax/tax', $data);
	}
	
	// --------------------------------------------------------------------
	
}	