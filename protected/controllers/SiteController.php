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
		$this->renderPartial('store', array('store' => $store));
	}

	public function actionReservation()
	{
		$xss = new forbidXss();
		$this->renderPartial('reservation',array('xsscode' => $xss->addXsscode()));
	}

	public function actionGuest()
	{
		$xss = new forbidXss();
		$this->renderPartial('guest',array('xsscode' => $xss->addXsscode()));
	}

	public function actionList()
	{
		$session = new Session();
		// if($session->has('loguser')){
			$this->renderPartial('list');
			Yii::app()->end();
		// }
		$this->redirect('/site/guest');
	}

	public function actionApi($action ,$xsscode = null){
		$bespeakApi = new bespeakApi();
		$forbitlist = array();
		if(in_array($action,$forbitlist)){
			$forbidXss = new forbidXss($xsscode);
			$x = $forbidXss->subCode();
			if($x != '51'){
				echo json_encode($x);
				Yii::app()->end();
			}
		}
		echo json_encode($bespeakApi->$action());
		Yii::app()->end();
	}

	public function actionAadminapi($action){
		$bespeakadmin = new bespeakadmin();
		$session = new Session();
		if($session->has('loguser')){
			echo json_encode($bespeakadmin->$action());
			Yii::app()->end();
		}
		echo json_encode('4');/*not login*/
		Yii::app()->end();
	}

	public function actionApi2(){
		$str = '+8612312312312';
		$strTest = new strTest();
		echo json_encode($strTest->telphone($str));
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
