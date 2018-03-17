<?php

namespace Views;


class Silnik extends View
{
    public function getAll($data = null){
        if(isset($data['message']))
            $this->set('message',$data['message']);
        if(isset($data['error']))
            $this->set('error',$data['error']);
        $model = $this->getModel('Silnik');
        $data = $model->getAll();
        $this->set('silniki', $data['silniki']);
        if(isset($data['error']))
            $this->set('error', $data['error']);
        $this->render('SilnikGetAll');
    }
}