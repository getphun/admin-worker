<?php
/**
 * admin-worker config file
 * @package admin-worker
 * @version 0.0.1
 * @upgrade true
 */

return [
    '__name' => 'admin-worker',
    '__version' => '0.0.1',
    '__git' => 'https://github.com/getphun/admin-worker',
    '__files' => [
        'modules/admin-worker'      => [ 'install', 'remove', 'update' ],
        'theme/admin/system/worker' => [ 'install', 'remove', 'update' ]
    ],
    '__dependencies' => [
        'admin',
        'worker'
    ],
    '_services' => [],
    '_autoload' => [
        'classes' => [
            'AdminWorker\\Controller\\WorkerController' => 'modules/admin-worker/controller/WorkerController.php'
        ],
        'files' => []
    ],
    
    '_routes' => [
        'admin' => [
            'adminWorker' => [
                'rule' => '/system/worker',
                'handler' => 'AdminWorker\\Controller\\Worker::index'
            ],
            'adminWorkerRemove' => [
                'rule' => '/system/worker/:name/remove',
                'handler' => 'AdminWorker\\Controller\\Worker::remove'
            ]
        ]
    ],
    
    'admin' => [
        'menu' => [
            'system' => [
                'label'     => 'System',
                'icon'      => 'terminal',
                'order'     => 20000,
                'submenu'   => [
                    'worker'    => [
                        'label'     => 'Worker',
                        'perms'     => 'read_worker',
                        'target'    => 'adminWorker',
                        'order'     => 600
                    ]
                ]
            ]
        ]
    ],
];