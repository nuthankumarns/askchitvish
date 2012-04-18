<?php
class Popularity extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

     function get_popular_recipes()
    {
    	$this->load->database();
        //$query = $this->db->query("SELECT * FROM jos_categories");
       // var_dump($query);
       // $cat=$this->db->get();
      // var_dump($cat_id);
        $this->db->select("a.catid,a.id,a.imgvotes,a.imgtitle,b.title");
        $this->db->from('jos_garyscookbook AS a');
	$this->db->join('jos_categories AS b','a.catid=b.id');
		$this->db->order_by("imgvotes","DESC"); // Order by
		$this->db->limit(20); // Limit, 15 entries
        //$total = $this->db->count_all_results(); //Without this it works perfectly

        $query = $this->db->get();
       // var_dump($query);
        return $query->result();

    }
}
?>
