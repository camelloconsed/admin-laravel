<?php

namespace App\Helpers;
use Config;
use DB;

class DatabaseConnection
{
    public static function setConnection($customer)
    {
        Config::set("database.connections.sqlsrv", [
            "driver" => "sqlsrv",
            "host" => $customer->db_host,
            "database" => $customer->db_name,
            "username" => $customer->db_user,
            "password" => $customer->db_password,
            "charset" => 'utf8',
            "port" => $customer->db_port
        ]);
 
        return DB::connection('sqlsrv');
    }
}