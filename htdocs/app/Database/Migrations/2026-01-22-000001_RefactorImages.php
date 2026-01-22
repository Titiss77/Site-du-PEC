<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RefactorImages extends Migration
{
    public function up()
    {
        // 1. Création de la table 'images'
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'path' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'unique'     => true, // On évite les doublons de fichiers
            ],
            'alt' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
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
        $this->forge->createTable('images');

        // Configuration des tables à migrer
        // Format : 'nom_table' => 'ancien_nom_colonne'
        $tablesMap = [
            'general'     => 'image',
            'disciplines' => 'image',
            'piscines'    => 'photo',
            'plannings'   => 'image',
            'membres'     => 'photo',
            'groupes'     => 'image',
            'materiel'    => 'image',
            'actualites'  => 'image',
            'partenaires' => 'partenaire_image_url' // Attention, voir note ci-dessous*
        ];
        
        // *Note pour partenaires : Dans votre fichier actuel, la colonne s'appelle 'image_url'. 
        // J'utilise une variable dynamique ci-dessous pour gérer cela.

        foreach ($tablesMap as $tableName => $oldColumnName) {
            
            // Cas particulier pour la table partenaires qui a 'image_url'
            if ($tableName === 'partenaires') {
                $oldColumnName = 'image_url';
            }

            // A. Ajouter la colonne image_id
            $this->forge->addColumn($tableName, [
                'image_id' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                    'unsigned'   => true,
                    'null'       => true,
                    'after'      => 'id'
                ]
            ]);

            // B. MIGRATION DES DONNÉES (Script de transfert)
            // On récupère les anciennes données
            $rows = $this->db->table($tableName)->select("id, $oldColumnName")->get()->getResultArray();

            foreach ($rows as $row) {
                $filePath = $row[$oldColumnName];

                // Si le champ n'est pas vide
                if (!empty($filePath)) {
                    // 1. Vérifier si l'image existe déjà dans la table images (Dédoublonnage)
                    $existingImage = $this->db->table('images')->where('path', $filePath)->get()->getRow();

                    if ($existingImage) {
                        $imageId = $existingImage->id;
                    } else {
                        // 2. Sinon, on l'insère
                        $this->db->table('images')->insert([
                            'path'       => $filePath,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                        ]);
                        $imageId = $this->db->insertID();
                    }

                    // 3. Mise à jour de la table d'origine avec l'ID
                    $this->db->table($tableName)->where('id', $row['id'])->update(['image_id' => $imageId]);
                }
            }

            // C. Ajouter la clé étrangère
            $this->db->query("ALTER TABLE `$tableName` ADD CONSTRAINT `fk_{$tableName}_image` FOREIGN KEY (`image_id`) REFERENCES `images`(`id`) ON DELETE SET NULL ON UPDATE CASCADE");

            // D. Supprimer l'ancienne colonne (Nettoyage)
            $this->forge->dropColumn($tableName, $oldColumnName);
        }
    }

    public function down()
    {
        // On remet tout en place (inverse de up)
        $tablesMap = [
            'general'     => 'image',
            'disciplines' => 'image',
            'piscines'    => 'photo',
            'plannings'   => 'image',
            'membres'     => 'photo',
            'groupes'     => 'image',
            'materiel'    => 'image',
            'actualites'  => 'image',
            'partenaires' => 'image_url'
        ];

        foreach ($tablesMap as $tableName => $oldColumnName) {
            // 1. Recréer l'ancienne colonne
            $this->forge->addColumn($tableName, [
                $oldColumnName => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                ]
            ]);

            // 2. Récupérer les données depuis la table images via la relation
            $rows = $this->db->table($tableName)
                ->select("$tableName.id, images.path")
                ->join('images', "$tableName.image_id = images.id", 'left')
                ->get()
                ->getResultArray();

            // 3. Remettre les chemins (path) dans l'ancienne colonne
            if (!empty($rows)) {
                foreach ($rows as $row) {
                    if (!empty($row['path'])) {
                        $this->db->table($tableName)
                            ->where('id', $row['id'])
                            ->update([$oldColumnName => $row['path']]);
                    }
                }
            }

            // 4. Supprimer la clé étrangère et la colonne image_id
            $this->db->query("ALTER TABLE `$tableName` DROP FOREIGN KEY `fk_{$tableName}_image`");
            $this->forge->dropColumn($tableName, 'image_id');
        }

        // 5. Supprimer la table images
        $this->forge->dropTable('images');
    }
}