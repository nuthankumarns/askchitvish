<?php
class Search extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

     function get_search_results($catid,$key)
    {
    	$this->load->database();
        //$query = $this->db->query("SELECT * FROM jos_categories");
       // var_dump($query);
       // $cat=$this->db->get();
       // var_dump($cat);
        //$this->db->select("jos_garyscookbook.imgtitle,jos_garyscookbook.imgtext,jos_garyscookbook.id,jos_categories.title,jos_categories.id AS catid,jos_garyscookbook.expic1_tn,jos_garyscookbook.expic2_tn,jos_garyscookbook.expic3_tn,jos_garyscookbook.expic4_tn,jos_garyscookbook.expic5_tn,jos_garyscookbook.expic6_tn,jos_garyscookbook.expic7_tn,jos_garyscookbook.expic8_tn");
       $this->db->select("jos_garyscookbook.imgtitle,jos_garyscookbook.imgtext,jos_garyscookbook.id,jos_categories.title,jos_categories.id AS catid");
 	$this->db->from('jos_garyscookbook');
        $this->db->join('jos_categories', 'jos_categories.id= jos_garyscookbook.catid');
		/*if($catid<0)
		{
		$var="(jos_garyscookbook.imgtext  LIKE '%$key%' OR jos_garyscookbook.expic1_tn  LIKE '%$key%' OR jos_garyscookbook.expic2_tn  LIKE '%$key%' OR jos_garyscookbook.expic3_tn  LIKE '%$key%' OR
		jos_garyscookbook.expic4_tn  LIKE '%$key%' OR jos_garyscookbook.expic5_tn  LIKE '%$key%' OR jos_garyscookbook.expic6_tn  LIKE '%$key%' OR jos_garyscookbook.expic7_tn  LIKE '%$key%' OR
		jos_garyscookbook.expic8_tn  LIKE '%$key%' OR jos_garyscookbook.imgtitle LIKE '%$key%')";
		}
		else
		{
       		$var="(jos_garyscookbook.catid='$catid') AND (jos_garyscookbook.expic1_tn  LIKE '%$key%' OR jos_garyscookbook.expic2_tn  LIKE '%$key%' OR jos_garyscookbook.expic3_tn  LIKE '%$key%' OR
		jos_garyscookbook.expic4_tn  LIKE '%$key%' OR jos_garyscookbook.expic5_tn  LIKE '%$key%' OR jos_garyscookbook.expic6_tn  LIKE '%$key%' OR jos_garyscookbook.expic7_tn  LIKE '%$key%' OR
		jos_garyscookbook.expic8_tn  LIKE '%$key%' OR jos_garyscookbook.imgtitle LIKE '%$key%' OR jos_garyscookbook.imgtext  LIKE '%$key%')";
		}*/
		if($catid<0)
		{
		$var="(jos_garyscookbook.imgtext  LIKE '%$key%' OR jos_garyscookbook.imgtitle LIKE '%$key%')";
		}
		else
		{
       		$var="(jos_garyscookbook.catid='$catid') AND (jos_garyscookbook.imgtitle LIKE '%$key%' OR jos_garyscookbook.imgtext  LIKE '%$key%')";
		}
		$this->db->where($var);
        //$total = $this->db->count_all_results(); //Without this it works perfectly

        $query = $this->db->get();
       // var_dump($query);
       // print_r($query->result());
      return $query->result();
        //echo count($array);

       // echo json_encode($dataDB);
     //   return $dataDB;


    }
}
?>
