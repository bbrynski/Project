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
            $id = \Tools\Session::get('idUzytkownik');
            if( !isset($_POST['imie']) && !isset($_POST['nazwisko'])){
                if(isset($id)){
                    $data = $model->add($id, $_POST['numer'], $_POST['data']);
                }
            }else {
                $data = $model_klient->getId($_POST['imie'], $_POST['nazwisko']);
                //d($data['Klient']['Id_Klient']);
                $data = $model->add($data['Klient']['Id_Klient'], $_POST['numer'], $_POST['data']);
            }

            if(isset($data['error']))
                \Tools\Session::set('error', $data['error']);
            if(isset($data['message']))
                \Tools\Session::set('message', $data['message']);
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
            $data = $model->update($_POST['Id_Odbior'], $_POST['Id_Klient'], $_POST['Data'], $_POST['Numer_Zamowienia'], $_POST['Odebrano']);

            if(isset($data['error']))
                \Tools\Session::set('error', $data['error']);
            if(isset($data['message']))
                \Tools\Session::set('message', $data['message']);
            $this->redirect('Odbiory');
        }

	}
