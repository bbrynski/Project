<?php
    namespace Controllers;
    //kontroler do obsługi logowania
    //każda metoda odpowiada jednej akcji możliwej
    //do wykonania przez kontroler
    class Access extends Controller {
        //wyświetla formularz do logowania
        public function logform($data = null){
            if(\Tools\Session::is('message'))
                $data['message'] = \Tools\Session::get('message');
            if(\Tools\Session::is('error'))
                $data['error'] = \Tools\Session::get('error');
            $view=$this->getView('Access');
            $view->logform($data);
            \Tools\Session::clear('message');
            \Tools\Session::clear('error');
        }
        //zalogowuje do systemu
        public function login(){

            $data = null;
            $model = $this->getModel('Access');
            $data = $model->login($_POST['login'],md5($_POST['password']));

          
            if(!isset($data['error']))
                $this->redirect('');
            else
                $this->logform($data);

            
        }

        //wylogowuje z systemu
        public function logout(){
            $model=$this->getModel('Access');
            $model->logout();
            $this->redirect('');
        }

        public function islogin(){
            if(\Tools\Access::islogin() !== true){
                \Tools\Session::set('message', \Config\Website\MessageName::$mustlogin);
                $this->redirect('access/logform');
            }
        }

        public function rejestracja_1(){

            $model1 = $this->getModel('Klient');
            $klienci = $model1->getAll();

            $data = null;
            $model = $this->getModel('Access');
            $data = $model->rejestracja_1($_POST['imie'], $_POST['nazwisko'], $_POST['email'],md5($_POST['haslo']), md5($_POST['haslo2']), $klienci);

            if(!isset($data['error'])) {
                $this->redirect('access/logform');
            }
            else
                $this->logform($data);

        }
    }
