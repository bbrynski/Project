<!doctype html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <title>Instalacja</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
	require 'vendor/autoload.php';
    
    use Config\Database\DBConfig as DB;
	use Config\Database\DBConnection as DBConnection;
    
	DBConnection::setDBConnection(DB::$user,DB::$password, 
                DB::$hostname, DB::$databaseType, DB::$port);	
    try {
        $pdo =  DBConnection::getHandle();
    }catch(\PDOException $e){
        echo \Config\Database\DBErrorName::$connection;
        exit(1);
	}    
    
    /**
        usunięcie starych tabel    
    */

    $query = 'DROP TABLE IF EXISTS `'.DB::$tableZamowienie.'`';
    try
    {
        $pdo->exec($query);
    }
    catch(PDOException $e)
    {
        echo \Config\Database\DBErrorName::$delete_table.DB::$tableZamowienie;
    }

    $query = 'DROP TABLE IF EXISTS `'.DB::$tablePracownik.'`';
    try
    {
        $pdo->exec($query);
    }
    catch(PDOException $e)
    {
        echo \Config\Database\DBErrorName::$delete_table.DB::$tablePracownik;
    }

    
    $query = 'DROP TABLE IF EXISTS `'.DB::$tableUzytkownik.'`';
	try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$delete_table.DB::$tableUzytkownik;
	}

    $query = 'DROP TABLE IF EXISTS `'.DB::$tableKlient.'`';
    try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$delete_table.DB::$tableKlient;
	}

    $query = 'DROP TABLE IF EXISTS `'.DB::$tableModel.'`';
    try
    {
        $pdo->exec($query);
    }
    catch(PDOException $e)
    {
        echo \Config\Database\DBErrorName::$delete_table.DB::$tableModel;
    }

    $query = 'DROP TABLE IF EXISTS `'.DB::$tableSilnik.'`';
    try
    {
        $pdo->exec($query);
    }
    catch(PDOException $e)
    {
        echo \Config\Database\DBErrorName::$delete_table.DB::$tableSilnik;
    }

    $query = 'DROP TABLE IF EXISTS `'.DB::$tableSkrzynia.'`';
    try
    {
        $pdo->exec($query);
    }
    catch(PDOException $e)
    {
        echo \Config\Database\DBErrorName::$delete_table.DB::$tableSkrzynia;
    }

    $query = 'DROP TABLE IF EXISTS `'.DB::$tableNaped.'`';
    try
    {
        $pdo->exec($query);
    }
    catch(PDOException $e)
    {
        echo \Config\Database\DBErrorName::$delete_table.DB::$tableNaped;
    }

    $query = 'DROP TABLE IF EXISTS `'.DB::$tableLakier.'`';
    try
    {
        $pdo->exec($query);
    }
    catch(PDOException $e)
    {
        echo \Config\Database\DBErrorName::$delete_table.DB::$tableLakier;
    }

    $query = 'DROP TABLE IF EXISTS `'.DB::$tableWyposazenie.'`';
    try
    {
        $pdo->exec($query);
    }
    catch(PDOException $e)
    {
        echo \Config\Database\DBErrorName::$delete_table.DB::$tableWyposazenie;
    }


    $query = 'DROP TABLE IF EXISTS `'.DB::$tableKola.'`';
    try
    {
        $pdo->exec($query);
    }
    catch(PDOException $e)
    {
        echo \Config\Database\DBErrorName::$delete_table.DB::$tableKola;
    }

    $query = 'DROP TABLE IF EXISTS `'.DB::$tableReflektory.'`';
    try
    {
        $pdo->exec($query);
    }
    catch(PDOException $e)
    {
        echo \Config\Database\DBErrorName::$delete_table.DB::$tableReflektory;
    }





