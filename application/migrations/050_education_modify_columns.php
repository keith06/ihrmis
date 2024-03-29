<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_education_modify_columns extends CI_Migration {
	
	function up() 
	{	
		
		$fields = array(
                        'highest_grade' => array(
                                                         'name' => 'highest_grade',
                                                         'type' => 'VARCHAR (64) NOT NULL',
                                                ),
		);
		
		$this->dbforge->modify_column('pds_education_background', $fields);

	}

	function down() 
	{
		
		$fields = array(
                        'highest_grade' => array(
                                                         'name' => 'highest_grade',
                                                         'type' => 'VARCHAR (5) NOT NULL',
                                                ),
		);
		
		$this->dbforge->modify_column('pds_education_background', $fields);
		
	}
}
