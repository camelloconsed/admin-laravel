<?php

use Illuminate\Database\Seeder;
use App\Customer;
use App\User;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
            [
                'name' => 'Huertos Lopez',
                'description' => 'ESP_SOCPFSVA',
                'logo' => 'test',
                'contact_name' => 'Eduardo Customer',
                'contact_position' => 'Gerente',
                'contact_phone' => '123',
                'contact_email' => 'customer@jumpitt.com',
                'db_host' => '173.212.196.198',
                'db_port' => '1433',
                'db_name' => 'ESP_SOCPFSVA',
                'db_user' => 'frontend',
                'db_password' => 'f4e2.1',
                'users' => [
                    ['forenames' => 'Jean',
                    'surnames' => 'Pitt',
                    'email' => 'customer1@jumpitt.com',
                    'password' => '123456']
                ]
            ],
            [
                'name' => 'Huertos Dominguez',
                'description' => 'ESP_SOCPFLQA',
                'logo' => 'test',
                'contact_name' => 'Eduardo Customer',
                'contact_position' => 'Gerente',
                'contact_phone' => '123',
                'contact_email' => 'customer@jumpitt.com',
                'db_host' => '173.212.196.198',
                'db_port' => '1433',
                'db_name' => 'ESP_SOCPFLQA',
                'db_user' => 'frontend',
                'db_password' => 'f4e2.1',
                'users' => [
                    ['forenames' => 'Jean',
                    'surnames' => 'Pitt',
                    'email' => 'customer2@jumpitt.com',
                    'password' => '123456']
                ]
            ],
            [
                'name' => 'Huertos Ramirez',
                'description' => 'ESP_SOCPFAPO',
                'logo' => 'test',
                'contact_name' => 'Eduardo Customer',
                'contact_position' => 'Gerente',
                'contact_phone' => '123',
                'contact_email' => 'customer@jumpitt.com',
                'db_host' => '5.189.138.165',
                'db_port' => '1433',
                'db_name' => ' ESP_SOCPFAPO',
                'db_user' => 'frontend',
                'db_password' => 'f4e2.1',
                'users' => [
                    ['forenames' => 'Jean',
                    'surnames' => 'Pitt',
                    'email' => 'customer3@jumpitt.com',
                    'password' => '123456']
                ]
            ],
            [
                'name' => 'Huertos Martinez',
                'description' => 'ESP_SOCPFDLC',
                'logo' => 'test',
                'contact_name' => 'Eduardo Customer',
                'contact_position' => 'Gerente',
                'contact_phone' => '123',
                'contact_email' => 'customer@jumpitt.com',
                'db_host' => '5.189.138.165',
                'db_port' => '1433',
                'db_name' => ' ESP_SOCPFDLC',
                'db_user' => 'frontend',
                'db_password' => 'f4e2.1',
                'users' => [
                    ['forenames' => 'Jean',
                    'surnames' => 'Pitt',
                    'email' => 'customer4@jumpitt.com',
                    'password' => '123456']
                ]
            ]
        ];

        foreach($customers as $row){
            $customer = new Customer;
            $customer->name = $row['name'];
            $customer->description = $row['description'];
            $customer->logo = $row['logo'];
            $customer->contact_name = $row['contact_name'];
            $customer->contact_position = $row['contact_position'];
            $customer->contact_phone = $row['contact_phone'];
            $customer->contact_email = $row['contact_email'];

            $customer->db_host = $row['db_host'];
            $customer->db_port = $row['db_port'];
            $customer->db_name = $row['db_name'];
            $customer->db_user = $row['db_user'];
            $customer->db_password = $row['db_password'];
            $customer->status = 1;

            $customer->save();
            foreach($row['users'] as $row_user){
                $user = new User;
                $user->customer_id = $customer->id;
                $user->forenames = $row_user['forenames'];
                $user->surnames = $row_user['surnames'];
                $user->email = $row_user['email'];
                $user->password = bcrypt($row_user['password']);
                $user->save();
            }
        }
    }
}
