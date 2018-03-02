<?php
	namespace Controllers;
	
    class Klient extends Controller 
    {
		public function getAll(){
			$view = $this->getView('Klient');
            $data = null;
            if(\Tools\Session::is('message'))
                $data['message'] = \Tools\Session::get('message');
            if(\Tools\Session::is('error'))
                $data['error'] = \Tools\Session::get('error');
            $view->getAll($data);
            \Tools\Session::clear('message');
            \Tools\Session::clear('error');
		}

		public function getOne($id){
		    $view = $this->getView('Klient');
		    $view->getOne($id);
        }
        
        public function addform(){

            $accessController = new \Controllers\Access();
            $accessController->islogin();

            $view = $this->getView('Klient');
			$view->addform();
        }
        
        public function add(){
            $accessController = new \Controllers\Access();
            $accessController->islogin();

            $model=$this->getModel('Klient');
            $data = $model->add($_POST['imie'], $_POST['nazwisko'], $_POST['firma'], $_POST['nip'], $_POST['kod'], $_POST['miejscowosc'], $_POST['ulica'], $_POST['nr'], $_POST['email'], $_POST['telefon']);
            if(isset($data['error']))
                \Tools\Session::set('error', $data['error']);
            if(isset($data['message']))
                \Tools\Session::set('message', $data['message']);
            $this->redirect('Klient');
        }
        
         public function delete($id){

		    $accessController = new \Controllers\Access();
		    $accessController->islogin();

            $model=$this->getModel('Klient'); 
            $data = $model->delete($id);
            if(isset($data['error']))
                \Tools\Session::set('error', $data['error']);
            if(isset($data['message']))
                \Tools\Session::set('message', $data['message']);
			$this->redirect('Klient');
        }
        
        public function editform($id){

            $accessController = new \Controllers\Access();
            $accessController->islogin();

            $model = $this->getModel('Klient');
            $data = $model->getOne($id);
            if(isset($data['error'])){
                \Tools\Session::set('error', $data['error']);
                $this->redirect('Klient');
            }
            $view = $this->getView('Klient');
			$view->editform($data['Klient']);
        }
        
        public function update(){
            $accessController = new \Controllers\Access();
            $accessController->islogin();

            $model=$this->getModel('Klient');
            $data = $model->update($_POST['id'], $_POST['imie'], $_POST['nazwisko'], $_POST['firma'], $_POST['nip'], $_POST['kod'], $_POST['miejscowosc'], $_POST['ulica'], $_POST['nr'], $_POST['email'], $_POST['telefon']);
            if(isset($data['error']))
                \Tools\Session::set('error', $data['error']);
            if(isset($data['message']))
                \Tools\Session::set('message', $data['message']);
            $this->redirect('Klient');
        }
	}