/*
    tworzenie tabeli uzytkownik
*/
    $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableUzytkownik.'` (
		`'.DB\Uzytkownik::$id_uzytkownik.'` INT NOT NULL AUTO_INCREMENT,
        `'.DB\Uzytkownik::$login.'` VARCHAR(30) NOT NULL UNIQUE,
        `'.DB\Uzytkownik::$haslo.'` VARCHAR(32) NOT NULL,
        `'.DB\Uzytkownik::$prawo.'` VARCHAR(30) NOT NULL,
		PRIMARY KEY (`'.DB\Uzytkownik::$id_uzytkownik.'`)
		) ENGINE=InnoDB;';
	try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$create_table.DB::$tableUzytkownik;
	}
    


            /**
        tworzenie tabeli klient
         */
        $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableKlient.'` (
                `'.DB\Klient::$id.'` INT NOT NULL AUTO_INCREMENT,
                `'.DB\Klient::$imie.'` VARCHAR(30) NOT NULL,
                `'.DB\Klient::$nazwisko.'` VARCHAR(30) NOT NULL,
                `'.DB\Klient::$firma.'` VARCHAR(50) NULL,
                `'.DB\Klient::$nip.'` VARCHAR(13) NULL,
                `'.DB\Klient::$kod.'` VARCHAR(6) NOT NULL,
                `'.DB\Klient::$miejscowosc.'` VARCHAR(50) NOT NULL,
                `'.DB\Klient::$ulica.'` VARCHAR(50) NOT NULL,
                `'.DB\Klient::$nr.'` VARCHAR(10) NOT NULL,
                `'.DB\Klient::$email.'` VARCHAR(50) NOT NULL UNIQUE,
                `'.DB\Klient::$telefon.'` VARCHAR(12) NOT NULL,
                PRIMARY KEY (`'.DB\Klient::$id.'`)) ENGINE=InnoDB;';

        try
        {
            $pdo->exec($query);
        }
        catch(PDOException $e)
        {
            echo \Config\Database\DBErrorName::$create_table.DB::$tableKlient;
        }


        /**
        tworzenie tabeli pracownik
         */
        $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tablePracownik.'` (
                `'.DB\Pracownik::$id.'` INT NOT NULL AUTO_INCREMENT,
                `'.DB\Pracownik::$imie.'` VARCHAR(30) NOT NULL,
                `'.DB\Pracownik::$nazwisko.'` VARCHAR(30) NOT NULL,
                `'.DB\Pracownik::$numer.'` FLOAT NOT NULL,
                `'.DB\Pracownik::$kod.'` VARCHAR(6) NOT NULL,
                `'.DB\Pracownik::$miejscowosc.'` VARCHAR(50) NOT NULL,
                `'.DB\Pracownik::$ulica.'` VARCHAR(50) NOT NULL,
                `'.DB\Pracownik::$nr.'` VARCHAR(10) NOT NULL,
                `'.DB\Pracownik::$telefon.'` VARCHAR(12) NOT NULL,
                PRIMARY KEY (`'.DB\Pracownik::$id.'`)) ENGINE=InnoDB;';

        try
        {
            $pdo->exec($query);
        }
        catch(PDOException $e)
        {
            echo \Config\Database\DBErrorName::$create_table.DB::$tablePracownik;
        }

    /**
    *  Tworzenie tabeli silnik
    */
    $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableSilnik.'` (
		    `'.DB\Silnik::$id.'` INT NOT NULL AUTO_INCREMENT,
		    `'.DB\Silnik::$TypSilnika.'` VARCHAR(40) NOT NULL,
		    `'.DB\Silnik::$pojemnosc.'` FLOAT NOT NULL,
            `'.DB\Silnik::$MaxMoc.'` INT NOT NULL,
		    PRIMARY KEY (`'.DB\Silnik::$id.'`)) ENGINE=InnoDB;';

    try
    {
        $pdo->exec($query);
    }
    catch(PDOException $e)
    {
        echo \Config\Database\DBErrorName::$create_table.DB::$tableSilnik;
    }

    /**
    *  Tworzenie tabeli skrzynia
    */
    $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableSkrzynia.'` (
		        `'.DB\Skrzynia::$id.'` INT NOT NULL AUTO_INCREMENT,
		        `'.DB\Skrzynia::$TypSkrzyni.'` VARCHAR(20) NOT NULL,
		        PRIMARY KEY (`'.DB\Skrzynia::$id.'`)) ENGINE=InnoDB;';

    try
    {
        $pdo->exec($query);
    }
    catch(PDOException $e)
    {
        echo \Config\Database\DBErrorName::$create_table.DB::$tableSkrzynia;
    }

    /**
    *  Tworzenie tabeli naped
    */
    $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableNaped.'` (
		            `'.DB\Naped::$id.'` INT NOT NULL AUTO_INCREMENT,
		            `'.DB\Naped::$nazwaNaped.'` VARCHAR(40) NOT NULL,
		            PRIMARY KEY (`'.DB\Naped::$id.'`)) ENGINE=InnoDB;';

    try
    {
        $pdo->exec($query);
    }
    catch(PDOException $e)
    {
        echo \Config\Database\DBErrorName::$create_table.DB::$tableNaped;
    }

    /**
    *  Tworzenie tabeli lakier
    */
    $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableLakier.'` (
		                `'.DB\Lakier::$id.'` INT NOT NULL AUTO_INCREMENT,
		                `'.DB\Lakier::$nazwaLakier.'` VARCHAR(40) NOT NULL,
		                `'.DB\Lakier::$Foto.'` MEDIUMBLOB NULL,
		                PRIMARY KEY (`'.DB\Lakier::$id.'`)) ENGINE=InnoDB;';

    try
    {
        $pdo->exec($query);
    }
    catch(PDOException $e)
    {
        echo \Config\Database\DBErrorName::$create_table.DB::$tableLakier;
    }

    /**
    *  Tworzenie tabeli kola
    */
    $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableKola.'` (
		                    `'.DB\Kola::$id.'` INT NOT NULL AUTO_INCREMENT,
		                    `'.DB\Kola::$wartosc.'` INT NOT NULL,
		                    PRIMARY KEY (`'.DB\Kola::$id.'`)) ENGINE=InnoDB;';

    try
    {
        $pdo->exec($query);
    }
    catch(PDOException $e)
    {
        echo \Config\Database\DBErrorName::$create_table.DB::$tableKola;
    }

    /**
    *  Tworzenie tabeli reflektory
    */
    $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableReflektory.'` (
		                        `'.DB\Reflektory::$id.'` INT NOT NULL AUTO_INCREMENT,
		                        `'.DB\Reflektory::$nazwaReflektory.'` VARCHAR(50) NOT NULL,
		                        PRIMARY KEY (`'.DB\Reflektory::$id.'`)) ENGINE=InnoDB;';

    try
    {
        $pdo->exec($query);
    }
    catch(PDOException $e)
    {
        echo \Config\Database\DBErrorName::$create_table.DB::$tableReflektory;
    }

    /**
    tworzenie tabeli wyposazenie
    */
    $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableWyposazenie.'` (
		    `'.DB\Wyposazenie::$id.'` INT NOT NULL AUTO_INCREMENT,
            `'.DB\Wyposazenie::$Id_Kola.'` INT NOT NULL,
            `'.DB\Wyposazenie::$Id_Reflektory.'` INT NOT NULL,
            `'.DB\Wyposazenie::$PodgrzewaneSiedzenia.'` BIT NOT NULL,
            `'.DB\Wyposazenie::$PodgrzewanaSzybaPrzod.'` BIT NOT NULL,
            `'.DB\Wyposazenie::$DodatkowyKompletOpon.'` BIT NOT NULL,
            `'.DB\Wyposazenie::$SkorzanaTapicerka.'` BIT NOT NULL,
		    PRIMARY KEY (`'.DB\Wyposazenie::$id.'`),
		    FOREIGN KEY (`'.DB\Wyposazenie::$Id_Kola.'`) REFERENCES '.DB::$tableKola.'('.DB\Kola::$id.'),
		    FOREIGN KEY ('.DB\Wyposazenie::$Id_Reflektory.') REFERENCES '.DB::$tableReflektory.'('.DB\Reflektory::$id.')) ENGINE=InnoDB;';

    try
    {
        $pdo->exec($query);
    }
    catch(PDOException $e)
    {
        echo \Config\Database\DBErrorName::$create_table.DB::$tableWyposazenie;
    }

    /**
    tworzenie tabeli model
     * Id_wyposazenie -> zmienione na varchar BB
     * FOREIGN KEY ('.DB\Model::$Id_Wyposazenie.') REFERENCES '.DB::$tableWyposazenie.'('.DB\Wyposazenie::$id.'),
    */
    $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableModel.'` (
		        `'.DB\Model::$id.'` INT NOT NULL AUTO_INCREMENT,
                `'.DB\Model::$nazwaModel.'` VARCHAR(40) NOT NULL,
                `'.DB\Model::$cena.'` INT NOT NULL,
                `'.DB\Model::$Id_Silnik.'` INT NOT NULL,
                `'.DB\Model::$Id_Skrzynia.'` INT NOT NULL,
                `'.DB\Model::$Id_Naped.'` INT NOT NULL,
                `'.DB\Model::$Foto.'` MEDIUMBLOB NULL,
                `'.DB\Model::$Id_Wyposazenie.'` INT NULL,
                `'.DB\Model::$Id_Lakier.'` INT NOT NULL,
                `'.DB\Model::$LakierNadwozia.'` VARCHAR(20) NOT NULL,
                `'.DB\Model::$DostepneSztuki.'` INT NOT NULL,
		        PRIMARY KEY (`'.DB\Model::$id.'`),
		        FOREIGN KEY (`'.DB\Model::$Id_Silnik.'`) REFERENCES '.DB::$tableSilnik.'('.DB\Silnik::$id.'),
		        FOREIGN KEY ('.DB\Model::$Id_Skrzynia.') REFERENCES '.DB::$tableSkrzynia.'('.DB\Skrzynia::$id.'),
		        FOREIGN KEY ('.DB\Model::$Id_Naped.') REFERENCES '.DB::$tableNaped.'('.DB\Naped::$id.'),
		        FOREIGN KEY ('.DB\Model::$Id_Lakier.') REFERENCES '.DB::$tableLakier.'('.DB\Lakier::$id.'),
		        FOREIGN KEY ('.DB\Model::$Id_Wyposazenie.') REFERENCES '.DB::$tableWyposazenie.'('.DB\Wyposazenie::$id.')) ENGINE=InnoDB;';

    try
    {
        $pdo->exec($query);
    }
    catch(PDOException $e)
    {
        echo \Config\Database\DBErrorName::$create_table.DB::$tableModel;
    }

    /**
    * Stworzenie tabeli zamowienie
    */

    $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableZamowienie.'` (
		            `'.DB\Zamowienie::$id.'` INT NOT NULL AUTO_INCREMENT,
                    `'.DB\Zamowienie::$Id_Klient.'` INT NOT NULL,
                    `'.DB\Zamowienie::$Id_Pracownik.'` INT NOT NULL,
                    `'.DB\Zamowienie::$Id_Model.'` INT NOT NULL,
                    `'.DB\Zamowienie::$DataZamow.'` DATE NOT NULL,
                    `'.DB\Zamowienie::$NumerZamowienia.'` VARCHAR(6) NOT NULL,
                    `'.DB\Zamowienie::$StatusZamowienia.'` VARCHAR(30) NOT NULL,
		            PRIMARY KEY (`'.DB\Zamowienie::$id.'`),
		            FOREIGN KEY (`'.DB\Zamowienie::$Id_Klient.'`) REFERENCES '.DB::$tableKlient.'('.DB\Klient::$id.'),
		            FOREIGN KEY ('.DB\Zamowienie::$Id_Pracownik.') REFERENCES '.DB::$tablePracownik.'('.DB\Pracownik::$id.'),
		            FOREIGN KEY ('.DB\Zamowienie::$Id_Model.') REFERENCES '.DB::$tableModel.'('.DB\Model::$id.')) ENGINE=InnoDB;';

    try
    {
        $pdo->exec($query);
    }
    catch(PDOException $e)
    {
        echo \Config\Database\DBErrorName::$create_table.DB::$tableZamowienie;
    }




