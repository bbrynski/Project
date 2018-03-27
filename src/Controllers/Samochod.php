<?php
namespace Controllers;


class Samochod extends Controller
{

    public function getAll(){
        $view = $this->getView('Samochod');
        $data = null;
        if(\Tools\Session::is('message'))
            $data['message'] = \Tools\Session::get('message');
        if(\Tools\Session::is('error'))
            $data['error'] = \Tools\Session::get('error');
        $view->getAll($data);
        \Tools\Session::clear('message');
        \Tools\Session::clear('error');

        d(\Tools\Session::get('idmodel'));
    }


    public function addform(){
        $accessController = new \Controllers\Access();
        $accessController->islogin();
                $view = $this->getView('Samochod');
                $view->addform();


        }


    public function add(){

        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model = $this->getModel('Samochod');

        $data = $model->add($_POST['nazwaModel'], $_POST['cena'], $_POST['Id_Silnik'], $_POST['Id_Skrzynia'], $_POST['Id_Naped'], $_POST['Id_Lakier'],$_FILES['Foto']['name']);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);

        $this->redirect('Samochod');
    }

    public function getOne($id){
        $model=$this->getModel('Samochod');
        $data=$model->getOne($id);
        $view = $this->getView('Samochod');
        $view->getone($data['samochody'][0]);
    }


    public function DostepnoscModelu($id){
        $model=$this->getModel('Samochod');
        $data=$model->getOne($id);
        echo json_encode($data['samochody']);
    }
}