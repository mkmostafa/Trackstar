<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		if(!Yii::app()->user->checkAccess('adminManagement'))
		{
			throw new CHttpException(403,'you are not authorized to perform this action.');
		}
		$this->layout='main';
		$this->render('index');
	}
}