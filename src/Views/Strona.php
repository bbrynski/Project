<?php
	namespace Views;
	
	class Strona extends View{

		public function getAll()
        {
          	$this->render('Strona/Strona');
		}

		public function Golf()
        {
            $this->render('Strona/Golf');
        }

        public function Arteon()
        {
            $this->render('Strona/Arteon');
        }


	}


