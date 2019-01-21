<?php

namespace Controllers;


class Konfigurator extends Controller
{
    public function loadConfig($numer)
    {
        $view = $this->getView('Konfigurator');
        $view->loadConfig($numer);
    }

    public function getConfig()
    {
        \Tools\Session::clear('id_ZbiorModeli');
        \Tools\Session::clear('id_SamochodParametry');
        \Tools\Session::clear('id_SamochodKola');
        \Tools\Session::clear('id_SamochodSwiatla');
        \Tools\Session::clear('id_SamochodWyposazenie');
        \Tools\Session::clear('IdLakier');
        \Tools\Session::clear('numer');


        $model = $this->getModel('Podsumowanie');
        $data = $model->getConfig($_POST['numer']);

       // d($data);

        if(isset($data['error']))
        {
            $view = $this->getView('Konfigurator');
            $view->tmp($data);

           // $this->redirect('Konfigurator');
        }
        else {
            if (\Tools\Session::is('error'))
                $data['error'] = \Tools\Session::get('error');

            else {


                $config = $data['config'];


                \Tools\Session::set('numer', $config[0]['numer']);
                // d(\Tools\Session::get('numer'));

                \Tools\Session::set('id_ZbiorModeli', $config[0]['id_ZbiorModeli']);
                // d(\Tools\Session::get('id_ZbiorModeli'));
                \Tools\Session::set('id_SamochodParametry', $config[0]['id_SamochodParametry']);
                //  d(\Tools\Session::get('id_SamochodParametry'));
                \Tools\Session::set('id_SamochodKola', $config[0]['id_SamochodKola']);
                //   d(\Tools\Session::get('id_SamochodKola'));
                \Tools\Session::set('id_SamochodSwiatla', $config[0]['id_SamochodSwiatla']);
                //   d(\Tools\Session::get('id_SamochodSwiatla'));
                \Tools\Session::set('id_SamochodWyposazenie', $config[0]['id_SamochodWyposazenie']);
                //   d(\Tools\Session::get('id_SamochodWyposazenie'));
                \Tools\Session::set('IdLakier', $config[0]['IdLakier']);
                //   d(\Tools\Session::get('IdLakier'));

            }


            $view = $this->getView('Konfigurator');
            $view->getConfig();
        }

    }
}