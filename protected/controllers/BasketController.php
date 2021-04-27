<?php

class BasketController extends Controller{

    public $layout='//layouts/main';

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions'=>array('index','add','delete'),
                'users'=>array('*'),
            ),
            array('deny',
                'users'=>array('*'),
            ),
        );
    }

    public function actionIndex()
    {
        $products = Yii::app()->shoppingCart->getPositions();

        $this->render('index', array(
            'products'=>$products,
        ));
    }

    public function actionAdd($id)
    {
        $product=Product::model()->findByPk($id);
        Yii::app()->shoppingCart->put($product);
        echo Yii::app()->shoppingCart->getItemsCount();
    }

    public function actionDelete($id)
    {
        Yii::app()->shoppingCart->remove($id);

        $this->redirect(array('index'));
    }
}