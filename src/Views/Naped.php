<?php

namespace Views;


class Naped extends View
{
    public function getAll($data = null){
        if(isset($data['message']))
            $this->set('message',$data['message']);
        if(isset($data['error']))
            $this->set('error',$data['error']);
        $model = $this->getModel('Naped');
        $data = $model->getAll();
        $this->set('napedy', $data['napedy']);
        if(isset($data['error']))
            $this->set('error', $data['error']);
        $this->render('NapedGetAll');
    }
}