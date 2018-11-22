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
/*
 Klient
Lakier
Uzytkownik
Parking
Uslugi
UslugiKlient
Zamowienie
Pracownik
Konfigurator
Odbior
KlientSamochd
UslugaSerwis
SamochodSerwis
 * */

$query = 'DROP TABLE IF EXISTS `'.DB::$tableOdbior.'`';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$delete_table.DB::$tableOdbior;
}

$query = 'DROP TABLE IF EXISTS `'.DB::$tableUslugaSerwis.'`';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$delete_table.DB::$tableUslugaSerwis;
}


$query = 'DROP TABLE IF EXISTS `'.DB::$tableUslugiKlient.'`';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$delete_table.DB::$tableUslugiKlient;
}

$query = 'DROP TABLE IF EXISTS `'.DB::$tableKlientSamochod.'`';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$delete_table.DB::$tableKlientSamochod;
}

$query = 'DROP TABLE IF EXISTS `'.DB::$tableKonfigurator.'`';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$delete_table.DB::$tableKonfigurator;
}


$query = 'DROP TABLE IF EXISTS `'.DB::$tableUslugi.'`';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$delete_table.DB::$tableUslugi;
}


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

$query = 'DROP TABLE IF EXISTS `'.DB::$tableKlient.'`';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$delete_table.DB::$tableKlient;
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

$query = 'DROP TABLE IF EXISTS `'.DB::$tableParking.'`';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$delete_table.DB::$tableParking;
}

$query = 'DROP TABLE IF EXISTS `'.DB::$tableSamochod.'`';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$delete_table.DB::$tableSamochod;
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

$query = 'DROP TABLE IF EXISTS `'.DB::$tableSamochodSerwis.'`';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$delete_table.DB::$tableSamochodSerwis;
}

$query = 'DROP TABLE IF EXISTS `'.DB::$tableSamochodParametry.'`';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$delete_table.DB::$tableSamochodParametry;
}

$query = 'DROP TABLE IF EXISTS `'.DB::$tableJednostkaNapedowa.'`';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$delete_table.DB::$tableJednostkaNapedowa;
}

$query = 'DROP TABLE IF EXISTS `'.DB::$tableSamochodSwiatla.'`';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$delete_table.DB::$tableSamochodSwiatla;
}

$query = 'DROP TABLE IF EXISTS `'.DB::$tableSamochodKola.'`';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$delete_table.DB::$tableSamochodKola;
}

$query = 'DROP TABLE IF EXISTS `'.DB::$tableSamochodWyposazenie.'`';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$delete_table.DB::$tableSamochodWyposazenie;
}

$query = 'DROP TABLE IF EXISTS `'.DB::$tableZbiorModeli.'`';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$delete_table.DB::$tableZbiorModeli;
}

$query = 'DROP TABLE IF EXISTS `'.DB::$tableSwiatla.'`';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$delete_table.DB::$tableSwiatla;
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

$query = 'DROP TABLE IF EXISTS `'.DB::$tableWyposazenie.'`';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$delete_table.DB::$tableWyposazenie;
}

$query = 'DROP TABLE IF EXISTS `'.DB::$tableWersja.'`';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$delete_table.DB::$tableWersja;
}

$query = 'DROP TABLE IF EXISTS `'.DB::$tableOpcja.'`';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$delete_table.DB::$tableOpcja;
}

/*
 tworzenie tabeli jednostkaNapedowa
 */
$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableJednostkaNapedowa.'` (
		`'.DB\JednostkaNapedowa::$id_JednostkaNapedowa.'` INT NOT NULL AUTO_INCREMENT,
        `'.DB\JednostkaNapedowa::$pojemnosc.'` FLOAT NOT NULL,
        `'.DB\JednostkaNapedowa::$silnik.'` VARCHAR(50) NOT NULL,
        `'.DB\JednostkaNapedowa::$moc.'` INT NOT NULL,
        `'.DB\JednostkaNapedowa::$skrzynia.'` VARCHAR(50) NOT NULL,
		PRIMARY KEY (`'.DB\JednostkaNapedowa::$id_JednostkaNapedowa.'`)
		) ENGINE=InnoDB;';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$create_table.DB::$tableJednostkaNapedowa;
}



