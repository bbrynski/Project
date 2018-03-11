<?php

namespace Views;


class Samochod extends View
{

    public function addform(){

        $model_silnik = $this->getModel('Silnik');
        $silniki=$model_silnik->getAllForSelect();

        $this->set(silniki,$silniki);

        $this->render('SamochodAddForm');
    }

}