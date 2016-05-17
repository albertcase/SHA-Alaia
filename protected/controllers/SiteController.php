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
		$bespeakApi = new bespeakApi();
		$xss = new forbidXss();
		$this->renderPartial('reservation',array(
			'xsscode' => $xss->addXsscode(),
			'stores' => json_encode($bespeakApi->getstores(), JSON_UNESCAPED_UNICODE),
			'countrys' => $bespeakApi->countrys(),
		));
	}

	public function actionGuest()
	{
		$session = new Session();
		if($session->has('loguser')){
			$this->redirect('/site/list');
			Yii::app()->end();
		}
		$xss = new forbidXss();
		$this->renderPartial('guest',array('xsscode' => $xss->addXsscode()));
	}

	public function actionList()
	{
		$bespeakApi = new bespeakApi();
		$session = new Session();
		if($session->has('loguser')){
			$this->renderPartial('list', array('storeid' => json_encode($bespeakApi->getstoresid(), JSON_UNESCAPED_UNICODE));
			Yii::app()->end();
		}
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

	public function actionAdminapi($action){
		$bespeakadmin = new bespeakadmin();
		$session = new Session();
		if($session->has('loguser')){
			echo json_encode($bespeakadmin->$action());
			Yii::app()->end();
		}
		echo json_encode('4');/*not login*/
		Yii::app()->end();
	}

	public function actionLogout(){
		$session = new Session();
		$session->clean();
		echo json_encode('11');/*login out*/
		Yii::app()->end();
	}

	public function actionApi2(){
			// echo exec("nohup /vagrant/sha-alaia/protected/models/sh/sendmail.sh");
		echo exec("nohup /vagrant/sha-alaia/protected/models/sh/sendmail.sh >> null.txt 2>&1 &");
			// exec("nohup ".dirname(__FILE__)."/sendmail.sh >> null 2>&1 &");
		echo json_encode('14');
		Yii::app()->end();
	}

	public function actionApi3(){
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
