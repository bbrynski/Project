<?php
namespace Controllers;


class Konfigurator extends Controller
{

    public function addConfig(){
        $model = $this->getModel('Samochod');
        $data = $model->addConfig();

        $id=$data['ostatnioWstawioneID'];
        $model_konfigurator= $this->getModel('Konfigurator');
        $data = $model_konfigurator->addConfig($id);

        \Tools\Session::set('numer', $data['numer']);

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



        $this->redirect('Podsumowanie');
    }

    public function loadConfig($numer){
        $view=$this->getView('Konfigurator');
        $view->loadConfig($numer);
    }

    public function getConfig(){
        $model = $this->getModel('Konfigurator');
        $data = $model->getConfig($_POST['numer']);

    }
}