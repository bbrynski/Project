<?php
namespace Controllers;


class Reflektor extends Controller
{

    public function getAll($id){

        if( isset($_POST['id_SamochodKola'])!= null)
        {
            \Tools\Session::set('id_SamochodKola', $_POST['id_SamochodKola']);
        }

        $view = $this->getView('Reflektor');
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
        $view = $this->getView('Reflektor');
        $view->addform();
    }

    public function add()
    {
        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model=$this->getModel('Reflektor');
        $data = $model->add($_POST['id_zbior_modeli'], $_POST['id_SamochodSwiatla'], $_POST['id_opcja']);

        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);

        $this->redirect('Swiatla');
    }

    public function add2()
    {
        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model=$this->getModel('Reflektor');
        $data = $model->add2($_POST['nazwa'], $_POST['foto']);

        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);

        $this->redirect('Swiatla');
    }


    public function delete($id){

        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model=$this->getModel('Reflektor');
        $data = $model->delete($id);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('Swiatla');
    }
}