<?php
	namespace Views;
	
	class UslugaSerwis extends View{

		public function getAll($data = null){
            if(isset($data['message']))
                $this->set('message',$data['message']);
            if(isset($data['error']))
                $this->set('error',$data['error']);

			$model = $this->getModel('UslugaSerwis');
            $data = $model->getAll();
            $this->set('serwis', $data['serwis']);


            if(isset($data['error']))
                $this->set('error', $data['error']);


            $model_uslugi = $this->getModel('Uslugi');
            $uslugi = $model_uslugi->getAllForSelect();
            $this->set('uslugi', $uslugi);


            $this->render('UslugaSerwisGetAll');
		}
	}


