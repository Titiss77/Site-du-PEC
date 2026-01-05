<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InitialSchema extends Migration
{
    public function up()
    {
        // 1. Table 'header'
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'libelle' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
        ]);
        $this->forge->addKey('id', true); // PRIMARY KEY
        $this->forge->createTable('header');

        // 2. Table 'user'
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
                'comment'        => 'Identifiant non null et unique',
            ],
            'login' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
                'comment'    => 'Identifiant de connexion',
            ],
            'nom' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
                'comment'    => 'Nom du user',
            ],
            'prenom' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'comment'    => 'Prénom du user',
            ],
            'author' => [
                'type'       => 'ENUM',
                'constraint' => ['0', '1', '2'],
                'default'    => '1',
                'comment'    => '0 = admin, 1 = user',
            ],
            'dateDeCreation datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'motDePasse' => [
                'type'       => 'CHAR',
                'constraint' => '255',
                'comment'    => 'Mot de passe haché',
            ],
        ]);
        $this->forge->addKey('id', true); // PRIMARY KEY
        $this->forge->createTable('user');

        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'site' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'ext' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
        ]);
        $this->forge->addKey('id', true); // PRIMARY KEY
        $this->forge->createTable('extention');

        // 3. Table 'categorie'
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'libelle' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'idHeader' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true, // IMPORTANT: Match header.id
            ],
        ]);
        $this->forge->addKey('id', true); // PRIMARY KEY
        $this->forge->addForeignKey('idHeader', 'header', 'id', 'RESTRICT', 'CASCADE');
        $this->forge->createTable('categorie');

        // 4. Table 'amfs'
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'idUser' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true, // IMPORTANT: Match user.id
                'null'           => true,
            ],
            'idCategorie' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true, // IMPORTANT: Match categorie.id
                'null'           => true,
            ],
            'libelle' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'image' => [
                'type' => 'TEXT',
            ],
            'lien' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'dateLimite datetime DEFAULT CURRENT_TIMESTAMP',
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'saison' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'default'    => 'N/A',
            ],
            'episode' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
                'default'    => 'N/A',
            ],
        ]);
        $this->forge->addKey('id', true); // PRIMARY KEY
        $this->forge->addForeignKey('idUser', 'user', 'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('idCategorie', 'categorie', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('amfs');

        // 5. Table 'migrations' (Souvent gérée par CodeIgniter, mais incluse pour être complet)
        // Note: Cette table est généralement créée automatiquement par CodeIgniter.
        // Si vous devez la déclarer manuellement, utilisez le schéma par défaut de CI4.
    }

    public function down()
    {
        // Drop tables in reverse order to respect foreign key constraints
        $this->forge->dropTable('amfs', true);
        $this->forge->dropTable('categorie', true);
        $this->forge->dropTable('user', true);
        $this->forge->dropTable('header', true);
        $this->forge->dropTable('extention', true);
        
        // Note: La table 'migrations' n'est généralement pas supprimée.
    }
}