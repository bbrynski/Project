<?php
/**
 * Created by PhpStorm.
 * User: Damian
 * Date: 2018-03-20
 * Time: 10:28
 */

namespace Controllers;


class UslugiKlient extends Controller{

        public function getAll(){
            $view =$this ->getView('UslugiKlient');
              $data = null;
             if(\Tools\Session::is('message'))
                 $data['message'] = \Tools\Session::get('message');
            if(\Tools\Session::is('error'))
                $data['error'] = \Tools\Session::get('error');
            $view->getAll($data);
            \Tools\Session::clear('message');
            \Tools\Session::clear('error');
        }




        public function addform(){
            $view = $this->getView('UslugiKlient');
            $view->addform();
        }

        public function add()
        {
            $model = $this->getModel('UslugiKlient');
            $data = $model->add($_POST['Id_Uslugi'],$_POST['Id_Klient'],$_POST['Opis']);
            if(isset($data['error']))
                \Tools\Session::set('error', $data['error']);
            if(isset($data['message']))
                \Tools\Session::set('message', $data['message']);
            $this->redirect('UslugiKlient');
        }

    public function getOne($id){
        $view = $this->getView('UslugiKlient');
        $view->getOne($id);
    }

    public function delete($id){

        $model=$this->getModel('UslugiKlient');
        $data = $model->delete($id);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('UslugiKlient/');
    }
    public function editform($id){

        $model=$this->getModel('UslugiKlient');
        $data=$model->getOne($id);
        if(isset($data['error'])){
            \Tools\Session::set('error', $data['error']);
            $this->redirect('UslugiKlient/');
        }
        $view = $this->getView('UslugiKlient');
        $view->editform($data['UslugiKlient']);
    }
    public function update(){

        $model=$this->getModel('UslugiKlient');
        $data = $model->update($_POST['id'], $_POST['Id_Model'],$_POST['Id_Uslugi'],$_POST['Id_Klient'],$_POST['Opis']);

        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('UslugiKlient/');
    }
}