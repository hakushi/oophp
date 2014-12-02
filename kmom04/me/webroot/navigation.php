<?php

// Set menu items array
$menu = [
    'callback' => 'modifyNavbar',
    'items'    => [
        'index'     => [
            'text'  =>'Hem',
            'url'   =>'index.php',
            'class' => null
        ],
        'reports'   => [
            'text'  => 'Resovisningar',
            'url'   => 'reports.php',
            'class' => null
        ],
        'dice'      => [
            'text'  => 'Tärningspelet 100',
            'url'   => 'dice.php',
            'class' => null
        ],
        'calendar'  => [
            'text'  => 'Kalender',
            'url'   => 'calendar.php',
            'class' => null
        ],
        'games'     => [
            'text'  => 'Speldatabas',
            'url'   => 'game.php?show_all',
            'class' => null
        ],
        'source'    => [
            'text'  => 'Källkod',
            'url'   => 'source.php',
            'class' => null
        ]
    ]
];
