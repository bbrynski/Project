<?php
namespace Controllers;

class ZbiorModeli extends Controller
{
    public function getAll()
    {
        \Tools\Session::clear('wersja_nazwa');
        \Tools\Session::clear('id_ZbiorModeli');
        \Tools\Session::clear('id_SamochodParametry');
        \Tools\Session::clear('id_SamochodKola');
        \Tools\Session::clear('id_SamochodSwiatla');
        \Tools\Session::clear('id_SamochodWyposazenie');
        \Tools\Session::clear('IdLakier');

        $view = $this->getView('ZbiorModeli');
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
        $view = $this->getView('ZbiorModeli');
        $view->addform();
    }


    public function add()
    {
        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model = $this->getModel('ZbiorModeli');

       // $modelKlient = $this->getModel('Klient');
       // $modelKlient->mail($_POST['nazwaModel'], $_POST['cena']);

        $data = $model->add($_POST['nazwa_model'], $_POST['id_wersja'], $_POST['cena'], $_FILES['foto']['name']);

        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);

        $this->redirect('KonfiguratorModelu');
    }


    public function WyborWersji()
    {
        if( isset($_POST['wersja_nazwa'])!= null)
        {
            $wersja_nazwa = $_POST['wersja_nazwa'];
            \Tools\Session::set('wersja_nazwa', $wersja_nazwa);
        }
        else
        {
            $wersja_nazwa = \Tools\Session::get('wersja_nazwa');
        }



        $view = $this->getView('ZbiorModeli');
        $data = null;

        if(\Tools\Session::is('message'))
            $data['message'] = \Tools\Session::get('message');
        if(\Tools\Session::is('error'))
            $data['error'] = \Tools\Session::get('error');

        $view->WyborWersji($data, $wersja_nazwa);

        \Tools\Session::clear('message');
        \Tools\Session::clear('error');

    }

    public function delete_wersja($id){

        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model=$this->getModel('ZbiorModeli');
        $data = $model->delete_wersja($id);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('WersjeModelu');
    }
}