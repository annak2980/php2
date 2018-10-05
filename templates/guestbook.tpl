    <h1>Гостевая книга</h1>
    <form  id="order" action="" method="POST" >
        <p><strong>Оставить отзыв о сайте:</strong></p>
        <p>Введите ФИО:       <input type="text"   name="name"  id="namerec"  maxlength="30" required></p>
        <p>Введите Email:     <input type="email"  name="email" id="emailrec" maxlength="20" required></p>
        <p>Введите текст:<br> <textarea            name="text"  id="textrec"  rows="10"      required></textarea></p>
        <p><input class='addrec'     type="submit" name="submit"></p>
    </form>	
    {{GUESTBOOKFEED}}
        