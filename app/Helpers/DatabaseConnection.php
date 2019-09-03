<?php

namespace App\Helpers;
use Config;
use DB;

class DatabaseConnection
{
    public static function setConnection($db_host, $db_port, $db_name, $db_username, $db_password)
    {

       /* config(['database.connections.sqlsrv.database' => [
           
             "driver" => "sqlsrv",
            "host" => $db_host,
            "database" => $db_name,
            "username" => $db_username,
            "password" => $db_password,
            "charset" => 'utf8',
            "port" => $db_port
        ]]);*/

        Config::set("database.connections.sqlsrv", [
            "driver" => "sqlsrv",
            "host" => $db_host,
            "database" => $db_name,
            "username" => $db_username,
            "password" => $db_password,
            "charset" => 'utf8',
            "port" => $db_port
        ]);
 
        return DB::connection('sqlsrv');
    }
}