/*
 tworzenie tabeli wersja
 */
$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableWersja.'` (
		`'.DB\Wersja::$id_Wersja.'` INT NOT NULL AUTO_INCREMENT,
        `'.DB\Wersja::$nazwa.'` VARCHAR(50) NOT NULL,
		PRIMARY KEY (`'.DB\Wersja::$id_Wersja.'`)
		) ENGINE=InnoDB;';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$create_table.DB::$tableWersja;
}
/*
 tworzenie tabeli zbior modeli
 */
$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableZbiorModeli.'` (
		`'.DB\ZbiorModeli::$id_ZbiorModeli.'` INT NOT NULL AUTO_INCREMENT,
        `'.DB\ZbiorModeli::$nazwa.'` VARCHAR(50) NOT NULL,
        `'.DB\ZbiorModeli::$id_Wersja.'` INT NOT NULL,
        `'.DB\ZbiorModeli::$cena.'` FLOAT NOT NULL,
        `'.DB\ZbiorModeli::$foto.'` VARCHAR(50) NOT NULL,
		PRIMARY KEY (`'.DB\ZbiorModeli::$id_ZbiorModeli.'`),
		FOREIGN KEY (`'.DB\ZbiorModeli::$id_Wersja.'`) REFERENCES '.DB::$tableWersja.'('.DB\Wersja::$id_Wersja.')
		) ENGINE=InnoDB;';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$create_table.DB::$tableZbiorModeli;
}

/**
tworzenie tabeli Odbior
 */
$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableOdbior.'` (
                `'.DB\Odbior::$id.'` INT NOT NULL AUTO_INCREMENT,
                `'.DB\Odbior::$idKlient.'`  INT NOT NULL,
                `'.DB\Odbior::$data.'` DATE NOT NULL,
                `'.DB\Odbior::$numerZamowienia.'` VARCHAR(50) NOT NULL,
                `'.DB\Odbior::$odebrano.'` BIT NOT NULL,
                PRIMARY KEY (`'.DB\Odbior::$id.'`)
                ) ENGINE=InnoDB;';

try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$create_table.DB::$tableOdbior;
}

/**
tworzenie tabeli SamochodSerwis
 */
$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableSamochodSerwis.'` (
                `'.DB\SamochodSerwis::$id.'` INT NOT NULL AUTO_INCREMENT,
                `'.DB\SamochodSerwis::$model.'` VARCHAR(30) NOT NULL,
                `'.DB\SamochodSerwis::$lakier.'` VARCHAR(30) NOT NULL,
                `'.DB\SamochodSerwis::$rok.'` INT (50) NOT NULL,
                PRIMARY KEY (`'.DB\SamochodSerwis::$id.'`)
                ) ENGINE=InnoDB;';

try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$create_table.DB::$tableSamochodSerwis;
}


/**
 *  Tworzenie tabeli uslugi
 */
$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableUslugi.'` (
		        `'.DB\Uslugi::$id.'` INT NOT NULL AUTO_INCREMENT,
		        `'.DB\Uslugi::$nazwaUsluga.'` VARCHAR(40) NOT NULL,
		        `'.DB\Uslugi::$Cena.'` FLOAT NOT NULL,
		        PRIMARY KEY (`'.DB\Uslugi::$id.'`)) ENGINE=InnoDB;';

try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$create_table.DB::$tableUslugi;
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
                `'.DB\Klient::$uzytkownik.'` INT NULL,
                PRIMARY KEY (`'.DB\Klient::$id.'`),
                FOREIGN KEY (`'.DB\Klient::$uzytkownik.'`) REFERENCES '.DB::$tableUzytkownik.'('.DB\Uzytkownik::$id_uzytkownik.')
                ) ENGINE=InnoDB;';

try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$create_table.DB::$tableKlient;
}

/**
 * Tworzenie tabeli uslugiserwis
 */
