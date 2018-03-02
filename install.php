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
    
    /*
        usunięcie starych tabel    
    */
    
    
    
    
    $query = 'DROP TABLE IF EXISTS `'.DB::$tableHistoria.'`';
	try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$delete_table.DB::$tableHistoria;
	}
    
    $query = 'DROP TABLE IF EXISTS `'.DB::$tableStatus.'`';
	try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$delete_table.DB::$tableStatus;
	}
    
    
    $query = 'DROP TABLE IF EXISTS `'.DB::$tableOddzial.'`';
	try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$delete_table.DB::$tableOddzial;
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
    
    
    $query = 'DROP TABLE IF EXISTS `'.DB::$tablePrzesylka.'`';
	try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$delete_table.DB::$tablePrzesylka;
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
    
    
    $query = 'DROP TABLE IF EXISTS `'.DB::$tableCennik.'`';
	try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$delete_table.DB::$tableCennik;
	}

    /*
        tworzenie tabeli status
    */
    $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableStatus.'` (
		`'.DB\Status::$id.'` INT NOT NULL AUTO_INCREMENT,
        `'.DB\Status::$nazwa.'` VARCHAR(50) NOT NULL,
		PRIMARY KEY (`'.DB\Status::$id.'`)
		) ENGINE=InnoDB;';
	try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$create_table.DB::$tableUzytkownik;
	}
    
    
    
    
    /*
        tworzenie tabeli oddzial
    */
    $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableOddzial.'` (
		`'.DB\Oddzial::$id.'` INT NOT NULL AUTO_INCREMENT,
        `'.DB\Oddzial::$nazwa.'` VARCHAR(50) NOT NULL,
        `'.DB\Oddzial::$miejscowosc.'` VARCHAR(50) NOT NULL,
		PRIMARY KEY (`'.DB\Oddzial::$id.'`)
		) ENGINE=InnoDB;';
	try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$create_table.DB::$tableUzytkownik;
	}
    
    
    
    /*
        tworzenie tabeli uzytkownik
    */
    $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableUzytkownik.'` (
		`'.DB\Uzytkownik::$id_uzytkownik.'` INT NOT NULL AUTO_INCREMENT,
        `'.DB\Uzytkownik::$login.'` VARCHAR(30) NOT NULL UNIQUE,
        `'.DB\Uzytkownik::$haslo.'` VARCHAR(32) NOT NULL,
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
    

    /*
        tworzenie tabeli cennik
    */
    $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableCennik.'` (
		`'.DB\Cennik::$id.'` INT NOT NULL AUTO_INCREMENT,
        `'.DB\Cennik::$cena.'` FLOAT NOT NULL,
        `'.DB\Cennik::$rodzaj.'` VARCHAR(30) NOT NULL,
        `'.DB\Cennik::$piorytet.'` FLOAT NOT NULL,
		PRIMARY KEY (`'.DB\Cennik::$id.'`)
		) ENGINE=InnoDB;';
	try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$create_table.DB::$tableCennik;
        echo $query;
	}
    
    /*
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

    
    
    
    
    /*
        tworzenie tabeli przesylka
    */
    $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tablePrzesylka.'` (
        `'.DB\Przesylka::$id.'` INT AUTO_INCREMENT, 
		`'.DB\Przesylka::$id_C.'` INT NOT NULL,
		`'.DB\Przesylka::$id_N.'` INT NOT NULL,
        `'.DB\Przesylka::$id_O.'` INT NOT NULL,
        `'.DB\Przesylka::$uwagi.'` VARCHAR(100) NULL,
		`'.DB\Przesylka::$w_x.'` FLOAT NOT NULL,
        `'.DB\Przesylka::$w_y.'` FLOAT NOT NULL,
        `'.DB\Przesylka::$w_z.'` FLOAT NOT NULL,
        `'.DB\Przesylka::$waga.'` FLOAT NOT NULL,
		PRIMARY KEY (`'.DB\Przesylka::$id.'`),
		FOREIGN KEY ('.DB\Przesylka::$id_N.') REFERENCES '.DB::$tableKlient.'('.DB\Klient::$id.') ON DELETE CASCADE,
        FOREIGN KEY ('.DB\Przesylka::$id_O.') REFERENCES '.DB::$tableKlient.'('.DB\Klient::$id.') ON DELETE CASCADE,
        FOREIGN KEY ('.DB\Przesylka::$id_C.') REFERENCES '.DB::$tableCennik.'('.DB\Cennik::$id.') ON DELETE CASCADE
        
		) ENGINE=InnoDB;';
	try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
        echo $query;
		echo \Config\Database\DBErrorName::$create_table.DB::$tablePrzesylka;
	}
    
    
    
    /*
        tworzenie tabeli historia
    */
    $query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableHistoria.'` (
		`'.DB\Historia::$id.'` INT NOT NULL AUTO_INCREMENT,
        `'.DB\Historia::$id_P.'` INT NOT NULL,
        `'.DB\Historia::$id_O.'` INT NOT NULL,
        `'.DB\Historia::$id_S.'` INT NOT NULL,
        `'.DB\Historia::$czas.'` DATETIME NOT NULL,
        `'.DB\Historia::$opis.'` VARCHAR(80) NULL,
		PRIMARY KEY (`'.DB\Historia::$id.'`),
        FOREIGN KEY ('.DB\Historia::$id_P.') REFERENCES '.DB::$tablePrzesylka.'('.DB\Przesylka::$id.') ON DELETE CASCADE,
        FOREIGN KEY ('.DB\Historia::$id_O.') REFERENCES '.DB::$tableOddzial.'('.DB\Oddzial::$id.') ON DELETE CASCADE,
        FOREIGN KEY ('.DB\Historia::$id_S.') REFERENCES '.DB::$tableStatus.'('.DB\Status::$id.') ON DELETE CASCADE
		) ENGINE=InnoDB;';
	try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$create_table.DB::$tableHistoria;
	}
    
    
    
    /*
        wypełnienie tabel danymi
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

    
    $cenniki = array();	
	$cenniki[] = array(
                        'cena' => '20.00',
                        'rodzaj' => 'Przesylka Mała',
                        'piorytet' => '0');
    
    $cenniki[] = array(
                        'cena' => '30.00',
                        'rodzaj' => 'Przesylka Mała',
                        'piorytet' => '1');
    
    $cenniki[] = array(
                        'cena' => '40.00',
                        'rodzaj' => 'Przesylka Standardowa',
                        'piorytet' => '0');
    
    $cenniki[] = array(
                        'cena' => '50.00',
                        'rodzaj' => 'Przesylka Standardowa',
                        'piorytet' => '1');
    
    $cenniki[] = array(
                        'cena' => '60.00',
                        'rodzaj' => 'Przesylka Duża',
                        'piorytet' => '0');
    
    $cenniki[] = array(
                        'cena' => '70.00',
                        'rodzaj' => 'Przesylka Duża',
                        'piorytet' => '1');
    
    $cenniki[] = array(
                        'cena' => '100.00',
                        'rodzaj' => 'Paleta Standart',
                        'piorytet' => '0');
    
    $cenniki[] = array(
                        'cena' => '120.00',
                        'rodzaj' => 'Paleta Standart',
                        'piorytet' => '1');
    
    $cenniki[] = array(
                        'cena' => '140.00',
                        'rodzaj' => 'Paleta Duża',
                        'piorytet' => '0');
    
    $cenniki[] = array(
                        'cena' => '160.00',
                        'rodzaj' => 'Paleta Duża',
                        'piorytet' => '1');
        
        
    
    
    try
	{
		$stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableCennik.'` (
        `'.DB\Cennik::$cena.'`,
        `'.DB\Cennik::$rodzaj.'`, 
        `'.DB\Cennik::$piorytet.'`) 
        VALUES(:cena, :rodzaj, :piorytet)');	
		foreach($cenniki as $cena)
		{
			//strval($float), nie ma typu PDO::PARAM_FLOAT
			$stmt -> bindValue(':cena', $cena['cena'], PDO::PARAM_STR);
            $stmt -> bindValue(':rodzaj', $cena['rodzaj'], PDO::PARAM_STR);
			$stmt -> bindValue(':piorytet', $cena['piorytet'], PDO::PARAM_STR);
			$stmt -> execute(); 
		}
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$noadd;
	}
    
    
    
    $przesylki = array();	
	$przesylki[] = array(
						'id_C' => '4',
                        'id_N' => '2',
						'id_O' => '3',
						'uwagi' => '',
                        'w_x' => '230',
                        'w_y' => '440',
                        'w_z' => '100',
                        'waga' => '1,2');
    
    $przesylki[] = array(
						'id_C' => '5',
                        'id_N' => '2',
						'id_O' => '5',
						'uwagi' => 'Uwaga Szkło',
                        'w_x' => '2300',
                        'w_y' => '4410',
                        'w_z' => '1040',
                        'waga' => '100');
    
    $przesylki[] = array(
						'id_C' => '1',
                        'id_N' => '4',
						'id_O' => '6',
						'uwagi' => '',
                        'w_x' => '23500',
                        'w_y' => '44310',
                        'w_z' => '10440',
                        'waga' => '1300');
    
    $przesylki[] = array(
						'id_C' => '5',
                        'id_N' => '1',
						'id_O' => '7',
						'uwagi' => '',
                        'w_x' => '2350',
                        'w_y' => '4310',
                        'w_z' => '1440',
                        'waga' => '130');
    
    $przesylki[] = array(
						'id_C' => '10',
                        'id_N' => '3',
						'id_O' => '7',
						'uwagi' => '',
                        'w_x' => '123',
                        'w_y' => '410',
                        'w_z' => '355',
                        'waga' => '135');
    $przesylki[] = array(
                        'id_C' => '5',
                        'id_N' => '2',
                        'id_O' => '7',
                        'uwagi' => '',
                        'w_x' => '123',
                        'w_y' => '410',
                        'w_z' => '355',
                        'waga' => '135');
    $przesylki[] = array(
                        'id_C' => '2',
                        'id_N' => '2',
                        'id_O' => '6',
                        'uwagi' => '',
                        'w_x' => '123',
                        'w_y' => '410',
                        'w_z' => '355',
                        'waga' => '135');
    $przesylki[] = array(
                        'id_C' => '2',
                        'id_N' => '5',
                        'id_O' => '6',
                        'uwagi' => '',
                        'w_x' => '123',
                        'w_y' => '410',
                        'w_z' => '355',
                        'waga' => '135');
    $przesylki[] = array(
                        'id_C' => '1',
                        'id_N' => '3',
                        'id_O' => '10',
                        'uwagi' => '',
                        'w_x' => '123',
                        'w_y' => '410',
                        'w_z' => '355',
                        'waga' => '135');
    $przesylki[] = array(
                        'id_C' => '7',
                        'id_N' => '4',
                        'id_O' => '10',
                        'uwagi' => '',
                        'w_x' => '123',
                        'w_y' => '410',
                        'w_z' => '355',
                        'waga' => '135');
    $przesylki[] = array(
        'id_C' => '6',
        'id_N' => '2',
        'id_O' => '5',
        'uwagi' => 'Szło',
        'w_x' => '123',
        'w_y' => '410',
        'w_z' => '355',
        'waga' => '135');

    $przesylki[] = array(
        'id_C' => '7',
        'id_N' => '4',
        'id_O' => '10',
        'uwagi' => '',
        'w_x' => '123',
        'w_y' => '410',
        'w_z' => '355',
        'waga' => '135');

    $przesylki[] = array(
        'id_C' => '10',
        'id_N' => '5',
        'id_O' => '10',
        'uwagi' => '',
        'w_x' => '123',
        'w_y' => '410',
        'w_z' => '355',
        'waga' => '135');

    $przesylki[] = array(
        'id_C' => '1',
        'id_N' => '5',
        'id_O' => '10',
        'uwagi' => '',
        'w_x' => '123',
        'w_y' => '410',
        'w_z' => '355',
        'waga' => '135');

    $przesylki[] = array(
        'id_C' => '1',
        'id_N' => '5',
        'id_O' => '10',
        'uwagi' => '',
        'w_x' => '123',
        'w_y' => '410',
        'w_z' => '355',
        'waga' => '135');


    $przesylki[] = array(
        'id_C' => '1',
        'id_N' => '1',
        'id_O' => '3',
        'uwagi' => '',
        'w_x' => '230',
        'w_y' => '440',
        'w_z' => '100',
        'waga' => '1,2');

    $przesylki[] = array(
        'id_C' => '1',
        'id_N' => '1',
        'id_O' => '5',
        'uwagi' => 'Uwaga Szkło',
        'w_x' => '2300',
        'w_y' => '4410',
        'w_z' => '1040',
        'waga' => '100');

    $przesylki[] = array(
        'id_C' => '1',
        'id_N' => '1',
        'id_O' => '6',
        'uwagi' => '',
        'w_x' => '23500',
        'w_y' => '44310',
        'w_z' => '10440',
        'waga' => '1300');

    $przesylki[] = array(
        'id_C' => '5',
        'id_N' => '1',
        'id_O' => '7',
        'uwagi' => '',
        'w_x' => '2350',
        'w_y' => '4310',
        'w_z' => '1440',
        'waga' => '130');

    $przesylki[] = array(
        'id_C' => '10',
        'id_N' => '1',
        'id_O' => '7',
        'uwagi' => '',
        'w_x' => '123',
        'w_y' => '410',
        'w_z' => '355',
        'waga' => '135');

    $przesylki[] = array(
        'id_C' => '5',
        'id_N' => '1',
        'id_O' => '7',
        'uwagi' => '',
        'w_x' => '123',
        'w_y' => '410',
        'w_z' => '355',
        'waga' => '135');

    $przesylki[] = array(
        'id_C' => '2',
        'id_N' => '1',
        'id_O' => '6',
        'uwagi' => '',
        'w_x' => '123',
        'w_y' => '410',
        'w_z' => '355',
        'waga' => '135');

    $przesylki[] = array(
        'id_C' => '2',
        'id_N' => '5',
        'id_O' => '4',
        'uwagi' => '',
        'w_x' => '123',
        'w_y' => '410',
        'w_z' => '355',
        'waga' => '135');

    $przesylki[] = array(
        'id_C' => '1',
        'id_N' => '3',
        'id_O' => '4',
        'uwagi' => '',
        'w_x' => '123',
        'w_y' => '410',
        'w_z' => '355',
        'waga' => '135');

    $przesylki[] = array(
        'id_C' => '7',
        'id_N' => '4',
        'id_O' => '5',
        'uwagi' => '',
        'w_x' => '123',
        'w_y' => '410',
        'w_z' => '355',
        'waga' => '135');

    $przesylki[] = array(
        'id_C' => '5',
        'id_N' => '1',
        'id_O' => '7',
        'uwagi' => '',
        'w_x' => '123',
        'w_y' => '410',
        'w_z' => '355',
        'waga' => '135');

    $przesylki[] = array(
        'id_C' => '2',
        'id_N' => '1',
        'id_O' => '6',
        'uwagi' => '',
        'w_x' => '123',
        'w_y' => '410',
        'w_z' => '355',
        'waga' => '135');

    $przesylki[] = array(
        'id_C' => '2',
        'id_N' => '5',
        'id_O' => '4',
        'uwagi' => '',
        'w_x' => '123',
        'w_y' => '410',
        'w_z' => '355',
        'waga' => '135');

    $przesylki[] = array(
        'id_C' => '1',
        'id_N' => '3',
        'id_O' => '4',
        'uwagi' => '',
        'w_x' => '123',
        'w_y' => '410',
        'w_z' => '355',
        'waga' => '135');

    $przesylki[] = array(
        'id_C' => '7',
        'id_N' => '4',
        'id_O' => '5',
        'uwagi' => '',
        'w_x' => '123',
        'w_y' => '410',
        'w_z' => '355',
        'waga' => '135');

    $przesylki[] = array(
        'id_C' => '5',
        'id_N' => '1',
        'id_O' => '7',
        'uwagi' => '',
        'w_x' => '123',
        'w_y' => '410',
        'w_z' => '355',
        'waga' => '135');

    $przesylki[] = array(
        'id_C' => '2',
        'id_N' => '1',
        'id_O' => '6',
        'uwagi' => '',
        'w_x' => '123',
        'w_y' => '410',
        'w_z' => '355',
        'waga' => '135');

    $przesylki[] = array(
        'id_C' => '2',
        'id_N' => '5',
        'id_O' => '4',
        'uwagi' => '',
        'w_x' => '123',
        'w_y' => '410',
        'w_z' => '355',
        'waga' => '135');

    $przesylki[] = array(
        'id_C' => '1',
        'id_N' => '3',
        'id_O' => '4',
        'uwagi' => '',
        'w_x' => '123',
        'w_y' => '410',
        'w_z' => '355',
        'waga' => '135');

    $przesylki[] = array(
        'id_C' => '7',
        'id_N' => '4',
        'id_O' => '5',
        'uwagi' => '',
        'w_x' => '123',
        'w_y' => '410',
        'w_z' => '355',
        'waga' => '135');

    
    
    try
	{
		$stmt = $pdo -> prepare('INSERT INTO `'.DB::$tablePrzesylka.'` (
        `'.DB\Przesylka::$id_C.'`,
        `'.DB\Przesylka::$id_N.'`, `'.DB\Przesylka::$id_O.'`,
        `'.DB\Przesylka::$uwagi.'`, `'.DB\Przesylka::$w_x.'`,
        `'.DB\Przesylka::$w_y.'`, `'.DB\Przesylka::$w_z.'`,
        `'.DB\Przesylka::$waga.'`) 
        VALUES(:id_C, :id_N, :id_O, :uwagi, :w_x, :w_y, :w_z, :waga)');
		foreach($przesylki as $przesylka)
		{
			//strval($float), nie ma typu PDO::PARAM_FLOAT
            $stmt -> bindValue(':id_C', $przesylka['id_C'], PDO::PARAM_STR);
            $stmt -> bindValue(':id_N', $przesylka['id_N'], PDO::PARAM_STR);
            $stmt -> bindValue(':id_O', $przesylka['id_O'], PDO::PARAM_STR);
            $stmt -> bindValue(':uwagi', $przesylka['uwagi'], PDO::PARAM_STR);
            $stmt -> bindValue(':w_x', $przesylka['w_x'], PDO::PARAM_STR);
            $stmt -> bindValue(':w_y', $przesylka['w_y'], PDO::PARAM_STR);
            $stmt -> bindValue(':w_z', $przesylka['w_z'], PDO::PARAM_STR);
            $stmt -> bindValue(':waga', $przesylka['waga'], PDO::PARAM_STR);
			$stmt -> execute(); 
		}
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$noadd;
	}
    
    
    $oddzialy = array();
    $oddzialy[] = array(
						'nazwa' => 'Sortownia',
                        'miejscowosc' => 'Kalisz');
    $oddzialy[] = array(
						'nazwa' => 'Sortownia',
                        'miejscowosc' => 'Konin');
    $oddzialy[] = array(
						'nazwa' => 'Sortownia',
                        'miejscowosc' => 'Września');
    $oddzialy[] = array(
						'nazwa' => 'Sortownia',
                        'miejscowosc' => 'Gniezno');
    
    
    $oddzialy[] = array(
						'nazwa' => 'Dostawa',
                        'miejscowosc' => 'Kalisz');
    $oddzialy[] = array(
						'nazwa' => 'Dostawa',
                        'miejscowosc' => 'Konin');
    $oddzialy[] = array(
						'nazwa' => 'Dostawa',
                        'miejscowosc' => 'Września');
    $oddzialy[] = array(
						'nazwa' => 'Dostawa',
                        'miejscowosc' => 'Gniezno');
    
    
    $oddzialy[] = array(
						'nazwa' => 'Magazyn',
                        'miejscowosc' => 'Konin');
    
    $oddzialy[] = array(
						'nazwa' => 'Magazyn',
                        'miejscowosc' => 'Kalisz');
    
    
    
    
    
    try
	{
		$stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableOddzial.'` (
        `'.DB\Oddzial::$nazwa.'`,
        `'.DB\Oddzial::$miejscowosc.'`) 
        VALUES(:nazwa, :miejscowosc)');	
		foreach($oddzialy as $oddzial)
		{
			//strval($float), nie ma typu PDO::PARAM_FLOAT
            $stmt -> bindValue(':nazwa', $oddzial['nazwa'], PDO::PARAM_STR);
            $stmt -> bindValue(':miejscowosc', $oddzial['miejscowosc'], PDO::PARAM_STR);
 
			$stmt -> execute(); 
		}
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$noadd;
	}
  
    
    
    $statusy = array();
    $statusy[] = array('nazwa' => 'Przesyłka w Sortowni');
    $statusy[] = array('nazwa' => 'Przesyłka w Magazynie');
    $statusy[] = array('nazwa' => 'Przesyłka Przekazana Kurierowi');
    $statusy[] = array('nazwa' => 'Nieudana Próba Doręczenia Przesyłki');
    $statusy[] = array('nazwa' => 'Przesyłka Doręczona');
    
    
    
    
    try
	{
		$stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableStatus.'` (
        `'.DB\Status::$nazwa.'`) 
        VALUES(:nazwa)');	
		foreach($statusy as $status)
		{
			//strval($float), nie ma typu PDO::PARAM_FLOAT
            $stmt -> bindValue(':nazwa', $status['nazwa'], PDO::PARAM_STR);
			$stmt -> execute(); 
		}
	}
	catch(PDOException $e)
	{
		echo \Config\Database\DBErrorName::$noadd;
	}
    
    
   
    $historie = array();
    $historie[] = array(
                        'id_P' => '1',
                        'id_O' => '1',
						'id_S' => '1',
						'czas' => '2017-04-30 12:00:00',
                        'opis' => '');
    
    $historie[] = array(
                        'id_P' => '1',
                        'id_O' => '1',
						'id_S' => '3',
						'czas' => '2017-04-30 12:10:00',
                        'opis' => '');
    
    $historie[] = array(
                        'id_P' => '1',
                        'id_O' => '5',
						'id_S' => '5',
						'czas' => '2017-05-01 14:00:00',
                        'opis' => 'Przesylkę Odebrał Kowalski');
    
    $historie[] = array(
                        'id_P' => '4',
                        'id_O' => '9',
						'id_S' => '2',
						'czas' => '2017-05-02 20:00:00',
                        'opis' => '');
    
    $historie[] = array(
                        'id_P' => '4',
                        'id_O' => '2',
						'id_S' => '1',
						'czas' => '2017-05-04 07:00:00',
                        'opis' => '');
    
    $historie[] = array(
                        'id_P' => '4',
                        'id_O' => '2',
						'id_S' => '3',
						'czas' => '2017-05-04 07:10:00',
                        'opis' => '');
    
    $historie[] = array(
                        'id_P' => '4',
                        'id_O' => '9',
						'id_S' => '5',
						'czas' => '2017-05-04 07:10:00',
                        'opis' => 'Przesyłka Odebrana');

    $historie[] = array(
                        'id_P' => '3',
                        'id_O' => '1',
                        'id_S' => '1',
                        'czas' => '2017-04-30 12:00:00',
                        'opis' => '');
    $historie[] = array(
                        'id_P' => '3',
                        'id_O' => '5',
                        'id_S' => '1',
                        'czas' => '2017-04-30 12:00:00',
                        'opis' => '');

    $historie[] = array(
                        'id_P' => '3',
                        'id_O' => '1',
                        'id_S' => '3',
                        'czas' => '2017-04-30 12:00:00',
                        'opis' => '');

    $historie[] = array(
                        'id_P' => '3',
                        'id_O' => '2',
                        'id_S' => '3',
                        'czas' => '2017-04-30 12:00:00',
                        'opis' => '');
    $historie[] = array(
                        'id_P' => '5',
                        'id_O' => '2',
                        'id_S' => '3',
                        'czas' => '2017-04-30 12:00:00',
                        'opis' => '');

    $historie[] = array(
                        'id_P' => '5',
                        'id_O' => '2',
                        'id_S' => '3',
                        'czas' => '2017-04-30 12:00:00',
                        'opis' => '');

    $historie[] = array(
        'id_P' => '16',
        'id_O' => '1',
        'id_S' => '1',
        'czas' => '2017-04-30 14:00:00',
        'opis' => '');
    $historie[] = array(
        'id_P' => '7',
        'id_O' => '1',
        'id_S' => '1',
        'czas' => '2017-04-30 14:02:00',
        'opis' => '');
    $historie[] = array(
        'id_P' => '6',
        'id_O' => '1',
        'id_S' => '1',
        'czas' => '2017-04-30 14:05:00',
        'opis' => '');
    $historie[] = array(
        'id_P' => '8',
        'id_O' => '1',
        'id_S' => '1',
        'czas' => '2017-04-30 14:10:00',
        'opis' => '');
    $historie[] = array(
        'id_P' => '10',
        'id_O' => '1',
        'id_S' => '1',
        'czas' => '2017-04-30 14:03:00',
        'opis' => '');
    $historie[] = array(
        'id_P' => '20',
        'id_O' => '1',
        'id_S' => '1',
        'czas' => '2017-04-30 14:06:00',
        'opis' => '');
    $historie[] = array(
        'id_P' => '21',
        'id_O' => '1',
        'id_S' => '1',
        'czas' => '2017-04-30 15:10:00',
        'opis' => '');

    try
	{
		$stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableHistoria.'` (
        `'.DB\Historia::$id_P.'`,
        `'.DB\Historia::$id_O.'`,
        `'.DB\Historia::$id_S.'`,
        `'.DB\Historia::$czas.'`,
        `'.DB\Historia::$opis.'`) 
         VALUES(:id_P, :id_O, :id_S, :czas, :opis)');	
		foreach($historie as $historia)
		{
			$stmt -> bindValue(':id_P', $historia['id_P'], PDO::PARAM_STR);
            $stmt -> bindValue(':id_O', $historia['id_O'], PDO::PARAM_STR);
            $stmt -> bindValue(':id_S', $historia['id_S'], PDO::PARAM_STR);
            $stmt -> bindValue(':czas', $historia['czas'], PDO::PARAM_STR);
            $stmt -> bindValue(':opis', $historia['opis'], PDO::PARAM_STR);
 
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
        'haslo' => '81dc9bdb52d04dc20036dbd8313ed05581dc9bdb52d04dc20036dbd8313ed05581dc9bdb52d04dc20036dbd8313ed055');


    try
    {
        $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableUzytkownik.'` (
            `'.DB\Uzytkownik::$login.'`,
            `'.DB\Uzytkownik::$haslo.'`) 
             VALUES(:login, :haslo)');
        foreach($uzytkownicy as $uzytkownik)
        {
            $stmt -> bindValue(':login', $uzytkownik['login'], PDO::PARAM_STR);
            $stmt -> bindValue(':haslo', $uzytkownik['haslo'], PDO::PARAM_STR);

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
<a href="http://localhost/Projekt/">Dalej</a>
</body>
</html>