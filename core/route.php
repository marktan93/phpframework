<?php

class route {

	private $controller = CONTROLLER;

	private $method = METHOD;

	private $params = array();

	public function __construct() {
		$url = explode('/', $_SERVER['REQUEST_URI']);
		global $obj;
		# delete root folder and empty array
		array_shift($url);
		array_shift($url);
		
		if (!empty($url[0])) {
            if (!isset($url[0]) || !isset($url[1])) {
                die('URL Error');
            } else {
                
                
                $this->controller = $url[0];
                $this->method	  = $url[1];

                $obj = $this->controller;
                
                # delete the controller and method
                array_shift($url);
                array_shift($url);

                for($i=0; $i<count($url); $i++) {
                    if(strpos($url[$i], '?') != false) {
                        $url[$i] = substr($url[$i], 0,strpos($url[$i], '?'));
                    }
                }

                $this->params = $url;
            }
			
		}
        
        global $page;
        if (!file_exists(DOC_ROOT.HOST.ROOT.'app/controllers/'.$this->controller.'.php'))
            die('URL Error');
        $page = $this->method;
		$class = new $this->controller;
        
        if (!method_exists($class, $this->method))
                die('URL Error');
		$method = $this->method;
		$class->$method($this->params);
	}

}

?>