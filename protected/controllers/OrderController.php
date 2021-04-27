<?php

class OrderController extends Controller
{
    public $layout='//layouts/main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl',
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', 
				'actions'=>array('create'),
				'users'=>array('*'),
			),
			array('allow',
				'actions'=>array('index','admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}

	public function actionCreate()
	{
		$model=new Order;

		if(isset($_POST['Order']))
		{
			$model->attributes=$_POST['Order'];
			$model->save();
		}

		$this->redirect(array('product/index'));
	}


	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		$this->redirect(array('index'));
	}


	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Order', array(
            'criteria'=>array(
                'order'=>'id DESC',
                'with'=>array('products'),
            ),
        ));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Order the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Order::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Order $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='order-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
