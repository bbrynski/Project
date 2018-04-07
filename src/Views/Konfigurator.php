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
}