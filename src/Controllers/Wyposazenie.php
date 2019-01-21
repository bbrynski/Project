<?php
namespace Controllers;


class Wyposazenie extends Controller
{

    public function getAll(){


        if( isset($_POST['id_SamochodSwiatla'])!= null)
        {
            \Tools\Session::set('id_SamochodSwiatla', $_POST['id_SamochodSwiatla']);
        }

        $view = $this->getView('Wyposazenie');
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
        $view = $this->getView('Wyposazenie');
        $view->addform();
    }

    public function add()
    {
        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model=$this->getModel('Wyposazenie');
        $data = $model->add($_POST[''], $_POST[''], $_POST['']);

        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);

        $this->redirect('Tapicerka');
    }

    public function add2()
    {
        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model=$this->getModel('Wyposazenie');
        $data = $model->add2($_POST['nazwa'], $_POST['foto']);

        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);

        $this->redirect('Tapicerka');
    }

    public function delete($id){

        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model=$this->getModel('Wyposazenie');
        $data = $model->delete($id);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('Tapicerka');
    }
}