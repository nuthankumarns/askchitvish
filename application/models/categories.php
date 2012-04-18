<?php
class Categories extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

     function get_category_id()
    {
    	$this->load->database();
        //$query = $this->db->query("SELECT * FROM jos_categories");
       // var_dump($query);
       // $cat=$this->db->get();
       // var_dump($cat);
      //  $this->db->select("id,title");
     //   $this->db->from('jos_categories');
		$this->db->select("jos_garyscookbook.catid,jos_categories.title,COUNT(catid) AS recipe_count");
        $this->db->from('jos_categories');
        $this->db->join('jos_garyscookbook', 'jos_categories.id= jos_garyscookbook.catid GROUP BY catid ORDER BY title ASC');

        //$var="(jos_garyscookbook.catid='$catid') AND (jos_garyscookbook.imgtitle LIKE '%$key%')";
		//$this->db->where($var);
        //$total = $this->db->count_all_results(); //Without this it works perfectly

        $query = $this->db->get();
       // var_dump($query);
       // print_r($query->result());
      return $query->result();
		/*SELECT a.catid, b.id, b.title, count( catid )
FROM jos_garyscookbook AS a
LEFT JOIN jos_categories AS b ON a.catid = b.id
GROUP BY catid
ORDER BY b.title ASC*/
        //$total = $this->db->count_all_results(); //Without this it works perfectly

        $query = $this->db->get();
       // var_dump($query);
        return $query->result();

    }
}
?>
