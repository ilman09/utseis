<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BerandaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'dardardar',
            'status'    => 'halo ges.',
        ];

        // Simple Queries
        $this->db->table('berandas')->insert($data);
        
        $data = [
            'name' => 'darderdor',
            'status'    => 'halo gas.',
        ];
        // Using Query Builder
        $this->db->table('berandas')->insert($data);
    }
}
