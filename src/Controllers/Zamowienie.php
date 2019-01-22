<?php
/**
 * Created by PhpStorm.
 * User: Damian
 * Date: 2018-03-20
 * Time: 10:28
 */

namespace Controllers;


class Zamowienie extends Controller{

        public function getAll(){
            $view =$this ->getView('Zamowienie');
              $data = null;
             if(\Tools\Session::is('message'))
                 $data['message'] = \Tools\Session::get('message');
            if(\Tools\Session::is('error'))
                $data['error'] = \Tools\Session::get('error');
            $view->getAll($data);
            \Tools\Session::clear('message');
            \Tools\Session::clear('error');
        }

        public function sprawdzStatus(){
            $view =$this ->getView('Zamowienie');
            $view->Status();
        }

        public function sprawdz(){

            $view = $this->getView('Zamowienie');
            $view->sprawdz($_POST['NumerZamowienia']);


        }

        public function addform(){
            $view = $this->getView('Zamowienie');
            $view->addform();
        }

        public function add()
        {
            $model = $this->getModel('Zamowienie');
            $data = $model->add($_POST['Id_Klient'],$_POST['Id_Pracownik'],$_POST['IdModel'],$_POST['Data_Zamowienia'], $_POST['Statuszamowienia']);

            if(isset($data['error']))
                \Tools\Session::set('error', $data['error']);
            if(isset($data['message']))
                \Tools\Session::set('message', $data['message']);

            \Tools\Access::clearAll();
            $this->redirect('Zamowienie');
        }

    public function delete($id){

        $model=$this->getModel('Zamowienie');
        $data = $model->delete($id);
        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('Zamowienie/');
    }
    public function editform($id){

        $model=$this->getModel('Zamowienie');
        $data=$model->getOne($id);


        if(isset($data['error'])){
            \Tools\Session::set('error', $data['error']);
            $this->redirect('Zamowienie/');
        }

       // d($data);

        $view = $this->getView('Zamowienie');
        $view->editform($data['Zamowienie'][0]);
    }
    public function update(){

        $model=$this->getModel('Zamowienie');
        $data = $model->update($_POST['id'], $_POST['Id_Klient'],$_POST['Id_Pracownik'],$_POST['IdModel'],$_POST['Data_Zamowienia'],$_POST['NumerZamowienia'], $_POST['Statuszamowienia']);

        if(isset($data['error']))
            \Tools\Session::set('error', $data['error']);
        if(isset($data['message']))
            \Tools\Session::set('message', $data['message']);
        $this->redirect('Zamowienie/');
    }
}