<form id='loginform' action='/login/?back={{BACK_URL}}' method='POST'>
	Привет, гость! 
	<input type='text' name='login' id="login">
	<input type='password' name='password' id="password">
	<label for="saveCooki">запомнить</label>
	<input type="checkbox" name="rememberme" id="saveCooki">
	<input type='submit' name='loginform' value='Войти'>
    <p>
        <label for="email">Ваш E-mail для регистрации:<br></label>
        <input type="email" name="email" id="email" maxlength="100">
        <input class='emailform' type='submit' name='emailform' value='Регистрация'>
    </p>
</form>
