<?php
	namespace Models;
	use \PDO;
	class Pracownik extends Model {

        public function getAll(){
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            $data = array();
            $data['pracownicy'] = array();
            try	{
                $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tablePracownik.'`');
                $pracownicy = $stmt->fetchAll();
                $stmt->closeCursor();
                if($pracownicy && !empty($pracownicy))
                    $data['pracownicy'] = $pracownicy;
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
            $data['pracownik'] = array();
            try	{
                $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tablePracownik.'` WHERE  `'.\Config\Database\DBConfig\Pracownik::$id.'`=:id');
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $result = $stmt->execute();
                $Pracownik = $stmt->fetch(PDO::FETCH_ASSOC);
                $stmt->closeCursor();
                if($Pracownik && !empty($Pracownik))
                    $data['Pracownik'] = $Pracownik;
                else
                    $data['error'] = \Config\Database\DBErrorName::$nomatch;
            }
            catch(\PDOException $e)	{
                $data['error'] = \Config\Database\DBErrorName::$query;
            }
            return $data;
        }



        public function add($imie, $nazwisko, $numer, $kod, $miejscowosc, $ulica, $nr, $telefon){
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($imie === null || $nazwisko == null || $numer == null || $kod == null || $miejscowosc == null || $ulica == null || $nr == null ||  $telefon == null){
                $data['error'] = \Config\Database\DBErrorName::$empty;
                return $data;
            }              
            $data = array();
            try	{
                $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tablePracownik.'` 
                (
                    `'.\Config\Database\DBConfig\Pracownik::$imie.'`,
                    `'.\Config\Database\DBConfig\Pracownik::$nazwisko.'`,
                    `'.\Config\Database\DBConfig\Pracownik::$numer.'`,
                    `'.\Config\Database\DBConfig\Pracownik::$kod.'`,
                    `'.\Config\Database\DBConfig\Pracownik::$miejscowosc.'`,
                    `'.\Config\Database\DBConfig\Pracownik::$ulica.'`,
                    `'.\Config\Database\DBConfig\Pracownik::$nr.'`,
                    `'.\Config\Database\DBConfig\Pracownik::$telefon.'`
                    
                ) VALUES (:imie, :nazwisko, :numer, :kod, :miejscowosc, :ulica, :nr, :telefon)');

                $stmt->bindValue(':imie', $imie, PDO::PARAM_STR);
                $stmt->bindValue(':nazwisko', $nazwisko, PDO::PARAM_STR); 
                $stmt->bindValue(':numer', $numer, PDO::PARAM_STR);
                $stmt->bindValue(':kod', $kod, PDO::PARAM_STR);
                $stmt->bindValue(':miejscowosc', $miejscowosc, PDO::PARAM_STR); 
                $stmt->bindValue(':ulica', $ulica, PDO::PARAM_STR); 
                $stmt->bindValue(':nr', $nr, PDO::PARAM_STR);
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
                $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tablePracownik.'` 
                WHERE  `'.\Config\Database\DBConfig\Pracownik::$id.'`=:id');
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
                $stmt = $this->pdo->prepare('UPDATE  `'.\Config\Database\DBConfig::$tablePracownik.'` SET
                    `'.\Config\Database\DBConfig\Pracownik::$imie.'`=:imie,
                    `'.\Config\Database\DBConfig\Pracownik::$nazwisko.'`=:nazwisko,
                    `'.\Config\Database\DBConfig\Pracownik::$firma.'`=:firma,
                    `'.\Config\Database\DBConfig\Pracownik::$nip.'`=:nip,
                    `'.\Config\Database\DBConfig\Pracownik::$kod.'`=:kod,
                    `'.\Config\Database\DBConfig\Pracownik::$miejscowosc.'`=:miejscowosc,
                    `'.\Config\Database\DBConfig\Pracownik::$ulica.'`=:ulica,
                    `'.\Config\Database\DBConfig\Pracownik::$nr.'`=:nr,
                    `'.\Config\Database\DBConfig\Pracownik::$email.'`=:email,
                    `'.\Config\Database\DBConfig\Pracownik::$telefon.'`=:telefon
                
                 WHERE `'.\Config\Database\DBConfig\Pracownik::$id.'`=:id');
                
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
        
	}
