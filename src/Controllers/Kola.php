<?php
namespace Controllers;


class Kola extends Controller
{

    public function getAll()
    {



        if( isset($_POST['id_SamochodParametry'])!= null)
        {
            \Tools\Session::set('id_SamochodParametry', $_POST['id_SamochodParametry']);
        }


        $view = $this->getView('Kola');
        $data = null;

        if(\Tools\Session::is('message'))
            $data['message'] = \Tools\Session::get('message');
        if(\Tools\Session::is('error'))
            $data['error'] = \Tools\Session::get('error');

        $view->getAll($data);

        \Tools\Session::clear('message');
        \Tools\Session::clear('error');



    }

    public function addform()
    {
        $accessController = new \Controllers\Access();
        $accessController->islogin();
        $view = $this->getView('Kola');
        $view->addform();
    }

    public function add()
    {
        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model=$this->getModel('Kola');
        $data = $model->add($_POST['id_zbior_modeli'], $_POST['id_SamochodKola'], $_POST['id_opcja']);

        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);

        $this->redirect('Felgi');
    }

    public function add2()
    {
        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model=$this->getModel('Kola');
        $data = $model->add2($_POST['nazwa'], $_POST['foto']);

        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);

        $this->redirect('Felgi');
    }


    public function delete($id){

        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model=$this->getModel('Kola');
        $data = $model->delete($id);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('Felgi');
    }
}