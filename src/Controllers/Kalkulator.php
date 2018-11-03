<?php
	namespace Controllers;
	
    class Kalkulator extends Controller
    {


		public function get(){


            $view = $this->getView('Kalkulator');
            $view->get();
		}




	}
