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
        $data = $model->add($_POST['nazwaModel'], $_POST['Cena'], $_POST['Silnik'], $_POST['Skrzynia'], $_POST['Naped'], $_POST['Pojemnosc'], $_POST['Moc'], $_POST['Foto'],, $_POST['Lakier'], $_POST['LakierNadwozia']);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('Klient');
    }
 */


}