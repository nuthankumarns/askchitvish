<?php
class Imeicheck extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

	function get_imeicheck($imei)
	{
	$this->load->database();

	$this->db->select("DATEDIFF( CURDATE( ) , registration ) AS reg_diff");
	$this->db->from("jos_imei");

	$var="(imei='$imei')";
	$this->db->where($var);
	
	$query = $this->db->get();
	
	//var_dump($query);
	/*SELECT DATEDIFF( CURDATE( ) , registration ) AS intval
	FROM jos_imei
	WHERE id = '1'*/
	$cnt = $query->num_rows();
	
	switch($cnt){
	case'0':
	$data = array('imei' => $imei);
	$this->db->insert('jos_imei', $data); 
	$effect=$this->db->affected_rows();
	return $effect;
	break;
	case'1':
//var_dump($query->result());
		return $query->result();
	break;
	

	}
	

	


	}



}
