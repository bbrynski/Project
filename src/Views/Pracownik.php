<?php
	namespace Views;
	
	class Pracownik extends View{

		public function getAll($data = null){
            if(isset($data['message']))
                $this->set('message',$data['message']);
            if(isset($data['error']))
                $this->set('error',$data['error']); 
			$model = $this->getModel('Pracownik');
            $data = $model->getAll();
            $this->set('pracownicy', $data['pracownicy']);
            if(isset($data['error']))
                $this->set('error', $data['error']);
          	$this->render('PracownikGetAll');
		}

        public function getOne($id){
            $model = $this->getModel('Pracownik');
            $data = $model->getOne($id);
            $this->set('pracownicy', $data['pracownicy']);
            if(isset($data['error']))
                $this->set('error', $data['error']);

            $this->render('PracownikGetAll');
        }

        public function addform(){
			$this->render('PracownikAddForm');
        }
        
        public function editform($pracownik){
            $this->set('id', $pracownik[\Config\Database\DBConfig\Pracownik::$id]);
            $this->set('imie', $pracownik[\Config\Database\DBConfig\Pracownik::$imie]);
            $this->set('nazwisko', $pracownik[\Config\Database\DBConfig\Pracownik::$nazwisko]);
            $this->set('firma', $pracownik[\Config\Database\DBConfig\Pracownik::$numer]);
            $this->set('kod', $pracownik[\Config\Database\DBConfig\Pracownik::$kod]);
            $this->set('miejscowosc', $pracownik[\Config\Database\DBConfig\Pracownik::$miejscowosc]);
            $this->set('ulica', $pracownik[\Config\Database\DBConfig\Pracownik::$ulica]);
            $this->set('nr', $pracownik[\Config\Database\DBConfig\Pracownik::$nr]);
            $this->set('telefon', $pracownik[\Config\Database\DBConfig\Pracownik::$telefon]);

			$this->render('PracownikEditForm');
        }
	}


