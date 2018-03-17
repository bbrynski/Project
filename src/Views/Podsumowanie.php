<?php

namespace Views;


class Podsumowanie extends View
{
    public function getAll($data = null){
        if(isset($data['message']))
            $this->set('message',$data['message']);
        if(isset($data['error']))
            $this->set('error',$data['error']);

        $model = $this->getModel('Samochod');
        $data = $model->getAll();
        $this->set('samochody', $data['samochody']);

        $model = $this->getModel('Silnik');
        $data = $model->getAll();
        $this->set('silniki', $data['silniki']);

        $model = $this->getModel('Skrzynia');
        $data = $model->getAll();
        $this->set('skrzynie', $data['skrzynie']);


        if(isset($data['error']))
            $this->set('error', $data['error']);
        $this->render('PodsumowanieGetAll');
    }
}