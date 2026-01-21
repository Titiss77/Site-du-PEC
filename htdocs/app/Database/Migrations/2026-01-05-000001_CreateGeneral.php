<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGeneral extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'image' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'logo' => ['type' => 'INT', 'constraint' => 11, 'null' => true, 'unsigned' => true],
            'nomClub' => ['type' => 'VARCHAR', 'constraint' => 100],
            'description' => ['type' => 'TEXT'],
            'philosophie' => ['type' => 'TEXT'],
            'nombreNageurs' => ['type' => 'INT', 'constraint' => 11],
            'nombreHommes' => ['type' => 'INT', 'constraint' => 11],
            'projetSportif' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'lienFacebook' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'lienInstagram' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'lienffessm' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'logoffessm' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'lienDrive' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('image', 'images', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('logo', 'images', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('general');
    }

    public function down()
    {
        $this->forge->dropTable('general');
    }
}