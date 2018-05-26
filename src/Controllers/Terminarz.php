<?php
	namespace Controllers;

    class Terminarz extends Controller
    {


		public function getCalendar(){

		    $view = $this->getView("Terminarz");
		    $view->getCalendar();
		}

        public function add(){

            $model = $this->getModel("Terminarz");
            $model->add($_POST['title'], $_POST['start'], $_POST['end']);

        }
	}
