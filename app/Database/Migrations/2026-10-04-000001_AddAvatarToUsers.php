<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAvatarToUsers extends Migration
{
    public function up()
    {
        // The column may already exist if it was added manually before this migration ran.
        if ($this->db->fieldExists('avatar', 'users')) {
            return;
        }

        $this->forge->addColumn('users', [
            'avatar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        if ($this->db->fieldExists('avatar', 'users')) {
            $this->forge->dropColumn('users', 'avatar');
        }
    }
}
