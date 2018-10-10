<?php
	namespace Controllers;
	
    class Strona extends Controller
    {
		public function getAll()
        {
			$view = $this->getView('Strona');
            $view->getAll();
		}
	}