$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableUslugaSerwis.'` (
                `'.DB\UslugaSerwis::$id.'` INT NOT NULL AUTO_INCREMENT,
                `'.DB\UslugaSerwis::$idKlient.'`  INT NOT NULL,
                `'.DB\UslugaSerwis::$data.'` DATE NOT NULL,
                `'.DB\UslugaSerwis::$idUslugi.'` INT NOT NULL,
                `'.DB\UslugaSerwis::$zrealizowano.'` BIT NOT NULL,
                PRIMARY KEY (`'.DB\UslugaSerwis::$id.'`),
                FOREIGN KEY (`'.DB\UslugaSerwis::$idUslugi.'`) REFERENCES '.DB::$tableUslugi.'('.DB\Uslugi::$id.')
                ) ENGINE=InnoDB;';

try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$create_table.DB::$tableUslugaSerwis;
}

/**
 *  Tworzenie tabeli klientsamochod
 */
$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableKlientSamochod.'` (
		        `'.DB\KlientSamochod::$id.'` INT NOT NULL AUTO_INCREMENT,
		        `'.DB\KlientSamochod::$id_Klient.'` INT NOT NULL,
		        `'.DB\KlientSamochod::$id_Samochod.'` INT NOT NULL,
		        PRIMARY KEY (`'.DB\KlientSamochod::$id.'`),
		        FOREIGN KEY (`'.DB\KlientSamochod::$id_Klient.'`) REFERENCES '.DB::$tableKlient.'('.DB\Klient::$id.'),
		        FOREIGN KEY (`'.DB\KlientSamochod::$id_Samochod.'`) REFERENCES '.DB::$tableSamochodSerwis.'('.DB\SamochodSerwis::$id.')       
		        ) ENGINE=InnoDB;';

try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$create_table.DB::$tableKlientSamochod;
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
 *  Tworzenie tabeli lakier
 */
$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableLakier.'` (
		                `'.DB\Lakier::$id.'` INT NOT NULL AUTO_INCREMENT,
		                `'.DB\Lakier::$nazwaLakier.'` VARCHAR(40) NOT NULL,
		                `'.DB\Lakier::$Foto.'` VARCHAR(30) NULL,
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
 *
 * tabela uslugi klient
 */

$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableUslugiKlient.'` (
		        `'.DB\UslugiKlient::$id.'` INT NOT NULL AUTO_INCREMENT,
		        `'.DB\UslugiKlient::$Id_Uslugi.'` INT NOT NULL,
		        `'.DB\UslugiKlient::$Id_KlientSamochod.'` INT NOT NULL,
		        `'.DB\UslugiKlient::$Opis.'` VARCHAR(100) NULL,
		        PRIMARY KEY (`'.DB\UslugiKlient::$id.'`),
		        FOREIGN KEY (`'.DB\UslugiKlient::$Id_Uslugi.'`) REFERENCES '.DB::$tableUslugi.'('.DB\Uslugi::$id.'),
		        FOREIGN KEY (`'.DB\UslugiKlient::$Id_KlientSamochod.'`) REFERENCES '.DB::$tableKlientSamochod.'('.DB\KlientSamochod::$id.')) ENGINE=InnoDB;';

try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$create_table.DB::$tableUslugiKlient;
}

/*
 Samochod parametry Tabela
 */
$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableSamochodParametry.'` (
		`'.DB\SamochodParametry::$id_SamochodParametry.'` INT NOT NULL AUTO_INCREMENT,
        `'.DB\SamochodParametry::$id_JednostkaNapedowa.'` INT NOT NULL,
        `'.DB\SamochodParametry::$id_ZbiorModeli.'` INT NOT NULL,
		PRIMARY KEY (`'.DB\SamochodParametry::$id_SamochodParametry.'`),
		FOREIGN KEY (`'.DB\SamochodParametry::$id_JednostkaNapedowa.'`) REFERENCES '.DB::$tableJednostkaNapedowa.'('.DB\JednostkaNapedowa::$id_JednostkaNapedowa.'),
		FOREIGN KEY (`'.DB\SamochodParametry::$id_ZbiorModeli.'`) REFERENCES '.DB::$tableZbiorModeli.'('.DB\ZbiorModeli::$id_ZbiorModeli.')
		) ENGINE=InnoDB;';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$create_table.DB::$tableSamochodParametry;
}

/*
 Samochod Tabela
 */
