<?php
/**
 * Created by PhpStorm.
 * User: Damian
 * Date: 2018-03-22
 * Time: 21:08
 */

namespace Views;


class Kalkulator extends View
{
    public function get(){
        $this->render('Kalkulator/Kalkulator');
    }

    public function oblicz($cenabrutto, $wynik)
    {
        //d($wynik);
        $this->set('cena', $cenabrutto);
        $this->set('wynik', $wynik);
        $this->render('Kalkulator/Kalkulator');
    }
}