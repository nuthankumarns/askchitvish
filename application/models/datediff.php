<?php
class Datediff extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

	function difference()
	{
	$this->load->database();

	$query =$this->db->query("SELECT a.catid,a.imgtitle,a.id,FROM_UNIXTIME(a.imgdate) AS upload_date,b.title FROM  jos_garyscookbook 
	AS a LEFT JOIN jos_categories AS b ON a.catid=b.id WHERE a.imgdate BETWEEN UNIX_TIMESTAMP( NOW( ) ) -2592000
AND UNIX_TIMESTAMP( NOW( ) ) ORDER BY a.imgdate DESC");
	
	return $query->result();
	

	}
	
	}
	

	
