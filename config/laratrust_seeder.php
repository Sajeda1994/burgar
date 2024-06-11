<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadministrator' => [
            'users' => 'r,d',
            'employee'=>'c,r,d',
            'payments' => 'c,r',
            'profile' => 'c,r,u',
            'meal'=>'c,r,u,d',
            'order'=>'c,r'
        ],
        'administrator' => [
            'users' => 'r',
            'payments' => 'c,r',
            'profile' => 'c,r,u',
            'meal'=>'c,r,u,d',
            'order'=>'c,r'
        ],
        'user' => [
            'users' => 'r',
            'payments' => 'c,r',
            'profile' => 'c,r,u',
            'meal'=>'r',
            'order'=>'c,r'     
           ],
        'employee' => [
            'users' => 'r',
            'payments' => 'c,r',
            'profile' => 'c,r,u',
            'meal'=>'c,r',
            'order'=>'c,r'   
             ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