$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableSamochod.'` (
		`'.DB\Samochod::$id_Samochod.'` INT NOT NULL AUTO_INCREMENT,
        `'.DB\Samochod::$id_SamochodParametry.'` INT NOT NULL,
        `'.DB\Samochod::$id_Lakier.'` INT NOT NULL,
		PRIMARY KEY (`'.DB\Samochod::$id_Samochod.'`),
		FOREIGN KEY (`'.DB\Samochod::$id_SamochodParametry.'`) REFERENCES '.DB::$tableSamochodParametry.'('.DB\SamochodParametry::$id_SamochodParametry.'),
		FOREIGN KEY (`'.DB\Samochod::$id_Lakier.'`) REFERENCES '.DB::$tableLakier.'('.DB\Lakier::$id.')
		) ENGINE=InnoDB;';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$create_table.DB::$tableSamochod;
}

/*
 Stworzenie tabeli parking
 */

$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableParking.'` (
		                `'.DB\Parking::$id.'` INT NOT NULL AUTO_INCREMENT,
                        `'.DB\Parking::$Id_Samochod.'` INT NOT NULL,
                        `'.DB\Parking::$DostepneSztuki.'` INT NOT NULL,
		                PRIMARY KEY (`'.DB\Parking::$id.'`),
		               FOREIGN KEY ('.DB\Parking::$Id_Samochod.') REFERENCES '.DB::$tableSamochod.'('.DB\Samochod::$id_Samochod.')) ENGINE=InnoDB;';

try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$create_table.DB::$tableParking;
}

/**
 * Stworzenie tabeli zamowienie
 */

$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableZamowienie.'` (
		            `'.DB\Zamowienie::$id.'` INT NOT NULL AUTO_INCREMENT,
                    `'.DB\Zamowienie::$Id_Klient.'` INT NOT NULL,
                    `'.DB\Zamowienie::$Id_Pracownik.'` INT NOT NULL,
                    `'.DB\Zamowienie::$Id_Samochod.'` INT NOT NULL,
                    `'.DB\Zamowienie::$DataZamow.'` DATE NOT NULL,
                    `'.DB\Zamowienie::$NumerZamowienia.'` VARCHAR(6) NOT NULL,
                    `'.DB\Zamowienie::$StatusZamowienia.'` VARCHAR(30) NOT NULL,
		            PRIMARY KEY (`'.DB\Zamowienie::$id.'`),
		            FOREIGN KEY (`'.DB\Zamowienie::$Id_Klient.'`) REFERENCES '.DB::$tableKlient.'('.DB\Klient::$id.'),
		            FOREIGN KEY ('.DB\Zamowienie::$Id_Pracownik.') REFERENCES '.DB::$tablePracownik.'('.DB\Pracownik::$id.'),
		            FOREIGN KEY ('.DB\Zamowienie::$Id_Samochod.') REFERENCES '.DB::$tableSamochod.'('.DB\Samochod::$id_Samochod.')) ENGINE=InnoDB;';

try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$create_table.DB::$tableZamowienie;
}



/*
    tworzenie tabeli konfigurator
*/
$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableKonfigurator.'` (
		`'.DB\Konfigurator::$id.'` INT NOT NULL AUTO_INCREMENT,
        `'.DB\Konfigurator::$id_Samochod.'` INT NOT NULL,
        `'.DB\Konfigurator::$numer.'` VARCHAR(5) NOT NULL,
		PRIMARY KEY (`'.DB\Konfigurator::$id.'`),
		FOREIGN KEY (`'.DB\Konfigurator::$id_Samochod.'`) REFERENCES '.DB::$tableSamochod.'('.DB\Samochod::$id_Samochod.')
		) ENGINE=InnoDB;';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$create_table.DB::$tableKonfigurator;
}




$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableSwiatla.'` (
		`'.DB\Swiatla::$id_Swiatla.'` INT NOT NULL AUTO_INCREMENT,
        `'.DB\Swiatla::$nazwa.'` VARCHAR(50) NOT NULL,
		PRIMARY KEY (`'.DB\Swiatla::$id_Swiatla.'`)
		) ENGINE=InnoDB;';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$create_table.DB::$tableSwiatla;
}


