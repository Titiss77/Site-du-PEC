<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InitialDB extends Migration
{
    public function up()
    {
        $tables_attributes = [
            'ENGINE'        => 'InnoDB',
            'CHARACTER SET' => 'utf8mb4',
            'COLLATE'       => 'utf8mb4_general_ci',
        ];

        /*
            TABLE : coach
        */
        $fields = [
            'idCoach'      => [ 'type' => 'INT', 'constraint' => 11, 'auto_increment' => true ],
            'nom'    => [ 'type' => 'VARCHAR', 'constraint' => 100 ],
            'photo'   => [ 'type' => 'VARCHAR', 'constraint' => 255 ],
            'description' => [ 'type' => 'TEXT' ],
        ];

        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('idCoach');
        $this->forge->createTable('coachs', true, $tables_attributes);
        
        

    }

    public function down()
    {
        $this->forge->dropTable('coachs', true);
        // On ne supprime PAS typeutilisateur ici, il a son propre fichier
    }
}