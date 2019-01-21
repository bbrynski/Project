<?php
namespace Controllers;


class Lakier extends Controller
{

    public function getAll(){


        if( isset($_POST['id_SamochodWyposazenie'])!= null)
        {
            \Tools\Session::set('id_SamochodWyposazenie', $_POST['id_SamochodWyposazenie']);
        }

        $view = $this->getView('Lakier');
        $data = null;
        if(\Tools\Session::is('message'))
            $data['message'] = \Tools\Session::get('message');
        if(\Tools\Session::is('error'))
            $data['error'] = \Tools\Session::get('error');
        $view->getAll($data);
        \Tools\Session::clear('message');
        \Tools\Session::clear('error');
    }

    public function delete($id){

        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model=$this->getModel('Lakier');
        $data = $model->delete($id);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('Lakier');
    }

    public function addform()
    {
        $accessController = new \Controllers\Access();
        $accessController->islogin();
        $view = $this->getView('Lakier');
        $view->addform();
    }

    public function add()
    {
        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model=$this->getModel('Lakier');
        $data = $model->add($_POST['nazwaLakier'], $_POST['Foto']);

        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);

        $this->redirect('Lakier');
    }
}