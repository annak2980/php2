<table>
    <tr>
	    <td>Имя:{{NAME}}</td>
	    <td>Дата:{{DATE_ORDER}}</td>
	    <td>Тел: {{PHONE}}</td>
	    <td colspan="2">Адрес: {{ADRES}}</td>
    </tr>
    
    <tr>
        <td>№:	{{IDX}} </td>
        <td>Email:	{{USER_MAIL}} </td>
        <td>Логин:	{{USER_NAME}} </td>
	    <td>Статус:	{{STATUS_NAME}}</td>
	    <td>{{PROCESS_ORDER}}	  </td>
    </tr>
</table>
    
<table border='2' cellpadding='5' cellspacing='0'>
    <tr>
        <td>№</td>
        <td>Наименование</td>
        <td>Количество</td>
        <td>Цена</td>
    </tr>
    {{SUBTABLE}}
    <tr>
        <td colspan="3" class="totals">Итого товаров на сумму (руб):</td>
        <td><b>{{AMOUNT}}</b></td>
    </tr>
    <tr>
        <td colspan="3" class="totals">Итого к оплате (руб):</td>
        <td><b>{{ORDER_SUM}}</b></td>
    </tr>
</table>

<br><br><br>