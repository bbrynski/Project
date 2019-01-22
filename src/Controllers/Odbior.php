<?php
	namespace Controllers;
	
    class Odbior extends Controller
    {


		public function getAll(){

			$view = $this->getView('Odbior');
            $data = null;
            if(\Tools\Session::is('message'))
                $data['message'] = \Tools\Session::get('message');
            if(\Tools\Session::is('error'))
                $data['error'] = \Tools\Session::get('error');


            $view->getAll($data);


            \Tools\Session::clear('message');
            \Tools\Session::clear('error');
		}


        public function add(){

            $model=$this->getModel('Odbior');
            $model_klient=$this->getModel('Klient');

                $data = $model_klient->getId($_POST['imie'], $_POST['nazwisko']);

                if (!isset ($data['error'])) {
                    $data = $model->add($data['Klient']['Id_Klient'], $_POST['numer'], $_POST['data']);
                    if(isset($data['message']))
                        \Tools\Session::set('message', $data['message']);
                } else {
                    if(isset($data['error']))
                        \Tools\Session::set('error', 'Brak klienta w bazie lub ');

                }

            $this->redirect('Odbiory');
        }

        public function editform($id){

            $accessController = new \Controllers\Access();
            $accessController->islogin();

            $model = $this->getModel('Odbior');
            $data = $model->getOne($id);
            if(isset($data['error'])){
                \Tools\Session::set('error', $data['error']);
                $this->redirect('Odbior');
            }
            $view = $this->getView('Odbior');
            $view->editform($data['odbior']);
        }

        public function update($id){

            $model=$this->getModel('Odbior');
            $data = $model->update($_POST['Id_Odbior'], $_POST['Id_Klient'], $_POST['data'], $_POST['numer']);

            if(isset($data['error']))
                \Tools\Session::set('error', $data['error']);
            if(isset($data['message']))
                \Tools\Session::set('message', $data['message']);
            $this->redirect('Odbiory');
        }

        public function changeStatus($id){
            $model=$this->getModel('Odbior');
            $data = $model->changeStatus($id);

            if(isset($data['error']))
                \Tools\Session::set('error', $data['error']);
            if(isset($data['message']))
                \Tools\Session::set('message', $data['message']);
            $this->redirect('Odbiory');
        }

	}
