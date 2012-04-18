<?php
class Randomrecipes extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

     function get_random_recipes($recipeid)
    {
    	$this->load->database();

      $this->db->select("a.id,a.imgtitle,a.imgfilename,b.title,a.catid");
        $this->db->from('jos_garyscookbook AS a');
	$this->db->join('jos_categories AS b','a.catid=b.id');
        $var="(a.id='$recipeid')";
		$this->db->where($var);
        $query= $this->db->get();

     //$total = $this->db->count_all_results(); //Without this it works perfectly




        return $query->result();

    }

	 function get_recipes($catid,$key)
    {
    	$this->load->database();
	//$this->db->_compile_select(); 
      $this->db->select("a.id,a.catid,a.imgtitle,a.imgfilename,a.imgtext,a.expic1,a.expic2,a.expic3,a.expic4,a.expic5,a.expic6,a.expic7,a.expic8,a.expic1_tn,a.expic2_tn,a.expic3_tn,a.expic4_tn,
	a.expic5_tn,a.expic6_tn,a.expic7_tn,a.expic8_tn,b.title");
        $this->db->from('jos_garyscookbook AS a');
	$this->db->join('jos_categories AS b','a.catid=b.id');
        //$var="(a.catid='$catid')";
		$var="(a.catid='$catid') AND (a.expic1_tn  LIKE '%$key%' OR a.expic2_tn  LIKE '%$key%' OR a.expic3_tn  LIKE '%$key%' OR
		a.expic4_tn  LIKE '%$key%' OR a.expic5_tn  LIKE '%$key%' OR a.expic6_tn  LIKE '%$key%' OR a.expic7_tn  LIKE '%$key%' OR
		a.expic8_tn  LIKE '%$key%' OR a.imgtitle LIKE '%$key%' OR a.imgtext LIKE '%$key%')";
		
		$this->db->where($var);
        $query= $this->db->get();
	//$a=$this->db->last_query(); 
	//echo $a;exit();
     //$total = $this->db->count_all_results(); //Without this it works perfectly

//var_dump($query->result());exit();


        return $query->result();

    }
}
?>