/*
    wypełnienie tabel klient danymi
*/
    
    $klienci = array();	
	$klienci[] = array(
						'imie' => 'Dominik',
                        'nazwisko' => 'Kowalski',
						'firma' => 'Kowal',
						'nip' => '999-545-45-20',
						'kod' => '63-300',
                        'miejscowosc' => 'Pleszew',
                        'ulica' => 'Szenica',
                        'nr' => '28',
                        'email' => 'dk@o2.pl',
                        'telefon' => '503-345-345');
    
    
    $klienci[] = array(
						'imie' => 'Kinga',
                        'nazwisko' => 'Winiecka',
						'firma' => 'Kingunia',
						'nip' => '334-564-56-10',
						'kod' => '62-800',
                        'miejscowosc' => 'Kalisz',
                        'ulica' => 'Nowa',
                        'nr' => '3/5',
                        'email' => 'kinga@o2.pl',
                        'telefon' => '678-345-345');
    
    $klienci[] = array(
						'imie' => 'Dominik',
                        'nazwisko' => 'Chlasta',
						'firma' => '',
						'nip' => '',
						'kod' => '62-300',
                        'miejscowosc' => 'Września',
                        'ulica' => 'Podgórna',
                        'nr' => '45',
                        'email' => 'chlasta@gmail.com',
                        'telefon' => '503-678-315');
    
    $klienci[] = array(
						'imie' => 'Monika',
                        'nazwisko' => 'Sobczak',
						'firma' => '',
						'nip' => '',
						'kod' => '62-510',
                        'miejscowosc' => 'Konin',
                        'ulica' => 'Końska',
                        'nr' => '3/1',
                        'email' => 'Sobczak@onet.pl',
                        'telefon' => '503-345-213');
    
    $klienci[] = array(
						'imie' => 'Maciej',
                        'nazwisko' => 'Wanat',
						'firma' => 'Wanatos',
						'nip' => '999-545-45-20',
						'kod' => '88-100',
                        'miejscowosc' => 'Inowrocław',
                        'ulica' => 'Lipowa',
                        'nr' => '1563',
                        'email' => 'wanat@gmail.com',
                        'telefon' => '563-645-375');
    
    $klienci[] = array(
						'imie' => 'Szymon',
                        'nazwisko' => 'Szpunt',
						'firma' => 'Szpuncik',
						'nip' => '565-455-44-44',
						'kod' => '63-300',
                        'miejscowosc' => 'Pleszew',
                        'ulica' => 'Wojska Polskiego',
                        'nr' => '1/3',
                        'email' => 'szpunt@wp.pl',
                        'telefon' => '600-100-375');
    
    $klienci[] = array(
						'imie' => 'Patrycja',
                        'nazwisko' => 'Kałużna',
						'firma' => 'Szpuncik',
						'nip' => '433-455-34-45',
						'kod' => '63-400',
                        'miejscowosc' => 'Ostrów Wielkopolski',
                        'ulica' => 'Wielka',
                        'nr' => '600',
                        'email' => 'pati@o2.pl',
                        'telefon' => '620-100-100');
    
    $klienci[] = array(
						'imie' => 'Adama',
                        'nazwisko' => 'Leśniewski',
						'firma' => 'Leśniewski',
						'nip' => '500-415-54-45',
						'kod' => '63-530',
                        'miejscowosc' => 'Kowalew',
                        'ulica' => 'Czysta',
                        'nr' => '64/24',
                        'email' => 'leśniewski@o2.pl',
                        'telefon' => '620-160-260');
    
    $klienci[] = array(
						'imie' => 'Marta',
                        'nazwisko' => 'Kościelna',
						'firma' => '',
						'nip' => '',
						'kod' => '00-530',
                        'miejscowosc' => 'Kołobrzeg',
                        'ulica' => 'Wodna',
                        'nr' => '235',
                        'email' => 'martunia@wp.pl',
                        'telefon' => '920-760-260');
    
    $klienci[] = array(
						'imie' => 'Paweł',
                        'nazwisko' => 'Chodakowski',
						'firma' => '',
						'nip' => '',
						'kod' => '00-130',
                        'miejscowosc' => 'Warszawa',
                        'ulica' => 'Śląska',
                        'nr' => '2358/45',
                        'email' => 'chodak@wp.pl',
                        'telefon' => '990-670-260');

    $klienci[] = array(
                        'imie' => 'Leokadia',
                        'nazwisko' => 'Rutkowska',
                        'firma' => '',
                        'nip' => '',
                        'kod' => '02-622',
                        'miejscowosc' => 'Warszawa',
                        'ulica' => 'Malczewskiego Antoniego',
                        'nr' => '61',
                        'email' => 'Rutkowska@wp.pl',
                        'telefon' => '543-670-260');
    $klienci[] = array(
                        'imie' => 'Karol',
                        'nazwisko' => 'Jaworski',
                        'firma' => '',
                        'nip' => '',
                        'kod' => '02-622',
                        'miejscowosc' => 'Białystok',
                        'ulica' => 'Złota',
                        'nr' => '53',
                        'email' => 'Jaworski@wp.pl',
                        'telefon' => '543-546-260');

    $klienci[] = array(
                        'imie' => 'Henryk',
                        'nazwisko' => 'Tomaszewski',
                        'firma' => '',
                        'nip' => '',
                        'kod' => '40-534',
                        'miejscowosc' => 'Cietrzewi',
                        'ulica' => 'Malczewskiego Antoniego',
                        'nr' => '101',
                        'email' => 'Tomaszewski@wp.pl',
                        'telefon' => '543-670-280');

    $klienci[] = array(
                        'imie' => 'Adama',
                        'nazwisko' => 'Leśniewski',
                        'firma' => 'Leśniewski',
                        'nip' => '500-415-54-45',
                        'kod' => '63-530',
                        'miejscowosc' => 'Kowalew',
                        'ulica' => 'Czysta',
                        'nr' => '64/24',
                        'email' => 'leśniewski530@o2.pl',
                        'telefon' => '620-160-260');

    $klienci[] = array(
                        'imie' => 'Marta',
                        'nazwisko' => 'Kościelna',
                        'firma' => '',
                        'nip' => '',
                        'kod' => '00-530',
                        'miejscowosc' => 'Kołobrzeg',
                        'ulica' => 'Wodna',
                        'nr' => '235',
                        'email' => 'martunia530@wp.pl',
                        'telefon' => '920-760-260');

    $klienci[] = array(
        'imie' => 'Dominik',
        'nazwisko' => 'Kowalski',
        'firma' => 'Kowal',
        'nip' => '999-545-45-20',
        'kod' => '63-300',
        'miejscowosc' => 'Pleszew',
        'ulica' => 'Szenica',
        'nr' => '28',
        'email' => 'dk1995@o2.pl',
        'telefon' => '503-345-345');


    $klienci[] = array(
        'imie' => 'Kinga',
        'nazwisko' => 'Winiecka',
        'firma' => 'Kingunia',
        'nip' => '334-564-56-10',
        'kod' => '62-800',
        'miejscowosc' => 'Kalisz',
        'ulica' => 'Nowa',
        'nr' => '3/5',
        'email' => 'kinga1995@o2.pl',
        'telefon' => '678-345-345');

    $klienci[] = array(
        'imie' => 'Dominik',
        'nazwisko' => 'Chlasta',
        'firma' => '',
        'nip' => '',
        'kod' => '62-300',
        'miejscowosc' => 'Września',
        'ulica' => 'Podgórna',
        'nr' => '45',
        'email' => 'chlasta1995@gmail.com',
        'telefon' => '503-678-315');

    $klienci[] = array(
        'imie' => 'Monika',
        'nazwisko' => 'Sobczak',
        'firma' => '',
        'nip' => '',
        'kod' => '62-510',
        'miejscowosc' => 'Konin',
        'ulica' => 'Końska',
        'nr' => '3/1',
        'email' => 'Sobczak1995@onet.pl',
        'telefon' => '503-345-213');

    $klienci[] = array(
        'imie' => 'Maciej',
        'nazwisko' => 'Wanat',
        'firma' => 'Wanatos',
        'nip' => '999-545-45-20',
        'kod' => '88-100',
        'miejscowosc' => 'Inowrocław',
        'ulica' => 'Lipowa',
        'nr' => '1563',
        'email' => 'wanat1995@gmail.com',
        'telefon' => '563-645-375');

    $klienci[] = array(
        'imie' => 'Szymon',
        'nazwisko' => 'Szpunt',
        'firma' => 'Szpuncik',
        'nip' => '565-455-44-44',
        'kod' => '63-300',
        'miejscowosc' => 'Pleszew',
        'ulica' => 'Wojska Polskiego',
        'nr' => '1/3',
        'email' => 'szpunt1996@wp.pl',
        'telefon' => '600-100-375');

    $klienci[] = array(
        'imie' => 'Patrycja',
        'nazwisko' => 'Kałużna',
        'firma' => 'Szpuncik',
        'nip' => '433-455-34-45',
        'kod' => '63-400',
        'miejscowosc' => 'Ostrów Wielkopolski',
        'ulica' => 'Wielka',
        'nr' => '600',
        'email' => 'pati@1995o2.pl',
        'telefon' => '620-100-100');

    $klienci[] = array(
        'imie' => 'Dominik',
        'nazwisko' => 'Kowalski',
        'firma' => 'Kowal',
        'nip' => '999-545-45-20',
        'kod' => '63-300',
        'miejscowosc' => 'Pleszew',
        'ulica' => 'Szenica',
        'nr' => '28',
        'email' => 'dk2@o2.pl',
        'telefon' => '503-345-345');


    $klienci[] = array(
        'imie' => 'Kinga',
        'nazwisko' => 'Winiecka',
        'firma' => 'Kingunia',
        'nip' => '334-564-56-10',
        'kod' => '62-800',
        'miejscowosc' => 'Kalisz',
        'ulica' => 'Nowa',
        'nr' => '3/5',
        'email' => 'kinga2@o2.pl',
        'telefon' => '678-345-345');

    $klienci[] = array(
        'imie' => 'Dominik',
        'nazwisko' => 'Chlasta',
        'firma' => '',
        'nip' => '',
        'kod' => '62-300',
        'miejscowosc' => 'Września',
        'ulica' => 'Podgórna',
        'nr' => '45',
        'email' => 'chlasta2@gmail.com',
        'telefon' => '503-678-315');

    $klienci[] = array(
        'imie' => 'Monika',
        'nazwisko' => 'Sobczak',
        'firma' => '',
        'nip' => '',
        'kod' => '62-510',
        'miejscowosc' => 'Konin',
        'ulica' => 'Końska',
        'nr' => '3/1',
        'email' => 'Sobczak2@onet.pl',
        'telefon' => '503-345-213');

    $klienci[] = array(
        'imie' => 'Maciej',
        'nazwisko' => 'Wanat',
        'firma' => 'Wanatos',
        'nip' => '999-545-45-20',
        'kod' => '88-100',
        'miejscowosc' => 'Inowrocław',
        'ulica' => 'Lipowa',
        'nr' => '1563',
        'email' => 'wanat2@gmail.com',
        'telefon' => '563-645-375');

    $klienci[] = array(
        'imie' => 'Szymon',
        'nazwisko' => 'Szpunt',
        'firma' => 'Szpuncik',
        'nip' => '565-455-44-44',
        'kod' => '63-300',
        'miejscowosc' => 'Pleszew',
        'ulica' => 'Wojska Polskiego',
        'nr' => '1/3',
        'email' => 'szpunt2@wp.pl',
        'telefon' => '600-100-375');

    $klienci[] = array(
        'imie' => 'Patrycja',
        'nazwisko' => 'Kałużna',
        'firma' => 'Szpuncik',
        'nip' => '433-455-34-45',
        'kod' => '63-400',
        'miejscowosc' => 'Ostrów Wielkopolski',
        'ulica' => 'Wielka',
        'nr' => '600',
        'email' => 'pati2@o2.pl',
        'telefon' => '620-100-100');

    $klienci[] = array(
        'imie' => 'Adama',
        'nazwisko' => 'Leśniewski',
        'firma' => 'Leśniewski',
        'nip' => '500-415-54-45',
        'kod' => '63-530',
        'miejscowosc' => 'Kowalew',
        'ulica' => 'Czysta',
        'nr' => '64/24',
        'email' => 'leśniewski2@o2.pl',
        'telefon' => '620-160-260');

    $klienci[] = array(
        'imie' => 'Marta',
        'nazwisko' => 'Kościelna',
        'firma' => '',
        'nip' => '',
        'kod' => '00-530',
        'miejscowosc' => 'Kołobrzeg',
        'ulica' => 'Wodna',
        'nr' => '235',
        'email' => 'martunia2@wp.pl',
        'telefon' => '920-760-260');

    $klienci[] = array(
        'imie' => 'Paweł',
        'nazwisko' => 'Chodakowski',
        'firma' => '',
        'nip' => '',
        'kod' => '00-130',
        'miejscowosc' => 'Warszawa',
        'ulica' => 'Śląska',
        'nr' => '2358/45',
        'email' => 'chodak2@wp.pl',
        'telefon' => '990-670-260');

    $klienci[] = array(
        'imie' => 'Leokadia',
        'nazwisko' => 'Rutkowska',
        'firma' => '',
        'nip' => '',
        'kod' => '02-622',
        'miejscowosc' => 'Warszawa',
        'ulica' => 'Malczewskiego Antoniego',
        'nr' => '61',
        'email' => 'Rutkowska2@wp.pl',
        'telefon' => '543-670-260');
    $klienci[] = array(
        'imie' => 'Karol',
        'nazwisko' => 'Jaworski',
        'firma' => '',
        'nip' => '',
        'kod' => '02-622',
        'miejscowosc' => 'Białystok',
        'ulica' => 'Złota',
        'nr' => '53',
        'email' => 'Jaworski2@wp.pl',
        'telefon' => '543-546-260');

    $klienci[] = array(
        'imie' => 'Henryk',
        'nazwisko' => 'Tomaszewski',
        'firma' => '',
        'nip' => '',
        'kod' => '40-534',
        'miejscowosc' => 'Cietrzewi',
        'ulica' => 'Malczewskiego Antoniego',
        'nr' => '101',
        'email' => 'Tomaszewski2@wp.pl',
        'telefon' => '543-670-280');

    $klienci[] = array(
        'imie' => 'Adama',
        'nazwisko' => 'Leśniewski',
        'firma' => 'Leśniewski',
        'nip' => '500-415-54-45',
        'kod' => '63-530',
        'miejscowosc' => 'Kowalew',
        'ulica' => 'Czysta',
        'nr' => '64/24',
        'email' => 'leśniewski2530@o2.pl',
        'telefon' => '620-160-260');

    $klienci[] = array(
        'imie' => 'Marta',
        'nazwisko' => 'Kościelna',
        'firma' => '',
        'nip' => '',
        'kod' => '00-530',
        'miejscowosc' => 'Kołobrzeg',
        'ulica' => 'Wodna',
        'nr' => '235',
        'email' => 'martunia2530@wp.pl',
        'telefon' => '920-760-260');

    $klienci[] = array(
        'imie' => 'Henryk',
        'nazwisko' => 'Tomaszewski',
        'firma' => '',
        'nip' => '',
        'kod' => '40-534',
        'miejscowosc' => 'Cietrzewi',
        'ulica' => 'Malczewskiego Antoniego',
        'nr' => '101',
        'email' => 'Tomaszewski25@wp.pl',
        'telefon' => '543-670-280');

    $klienci[] = array(
        'imie' => 'Adama',
        'nazwisko' => 'Leśniewski',
        'firma' => 'Leśniewski',
        'nip' => '500-415-54-45',
        'kod' => '63-530',
        'miejscowosc' => 'Kowalew',
        'ulica' => 'Czysta',
        'nr' => '64/24',
        'email' => 'leśniewski25430@o2.pl',
        'telefon' => '620-160-260');

    $klienci[] = array(
        'imie' => 'Marta',
        'nazwisko' => 'Kościelna',
        'firma' => '',
        'nip' => '',
        'kod' => '00-530',
        'miejscowosc' => 'Kołobrzeg',
        'ulica' => 'Wodna',
        'nr' => '235',
        'email' => 'martunia25530@wp.pl',
        'telefon' => '920-760-260');

    $klienci[] = array(
        'imie' => 'Maciej',
        'nazwisko' => 'Wanat',
        'firma' => 'Wanatos',
        'nip' => '999-545-45-20',
        'kod' => '88-100',
        'miejscowosc' => 'Inowrocław',
        'ulica' => 'Lipowa',
        'nr' => '1563',
        'email' => 'wanat23@gmail.com',
        'telefon' => '563-645-375');

    $klienci[] = array(
        'imie' => 'Szymon',
        'nazwisko' => 'Szpunt',
        'firma' => 'Szpuncik',
        'nip' => '565-455-44-44',
        'kod' => '63-300',
        'miejscowosc' => 'Pleszew',
        'ulica' => 'Wojska Polskiego',
        'nr' => '1/3',
        'email' => 'szpunt23@wp.pl',
        'telefon' => '600-100-375');

    $klienci[] = array(
        'imie' => 'Patrycja',
        'nazwisko' => 'Kałużna',
        'firma' => 'Szpuncik',
        'nip' => '433-455-34-45',
        'kod' => '63-400',
        'miejscowosc' => 'Ostrów Wielkopolski',
        'ulica' => 'Wielka',
        'nr' => '600',
        'email' => 'pati23@o2.pl',
        'telefon' => '620-100-100');

    $klienci[] = array(
        'imie' => 'Adama',
        'nazwisko' => 'Leśniewski',
        'firma' => 'Leśniewski',
        'nip' => '500-415-54-45',
        'kod' => '63-530',
        'miejscowosc' => 'Kowalew',
        'ulica' => 'Czysta',
        'nr' => '64/24',
        'email' => 'leśniewski23@o2.pl',
        'telefon' => '620-160-260');

    $klienci[] = array(
        'imie' => 'Marta',
        'nazwisko' => 'Kościelna',
        'firma' => '',
        'nip' => '',
        'kod' => '00-530',
        'miejscowosc' => 'Kołobrzeg',
        'ulica' => 'Wodna',
        'nr' => '235',
        'email' => 'martunia233@wp.pl',
        'telefon' => '920-760-260');

    $klienci[] = array(
        'imie' => 'Paweł',
        'nazwisko' => 'Chodakowski',
        'firma' => '',
        'nip' => '',
        'kod' => '00-130',
        'miejscowosc' => 'Warszawa',
        'ulica' => 'Śląska',
        'nr' => '2358/45',
        'email' => 'chodak24@wp.pl',
        'telefon' => '990-670-260');

    $klienci[] = array(
        'imie' => 'Leokadia',
        'nazwisko' => 'Rutkowska',
        'firma' => '',
        'nip' => '',
        'kod' => '02-622',
        'miejscowosc' => 'Warszawa',
        'ulica' => 'Malczewskiego Antoniego',
        'nr' => '61',
        'email' => 'Rutkowska24@wp.pl',
        'telefon' => '543-670-260');
    $klienci[] = array(
        'imie' => 'Karol',
        'nazwisko' => 'Jaworski',
        'firma' => '',
        'nip' => '',
        'kod' => '02-622',
        'miejscowosc' => 'Białystok',
        'ulica' => 'Złota',
        'nr' => '53',
        'email' => 'Jaworski432@wp.pl',
        'telefon' => '543-546-260');

    $klienci[] = array(
        'imie' => 'Henryk',
        'nazwisko' => 'Tomaszewski',
        'firma' => '',
        'nip' => '',
        'kod' => '40-534',
        'miejscowosc' => 'Cietrzewi',
        'ulica' => 'Malczewskiego Antoniego',
        'nr' => '101',
        'email' => 'Tomaszewski425@wp.pl',
        'telefon' => '543-670-280');

    $klienci[] = array(
        'imie' => 'Adama',
        'nazwisko' => 'Leśniewski',
        'firma' => 'Leśniewski',
        'nip' => '500-415-54-45',
        'kod' => '63-530',
        'miejscowosc' => 'Kowalew',
        'ulica' => 'Czysta',
        'nr' => '64/24',
        'email' => 'leśniewski255530@o2.pl',
        'telefon' => '620-160-260');

    $klienci[] = array(
        'imie' => 'Marta',
        'nazwisko' => 'Kościelna',
        'firma' => '',
        'nip' => '',
        'kod' => '00-530',
        'miejscowosc' => 'Kołobrzeg',
        'ulica' => 'Wodna',
        'nr' => '235',
        'email' => 'martunia254340@wp.pl',
        'telefon' => '920-760-260');

    $klienci[] = array(
        'imie' => 'Henryk',
        'nazwisko' => 'Tomaszewski',
        'firma' => '',
        'nip' => '',
        'kod' => '40-534',
        'miejscowosc' => 'Cietrzewi',
        'ulica' => 'Malczewskiego Antoniego',
        'nr' => '101',
        'email' => 'Tomaszewski2345@wp.pl',
        'telefon' => '543-670-280');

    $klienci[] = array(
        'imie' => 'Adama',
        'nazwisko' => 'Leśniewski',
        'firma' => 'Leśniewski',
        'nip' => '500-415-54-45',
        'kod' => '63-530',
        'miejscowosc' => 'Kowalew',
        'ulica' => 'Czysta',
        'nr' => '64/24',
        'email' => 'leśniewski2545340@o2.pl',
        'telefon' => '620-160-260');

    $klienci[] = array(
        'imie' => 'Marta',
        'nazwisko' => 'Kościelna',
        'firma' => '',
        'nip' => '',
        'kod' => '00-530',
        'miejscowosc' => 'Kołobrzeg',
        'ulica' => 'Wodna',
        'nr' => '235',
        'email' => 'martunia2534530@wp.pl',
        'telefon' => '920-760-260');

    $klienci[] = array(
        'imie' => 'Marta',
        'nazwisko' => 'Kościelna',
        'firma' => '',
        'nip' => '',
        'kod' => '00-530',
        'miejscowosc' => 'Kołobrzeg',
        'ulica' => 'Wodna',
        'nr' => '235',
        'email' => 'martunia25330@wp.pl',
        'telefon' => '920-760-260');



    try
	{
		$stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableKlient.'` (
        `'.DB\Klient::$imie.'`, 
        `'.DB\Klient::$nazwisko.'`,
        `'.DB\Klient::$firma.'`,
        `'.DB\Klient::$nip.'`,
        `'.DB\Klient::$kod.'`, 
        `'.DB\Klient::$miejscowosc.'`,
        `'.DB\Klient::$ulica.'`, 
        `'.DB\Klient::$nr.'`,
        `'.DB\Klient::$email.'`, 
        `'.DB\Klient::$telefon.'`) 
        VALUES(:imie, :nazwisko, :firma, :nip, :kod, :miejscowosc, :ulica, :nr, :email, :telefon)');	
		foreach($klienci as $klient)
		{
			//strval($float), nie ma typu PDO::PARAM_FLOAT
			$stmt -> bindValue(':imie', $klient['imie'], PDO::PARAM_STR);
			$stmt -> bindValue(':nazwisko', $klient['nazwisko'], PDO::PARAM_STR);
			$stmt -> bindValue(':firma', $klient['firma'], PDO::PARAM_STR);
            $stmt -> bindValue(':nip', $klient['nip'], PDO::PARAM_STR);
            $stmt -> bindValue(':kod', $klient['kod'], PDO::PARAM_STR);
            $stmt -> bindValue(':miejscowosc', $klient['miejscowosc'], PDO::PARAM_STR);
            $stmt -> bindValue(':ulica', $klient['ulica'], PDO::PARAM_STR);
            $stmt -> bindValue(':nr', $klient['nr'], PDO::PARAM_STR);
            $stmt -> bindValue(':email', $klient['email'], PDO::PARAM_STR);
            $stmt -> bindValue(':telefon', $klient['telefon'], PDO::PARAM_STR);
			$stmt -> execute(); 
		}
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$noadd;
	}

	$pracownicy = array();
