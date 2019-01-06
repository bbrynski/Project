<?php
namespace Controllers;


class Lakier extends Controller
{

    public function getAll($id){

        \Tools\Session::set('id_SamochodWyposazenie',$_POST['id_SamochodWyposazenie']);

        $view = $this->getView('Lakier');
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