<?php
namespace Models;
use \PDO;
class Access extends Model {
    public function login($login, $password){
        //tutaj powinno nastąpić weryfikacja podanych danych
        //z tymi zapisanymi w bazie

        $data = $this->getAll();

        foreach ($data['uzytkownicy'] as $key => $uzytkownik) {
          

            if ($uzytkownik['Login'] === $login) {
                
                if ($uzytkownik['Haslo'] === $password) {
                    \Tools\Access::login($_POST['login']);
                    return $data;
                }
            }
        }
        $data['error'] = \Config\Website\ErrorName::$wrongdata;
        return $data;
        

    }
    public function logout(){
        \Tools\Access::logout();
    }

    public function rejestracja_1($imie, $nazwisko, $email, $haslo, $haslo2, $klienci){

        //var_dump($klienci);

        if($haslo === $haslo2)
            foreach ($klienci['klienci'] as $key => $klient) {
                if ($klient['Imie'] === $imie)
                    if ($klient['Nazwisko'] === $nazwisko)
                        if ($klient['Email'] === $email){
                            $data['error'] = \Config\Website\MessageName::$ok;
                            $this->dodajUzytkownika($email, $haslo);

                        }

            }
            else {
                $data['error'] = \Config\Website\ErrorName::$wrongdata;
                return $data;
        }
    }

    public function dodajUzytkownika($login, $haslo){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }

        if($login === null || $haslo === null){
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }
        $data = array();
        try	{
            $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableUzytkownik.'` 
                (
                    `'.\Config\Database\DBConfig\Uzytkownik::$login.'`,
                    `'.\Config\Database\DBConfig\Uzytkownik::$haslo.'`
                    
                ) VALUES (:login, :haslo)');

            $stmt->bindValue(':login', $login, PDO::PARAM_STR);
            $stmt->bindValue(':haslo', $haslo, PDO::PARAM_STR);
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





    public function getAll(){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        $data = array();
        $data['uzytkownicy'] = array();
        try	{
            $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableUzytkownik.'`');
            $uzytkownicy = $stmt->fetchAll();
            $stmt->closeCursor();
            if($uzytkownicy && !empty($uzytkownicy))
                $data['uzytkownicy'] = $uzytkownicy;
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }
}