$pracownicy[] = array(
    'imie' => 'Michal',
    'nazwisko' => 'Pazdan',
    'numer' => '25',
    'kod' => '98-235',
    'miejscowosc' => 'Blaszki',
    'ulica' => 'Pulaskiego',
    'nr' => '25',
    'telefon' => '325-692-014');
$pracownicy[] = array(
    'imie' => 'Marta',
    'nazwisko' => 'Lubinska',
    'numer' => '20',
    'kod' => '98-200',
    'miejscowosc' => 'Sieradz',
    'ulica' => 'Korwina',
    'nr' => '25b',
    'telefon' => '500-125-900');

try
{
    $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tablePracownik.'` (
                `'.DB\Pracownik::$imie.'`,
                `'.DB\Pracownik::$nazwisko.'`,
                `'.DB\Pracownik::$numer.'`,
                `'.DB\Pracownik::$kod.'`,
                `'.DB\Pracownik::$miejscowosc.'`,
                `'.DB\Pracownik::$ulica.'`,
                `'.DB\Pracownik::$nr.'`,
                `'.DB\Pracownik::$telefon.'`
                ) 
                 VALUES(:imie , :nazwisko, :numer, :kod, :miejscowosc, :ulica, :nr, :telefon)');
    foreach($pracownicy as $pracownik)
    {
        $stmt -> bindValue(':imie', $pracownik['imie'], PDO::PARAM_STR);
        $stmt -> bindValue(':nazwisko', $pracownik['nazwisko'], PDO::PARAM_STR);
        $stmt -> bindValue(':numer', $pracownik['numer'], PDO::PARAM_STR);
        $stmt -> bindValue(':kod', $pracownik['kod'], PDO::PARAM_STR);
        $stmt -> bindValue(':miejscowosc', $pracownik['miejscowosc'], PDO::PARAM_STR);
        $stmt -> bindValue(':ulica', $pracownik['ulica'], PDO::PARAM_STR);
        $stmt -> bindValue(':nr', $pracownik['nr'], PDO::PARAM_STR);
        $stmt -> bindValue(':telefon', $pracownik['telefon'], PDO::PARAM_STR);

        $stmt -> execute();
    }
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$noadd;
}

    


    $uzytkownicy = array();
    $uzytkownicy[] = array(
        'login' => 'dk.kowalski@o2.pl',
        'haslo' => '81dc9bdb52d04dc20036dbd8313ed05581dc9bdb52d04dc20036dbd8313ed05581dc9bdb52d04dc20036dbd8313ed055',
        'prawo' => 'admin');


    $uzytkownicy[] = array(
        'login' => 'admin',
        'haslo' => '81dc9bdb52d04dc20036dbd8313ed05581dc9bdb52d04dc20036dbd8313ed05581dc9bdb52d04dc20036dbd8313ed055',
        'prawo' => 'admin');

    $uzytkownicy[] = array(
        'login' => 'pracownik',
        'haslo' => '81dc9bdb52d04dc20036dbd8313ed05581dc9bdb52d04dc20036dbd8313ed05581dc9bdb52d04dc20036dbd8313ed055',
        'prawo' => 'pracownik');

    /*
     *  haslo 1234
     *
     */

    try
    {
        $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableUzytkownik.'` (
                `'.DB\Uzytkownik::$login.'`,
                `'.DB\Uzytkownik::$haslo.'`,
                `'.DB\Uzytkownik::$prawo.'`
                ) 
                 VALUES(:login, :haslo, :prawo)');
        foreach($uzytkownicy as $uzytkownik)
        {
            $stmt -> bindValue(':login', $uzytkownik['login'], PDO::PARAM_STR);
            $stmt -> bindValue(':haslo', $uzytkownik['haslo'], PDO::PARAM_STR);
            $stmt -> bindValue(':prawo', $uzytkownik['prawo'], PDO::PARAM_STR);

            $stmt -> execute();
        }
    }
    catch(PDOException $e)
    {
        echo \Config\Database\DBErrorName::$noadd;
    }

    $silniki = array();
    $silniki[] = array(
            'TypSilnika' => 'benzynowy',
            'Pojemnosc' => '1.6',
            'MaksymalnaMoc' => '133');
    $silniki[] = array(
            'TypSilnika' => 'Diesel',
            'Pojemnosc' => '2.0',
            'MaksymalnaMoc' => '170');
    $silniki[] = array(
            'TypSilnika' => 'Elektryczny',
            'Pojemnosc' => '1.2',
            'MaksymalnaMoc' => '120');
    $silniki[] = array(
            'TypSilnika' => 'Hybrydowy',
            'Pojemnosc' => '1.5',
            'MaksymalnaMoc' => '150');
