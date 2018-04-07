<?php
namespace Controllers;


class Konfigurator extends Controller
{

    public function addConfig()
    {
        $model = $this->getModel('Samochod');
        $data = $model->addConfig(\Tools\Session::get('idmodel'));

        $id = $data['ostatnioWstawioneID'];
        $model_konfigurator = $this->getModel('Konfigurator');
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

        if (isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if (isset($data['message']))
            \Tools\Session::set('message', $data['message']);


        $this->redirect('Podsumowanie');
    }

    public function loadConfig($numer)
    {
        $view = $this->getView('Konfigurator');
        $view->loadConfig($numer);
    }

    public function getConfig()
    {
        $model = $this->getModel('Konfigurator');
        $data = $model->getConfig($_POST['numer']);
        $config = $data['config'];

        \Tools\Session::set('idmodel', $config[0]['IdModel']);
        //d( \Tools\Session::get('idmodel'));
        //\Tools\Session::set('nazwaModel', $config[0]['nazwaModel']);
        \Tools\Session::set('idsilnik', $config[0]['IdSilnik']);
       // d( \Tools\Session::get('idsilnik'));
        \Tools\Session::set('idlakier', $config[0]['IdLakier']);
      //  d( \Tools\Session::get('idlakier'));
        \Tools\Session::set('idnaped', $config[0]['IdNaped']);
      //  d( \Tools\Session::get('idnaped'));
        \Tools\Session::set('idskrzynia', $config[0]['IdSkrzynia']);
      //  d( \Tools\Session::get('idskrzynia'));
        \Tools\Session::set('idkola', $config[0]['IdKola']);
      //  d( \Tools\Session::get('idkola'));
        \Tools\Session::set('idreflektory', $config[0]['IdReflektory']);
      //  d( \Tools\Session::get('idreflektory'));

        $wyposazenie=null;
        if (isset($config[0]['PodgrzewaneSiedzenia'])) {
            \Tools\Session::set('podgrzewaneSiedzenia', $config[0]['PodgrzewaneSiedzenia']);
            $wyposazenie[] = 'Podgrzewane siedzenia';
        }
        if (isset($config[0]['PodgrzewanaSzybaPrzod'])) {
            \Tools\Session::set('podgrzewanaSzybaPrzod', $config[0]['PodgrzewanaSzybaPrzod']);
            $wyposazenie[] = 'Podgrzewana szyba przednia';
        }
        if (isset($config[0]['DodatkowyKompletOpon'])) {
            \Tools\Session::set('kompletOpon', $config[0]['DodatkowyKompletOpon']);
            $wyposazenie[] = 'Dodatkowy komplet opon';
        }
        if (isset($config[0]['SkorzanaTapicerka'])) {
            \Tools\Session::set('kompletOpon', $config[0]['SkorzanaTapicerka']);
            $wyposazenie[] = 'Skórzana tapicerka';
        }



        $view = $this->getView('Podsumowanie');
        $data['wyposazenie']=$wyposazenie;
        $data['konfigurator']=1;
        $view->getAll($data);

    }
}