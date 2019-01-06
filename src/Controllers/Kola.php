<?php
namespace Controllers;


class Kola extends Controller
{

    public function getAll()
    {

        \Tools\Session::set('id_SamochodParametry',$_POST['id_SamochodParametry']);



        $view = $this->getView('Kola');
        $data = null;

        if(\Tools\Session::is('message'))
            $data['message'] = \Tools\Session::get('message');
        if(\Tools\Session::is('error'))
            $data['error'] = \Tools\Session::get('error');

        $view->getAll($data);

        \Tools\Session::clear('message');
        \Tools\Session::clear('error');



    }
}