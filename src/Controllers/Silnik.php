<?php
namespace Controllers;


use Tools\Session;

class Silnik extends Controller
{

    public function getAll()
    {


        if( isset($_POST['id_ZbiorModeli'])!= null)
        {
            \Tools\Session::set('id_ZbiorModeli', $_POST['id_ZbiorModeli']);
        }



        $view = $this->getView('Silnik');
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
        $view = $this->getView('Silnik');
        $view->addform();
    }

    public function add()
    {
        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model=$this->getModel('Silnik');
        $data = $model->add($_POST['pojemnosc'], $_POST['rodzaj'], $_POST['moc'], $_POST['skrzynia'], $_POST['cena']);

        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);

        $this->redirect('Silnik');
    }

    public function add2()
    {
        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model=$this->getModel('Silnik');
        $data = $model->add2($_POST['id_zbior_modeli'], $_POST['id_jednostka_napedowa']);

        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);

        $this->redirect('Silnik');
    }

    public function delete($id){

        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model=$this->getModel('Silnik');
        $data = $model->delete($id);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('Silnik');
    }
}