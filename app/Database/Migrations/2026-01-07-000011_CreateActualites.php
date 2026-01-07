<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateActualites extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'titre' => [
                'type'       => 'VARCHAR',
                'constraint' => 150, // Plus long pour plus de flexibilité
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
                'unique'     => true, // Pour des URLs uniques
            ],
            'type' => [
                'type'       => 'ENUM',
                'constraint' => ['actualite', 'evenement', 'annonce'],
                'default'    => 'actualite',
            ],
            'statut' => [
                'type'       => 'ENUM',
                'constraint' => ['brouillon', 'publie', 'archive'],
                'default'    => 'brouillon',
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true, // Optionnel
            ],
            'date_evenement' => [
                'type' => 'DATE',
                'null' => true, // Uniquement pour le type 'evenement'
            ],
            'id_auteur' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        
        // Clé étrangère vers la table membres
        $this->forge->addForeignKey('id_auteur', 'membres', 'id', 'CASCADE', 'CASCADE');
        
        $this->forge->createTable('actualites');
    }

    public function down()
    {
        $this->forge->dropTable('actualites');
    }
}