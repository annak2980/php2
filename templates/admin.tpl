<h2>Акции:</h2>

<form  id="order" action="" method="POST" >
    <p><strong>Добавить скидку:</strong></p>
    <p>Название: <input type="text" name="discname" id="discname" maxlength="30" required>
    Процент: <input type="number" name="percent" id="percent" min="1" max="99" required></p>
    <p>Дата начала: <input type="date" name="startdate" id="startdate"  required>
    Дата окончания: <input type="date" name="finishdate" id="finishdate"  required></p>
    <p><input class='add_discount' type="submit" name="submit" value="Сохранить"></p>
</form>	

<table>
   <tr>
	    <td>Название</td>
	    <td>Дата начала</td>
	    <td>Дата окончания</td>
	    <td>Скидка</td>
	    <td>Управление</td>
    </tr>
    {{DISCOUNTS}}
</table>
<h2>Список клиентов:</h2>
<table>
    <tr>
	    <td>Имя</td>
	    <td>Логин</td>
	    <td>E-mail</td>
	    <td>Заходил</td>
	    <td>Статус</td>
	    <td>Управление</td>
    </tr>
    {{CLIENTS}}
</table>