try
{
    $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableSilnik.'` (
                `'.DB\Silnik::$TypSilnika.'`,
                `'.DB\Silnik::$pojemnosc.'`,
                `'.DB\Silnik::$MaxMoc.'`
                ) 
                 VALUES(:TypSilnika, :pojemnosc , :MaxMoc)');
    foreach($silniki as $silnik)
    {
        $stmt -> bindValue(':TypSilnika', $silnik['TypSilnika'], PDO::PARAM_STR);
        $stmt -> bindValue(':pojemnosc', $silnik['Pojemnosc'], PDO::PARAM_STR);
        $stmt -> bindValue(':MaxMoc', $silnik['MaksymalnaMoc'], PDO::PARAM_INT);
        $stmt -> execute();
    }
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$noadd;
}

    $skrzynie = array();
    $skrzynie[] = 'manualna';
    $skrzynie[] = 'automatyczna';
    $skrzynie[] = 'pol-automatyczna';

    try
    {
        $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableSkrzynia.'` (
                    `'.DB\Skrzynia::$TypSkrzyni.'`
                    ) 
                    VALUES(:TypSkrzyni)');
        foreach($skrzynie as $skrzynia)
        {
            $stmt -> bindValue(':TypSkrzyni', $skrzynia, PDO::PARAM_STR);
            $stmt -> execute();
        }
    }
    catch(PDOException $e)
    {
        echo \Config\Database\DBErrorName::$noadd;
    }

    $napedy = array();
    $napedy[] = 'Tylna os';
    $napedy[] = 'Przednia os';
    $napedy[] = '4x4';

    try
    {
        $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableNaped.'` (
                        `'.DB\Naped::$nazwaNaped.'`
                        ) 
                        VALUES(:nazwaNaped)');
        foreach($napedy as $naped)
        {
            $stmt -> bindValue(':nazwaNaped', $naped, PDO::PARAM_STR);
            $stmt -> execute();
        }
    }
    catch(PDOException $e)
    {
        echo \Config\Database\DBErrorName::$noadd;
    }

    $lakiery = array();
    $lakiery[] = array(
            'nazwaLakier' => 'Czarny',
            'Foto' => '');
    $lakiery[] = array(
            'nazwaLakier' => 'Srebrny',
            'Foto' => '');
    $lakiery[] = array(
            'nazwaLakier' => 'Bialy',
            'Foto' => '');
    $lakiery[] = array(
            'nazwaLakier' => 'Czerwony',
            'Foto' => '');
    $lakiery[] = array(
            'nazwaLakier' => 'Zolty',
            'Foto' => '');
    $lakiery[] = array(
            'nazwaLakier' => 'Niebieski',
            'Foto' => '');

    try
    {
        $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableLakier.'` (
                                `'.DB\Lakier::$nazwaLakier.'`,
                                `'.DB\Lakier::$Foto.'`
                                ) 
                                VALUES(:nazwaLakier, :Foto)');
        foreach($lakiery as $lakier)
        {
            $stmt -> bindValue(':nazwaLakier', $lakier['nazwaLakier'], PDO::PARAM_STR);
            $stmt -> bindValue(':Foto', $lakier['Foto'], PDO::PARAM_STR);
            $stmt -> execute();
        }
    }
    catch(PDOException $e)
    {
        echo \Config\Database\DBErrorName::$noadd;
    }

    $kola = array();
    $kola[] = 13;
    $kola[] = 14;
    $kola[] = 15;
    $kola[] = 16;
    $kola[] = 17;
    $kola[] = 18;

    try
    {
        $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableKola.'` (
                                `'.DB\Kola::$wartosc.'`
                                ) 
                                VALUES(:wartosc)');
        foreach($kola as $kolo)
        {
            $stmt -> bindValue(':wartosc', $kolo, PDO::PARAM_INT);
            $stmt -> execute();
        }
    }
    catch(PDOException $e)
    {
        echo \Config\Database\DBErrorName::$noadd;
    }

    $reflektory = array();
    $reflektory[] = 'Sloiki';
    $reflektory[] = 'Reflektory FF';
    $reflektory[] = 'Swiatla soczewkowe';
    $reflektory[] = 'Ksenony';
    $reflektory[] = 'Swiatla LED';

    try
    {
        $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableReflektory.'` (
                                    `'.DB\Reflektory::$nazwaReflektory.'`
                                    ) 
                                    VALUES(:nazwaReflektory)');
        foreach($reflektory as $reflektor)
        {
            $stmt -> bindValue(':nazwaReflektory', $reflektor, PDO::PARAM_STR);
            $stmt -> execute();
        }
    }
    catch(PDOException $e)
    {
        echo \Config\Database\DBErrorName::$noadd;
    }

    $wyposazenia = array();
    $wyposazenia[] = array(
            'IdKola' => '4',
            'IdReflektory' => '4',
            'PodgrzewaneSiedzenia' => '1',
            'PodgrzewanaSzybaPrzod' => '0',
            'DodatkowyKompletOpon' => '0',
            'SkorzanaTapicerka' => '1');
    $wyposazenia[] = array(
        'IdKola' => '6',
        'IdReflektory' => '5',
        'PodgrzewaneSiedzenia' => '1',
        'PodgrzewanaSzybaPrzod' => '1',
        'DodatkowyKompletOpon' => '1',
        'SkorzanaTapicerka' => '1');

    try
    {
        $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableWyposazenie.'` (
            `'.DB\Wyposazenie::$Id_Kola.'`,
            `'.DB\Wyposazenie::$Id_Reflektory.'`,
            `'.DB\Wyposazenie::$PodgrzewaneSiedzenia.'`,
            `'.DB\Wyposazenie::$PodgrzewanaSzybaPrzod.'`, 
            `'.DB\Wyposazenie::$DodatkowyKompletOpon.'`,
            `'.DB\Wyposazenie::$SkorzanaTapicerka.'`) 
            VALUES(:Id_Kola, :Id_Reflektory, :PodgrzewaneSiedzenia, :PodgrzewanaSzybaPrzod, :DodatkowyKompletOpon, :SkorzanaTapicerka)');
        foreach($wyposazenia as $wyposazenie)
        {
            $stmt -> bindValue(':Id_Kola', $wyposazenie['IdKola'], PDO::PARAM_INT);
            $stmt -> bindValue(':Id_Reflektory', $wyposazenie['IdReflektory'], PDO::PARAM_INT);
            $stmt -> bindValue(':PodgrzewaneSiedzenia', $wyposazenie['PodgrzewaneSiedzenia'], PDO::PARAM_INT);
            $stmt -> bindValue(':PodgrzewanaSzybaPrzod', $wyposazenie['PodgrzewanaSzybaPrzod'], PDO::PARAM_INT);
            $stmt -> bindValue(':DodatkowyKompletOpon', $wyposazenie['DodatkowyKompletOpon'], PDO::PARAM_INT);
            $stmt -> bindValue(':SkorzanaTapicerka', $wyposazenie['SkorzanaTapicerka'], PDO::PARAM_INT);
            $stmt -> execute();
        }
    }
    catch(PDOException $e)
    {
        echo \Config\Database\DBErrorName::$noadd;
    }

