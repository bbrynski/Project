<?php
namespace Controllers;

class ZbiorModeli extends Controller
{
    public function getAll()
    {
        $view = $this->getView('ZbiorModeli');
        $data = null;

        if(\Tools\Session::is('message'))
            $data['message'] = \Tools\Session::get('message');
        if(\Tools\Session::is('error'))
            $data['error'] = \Tools\Session::get('error');

        $view->getAll($data);

        \Tools\Session::clear('message');
        \Tools\Session::clear('error');
    }


    public function WyborWersji()
    {

        print ($_POST['nazwa']);

        $nazwaModelu = $_POST['nazwa'];

        $view = $this->getView('ZbiorModeli');
        $data = null;

        if(\Tools\Session::is('message'))
            $data['message'] = \Tools\Session::get('message');
        if(\Tools\Session::is('error'))
            $data['error'] = \Tools\Session::get('error');

        $view->WyborWersji($data, $nazwaModelu);

        \Tools\Session::clear('message');
        \Tools\Session::clear('error');

    }
}