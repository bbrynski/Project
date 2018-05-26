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
                        \Tools\Access::login($login);

                    $dostep = $uzytkownik['Prawo'];
                    $id = $uzytkownik['Id_Uzytkownika'];


                    // dostęp do prawa
                    \Tools\Session::set('prawo', $dostep);
                    \Tools\Session::set('idUzytkownik', $id);
                    \Tools\Session::set('login', $uzytkownik['Login'] );
                    return $data;
                }
            }
        }
        $data['error'] = \Config\Website\ErrorName::$wrongdata;
        return $data;
        

    }
    public function logout(){
        \Tools\Access::logout();
        \Tools\Session::clear('prawo');
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