$modele = array();
$modele[] = array(
    'nazwaModel' => 'Passat',
    'Cena' => '300000',
    'IdSilnik' => '1',
    'IdSkrzynia' => '1',
    'IdNaped' => '2',
    'Foto' => '',
    'IdWyposazenie' => '1',
    'IdLakier' => '2',
    'LakierNadwozia' => 'Metallic',
    'DostepneSztuki' => '4');
$modele[] = array(
    'nazwaModel' => 'Jetta',
    'Cena' => '350000',
    'IdSilnik' => '2',
    'IdSkrzynia' => '3',
    'IdNaped' => '2',
    'Foto' => '',
    'IdWyposazenie' => '2',
    'IdLakier' => '1',
    'LakierNadwozia' => 'Matowy',
    'DostepneSztuki' => '2');

//`'.DB\Model::$Id_Wyposazenie.'`, -> pozniej okreslenie wybierania + co wchodzi w sklad standardu -BB
try
{
    $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableModel.'` (
            `'.DB\Model::$nazwaModel.'`,
            `'.DB\Model::$cena.'`,
            `'.DB\Model::$Id_Silnik.'`,
            `'.DB\Model::$Id_Skrzynia.'`, 
            `'.DB\Model::$Id_Naped.'`,
            `'.DB\Model::$Foto.'`,
            `'.DB\Model::$Id_Wyposazenie.'`,
            `'.DB\Model::$Id_Lakier.'`,
            `'.DB\Model::$LakierNadwozia.'`,
            `'.DB\Model::$DostepneSztuki.'`) 
            VALUES(:nazwaModel, :cena, :Id_Silnik, :Id_Skrzynia, :Id_Naped, :Foto, :Id_Wyposazenie, :Id_Lakier, :LakierNadwozia, :DostepneSztuki)');
    foreach($modele as $model)
    {
        $stmt -> bindValue(':nazwaModel', $model['nazwaModel'], PDO::PARAM_STR);
        $stmt -> bindValue(':cena', $model['Cena'], PDO::PARAM_INT);
        $stmt -> bindValue(':Id_Silnik', $model['IdSilnik'], PDO::PARAM_INT);
        $stmt -> bindValue(':Id_Skrzynia', $model['IdSkrzynia'], PDO::PARAM_INT);
        $stmt -> bindValue(':Id_Naped', $model['IdNaped'], PDO::PARAM_INT);
        $stmt -> bindValue(':Foto', $model['Foto'], PDO::PARAM_STR);
        $stmt -> bindValue(':Id_Wyposazenie', $model['IdWyposazenie'], PDO::PARAM_INT);
        $stmt -> bindValue(':Id_Lakier', $model['IdLakier'], PDO::PARAM_INT);
        $stmt -> bindValue(':LakierNadwozia', $model['LakierNadwozia'], PDO::PARAM_STR);
        $stmt -> bindValue(':DostepneSztuki', $model['DostepneSztuki'], PDO::PARAM_STR);
        $stmt -> execute();
    }
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$noadd;
}

