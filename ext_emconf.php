<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'recipes-arpr',
    'description' => 'recettesDeCuisine',
    'category' => 'plugin',
    'author' => 'BarotRomain, ColinPierre, HoupinArmand, FaucherRobin',
    'author_email' => 'romain.barot@etu.u-bordeaux.fr, pierre.colin@etu.u-bordeaux.fr, armand.houpin@etu.u-bordeaux.fr, robin.faucher@etu.u-bordeaux.fr',
    'state' => 'alpha',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
