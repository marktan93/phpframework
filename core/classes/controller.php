<?php

class controller {
	
	public function GET() {
		array_shift($_GET);
		
		if (count($_GET) < 1 || empty($_GET))
			return false;
		
		$keys = array_keys($_GET);
		for ($i=0; $i<count($_GET); $i++) {
			if (validation::is_empty($_GET[$keys[$i]])) {
				return false;
			}
		}
		return $_GET;
	}

	public function POST() {
		
	}
	
	public function prev_url() {
		return $_SERVER['HTTP_REFERER'];
	}
	
	public function redirect($url) {
		ob_start();
		header("Location: ".$url);
		ob_end_flush();
	}
	
	public function view($page, $template = null) {
		$view = new view;
		$view->show($page, $template);
	}
    
    # display without using predefined template
    public function content($page) {
        $view = new view;
        $view->show_content($page);
    }
	
	public function model() {
	
	}
	
}

?>