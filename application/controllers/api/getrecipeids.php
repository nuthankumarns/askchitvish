<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class getRecipeIds extends REST_Controller
{
	var $recipe_ids;
	var $users;
	function recipe_get()
    {
    	 if(!$this->get('catid'))
        {
        	$this->response(NULL, 400);
        }
        	$cat_id=$this->get('catid');
		//var_dump($cat_id);
		//exit();
        //$users = $this->some_model->getSomething( $this->get('limit') );
        $this->load->model('recipes');
        $dataDB['Result']['Data']['recipe_details']= $this->recipes->get_recipe_id($cat_id);
        //$users=$this->load->model('categories');
        //var_dump($dataDB);
        //var_dump($users);
       /* $users = array(
			array('id' => 1, 'name' => 'Some Guy', 'email' => 'example1@example.com'),
			array('id' => 2, 'name' => 'Person Face', 'email' => 'example2@example.com'),
			3 => array('id' => 3, 'name' => 'Scotty', 'email' => 'example3@example.com', 'fact' => array('hobbies' => array('fartings', 'bikes'))),
		);*/

        if($dataDB)
        {

            $this->response($dataDB, 200); // 200 being the HTTP response code
			//$this->response($users, 200); // 200 being the HTTP response code

        }

        else
        {
        	$data['Result']['Data'][0]['Status']="No recipes!!!";
            //$this->response(array('error' => 'Couldn\'t find any users!'), 404);
            //$this->response($dataDB['Result']['Data'][0]['Status']="No categories!!!",404);
            $this->response($data,404);
        }
    }
}