<?php

class C_Page extends C_Base {
	//
	// сюда добавляем новые страницы action_ИмяДействия
	//
	
	public function action_index(){
        
		$this->title .= '::Чтение';
        
        $get_text = Text::getInstance();
        
		$text = $get_text->text_get();
        
		$this->content = Render::getInstance()->renderPage('v_index.tmpl', array('text' => $text));	
	}
	
	public function action_edit(){
        
		$this->title .= '::Редактирование';
		
        $set_text = Text::getInstance(); 
        
		if($this->isPost())
		{
			$set_text->text_set($_POST['text']);
		}
		
		$text = $set_text->text_get();
        
		$this->content = Render::getInstance()->renderPage('v_edit.tmpl', array('text' => $text));		
	}
}
