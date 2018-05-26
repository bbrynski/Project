<?php
	namespace Models;
	use \PDO;
	class Terminarz extends Model
    {

        public function add( $title, $start, $end)
        {
            if ($this->pdo === null) {
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }


            $data = array();

            $stmt = $this->pdo->prepare('INSERT INTO terminarz (title, start_event, end_event)
                VALUES (:title, :start_event, :end_event)');

            $stmt->bindValue(':title', $title, PDO::PARAM_STR);
            $stmt->bindValue(':star_event', $start, PDO::PARAM_STR);
            $stmt->bindValue(':end_event', $end, PDO::PARAM_STR);
            $result = $stmt->execute();

        }
    }
