<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Imei extends REST_Controller
{
	function imeicheck_get()
	{
	if(!$this->get('imei'))
       {
        	$this->response(NULL, 400);
       }
	$imei=$this->get('imei');
//var_dump($imei);
//exit();
	$this->load->model('imeicheck');
	$data= $this->imeicheck->get_imeicheck($imei);
	if($data==1)
	{
	$this->dataDB['Result']['Data'][0]['Status']="tracked";
	$this->dataDB['Result']['Data'][0]['days_remaining']="15";
	}
	else
	{
		foreach($data as $result)
		{
		$reg=$result->reg_diff;
		//var_dump($reg);
		if($reg>15)
			{
			$this->dataDB['Result']['Data'][0]['Status']="expired";
			}
			else
			{
			$this->dataDB['Result']['Data'][0]['Status']="tracked";
			$this->dataDB['Result']['Data'][0]['days_remaining']=(15-$reg);
			}
		}
	}
	
	//var_dump($reg);
	//exit();
		

	
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

