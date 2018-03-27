<?php
namespace Controllers;


class Reflektor extends Controller
{

    public function getAll($id){

        \Tools\Session::set('idnaped', $id);

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