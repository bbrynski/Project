<?php

namespace Views;


class Reflektor extends View
{
    public function getAll($data = null){
        if(isset($data['message']))
            $this->set('message',$data['message']);
        if(isset($data['error']))
            $this->set('error',$data['error']);

        //reflektory
        $model = $this->getModel('Reflektor');
        $data = $model->getAllForSelect();
        $this->set('reflektory', $data);

        $model = $this->getModel('Kola');
        $data = $model->getAllForSelect();
        $this->set('kola', $data);

        d($data);
        if(isset($data['error']))
            $this->set('error', $data['error']);
        $this->render('ReflektoryGetAll');
    }
}