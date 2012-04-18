<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class mulCategory extends REST_Controller
{
	var $dataDB;
	/*function recipeid($a)
	{
	  $a=$this->uri->segment_array();
	  return $a;
	  var_dump($a);
	}*/

	function recipedata_get()
    {

		if(!$this->get('catid') || !$this->get('key'))
       {
        	$this->response(NULL, 400);
       }
        $catid=explode(".",$this->get('catid'));
	$key=$this->get('key');
/*var_dump($catid);
print_r($catid);exit();*/
        $this->load->model('randomrecipes');
        for($j=0;$j<count($catid);$j++)
        {
        	//echo $recipeid[$j];
        $data= $this->randomrecipes->get_recipes($catid[$j],$key);
        //print_r($data);exit();
 $i=0;
        foreach($data as $result)
        {
		$this->dataDB['Result']['Data'][$j][$i]['category']=$result->title!=''?$result->title:"No data";
		$this->dataDB['Result']['Data'][$j][$i]['catid']=$result->catid!=''?$result->catid:"No data";
		$this->dataDB['Result']['Data'][$j][$i]['recipeid']=$result->id!=''?$result->id:"No data";
        	$this->dataDB['Result']['Data'][$j][$i]['recipe']=$result->imgtitle!=''?$result->imgtitle:"No data";
        	//$this->dataDB['Result']['Data'][$i]['image']=$result->imgfilename!=''?$result->imgfilename:"No data";
		$this->dataDB['Result']['Data'][$j][$i]['category']=$result->title!=''?$result->title:"No data";
        	//$this->dataDB['Result']['Data'][$i]['ingredients']=preg_replace(array('/\|/','/;/'),array(',',' '),($result->ingredients!=''?$result->ingredients:"No data"));
        	/*$this->dataDB['Result']['Data'][$i]['description']=strip_tags($result->imgtext!=''?$result->imgtext:"No data");
        	$this->dataDB['Result']['Data'][$i]['image1']=$result->expic1!=''?$result->expic1:"No data";
        	$this->dataDB['Result']['Data'][$i]['description1']=$result->expic1_tn!=''?$result->expic1_tn:"No data";
        	$this->dataDB['Result']['Data'][$i]['image2']=$result->expic2!=''?$result->expic2:"No data";
        	$this->dataDB['Result']['Data'][$i]['description2']=$result->expic2_tn!=''?$result->expic2_tn:"No data";
        	$this->dataDB['Result']['Data'][$i]['image3']=($result->expic3!=''?$result->expic3:"No data");
        	$this->dataDB['Result']['Data'][$i]['description3']=($result->expic3_tn!=''?($result->expic3_tn):"No data");
        	$this->dataDB['Result']['Data'][$i]['image4']=($result->expic4!=''?($result->expic4):"No data");
        	$this->dataDB['Result']['Data'][$i]['description4']=($result->expic4_tn!=''?($result->expic4_tn):"No data");
        	$this->dataDB['Result']['Data'][$i]['image5']=($result->expic5!=''?($result->expic5):"No data");
        	$this->dataDB['Result']['Data'][$i]['description5']=($result->expic5_tn!=''?($result->expic5_tn):"No data");
        	$this->dataDB['Result']['Data'][$i]['image6']=($result->expic6!=''?($result->expic6):"No data");
        	$this->dataDB['Result']['Data'][$i]['description6']=($result->expic6_tn!=''?($result->expic6_tn):"No data");
        	$this->dataDB['Result']['Data'][$i]['image7']=($result->expic7!=''?($result->expic7):"No data");
        	$this->dataDB['Result']['Data'][$i]['description7']=($result->expic7_tn!=''?($result->expic7_tn):"No data");
        	$this->dataDB['Result']['Data'][$i]['image8']=($result->expic8!=''?($result->expic8):"No data");
        	$this->dataDB['Result']['Data'][$i]['description8']=($result->expic8_tn!=''?($result->expic8_tn):"No data");*/

        	$i<count($data);$i++;
        }
        }
//var_dump($dataDB);
//echo "<pre>";
//print_r($this->dataDB);
//usort($this->dataDB['Result']['Data'], array($this, 'data_sort'));
//print_r($this->dataDB);


        if($this->dataDB)
        {
//$string = "\"You're not very wise,\" said the wise man.";

//$string = preg_replace(array("/'/", '/"/'), array("\'", '\"'), $string);
//echo $string;
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

	public function data_sort($a, $b)
	{
	//echo $a['recipe'];
	//echo $b['recipe'];
	//echo "</br>";
	return (strcasecmp($a['recipe'], $b['recipe']) > 0);
	}
}
