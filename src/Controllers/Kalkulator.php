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
            $cena_brutto = $this->get_numeric($_POST['CenaBrutto']);

            $liczbarat = $this->get_numeric($_POST['LiczbaRat']);

            $wklatwlasny = $this->get_numeric($_POST['WkladWlasny']);

            $limit =$this->get_numeric( $_POST['Limit']);


            $tmp = $cena_brutto - ($cena_brutto * $wklatwlasny);

            $tmp2 = $tmp + ($tmp * $limit);

            $wynik = $tmp2 / $liczbarat;




            $view = $this->getView('Kalkulator');
            $view->oblicz($cena_brutto, $wynik);

        }

        public function get_numeric($val) {
            if (is_numeric($val)) {
                return $val + 0;
            }
            return 0;
        }



    }
