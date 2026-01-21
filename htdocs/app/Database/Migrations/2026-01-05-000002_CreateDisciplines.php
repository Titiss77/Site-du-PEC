<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDisciplines extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nom' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'description' => ['type' => 'TEXT', 'null' => true],
            'image' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'unsigned' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('image', 'images', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('disciplines');
    }

    public function down()
    {
        $this->forge->dropTable('disciplines');
    }
}