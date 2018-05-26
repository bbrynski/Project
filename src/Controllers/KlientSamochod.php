<?php
	namespace Controllers;
	
    class KlientSamochod extends Controller
    {


		public function getOne($id){

			$view = $this->getView('KlientSamochod');
            $data = null;
            if(\Tools\Session::is('message'))
                $data['message'] = \Tools\Session::get('message');
            if(\Tools\Session::is('error'))
                $data['error'] = \Tools\Session::get('error');
            $view->getOne($id);
            \Tools\Session::clear('message');
            \Tools\Session::clear('error');
		}
	}
