<?php
	namespace Models;
	use \PDO;
	class Klient extends Model {

        public function getAll(){
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            $data = array();
            $data['$klienci'] = array();
            try	{
                $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableKlient.'`');
                $klienci = $stmt->fetchAll();
                $stmt->closeCursor();
                if($klienci && !empty($klienci))
                    $data['klienci'] = $klienci;
            }
            catch(\PDOException $e)	{
                $data['error'] = \Config\Database\DBErrorName::$query;
            }
            return $data;
        }


        public function getOne($id){
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($id === null){
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
                return $data;
            }
            $data = array();
            $data['Klient'] = array();
            try	{
                $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableKlient.'` WHERE  `'.\Config\Database\DBConfig\Klient::$id.'`=:id');
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $result = $stmt->execute();
                $Klient = $stmt->fetch(PDO::FETCH_ASSOC);
                $stmt->closeCursor();
                if($Klient && !empty($Klient))
                    $data['Klient'] = $Klient;
                else
                    $data['error'] = \Config\Database\DBErrorName::$nomatch;
            }
            catch(\PDOException $e)	{
                $data['error'] = \Config\Database\DBErrorName::$query;
            }
            return $data;
        }



        public function add($imie, $nazwisko, $firma, $nip, $kod, $miejscowosc, $ulica, $nr, $email, $telefon){
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($imie === null || $nazwisko == null || $kod == null || $miejscowosc == null || $ulica == null || $nr == null || $email == null || $telefon == null){
                $data['error'] = \Config\Database\DBErrorName::$empty;
                return $data;
            }              
            $data = array();
            try	{
                $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableKlient.'` 
                (
                    `'.\Config\Database\DBConfig\Klient::$imie.'`,
                    `'.\Config\Database\DBConfig\Klient::$nazwisko.'`,
                    `'.\Config\Database\DBConfig\Klient::$firma.'`,
                    `'.\Config\Database\DBConfig\Klient::$nip.'`,
                    `'.\Config\Database\DBConfig\Klient::$kod.'`,
                    `'.\Config\Database\DBConfig\Klient::$miejscowosc.'`,
                    `'.\Config\Database\DBConfig\Klient::$ulica.'`,
                    `'.\Config\Database\DBConfig\Klient::$nr.'`,
                    `'.\Config\Database\DBConfig\Klient::$email.'`,
                    `'.\Config\Database\DBConfig\Klient::$telefon.'`
                    
                ) VALUES (:imie, :nazwisko, :firma, :nip, :kod, :miejscowosc, :ulica, :nr, :email, :telefon)');                   

                $stmt->bindValue(':imie', $imie, PDO::PARAM_STR);
                $stmt->bindValue(':nazwisko', $nazwisko, PDO::PARAM_STR); 
                $stmt->bindValue(':firma', $firma, PDO::PARAM_STR); 
                $stmt->bindValue(':nip', $nip, PDO::PARAM_STR); 
                $stmt->bindValue(':kod', $kod, PDO::PARAM_STR);
                $stmt->bindValue(':miejscowosc', $miejscowosc, PDO::PARAM_STR); 
                $stmt->bindValue(':ulica', $ulica, PDO::PARAM_STR); 
                $stmt->bindValue(':nr', $nr, PDO::PARAM_STR); 
                $stmt->bindValue(':email', $email, PDO::PARAM_STR); 
                $stmt->bindValue(':telefon', $telefon, PDO::PARAM_STR); 
                
                $result = $stmt->execute(); 
                
                if(!$result)
                    $data['error'] = \Config\Database\DBErrorName::$noadd;
                else
                    $data['message'] = \Config\Database\DBMessageName::$addok;
                $stmt->closeCursor();                 
            }
            catch(\PDOException $e)	{
                $data['error'] = \Config\Database\DBErrorName::$query;
            }	
            return $data;
		}
        
        public function delete($id){
            $data = array();
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($id === null){
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
                return $data;
            }
            try	{
                $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tableKlient.'` 
                WHERE  `'.\Config\Database\DBConfig\Klient::$id.'`=:id');   
                $stmt->bindValue(':id', $id, PDO::PARAM_INT); 
                $result = $stmt->execute(); 
                if(!$result)
                    $data['error'] = \Config\Database\DBErrorName::$nomatch;
                else
                    $data['message'] = \Config\Database\DBMessageName::$deleteok;
                $stmt->closeCursor();                 
            }
            catch(\PDOException $e)	{
                $data['error'] = \Config\Database\DBErrorName::$query;
            }
            return $data;
		}  
        
        public function update($id, $imie, $nazwisko, $firma, $nip, $kod, $miejscowosc, $ulica, $nr, $email, $telefon){
            $data = array();
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($id == null){
                $data['error'] = \Config\Database\DBErrorName::$empty;
                return $data;
            }
            try	{
                $stmt = $this->pdo->prepare('UPDATE  `'.\Config\Database\DBConfig::$tableKlient.'` SET
                    `'.\Config\Database\DBConfig\Klient::$imie.'`=:imie,
                    `'.\Config\Database\DBConfig\Klient::$nazwisko.'`=:nazwisko,
                    `'.\Config\Database\DBConfig\Klient::$firma.'`=:firma,
                    `'.\Config\Database\DBConfig\Klient::$nip.'`=:nip,
                    `'.\Config\Database\DBConfig\Klient::$kod.'`=:kod,
                    `'.\Config\Database\DBConfig\Klient::$miejscowosc.'`=:miejscowosc,
                    `'.\Config\Database\DBConfig\Klient::$ulica.'`=:ulica,
                    `'.\Config\Database\DBConfig\Klient::$nr.'`=:nr,
                    `'.\Config\Database\DBConfig\Klient::$email.'`=:email,
                    `'.\Config\Database\DBConfig\Klient::$telefon.'`=:telefon
                
                 WHERE `'.\Config\Database\DBConfig\Klient::$id.'`=:id');   
                
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->bindValue(':imie', $imie, PDO::PARAM_STR);
                $stmt->bindValue(':nazwisko', $nazwisko, PDO::PARAM_STR); 
                $stmt->bindValue(':firma', $firma, PDO::PARAM_STR); 
                $stmt->bindValue(':nip', $nip, PDO::PARAM_STR); 
                $stmt->bindValue(':kod', $kod, PDO::PARAM_STR);
                $stmt->bindValue(':miejscowosc', $miejscowosc, PDO::PARAM_STR); 
                $stmt->bindValue(':ulica', $ulica, PDO::PARAM_STR); 
                $stmt->bindValue(':nr', $nr, PDO::PARAM_STR); 
                $stmt->bindValue(':email', $email, PDO::PARAM_STR);
                $stmt->bindValue(':telefon', $telefon, PDO::PARAM_STR); 
                
                $result = $stmt->execute(); 
                $rows = $stmt->rowCount();
                if(!$result)
                    $data['error'] = \Config\Database\DBErrorName::$nomatch;
                else
                    $data['message'] = \Config\Database\DBMessageName::$updateok;
                $stmt->closeCursor();                 
            }
            catch(\PDOException $e)	{
                $data['error'] = \Config\Database\DBErrorName::$query;
            }
            return $data;
		}


        public function getAllForSelect(){
            $data = $this->getAll();
            $klienci = array();

            if(!isset($data['error']))

                foreach($data['klienci'] as $klient) {
                    $opcja = $klient['Imie'] . ' ' . $klient['Nazwisko'];
                    $klienci[$klient[\Config\Database\DBConfig\Klient::$id]] = $opcja;
                }

            return $klienci;
        }
        
	}
