<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
class Test extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all()
	{
		return ('This is your first application');
	}
}
/* End of file '/Test.php' */
/* Location: ./application/models//Test.php */