<?php
	namespace Views;
	
	class Odbior extends View{

		public function getAll($data = null){
            if(isset($data['message']))
                $this->set('message',$data['message']);
            if(isset($data['error']))
                $this->set('error',$data['error']);

			$model = $this->getModel('Odbior');
            $data = $model->getAll();

            $this->set('odbiory', $data['odbiory']);
            if(isset($data['error']))
                $this->set('error', $data['error']);
          	$this->render('OdbioryGetAll');
		}


        public function editform($odbior){
            $this->set('Id_Odbior', $odbior[\Config\Database\DBConfig\Odbior::$id]);
            $this->set('Id_Klient', $odbior[\Config\Database\DBConfig\Odbior::$idKlient]);
            $this->set('Data', $odbior[\Config\Database\DBConfig\Odbior::$data]);
            $this->set('Numer_Zamowienia', $odbior[\Config\Database\DBConfig\Odbior::$numerZamowienia]);
            $this->set('Odebrano', $odbior[\Config\Database\DBConfig\Odbior::$odebrano]);

            $model = $this->getModel('Klient');
            $klienci = $model->getAllForSelect();
            $this->set('klienci', $klienci);

            $this->render('OdbioryEditForm');
        }
    }


