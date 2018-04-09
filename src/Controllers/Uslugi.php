<?php
namespace Controllers;

class Uslugi extends Controller
{
    public function getAll(){
        $view = $this->getView('Uslugi');
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
        $view = $this->getView('Uslugi');
        $view->getOne($id);
    }

    public function addform(){

        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $view = $this->getView('Uslugi');
        $view->addform();
    }

    public function add(){
        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model=$this->getModel('Uslugi');
        $data = $model->add($_POST['nazwaUsluga'], $_POST['Cena']);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('Uslugi');
    }

    public function delete($id){

        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model=$this->getModel('Uslugi');
        $data = $model->delete($id);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('Uslugi');
    }

    public function editform($id){

        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model = $this->getModel('Uslugi');
        $data = $model->getOne($id);
        if(isset($data['error'])){
            \Tools\Session::set('error', $data['error']);
            $this->redirect('Uslugi');
        }
        $view = $this->getView('Uslugi');
        $view->editform($data['uslugi']);
    }

    public function update(){
        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model=$this->getModel('Uslugi');
        $data = $model->update($_POST['id'], $_POST['nazwaUsluga'], $_POST['Cena']);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('Uslugi');
    }
}
