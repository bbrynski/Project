<?php

namespace Models;
use \PDO;

class ZbiorModeli extends Model
{
    public function getAll()
    {
        if($this->pdo === null)
        {
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }

        $data = array();
        $data['ZbiorModeli'] = array();

        try
        {
            $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableZbiorModeli.'` GROUP BY  '.\Config\Database\DBConfig\ZbiorModeli::$nazwa);

            $result = $stmt->execute();
            $ZbiorModeli = $stmt->fetchAll();

            $stmt->closeCursor();
            if($ZbiorModeli && !empty($ZbiorModeli))
                $data['ZbiorModeli'] = $ZbiorModeli;
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }

    public function getAll2()
    {
        if($this->pdo === null)
        {
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }

        $data = array();
        $data['ZbiorModeli'] = array();

        try
        {
            $stmt = $this->pdo->query('SELECT * FROM  `'.\Config\Database\DBConfig::$tableZbiorModeli.'` 
                               INNER JOIN '.\Config\Database\DBConfig::$tableWersja. '
                                ON '.\Config\Database\DBConfig::$tableZbiorModeli.'.'.\Config\Database\DBConfig\ZbiorModeli::$id_Wersja.'
                                ='.\Config\Database\DBConfig::$tableWersja.'.'.\Config\Database\DBConfig\Wersja::$id_Wersja);
            
            $result = $stmt->execute();
            $ZbiorModeli = $stmt->fetchAll();

           // d($ZbiorModeli);

            $stmt->closeCursor();
            if($ZbiorModeli && !empty($ZbiorModeli))
                $data['ZbiorModeli'] = $ZbiorModeli;
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }

    public function WyborWersji($nazwaModelu)
    {
        if($this->pdo === null)
        {
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }

        if($nazwaModelu === null){
            $data['error'] = \Config\Database\DBErrorName::$nomatch;
            return $data;
        }

        $data = array();
        $data['WyborWersji'] = array();

        try
        {
            $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableZbiorModeli.'` 
                               INNER JOIN '.\Config\Database\DBConfig::$tableWersja. ' 
                                ON '.\Config\Database\DBConfig::$tableZbiorModeli.'.'.\Config\Database\DBConfig\ZbiorModeli::$id_Wersja.'
                                ='.\Config\Database\DBConfig::$tableWersja.'.'.\Config\Database\DBConfig\Wersja::$id_Wersja.'
            
                                            WHERE  '.\Config\Database\DBConfig::$tableZbiorModeli.'.'.\Config\Database\DBConfig\ZbiorModeli::$nazwa.'=:nazwa');
            $stmt->bindValue(':nazwa', $nazwaModelu, PDO::PARAM_STR);
            $result = $stmt->execute();

            $WyborWersji = $stmt->fetchAll();

            $stmt->closeCursor();
            if($WyborWersji && !empty($WyborWersji))
                $data['WyborWersji'] = $WyborWersji;
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }

    public function add($nazwa_model, $id_wersja, $cena, $img){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if($nazwa_model==null && $id_wersja==null && $cena==null && $img ==null){
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }
        //$image=base64_encode(file_get_contents(addslashes($img)));
        $data = array();


        try	{
            $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableZbiorModeli.'` 
                (
                    `'.\Config\Database\DBConfig\ZbiorModeli::$nazwa.'`,
                    `'.\Config\Database\DBConfig\ZbiorModeli::$id_Wersja.'`,
                    `'.\Config\Database\DBConfig\ZbiorModeli::$cena.'`,
                    `'.\Config\Database\DBConfig\ZbiorModeli::$foto.'`
                  
                    
                ) VALUES (:nazwa, :wersja, :cena, :foto)');

            $stmt->bindValue(':nazwa', $nazwa_model, PDO::PARAM_STR);
            $stmt->bindValue(':wersja', $id_wersja, PDO::PARAM_INT);
            $stmt->bindValue(':cena', $cena, PDO::PARAM_STR);
            $stmt->bindValue(':foto', $img, PDO::PARAM_STR);

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

    public function getAllWersje()
    {
        if($this->pdo === null)
        {
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }

        $data = array();
        $data['wersje'] = array();

        try
        {
            $stmt = $this->pdo->query('SELECT * FROM  '.\Config\Database\DBConfig::$tableWersja);

            $result = $stmt->execute();
            $wersje = $stmt->fetchAll();

            $stmt->closeCursor();
            if($wersje && !empty($wersje))
                $data['wersje'] = $wersje;
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }


    public function SelectWersje()
    {
        $data = $this->getAllWersje();
        $wersje = array();

        if(!isset($data['error']))
            foreach($data['wersje'] as $wersja)
                $wersje[$wersja[\Config\Database\DBConfig\Wersja::$id_Wersja]] = $wersja[\Config\Database\DBConfig\Wersja::$nazwa];

        return $wersje;
    }

    public function delete_wersja($id){
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
            $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tableZbiorModeli.'` 
                WHERE  `'.\Config\Database\DBConfig\ZbiorModeli::$id_ZbiorModeli.'`=:id');
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
}