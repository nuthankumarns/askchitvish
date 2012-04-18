<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class getCategoryIds extends REST_Controller
{
	var $category_ids;
	var $users;
	function categoryids_get()
    {

        //$users = $this->some_model->getSomething( $this->get('limit') );
        $this->load->model('categories');
        $dataDB['Result']['Data']['category_details']= $this->categories->get_category_id();
        //$users=$this->load->model('categories');
        //var_dump($dataDB);
        //var_dump($users);
       

        if($dataDB)
        {

            $this->response($dataDB, 200); // 200 being the HTTP response code

        }

        else
        {
        	$data['Result']['Data'][0]['Status']="No categories!!!";
            //$this->response(array('error' => 'Couldn\'t find any users!'), 404);
            //$this->response($dataDB['Result']['Data'][0]['Status']="No categories!!!",404);
            $this->response($data,404);
        }
    }
}
