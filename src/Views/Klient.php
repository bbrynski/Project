<?php
	namespace Views;
	
	class Klient extends View{

		public function getAll($data = null){
            if(isset($data['message']))
                $this->set('message',$data['message']);
            if(isset($data['error']))
                $this->set('error',$data['error']); 
			$model = $this->getModel('Klient');
            $data = $model->getAll();
            $this->set('klienci', $data['klienci']);
            if(isset($data['error']))
                $this->set('error', $data['error']);
          	$this->render('KlientGetAll');
		}

        public function getOne($id){
            $model = $this->getModel('Klient');
            $data = $model->getOne($id);
            $this->set('klienci', $data['klienci']);
            if(isset($data['error']))
                $this->set('error', $data['error']);
            //$this->render('ProductGetOne');
            $this->render('KlientGetAll');
        }

        public function addform(){
			$this->render('KlientAddForm');
        }
        
        public function editform($klient){
            $this->set('id', $klient[\Config\Database\DBConfig\Klient::$id]);
            $this->set('imie', $klient[\Config\Database\DBConfig\Klient::$imie]);
            $this->set('nazwisko', $klient[\Config\Database\DBConfig\Klient::$nazwisko]);
            $this->set('firma', $klient[\Config\Database\DBConfig\Klient::$firma]);
            $this->set('nip', $klient[\Config\Database\DBConfig\Klient::$nip]);
            $this->set('kod', $klient[\Config\Database\DBConfig\Klient::$kod]);
            $this->set('miejscowosc', $klient[\Config\Database\DBConfig\Klient::$miejscowosc]);
            $this->set('ulica', $klient[\Config\Database\DBConfig\Klient::$ulica]);
            $this->set('nr', $klient[\Config\Database\DBConfig\Klient::$nr]);
            $this->set('email', $klient[\Config\Database\DBConfig\Klient::$email]);
            $this->set('telefon', $klient[\Config\Database\DBConfig\Klient::$telefon]);

			$this->render('KlientEditForm');
        }        
	}