$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableKola.'` (
		`'.DB\Kola::$id_Kola.'` INT NOT NULL AUTO_INCREMENT,
        `'.DB\Kola::$nazwa.'` VARCHAR(50) NOT NULL,
		PRIMARY KEY (`'.DB\Kola::$id_Kola.'`)
		) ENGINE=InnoDB;';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$create_table.DB::$tableKola;
}

$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableWyposazenie.'` (
		`'.DB\Wyposazenie::$id_Wyposazenie.'` INT NOT NULL AUTO_INCREMENT,
        `'.DB\Wyposazenie::$nazwa.'` VARCHAR(50) NOT NULL,
		PRIMARY KEY (`'.DB\Wyposazenie::$id_Wyposazenie.'`)
		) ENGINE=InnoDB;';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$create_table.DB::$tableWyposazenie;
}



$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableOpcja.'` (
		`'.DB\Opcja::$id_Opcja.'` INT NOT NULL AUTO_INCREMENT,
        `'.DB\Opcja::$nazwa.'` VARCHAR(50) NOT NULL,
		PRIMARY KEY (`'.DB\Opcja::$id_Opcja.'`)
		) ENGINE=InnoDB;';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$create_table.DB::$tableOpcja;
}




$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableSamochodSwiatla.'` (
		`'.DB\SamochodSwiatla::$id_SamochodSwiatla.'` INT NOT NULL AUTO_INCREMENT,
        `'.DB\SamochodSwiatla::$id_Swiatla.'` INT NOT NULL,
        `'.DB\SamochodSwiatla::$id_Opcja.'` INT NOT NULL,
        `'.DB\SamochodSwiatla::$id_ZbiorModeli.'` INT NOT NULL,
		PRIMARY KEY (`'.DB\SamochodSwiatla::$id_SamochodSwiatla.'`),
		FOREIGN KEY (`'.DB\SamochodSwiatla::$id_Swiatla.'`) REFERENCES '.DB::$tableSwiatla.'('.DB\Swiatla::$id_Swiatla.'),
		FOREIGN KEY (`'.DB\SamochodSwiatla::$id_Opcja.'`) REFERENCES '.DB::$tableOpcja.'('.DB\Opcja::$id_Opcja.'),
		FOREIGN KEY (`'.DB\SamochodSwiatla::$id_ZbiorModeli.'`) REFERENCES '.DB::$tableZbiorModeli.'('.DB\ZbiorModeli::$id_ZbiorModeli.')
		) ENGINE=InnoDB;';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$create_table.DB::$tableSamochodSwiatla;
}

$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableSamochodKola.'` (
		`'.DB\SamochodKola::$id_SamochodKola.'` INT NOT NULL AUTO_INCREMENT,
        `'.DB\SamochodKola::$id_Kola.'` INT NOT NULL,
        `'.DB\SamochodKola::$id_Opcja.'` INT NOT NULL,
        `'.DB\SamochodKola::$id_ZbiorModeli.'` INT NOT NULL,
		PRIMARY KEY (`'.DB\SamochodKola::$id_SamochodKola.'`),
		FOREIGN KEY (`'.DB\SamochodKola::$id_Kola.'`) REFERENCES '.DB::$tableKola.'('.DB\Kola::$id_Kola.'),
		FOREIGN KEY (`'.DB\SamochodKola::$id_Opcja.'`) REFERENCES '.DB::$tableOpcja.'('.DB\Opcja::$id_Opcja.'),
		FOREIGN KEY (`'.DB\SamochodKola::$id_ZbiorModeli.'`) REFERENCES '.DB::$tableZbiorModeli.'('.DB\ZbiorModeli::$id_ZbiorModeli.')
		) ENGINE=InnoDB;';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$create_table.DB::$tableSamochodKola;
}

