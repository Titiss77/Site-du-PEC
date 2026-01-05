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
            TABLE : billet 
        */
        $fields = [
            'idBillet'      => [ 'type' => 'INT', 'constraint' => 11, 'auto_increment' => true ],
            'dateBillet'    => [ 'type' => 'DATETIME' ],
            'titreBillet'   => [ 'type' => 'VARCHAR', 'constraint' => 50 ],
            'contenuBillet' => [ 'type' => 'TEXT' ],
        ];

        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('idBillet');
        $this->forge->createTable('billet', true, $tables_attributes);
        
        /*
            TABLE : commentaire
        */
        $fields = [
            'idCommentaire'        => [ 'type' => 'INT', 'constraint' => 11, 'auto_increment' => true ],
            'dateCommentaire'   => [ 'type' => 'DATETIME' ],
            'auteurCommentaire'   => [ 'type' => 'VARCHAR', 'constraint' => 50 ],
            'contenuCommentaire'   => [ 'type' => 'TEXT' ],
            'idBillet'        => [ 'type' => 'INT', 'constraint' => 11 ],
            'estValide'        => [ 'type' => 'ENUM', 'constraint' => ['0', '1'], 'default' => '0' ],
        ];

        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('idCommentaire');
        $this->forge->addForeignKey('idBillet', 'billet', 'idBillet');
        $this->forge->createTable('commentaire', true, $tables_attributes);

    }

    public function down()
    {
        $this->forge->dropTable('commentaire', true);
        $this->forge->dropTable('billet', true);
        // On ne supprime PAS typeutilisateur ici, il a son propre fichier
    }
}