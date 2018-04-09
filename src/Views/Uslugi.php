<?php
namespace Views;

class Uslugi extends View{

    public function getAll($data = null){
        if(isset($data['message']))
            $this->set('message',$data['message']);
        if(isset($data['error']))
            $this->set('error',$data['error']);
        $model = $this->getModel('Uslugi');
        $data = $model->getAll();
        $this->set('uslugi', $data['uslugi']);
        if(isset($data['error']))
            $this->set('error', $data['error']);
        $this->render('UslugiGetAll');
    }

    public function getOne($id){
        $model = $this->getModel('Uslugi');
        $data = $model->getOne($id);
        $this->set('uslugi', $data['uslugi']);
        if(isset($data['error']))
            $this->set('error', $data['error']);

        $this->render('UslugiGetAll');
    }

    public function addform(){
        $this->render('UslugiAddForm');
    }

    public function editform($Uslugi){
        $this->set('id', $Uslugi[\Config\Database\DBConfig\Uslugi::$id]);
        $this->set('nazwaUsluga', $Uslugi[\Config\Database\DBConfig\Uslugi::$nazwaUsluga]);

        $this->render('UslugiEditForm');
    }
}


