<div class="my_basket">
    <h1>Ваша корзина</h1>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <td>№</td><td>Наименование</td><td>Количество</td><td>Цена</td><td></td>
        </tr>
            {{BASKET_CONTENT}}
        <tr>
            <td colspan="3" class="totals">Итого товаров на сумму (руб):</td>
            <td><b>{{AMOUNT}}</b></td>
        </tr>
        <tr>
            {{DISCOUNT_TOTAL}}
        </tr>
        <tr>
            <td colspan="3" class="totals">Итого к оплате (руб):</td>
            <td><b>{{ORDER_RUB}}</b></td>
        </tr>
			
    </table>
    <br>
    <form id="order" action="" method="POST">
        <p>Укажите дополнительную информацию для оформления заказа</p>
        Ваше имя<br>
        <input required type="text" name="name" id="name"><br><br>
        Телефон<br>
        <input required type="text" name="phone" id="phone"><br><br>
        Адрес доставки<br>
        <input required type="text" name="adres" id="adres"><br><br>
        <input type="submit" class='create_order' value="Оформить заказ">
    </form>		
</div>