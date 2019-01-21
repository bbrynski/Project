<?php
	namespace Config\Database;

	class DBConfig{
        //nazwa bazy danych
        public static $databaseName = 'zespolowy2';
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
        public static $tableLakier = 'Lakier';
        public static $tableZamowienie = 'Zamowienie';
        public static $tableKonfigurator = 'Konfigurator';
        public static $tableParking = 'Parking';
        public static $tableUslugi = 'Uslugi';
        public static $tableUslugiKlient = 'UslugiKlient';

        public static $tableKlientSamochod = 'KlientSamochod';
        public static $tableSamochodSerwis = 'SamochodSerwis';
        public static $tableOdbior = 'Odbior';

        public static $tableUslugaSerwis = 'UslugaSerwis';

        public static $tableJednostkaNapedowa = 'JednostkaNapedowa';
        public static $tableSamochod = 'Samochod';
        public static $tableSwiatla = 'Swiatla';
        public static $tableKola = 'Kola';
        public static $tableWyposazenie = 'Wyposazenie';
        public static $tableWersja = 'Wersja';
        public static $tableOpcja = 'Opcja';
        public static $tableZbiorModeli = 'ZbiorModeli';
        public static $tableSamochodParametry = 'SamochodParametry';
        public static $tableSamochodSwiatla = 'SamochodSwiatla';
        public static $tableSamochodKola = 'SamochodKola';
        public static $tableSamochodWyposazenie = 'SamochodWyposazenie';

        public static $tableZapis = 'Zapis';


	}
