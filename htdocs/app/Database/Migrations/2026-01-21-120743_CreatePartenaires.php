<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePartenaires extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nom' => ['type' => 'VARCHAR', 'constraint' => 50, 'unique' => true],
            'image_url' => ['type' => 'VARCHAR', 'constraint' => 255],
            'site_web'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'ordre'      => ['type' => 'INT', 'constraint' => 5, 'default' => '1'],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('partenaires');
    }

    public function down()
    {
        $this->forge->dropTable('partenaires');
    }
}