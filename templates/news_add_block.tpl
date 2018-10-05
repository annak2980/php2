<form  id="order" action="" method="POST">
    <p><strong>Добавить новость:</strong></p>
    <p> Название:         <input type="text"           name="name"  id="namenews"  maxlength="30" required>
        Дата:             <input type="datetime-local" name="date"  id="datenews"></p>
    <p> Краткое описание: <input type="text"           name="short" id="shortnews" maxlength="200" required></p>
    <p> Текст новости:<br><textarea                    name="text"  id="textnews"  rows="20" required></textarea></p>
    <p> <input class='add_news'  type="submit"         name="add_news"></p>
</form>	