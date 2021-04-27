<?php

?>

<div id="send_order_block">

    <button id="show_form_button">Оформить заказ</button>

    <div class="cleaner"></div>

    <div id="order_form_block" class="form">

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'order-form',
            'enableAjaxValidation'=>false,
            'action'=>Yii::app()->request->baseUrl.'/order/create',
        )); ?>

        <div id="pay_type_block">

            <h4>Способ оплаты:</h4>

            <input type="radio" name="Order[pay_type]" value="1" checked>
            <label>Наличными</label>
            <p>Оплата производится только в магазине.</p>

            <input type="radio" name="Order[pay_type]" value="2">
            <label>Через нашу платежную систему</label>
            <p>Комисcия +0% от стоимости заказа. После оформления заказа вы получите его уникальный номер, который нужно указать при оплате. </p>

        </div>

        <div id="delivery_type_block">

            <h4>Доставка:</h4>

            <input type="radio" name="Order[delivery_type]" value="1" checked>
            <label>Самовывоз</label>
            <p>Бесплатно. Забрать заказ можно в нашем магазине в Виннице.</p>

            <input type="radio" name="Order[delivery_type]" value="2">
            <label>Доставка по Виннице</label>
            <p>Стоимость — 50 грн. Бесплатно при заказе от 15000 грн. Доставка по Виннице в течение 24-х часов.</p>

            <input type="radio" name="Order[delivery_type]" value="3">
            <label>Доставка по Украине</label>
            <p>Стоимость — 500 грн. Доставка до 40 кг по Украине в течение 3-х дней.</p>

        </div>

        <div id="contacts_block">

            <h4>Контактные данные:</h4>

            <input name="Order[name]" type="text" placeholder="Имя" maxlength="50">
            <input name="Order[tel]" type="tel" placeholder="Номер" maxlength="50">

        </div>

        <?php echo CHtml::submitButton('Отправить'); ?>

        <?php $this->endWidget(); ?>

        <div class="cleaner"></div>

    </div>

</div>