$query = 'CREATE TABLE IF NOT EXISTS `'.DB::$tableSamochodWyposazenie.'` (
		`'.DB\SamochodWyposazenie::$id_SamochodWyposazenie.'` INT NOT NULL AUTO_INCREMENT,
        `'.DB\SamochodWyposazenie::$id_Wyposazenie.'` INT NOT NULL,
        `'.DB\SamochodWyposazenie::$id_Opcja.'` INT NOT NULL,
        `'.DB\SamochodWyposazenie::$id_ZbiorModeli.'` INT NOT NULL,
		PRIMARY KEY (`'.DB\SamochodWyposazenie::$id_SamochodWyposazenie.'`),
		FOREIGN KEY (`'.DB\SamochodWyposazenie::$id_Wyposazenie.'`) REFERENCES '.DB::$tableWyposazenie.'('.DB\Wyposazenie::$id_Wyposazenie.'),
		FOREIGN KEY (`'.DB\SamochodWyposazenie::$id_Opcja.'`) REFERENCES '.DB::$tableOpcja.'('.DB\Opcja::$id_Opcja.'),
		FOREIGN KEY (`'.DB\SamochodWyposazenie::$id_ZbiorModeli.'`) REFERENCES '.DB::$tableZbiorModeli.'('.DB\ZbiorModeli::$id_ZbiorModeli.')
		) ENGINE=InnoDB;';
try
{
    $pdo->exec($query);
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$create_table.DB::$tableSamochodWyposazenie;
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

$uzytkownicy[] = array(
    'login' => 'kWiniecka',
    'haslo' => '81dc9bdb52d04dc20036dbd8313ed05581dc9bdb52d04dc20036dbd8313ed05581dc9bdb52d04dc20036dbd8313ed055',
    'prawo' => 'klient');

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
    'telefon' => '503-345-345',
    'uzytkownik' => null);


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
    'telefon' => '678-345-345',
    'uzytkownik' => '4');
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
    'telefon' => '503-678-315',
    'uzytkownik' => null);

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
    'telefon' => '503-345-213',
    'uzytkownik' => null);

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
    'telefon' => '563-645-375',
    'uzytkownik' => null);

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
    'telefon' => '600-100-375',
    'uzytkownik' => null);

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
    'telefon' => '620-100-100',
    'uzytkownik' => null);

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
    'telefon' => '620-160-260',
    'uzytkownik' => null);

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
    'telefon' => '920-760-260','uzytkownik' => null);

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
    'telefon' => '990-670-260','uzytkownik' => null);

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
    'telefon' => '543-670-260','uzytkownik' => null);
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
    'telefon' => '543-546-260','uzytkownik' => null);

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
    'telefon' => '543-670-280','uzytkownik' => null);

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
    'telefon' => '620-160-260','uzytkownik' => null);

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
    'telefon' => '920-760-260','uzytkownik' => null);

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
    'telefon' => '503-345-345','uzytkownik' => null);


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
    'telefon' => '678-345-345','uzytkownik' => null);

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
    'telefon' => '503-678-315','uzytkownik' => null);

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
    'telefon' => '503-345-213','uzytkownik' => null);

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
    'telefon' => '563-645-375','uzytkownik' => null);

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
    'telefon' => '600-100-375','uzytkownik' => null);

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
    'telefon' => '620-100-100','uzytkownik' => null);

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
    'telefon' => '503-345-345','uzytkownik' => null);


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
    'telefon' => '678-345-345','uzytkownik' => null);

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
    'telefon' => '503-678-315','uzytkownik' => null);

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
    'telefon' => '503-345-213','uzytkownik' => null);

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
    'telefon' => '563-645-375','uzytkownik' => null);

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
    'telefon' => '600-100-375','uzytkownik' => null);

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
    'telefon' => '620-100-100','uzytkownik' => null);

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
    'telefon' => '620-160-260','uzytkownik' => null);

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
    'telefon' => '920-760-260','uzytkownik' => null);

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
    'telefon' => '990-670-260','uzytkownik' => null);

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
    'telefon' => '543-670-260','uzytkownik' => null);
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
    'telefon' => '543-546-260','uzytkownik' => null);

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
    'telefon' => '543-670-280','uzytkownik' => null);

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
    'telefon' => '620-160-260','uzytkownik' => null);

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
    'telefon' => '920-760-260','uzytkownik' => null);

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
    'telefon' => '543-670-280','uzytkownik' => null);

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
    'telefon' => '620-160-260','uzytkownik' => null);

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
    'telefon' => '920-760-260','uzytkownik' => null);

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
    'telefon' => '563-645-375','uzytkownik' => null);

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
    'telefon' => '600-100-375','uzytkownik' => null);

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
    'telefon' => '620-100-100','uzytkownik' => null);

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
    'telefon' => '620-160-260','uzytkownik' => null);

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
    'telefon' => '920-760-260','uzytkownik' => null);

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
    'telefon' => '990-670-260','uzytkownik' => null);

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
    'telefon' => '543-670-260','uzytkownik' => null);
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
    'telefon' => '543-546-260','uzytkownik' => null);

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
    'telefon' => '543-670-280','uzytkownik' => null);

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
    'telefon' => '620-160-260','uzytkownik' => null);

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
    'telefon' => '920-760-260','uzytkownik' => null);

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
    'telefon' => '543-670-280',
    'uzytkownik' => null);

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
    'telefon' => '620-160-260',
    'uzytkownik' => null);

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
    'telefon' => '920-760-260',
    'uzytkownik' => null);

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
    'telefon' => '920-760-260',
    'uzytkownik' => null);




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
        `'.DB\Klient::$telefon.'`,
        `'.DB\Klient::$uzytkownik.'`) 
        VALUES(:imie, :nazwisko, :firma, :nip, :kod, :miejscowosc, :ulica, :nr, :email, :telefon, :uzytkownik)');
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
        $stmt -> bindValue(':uzytkownik', $klient['uzytkownik'], PDO::PARAM_INT);
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

