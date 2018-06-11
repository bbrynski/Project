<?php
	namespace Config\Database;

	class DBConfig{
        //nazwa bazy danych
        public static $databaseName = 'zespolowy';
        //dane dostępowe do bazy danych
        public static $hostname = 'localhost';
        public static $databaseType = 'mysql';
        public static $port = '3306';
        public static $user = 'root';
        public static $password = '';

        //nazwy tabel
        public static $tableKlient = 'Klient';
        public static $tablePracownik = 'Pracownik';
        public static $tableUzytkownik = 'Uzytkownik';
        public static $tableSilnik = 'Silnik';
        public static $tableSkrzynia = 'Skrzynia';
        public static $tableNaped = 'Naped';
        public static $tableLakier = 'Lakier';
        public static $tableKola = 'Kola';
        public static $tableReflektory = 'Reflektory';
        public static $tableWyposazenie = 'Wyposazenie';
        public static $tableModel = 'Model';
        public static $tableZamowienie = 'Zamowienie';
        public static $tableKonfigurator = 'Konfigurator';
        public static $tableParking = 'Parking';
        public static $tableUslugi = 'Uslugi';
        public static $tableUslugiKlient = 'UslugiKlient';

        public static $tableKlientSamochod = 'KlientSamochod';
        public static $tableSamochodSerwis = 'SamochodSerwis';
        public static $tableOdbior = 'Odbior';

        public static $tableUslugaSerwis = 'UslugaSerwis';
	}
