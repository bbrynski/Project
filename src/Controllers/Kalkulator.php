<?php
	namespace Controllers;
	
    class Kalkulator extends Controller
    {


		public function get(){


            $view = $this->getView('Kalkulator');
            $view->get();
		}

		public function oblicz()
        {
            $cena_brutto = $_POST['CenaBrutto'];

            $liczbarat = $_POST['LiczbaRat'];

            $wklatwlasny = $_POST['WkladWlasny'];

            $limit = $_POST['Limit'];


            $tmp = $cena_brutto * $wklatwlasny;

        }




	}
