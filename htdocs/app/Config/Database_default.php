<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Configuration de la Base de Données.
 *
 * Cette classe contient les paramètres de configuration pour les connexions
 * à la base de données. Elle permet de définir plusieurs groupes de connexion
 * (ex: local, production) et de basculer automatiquement selon l'environnement.
 */
class Database extends Config
{
    /**
     * Le répertoire où se trouvent les migrations et les seeds.
     * Typiquement utilisé par les commandes CLI (spark).
     *
     * @var string
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Le nom du groupe de connexion à utiliser par défaut.
     * Cette valeur est modifiée dynamiquement dans le constructeur
     * en fonction de l'environnement actuel.
     *
     * @var string
     */
    public string $defaultGroup = 'local';

    /**
     * Constructeur de la classe.
     *
     * Initialise la configuration parente et détermine quel groupe
     * de base de données utiliser (local ou product) en vérifiant
     * la constante d'environnement 'ENVIRONMENT'.
     */
    public function __construct()
    {
        parent::__construct();

        // Bascule automatiquement sur le groupe de production si l'environnement est 'production'
        if (ENVIRONMENT === 'production') {
            $this->defaultGroup = 'product';
        }
    }

    /**
     * Configuration pour l'environnement de développement local.
     *
     * Utilise 'localhost' et les identifiants locaux.
     *
     * @var array<string, mixed>
     */
    public array $local = [
        'DSN'          => '',
        'hostname'     => 'localhost',
        'username'     => '',
        'password'     => '',
        'database'     => '',
        'DBDriver'     => 'MySQLi',
        'DBPrefix'     => '',
        'pConnect'     => false,
        'DBDebug'      => true,
        'charset'      => 'utf8mb4',
        'DBCollat'     => 'utf8mb4_general_ci',
        'swapPre'      => '',
        'encrypt'      => false,
        'compress'     => false,
        'strictOn'     => false,
        'failover'     => [],
        'port'         => 3306,
        'numberNative' => false,
        'foundRows'    => false,
        'dateFormat'   => [
            'date'     => 'Y-m-d',
            'datetime' => 'Y-m-d H:i:s',
            'time'     => 'H:i:s',
        ],
    ];

    /**
     * Configuration pour l'environnement de production (ByetHost).
     *
     * Utilise le serveur SQL distant (sql313.byethost13.com).
     *
     * @var array<string, mixed>
     */
    public array $product = [
        'DSN'          => '',
        'hostname'     => '',
        'username'     => '',
        'password'     => '',
        'database'     => '',
        'DBDriver'     => 'MySQLi',
        'DBPrefix'     => '',
        'pConnect'     => false,
        'DBDebug'      => true,
        'charset'      => 'utf8mb4',
        'DBCollat'     => 'utf8mb4_general_ci',
        'swapPre'      => '',
        'encrypt'      => false,
        'compress'     => false,
        'strictOn'     => false,
        'failover'     => [],
        'port'         => 3306,
        'numberNative' => false,
        'foundRows'    => false,
        'dateFormat'   => [
            'date'     => 'Y-m-d',
            'datetime' => 'Y-m-d H:i:s',
            'time'     => 'H:i:s',
        ],
    ];
}