<?php
	namespace Views;
	
	class KlientSamochod extends View{

		public function getOne($id){
			$model = $this->getModel('KlientSamochod');
            $model_uslugi = $this->getModel('UslugiKlient');
            $data = $model->getOne($id);
            $this->set('samochody', $data['samochody']);
            $data =  $model_uslugi->getOne($data['samochody'][0]['Id_KlientSamochod']);
            $this->set('uslugi', $data);



            if(isset($data['error']))
                $this->set('error', $data['error']);
          	$this->render('KlientSamochodGetAll');
		}
	}


