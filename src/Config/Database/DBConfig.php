<?php
	namespace Config\Database;

	class DBConfig{
        //nazwa bazy danych
        public static $databaseName = 'zespolowy';
        //dane dostępowe do bazy danych
        public static $hostname = 'localhost';
        public static $databaseType = 'mysql';
        public static $port = '3306';
        public static $user = 'kowalski';
        public static $password = '123456';
        //nazwy tabel
        public static $tableKlient = 'Klient';
        public static $tablePrzesylka = 'Przesylka';
        public static $tableHistoria = 'Historia';
        public static $tableUzytkownik = 'Uzytkownik';
        public static $tableCennik = 'Cennik';
        public static $tableOddzial = 'Oddzial';
        public static $tableStatus = 'Status';
	}
