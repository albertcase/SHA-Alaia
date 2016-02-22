<?php

class SiteController extends Controller
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionSpring()
	{
		$this->render('spring');
	}

	public function actionProduct(){
		$this->render('product');
	}

	public function actionFounder(){
		$this->render('founder');
	}

	public function actionHistory(){
		$this->render('history');
	}

	public function actionStore($id)
	{
		$sql = "select * from same_store where id = ".intval($id);
		$store = Yii::app()->db->createCommand($sql)->queryRow();
		$this->render('store', array('store' => $store));
	}

	public function actionApi($action){
		$bespeakApi = new bespeakApi();
		echo json_encode($bespeakApi->$action());
		Yii::app()->end();
	}

	public function actionApi2(){
		$xss = new forbidXss();
		print_r($_SESSION['forbidcode']);
		echo json_encode('aaaaaaaaaa');
		Yii::app()->end();
	}

	public function actionApi3(){
		// $xss = new forbidXss($_POST['xsscode']);
		$sql = new database();
		// $data = array(
		// 	'name' => 'dirk',
		// 	'surname' => 'wang',
		// 	'title' => '1',
		// 	'telphone' => '18516180508',
		// 	'email' => '757867658@qq.com',
		// 	'country' => '法国',
		// 	'storeid' => '1',
		// 	'callway' => '1',
		// 	'sguide' => '0',
		// 	'bespeaktime' => '2015-8-8'
		// );
		$data = array(
			'name' => 'dirk' ,
			'surname' => 'wang' ,
			'title' => '1'
			);
		// print_r($sql->insertData($data ,'alaia_bespeak'));
		// print_r($sql->searchData($data,array(),'alaia_bespeak',3));
		print_r($sql->checkData($data,'alaia_bespeak'));
		echo json_encode('aaaaaaaaaa');
		Yii::app()->end();
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}
}
