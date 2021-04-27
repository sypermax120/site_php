<?php

$this->pageTitle = Yii::app()->name . ' - Новый товар';
?>

<div class="admin_panel">

    <h2>Добавление нового товара</h2>

    <?php $this->renderPartial('_form', array('model'=>$model)); ?>

</div>