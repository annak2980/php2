<?php

class Render{
    
    use Singleton;
	
	public function connect(){
        
        // подгружаем и активируем авто-загрузчик Twig-а
        require_once ('Twig/Autoloader.php');
        Twig_Autoloader::register();
        
	}
	
    public function renderPage($page_name, $variables = []) {
        // указывае где хранятся шаблоны
        $this -> connect();
        
        $loader = new Twig_Loader_Filesystem("v");
  
        // инициализируем Twig
        $twig = new Twig_Environment($loader);
    
        $template = $twig->loadTemplate($page_name);
    
        $templateContent = $template->render($variables);
    
	   //возвращаем текст шаблона
        return $templateContent;
        
    }
    
}	