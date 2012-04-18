<?php
class Recipes extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

     function get_recipe_id($cat_id)
    {
    	$this->load->database();
        //$query = $this->db->query("SELECT * FROM jos_categories");
       // var_dump($query);
       // $cat=$this->db->get();
      // var_dump($cat_id);
        $this->db->select("id,imgtitle");
        $this->db->from('jos_garyscookbook');
		$this->db->where('catid',$cat_id);
		$this->db->order_by("alias","ASC");
        //$total = $this->db->count_all_results(); //Without this it works perfectly

        $query = $this->db->get();
       // var_dump($query);
        return $query->result();

    }
}
?>
