<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $new_data = [
            [
                'id' => '1',
                'username'  => 'uadmin',
                'password' => '0192023a7bbd73250516f069df18b5006302e765a9c851.49230318',
                'salt' => '6302e765a9c851.49230318',
                'role' => '1'
            ],
        ];

        foreach ($new_data as $data) {
            // insert semua data ke tabel
            $this->db->table('user')->insert($data);
        }
    }
}
