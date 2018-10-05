<form  id="order" action="" method="POST" >
    <p><strong>Добавить товар в каталог:</strong></p>
    <table>
    <tr>
	    <td><p style="float: left">Название: <input type="text" name="name" id="namegood" maxlength="30" required></p>
            <p style="float: left">Цена: <input type="text" name="price" id="price" maxlength="20" required></p> <br>
            <p style="float: left">Изображение для каталога:
            <input id="catalogue_img" type="file" name="catalogue_img" style="font-size:14px;"/></p>
            <p style="float: left"><button class="upload_img">Загрузить на сервер</button></p> <br>
            <p style="float: left">Изображение для страницы товара:
            <input id="page_big_img" type="file" name="page_big_img" style="font-size:14px;"/></p>
            <p style="float: left"><button class="upload_big">Загрузить на сервер</button></p>            
        </td>
        <td>
            <p>Описание:<br> <textarea name="descript" id="descript" rows="20" required></textarea></p>
        </td>
    </tr>
    <tr>
        <td>
            <p style="float: left"><input class='add_goods' type="submit" name="submit" value="Добавить товар в базу"></p> 
        </td>   
    </tr>
    </table>       
</form>	