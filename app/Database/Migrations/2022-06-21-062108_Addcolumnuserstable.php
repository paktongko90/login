<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addcolumnuserstable extends Migration
{
    public function up()
    {
        $fields = [
            'activated' =>[
                'type' => 'int',
                'constraint' => 1,
                'after' => 'password',
                'null' => true,
            ],
                
        ];

        $this->forge->addColumn('users', $fields);

    }

    public function down()
    {
        //
    }
}