$uslugi = array();
$uslugi[] = array(
    'nazwaUsluga' => 'Przeglad okresowy',
    'Cena' => '200.00');
$uslugi[] = array(
    'nazwaUsluga' => 'Wymiana oleju',
    'Cena' => '100.00');
$uslugi[] = array(
    'nazwaUsluga' => 'Wywazenie kol',
    'Cena' => '50.00');
$uslugi[] = array(
    'nazwaUsluga' => 'Myjnia automatyczna',
    'Cena' => '10.00');
$uslugi[] = array(
    'nazwaUsluga' => 'Zmiana opon na letnie/zimowe',
    'Cena' => '80.00');
$uslugi[] = array(
    'nazwaUsluga' => 'Nabicie klimatyzacji',
    'Cena' => '60.00');

try
{
    $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableUslugi.'` (
                    `'.DB\Uslugi::$nazwaUsluga.'`,
                    `'.DB\Uslugi::$Cena.'`
                    ) 
                    VALUES(:nazwaUsluga, :Cena)');
    foreach($uslugi as $usluga)
    {
        $stmt -> bindValue(':nazwaUsluga', $usluga['nazwaUsluga'], PDO::PARAM_STR);
        $stmt -> bindValue(':Cena', $usluga['Cena'], PDO::PARAM_STR);
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
    'Foto' => 'Czarny.jpg');
$lakiery[] = array(
    'nazwaLakier' => 'Srebrny',
    'Foto' => 'Srebrny.jpg');
$lakiery[] = array(
    'nazwaLakier' => 'Biały',
    'Foto' => 'Biały.jpg');
$lakiery[] = array(
    'nazwaLakier' => 'Czerwony',
    'Foto' => 'Czerwony.jpg');
$lakiery[] = array(
    'nazwaLakier' => 'Beżowy',
    'Foto' => 'Beżowy.jpg');
$lakiery[] = array(
    'nazwaLakier' => 'Niebieski',
    'Foto' => 'Niebieski.jpg');
$lakiery[] = array(
    'nazwaLakier' => 'Brązowy',
    'Foto' => 'Brązowy.jpg');


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


$swiatla = array();
$swiatla[] = 'Halogeny';
$swiatla[] = 'Światla soczewkowe';
$swiatla[] = 'Swiatla soczewkowe';
$swiatla[] = 'Ksenony';
$swiatla[] = 'Swiatla LED';

try
{
    $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableSwiatla.'` (
                                    `'.DB\Swiatla::$nazwa.'`
                                    ) 
                                    VALUES(:nazwa)');
    foreach($swiatla as $swiatlo)
    {
        $stmt -> bindValue(':nazwa', $swiatlo, PDO::PARAM_STR);
        $stmt -> execute();
    }
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$noadd;
}

