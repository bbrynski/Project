<?php
namespace Controllers;

class Pracownik extends Controller
{
    public function getAll(){
        $view = $this->getView('Pracownik');
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
        $view = $this->getView('Pracwonik');
        $view->getOne($id);
    }

    public function addform(){

        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $view = $this->getView('Pracownik');
        $view->addform();
    }

    public function add(){
        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model=$this->getModel('Pracownik');
        $data = $model->add($_POST['imie'], $_POST['nazwisko'], $_POST['numer'], $_POST['kod'], $_POST['miejscowosc'], $_POST['ulica'], $_POST['nr'], $_POST['email'], $_POST['telefon']);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('Pracownik');
    }

    public function delete($id){

        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model=$this->getModel('Pracownik');
        $data = $model->delete($id);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('Pracownik');
    }

    public function editform($id){

        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model = $this->getModel('Pracownik');
        $data = $model->getOne($id);
        if(isset($data['error'])){
            \Tools\Session::set('error', $data['error']);
            $this->redirect('Pracownik');
        }
        $view = $this->getView('Pracownik');
        $view->editform($data['Pracownik']);
    }

    public function update(){
        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model=$this->getModel('Pracownik');
        $data = $model->update($_POST['id'], $_POST['imie'], $_POST['nazwisko'], $_POST['numer'], $_POST['kod'], $_POST['miejscowosc'], $_POST['ulica'], $_POST['nr'], $_POST['email'], $_POST['telefon']);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('Pracownik');
    }
}
