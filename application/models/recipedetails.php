<?php
class Recipedetails extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

     function get_recipe_details($recipeid)
    {
    	$this->load->database();
        $this->db->select("id,imgtitle,imgtext,imgfilename,ingredients,properties,notes,expic1,expic1_tn,expic2,expic2_tn,expic3,expic3_tn,expic4,expic4_tn,expic5,expic5_tn,expic6,expic6_tn,expic7,expic7_tn,expic8,expic8_tn");
        $this->db->from('jos_garyscookbook');
        $var="(jos_garyscookbook.id='$recipeid')";
		$this->db->where($var);
        $query = $this->db->get();

		$this->db->set('imgvotes', 'imgvotes + 1', FALSE);


	$this->db->where('id', $recipeid);
	$this->db->update('jos_garyscookbook'); 

//var_dump($query->result());
      return $query->result();


    }
}
?>
