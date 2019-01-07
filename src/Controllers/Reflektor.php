<?php
namespace Controllers;


class Reflektor extends Controller
{

    public function getAll($id){

        if( isset($_POST['id_SamochodKola'])!= null)
        {
            \Tools\Session::set('id_SamochodKola', $_POST['id_SamochodKola']);
        }

        $view = $this->getView('Reflektor');
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