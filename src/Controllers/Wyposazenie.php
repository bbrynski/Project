<?php
namespace Controllers;


class Wyposazenie extends Controller
{

    public function getAll(){

        \Tools\Session::set('id_SamochodSwiatla',$_POST['id_SamochodSwiatla']);

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
}