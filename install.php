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


    echo "<b>Instalacja aplikacji zakończona!</b>"





?>
<br>
<br>
<a href="http://localhost/Projekt_Zespolowy/">Dalej</a>
</body>
</html>