$zamowienia = array();
$zamowienia[] = array(
    'Id_Klient' => '1',
    'Id_Pracownik' => '1',
    'IdModel' => '1',
    'Data_Zamowienia' => '2018-03-19',
    'NumerZamowienia' => 'pBlW9e',
    'StatusZamowienia' => 'W realizacji');
$zamowienia[] = array(
    'Id_Klient' => '3',
    'Id_Pracownik' => '2',
    'IdModel' => '2',
    'Data_Zamowienia' => '2018-02-27',
    'NumerZamowienia' => 'E52dRk',
    'StatusZamowienia' => 'Gotowe do odbioru');

//`'.DB\Model::$Id_Wyposazenie.'`, -> pozniej okreslenie wybierania + co wchodzi w sklad standardu -BB
try
{
    $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableZamowienie.'` (
            `'.DB\Zamowienie::$Id_Klient.'`,
            `'.DB\Zamowienie::$Id_Pracownik.'`,
            `'.DB\Zamowienie::$Id_Model.'`,
            `'.DB\Zamowienie::$DataZamow.'`, 
            `'.DB\Zamowienie::$NumerZamowienia.'`,
            `'.DB\Zamowienie::$StatusZamowienia.'`
            
            ) 
            VALUES(:Id_Klient, :Id_Pracownik, :Id_Model, :DataZamow, :NumerZamowienia, :StatusZamowienia)');
    foreach($zamowienia as $zamowienie)
    {
        $stmt -> bindValue(':Id_Klient', $zamowienie['Id_Klient'], PDO::PARAM_INT);
        $stmt -> bindValue(':Id_Pracownik', $zamowienie['Id_Pracownik'], PDO::PARAM_INT);
        $stmt -> bindValue(':Id_Model', $zamowienie['IdModel'], PDO::PARAM_INT);
        $stmt -> bindValue(':DataZamow', $zamowienie['Data_Zamowienia'], PDO::PARAM_STR);
        $stmt -> bindValue(':NumerZamowienia', $zamowienie['NumerZamowienia'], PDO::PARAM_STR);
        $stmt -> bindValue(':StatusZamowienia', $zamowienie['StatusZamowienia'], PDO::PARAM_STR);
        $stmt -> execute();
    }
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$noadd;
}


    echo "<b>Instalacja aplikacji zakończona!</b>"





?>
<br>
<br>
<a href="http://localhost/Projekt_Zespolowy/">Dalej</a>
</body>
</html>