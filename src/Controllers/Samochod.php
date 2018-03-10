<?php
namespace Controllers;


class Samochod extends Controller
{
    public function addform(){

                $view = $this->getView('Samochod');
                $view->addform();
        }

 /*
    public function add(){

        $accessController = new \Controllers\Access();
        $accessController->islogin();

        $model = $this->getModel('Samochod');
        $data = $model->add($_POST['w'], $_POST['w']);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('Klient');
    }
 */


}