<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePartenaires extends Migration
{
    public function up()
    {
        // Définition des champs de la table 'partenaires'
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nom' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'image' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'       => true,
            ],
            'site_web' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true, // Le site web est optionnel
            ],
            'ordre' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0, // Pour gérer l'ordre d'affichage
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

        // Ajout de la clé primaire
        $this->forge->addKey('id', true);

        $this->forge->addForeignKey('image', 'images', 'id', 'CASCADE', 'CASCADE');
        // Création de la table
        $this->forge->createTable('partenaires');
    }

    public function down()
    {
        // Suppression de la table si on annule la migration
        $this->forge->dropTable('partenaires');
    }
}