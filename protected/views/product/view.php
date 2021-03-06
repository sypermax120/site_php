<?php

$attributes = $model->attributeLabels();

$this->pageTitle = $model->brand.' '.$model->model;
?>

<div class="detail_view">

    <h4><?php echo $model->brand; ?> <?php echo $model->model; ?></h4>

    <img src="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $model->image_source; ?>">

    <div class="right_block">

        <h3>$<?php echo $model->price; ?></h3>

        <?php
        if(Yii::app()->user->isGuest)
        {
            if(Yii::app()->shoppingCart->contains($model->id))
                echo '<a class="add_to_basket added" href="#">Товар добавлен</a>';
            else
                echo '<a class="add_to_basket" href="#" data-href="'.Yii::app()->request->baseUrl.'/basket/add/'.$model->id.'">В корзину</a>';
        }
        else
            echo '<a class="update_product" href="'.Yii::app()->request->baseUrl.'/product/update/'.$model->id.'">Редактировать</a>';
        ?>

    </div>

    <div class="cleaner"></div>

    <table class="table">
        <tr>
            <td><?php echo $attributes['screen_diagonal']; ?></td>
            <td><?php echo $model->screen_diagonal; ?>"</td>
        </tr>
        <tr>
            <td><?php echo $attributes['screen_desc']; ?></td>
            <td><?php echo $model->screen_desc; ?></td>
        </tr>
        <tr>
            <td><?php echo $attributes['cpu']; ?></td>
            <td><?php echo $model->cpu; ?></td>
        </tr>
        <tr>
            <td><?php echo $attributes['ram']; ?></td>
            <td><?php echo $model->ram; ?> ГБ</td>
        </tr>
        <tr>
            <td><?php echo $attributes['hdd']; ?></td>
            <td><?php echo $model->hdd; ?> ГБ</td>
        </tr>
        <tr>
            <td><?php echo $attributes['os']; ?></td>
            <td><?php echo $model->os; ?></td>
        </tr>
        <tr>
            <td><?php echo $attributes['video_card']; ?></td>
            <td><?php echo $model->video_card; ?></td>
        </tr>
        <tr>
            <td><?php echo $attributes['additional_desc']; ?></td>
            <td><?php echo $model->additional_desc; ?></td>
        </tr>
    </table>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/addToBasket.js"></script>