$kola = array();
$kola[] = '16';
$kola[] = '17';
$kola[] = '18';
$kola[] = '19';
$kola[] = '20';

try
{
    $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableKola.'` (
                                    `'.DB\Kola::$nazwa.'`
                                    ) 
                                    VALUES(:nazwa)');
    foreach($kola as $kolo)
    {
        $stmt -> bindValue(':nazwa', $kolo, PDO::PARAM_STR);
        $stmt -> execute();
    }
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$noadd;
}

$wyposazenia = array();
$wyposazenia[] = 'Podgrzewane siedzenia';
$wyposazenia[] = 'Skorzana tapicerka';
$wyposazenia[] = 'Podgrzewana przednia szyba';
$wyposazenia[] = 'Fotel z masazem';
$wyposazenia[] = 'Podgrzewane lusterka';

try
{
    $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableWyposazenie.'` (
                                    `'.DB\Wyposazenie::$nazwa.'`
                                    ) 
                                    VALUES(:nazwa)');
    foreach($wyposazenia as $wyposazenie)
    {
        $stmt -> bindValue(':nazwa', $wyposazenie, PDO::PARAM_STR);
        $stmt -> execute();
    }
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$noadd;
}

$opcje = array();
$opcje[] = 'Podstawowa';
$opcje[] = 'Opcjonalna';

try
{
    $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableOpcja.'` (
                                    `'.DB\Opcja::$nazwa.'`
                                    ) 
                                    VALUES(:nazwa)');
    foreach($opcje as $opcja)
    {
        $stmt -> bindValue(':nazwa', $opcja, PDO::PARAM_STR);
        $stmt -> execute();
    }
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$noadd;
}

$wersje = array();
$wersje[] = 'AMG';
$wersje[] = 'Classic';
$wersje[] = 'Avangarde';
$wersje[] = 'Elegant';

try
{
    $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableWersja.'` (
                                    `'.DB\Wersja::$nazwa.'`
                                    ) 
                                    VALUES(:nazwa)');
    foreach($wersje as $wersja)
    {
        $stmt -> bindValue(':nazwa', $wersja, PDO::PARAM_STR);
        $stmt -> execute();
    }
}
catch(PDOException $e)
{
    echo \Config\Database\DBErrorName::$noadd;
}



$jednostkiNapedowe = array();
$jednostkiNapedowe[] = array(
    'pojemnosc' => '1.6',
    'silnik' => 'benzynowy',
    'moc' => '113',
    'skrzynia' => 'manualna');
$jednostkiNapedowe[] = array(
    'pojemnosc' => '2.5',
    'silnik' => 'Diesel',
    'moc' => '190',
    'skrzynia' => 'automatyczna');
$jednostkiNapedowe[] = array(
    'pojemnosc' => '1.9',
    'silnik' => 'Diesel',
    'moc' => '64',
    'skrzynia' => 'manualna');
$jednostkiNapedowe[] = array(
    'pojemnosc' => '2.0',
    'silnik' => 'Diesel',
    'moc' => '130',
    'skrzynia' => 'manualna');






try
{
    $stmt = $pdo -> prepare('INSERT INTO `'.DB::$tableJednostkaNapedowa.'` (
        `'.DB\JednostkaNapedowa::$pojemnosc.'`, 
        `'.DB\JednostkaNapedowa::$silnik.'`,
        `'.DB\JednostkaNapedowa::$moc.'`,
        `'.DB\JednostkaNapedowa::$skrzynia.'`) 
        VALUES(:pojemnosc, :silnik, :moc, :skrzynia)');
    foreach($jednostkiNapedowe as $jednostkaNapedowa)
    {
        //strval($float), nie ma typu PDO::PARAM_FLOAT
        $stmt -> bindValue(':pojemnosc', $jednostkaNapedowa['pojemnosc'], PDO::PARAM_STR);
        $stmt -> bindValue(':silnik', $jednostkaNapedowa['silnik'], PDO::PARAM_STR);
        $stmt -> bindValue(':moc', $jednostkaNapedowa['moc'], PDO::PARAM_INT);
        $stmt -> bindValue(':skrzynia', $jednostkaNapedowa['skrzynia'], PDO::PARAM_STR);
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
