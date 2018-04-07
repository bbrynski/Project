<?php
namespace Controllers;


use Tools\Session;

class Samochod extends Controller
{

    public function getAll(){

        // pozniej trzeba cos zmienic zeby
        \Tools\Session::regenerate();

        $view = $this->getView('Samochod');
        $data = null;
        if(\Tools\Session::is('message'))
            $data['message'] = \Tools\Session::get('message');
        if(\Tools\Session::is('error'))
            $data['error'] = \Tools\Session::get('error');
        $view->getAll($data);
        \Tools\Session::clear('message');
        \Tools\Session::clear('error');


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

    public function addConfig(){
        $model = $this->getModel('Samochod');
        $data = $model->addConfig();

        \Tools\Session::clear('idmodel');
        \Tools\Session::clear('idnaped');
        \Tools\Session::clear('nazwaModel');
        \Tools\Session::clear('idlakier');
        \Tools\Session::clear('idsilnik');
        \Tools\Session::clear('idreflektory');
        \Tools\Session::clear('idkola');
        \Tools\Session::clear('idskrzynia');
        \Tools\Session::clear('kompletOpon');
        \Tools\Session::clear('podgrzewanaSzybaPrzod');
        \Tools\Session::clear('podgrzewaneSiedzenia');
        \Tools\Session::clear('skorzanaTapicerka');

        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);



        $this->redirect('Samochod');
    }

    public function DostepnoscModelu($id){
        $model=$this->getModel('Samochod');
        $data=$model->getOne($id);
        echo json_encode($data['samochody']);
    }

}