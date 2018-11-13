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

echo "<b>Instalacja aplikacji zakończona!</b>"





?>
<br>
<br>
<a href="http://localhost/Projekt_Zespolowy/">Dalej</a>
</body>
</html>
