<?php
namespace Controllers;


class Skrzynia extends Controller
{

    public function getAll($id){

        \Tools\Session::set('idsilnik', $id);

        $view = $this->getView('Skrzynia');
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