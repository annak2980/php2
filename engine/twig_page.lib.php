<?php

// подгружаем и активируем авто-загрузчик Twig-а
require_once (SITE_ROOT . 'Twig/Autoloader.php');
Twig_Autoloader::register();

function renderPage($page_name, $variables = [])
{
    // указывае где хранятся шаблоны
    $loader = new Twig_Loader_Filesystem(TPL_DIR);
  
    // инициализируем Twig
    $twig = new Twig_Environment($loader);
    
    $template = $twig->loadTemplate($page_name . ".tmpl");
    
    $templateContent = $template->render($variables);
    
	//возвращаем текст шаблона
    return $templateContent;
}