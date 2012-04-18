<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class keySearch extends REST_Controller
{
	var $dataDB;
	function search_get()
    {
		if(!$this->get('catid') || !$this->get('key'))
       {
        	$this->response(NULL, 400);
       }
        $catid=$this->get('catid');
        $key=$this->get('key');
       // var_dump($catid);
        //var_dump($key);
        //$users = $this->some_model->getSomething( $this->get('limit') );
        $this->load->model('search');
        $data= $this->search->get_search_results($catid,$key);
        $i=0;
        foreach($data as $result)
        {

        	$this->dataDB['Result']['Data'][$i]['category']=$result->title;
        	$this->dataDB['Result']['Data'][$i]['catid']=$result->catid;
		$this->dataDB['Result']['Data'][$i]['recipeid']=$result->id;
        	$this->dataDB['Result']['Data'][$i]['recipe']=$result->imgtitle;
		//$this->dataDB['Result']['Data'][$i]['description']=$result->imgtext;
        	
        	/*$this->dataDB['Result']['Data'][$i]['desc1']=($result->expic1_tn!=''?($result->expic1_tn):"No data");
        	$this->dataDB['Result']['Data'][$i]['desc2']=($result->expic2_tn!=''?($result->expic2_tn):"No data");
        	$this->dataDB['Result']['Data'][$i]['desc3']=($result->expic3_tn!=''?($result->expic3_tn):"No data");
        	$this->dataDB['Result']['Data'][$i]['desc4']=($result->expic4_tn!=''?($result->expic4_tn):"No data");
        	$this->dataDB['Result']['Data'][$i]['desc5']=($result->expic5_tn!=''?($result->expic5_tn):"No data");
        	$this->dataDB['Result']['Data'][$i]['desc6']=($result->expic6_tn!=''?($result->expic6_tn):"No data");
        	$this->dataDB['Result']['Data'][$i]['desc7']=($result->expic7_tn!=''?($result->expic7_tn):"No data");
        	$this->dataDB['Result']['Data'][$i]['desc8']=($result->expic8_tn!=''?($result->expic8_tn):"No data");*/
        	$i<count($data);$i++;
        }
        //print_r($array);
      //$dataDB['Result']['Data']['key_search']
        //var_dump($data);
        //var_dump($users);
        /*$users = array(
			array('id' => 1, 'name' => 'Some Guy', 'email' => 'example1@example.com'),
			array('id' => 2, 'name' => 'Person Face', 'email' => 'example2@example.com'),
			3 => array('id' => 3, 'name' => 'Scotty', 'email' => 'example3@example.com', 'fact' => array('hobbies' => array('fartings', 'bikes'))),
		);*/
//var_dump($dataDB);
        if($this->dataDB)
        {

            $this->response($this->dataDB, 200); // 200 being the HTTP response code

        }

        else
        {
        	$this->dataDB['Result']['Data'][0]['Status']="No data";
            //$this->response(array('error' => 'Couldn\'t find any users!'), 404);
            //$this->response($dataDB['Result']['Data'][0]['Status']="No categories!!!",404);
           // $this->response($dataDB,200);
           $this->response($this->dataDB,200);
        }
    }
}
