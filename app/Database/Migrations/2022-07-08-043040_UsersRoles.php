<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsersRoles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'role_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);

        $this->forge->addKey(['user_id','role_id'], true);
        $this->forge->createTable('users_roles');
    }

    public function down()
    {
        $this->forge->dropTable('users_roles');
    }
}
