<?php

namespace Views;


class Konfigurator extends View
{
    public function loadConfig($data = null){
        if(isset($data['message']))
            $this->set('message',$data['message']);
        if(isset($data['error']))
            $this->set('error',$data['error']);

        $this->render("Konfigurator");

    }

    public function getConfig($data = null){
        if(isset($data['message']))
            $this->set('message',$data['message']);
        if(isset($data['error']))
            $this->set('error',$data['error']);

        $this->set('config', $data['config']);


        $this->render("KonfiguratorGetOne");

    }

    public function getAll(){
        $model = $this->getModel('Samochod');
        $data = $model->getAll();
        $this->set('samochody', $data['samochody']);

        $this->render('KonfiguratorGetAll');
    }
}