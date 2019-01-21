<?php
namespace Controllers;


class Podsumowanie extends Controller
{
    public function getAll()
    {



        if( isset($_POST['IdLakier'])!= null)
        {
            \Tools\Session::set('IdLakier', $_POST['IdLakier']);
        }

        $view = $this->getView('Podsumowanie');
        $view->getAll();

    }

    public function zapisz()
    {
        $id_ZbiorModeli = \Tools\Session::get('id_ZbiorModeli');
        $id_SamochodParametry = \Tools\Session::get('id_SamochodParametry');
        $id_SamochodKola = \Tools\Session::get('id_SamochodKola');
        $id_SamochodSwiatla = \Tools\Session::get('id_SamochodSwiatla');
        $id_SamochodWyposazenie = \Tools\Session::get('id_SamochodWyposazenie');
        $id_Lakier = \Tools\Session::get('IdLakier');

        $model=$this->getModel('Podsumowanie');
        $data = $model->add($id_ZbiorModeli, $id_SamochodParametry, $id_SamochodKola, $id_SamochodSwiatla, $id_SamochodWyposazenie, $id_Lakier);

        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);



        $numer = $data['numer'];
        \Tools\Session::set('numer', $numer);

        $this->redirect('Podsumowanie');
    }



    /*

    public function getAll($id=0)
    {

            if (isset($_POST['reflektory']) && isset($_POST['kola'])) {
                if(isset($_POST['reflektory']) && isset($_POST['kola'])) {
                    \Tools\Session::set('idreflektory', $_POST['reflektory']);
                    \Tools\Session::set('idkola', $_POST['kola']);
                }
            }

            $wyposazenie = array();
            if (!empty($_POST['opcje'])) {
                foreach ($_POST['opcje'] as $selected) {
                    if (\Config\Database\DBConfig\Wyposazenie::$DodatkowyKompletOpon == $selected) {
                        \Tools\Session::set('kompletOpon', $selected);
                        $wyposazenie[] = 'Dodatkowy komplet opon';
                    }
                    if (\Config\Database\DBConfig\Wyposazenie::$PodgrzewanaSzybaPrzod == $selected) {
                        \Tools\Session::set('podgrzewanaSzybaPrzod', $selected);
                        $wyposazenie[] = 'Podgrzewana szyba przednia';
                    }
                    if (\Config\Database\DBConfig\Wyposazenie::$PodgrzewaneSiedzenia == $selected) {
                        \Tools\Session::set('podgrzewaneSiedzenia', $selected);
                        $wyposazenie[] = 'Podgrzewane siedzenia';
                    }
                    if (\Config\Database\DBConfig\Wyposazenie::$SkorzanaTapicerka == $selected) {
                        \Tools\Session::set('skorzanaTapicerka', $selected);
                        $wyposazenie[] = 'Skórzana tapicerka';
                    }
                }
            }


        $view = $this->getView('Podsumowanie');
        $data = null;

        $data['wyposazenie']=$wyposazenie;
        if($id != 0)
        $data['konfigurator']=$id;


        if(\Tools\Session::is('message'))
            $data['message'] = \Tools\Session::get('message');
        if(\Tools\Session::is('error'))
            $data['error'] = \Tools\Session::get('error');

        //$data['reflektory']=$_POST['reflektory'];
        //$data['kola']=$_POST['kola'];



        $view->getAll($data);
        \Tools\Session::clear('message');
        \Tools\Session::clear('error');
    }

    */
}