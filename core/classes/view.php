<?php

class view {

	private $header = 'header.php';
	
	private $footer = 'footer.php';

	
	public function set_header($header) {
		$this->header = $header;
	}
	
	public function set_footer($footer) {
		$this->footer = $footer;
	}
	
	public function show($content, $tpl) {
		$template = unserialize(TEMPLATE);
		$keys = array_keys($template);
		if ($tpl == null) { // select default
			$tpl= $template[$keys[0]];
		} else {
			$tpl = '/'.$tpl.'/';
		}
	
		$path = DOC_ROOT.ROOT."app/views";
		if (file_exists($path.$tpl.$this->header))
			include $path.$tpl.$this->header;
		if (file_exists($path.'/'.$content.'.php'))
			include $path.'/'.$content.'.php';
		if (file_exists($path.$tpl.$this->footer))
			include $path.$tpl.$this->footer;
	}
    
    public function show_content($content) {
        $path = DOC_ROOT.ROOT."app/views";
        if (file_exists($path.'/'.$content.'.php'))
			include $path.'/'.$content.'.php';
    }
	
}

?>