<?php
	namespace Controllers;
	
    class Strona extends Controller
    {
		public function getAll()
        {
			$view = $this->getView('Strona');
            $view->getAll();
		}

        public function Golf()
        {
            $view = $this->getView('Strona');
            $view->Golf();
        }

        public function Arteon()
        {
            $view = $this->getView('Strona');
            $view->Arteon();
        }
	}
