<?php
namespace Controllers;

class Parking extends Controller
{
    public function getAll(){
        $view = $this->getView('Parking');
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
        $view = $this->getView('Parking');
        $view->getOne($id);
    }

    public function addform(){

        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $view = $this->getView('Parking');
        $view->addform();
    }

    public function add(){
        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model=$this->getModel('Parking');
        $data = $model->add($_POST['IdModel'], $_POST['Sztuki']);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('Parking');
    }

    public function delete($id){

        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model=$this->getModel('Parking');
        $data = $model->delete($id);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('Parking');
    }

    public function editform($id){

        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model = $this->getModel('Parking');
        $data = $model->getOne($id);
        if(isset($data['error'])){
            \Tools\Session::set('error', $data['error']);
            $this->redirect('Parking');
        }
        $view = $this->getView('Parking');
        $view->editform($data['Parking']);
    }

    public function update(){
        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model=$this->getModel('Parking');

        $data = $model->update($_POST['id'], $_POST['Sztuki']);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('Parking');
    }
}
