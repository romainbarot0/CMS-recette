<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:recipe_arpr/Resources/Private/Language/locallang_db.xlf:tx_recipearpr_domain_model_recipe',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'name,steps,nb_person',
        'iconfile' => 'EXT:recipe_arpr/Resources/Public/Icons/tx_recipearpr_domain_model_recipe.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'name, dish_type, cooking_time, preparation_time, review_aggregate, steps, nb_person, pictures, difficulty, ingredients, theme, ustencils, origin, reviews, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_recipearpr_domain_model_recipe',
                'foreign_table_where' => 'AND {#tx_recipearpr_domain_model_recipe}.{#pid}=###CURRENT_PID### AND {#tx_recipearpr_domain_model_recipe}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipe_arpr/Resources/Private/Language/locallang_db.xlf:tx_recipearpr_domain_model_recipe.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'default' => ''
            ],
        ],
        'dish_type' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipe_arpr/Resources/Private/Language/locallang_db.xlf:tx_recipearpr_domain_model_recipe.dish_type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['-- Label --', 0],
                    ['Entrée', 1],
                    ['Plat', 2],
                    ['Dessert', 3],
                    ['Apéro', 4],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => 'required'
            ],
        ],
        'cooking_time' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipe_arpr/Resources/Private/Language/locallang_db.xlf:tx_recipearpr_domain_model_recipe.cooking_time',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2,required'
            ]
        ],
        'preparation_time' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipe_arpr/Resources/Private/Language/locallang_db.xlf:tx_recipearpr_domain_model_recipe.preparation_time',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2,required'
            ]
        ],
        'review_aggregate' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipe_arpr/Resources/Private/Language/locallang_db.xlf:tx_recipearpr_domain_model_recipe.review_aggregate',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2,null'
            ]
        ],
        'steps' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipe_arpr/Resources/Private/Language/locallang_db.xlf:tx_recipearpr_domain_model_recipe.steps',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim,required',
            ],
            
        ],
        'nb_person' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipe_arpr/Resources/Private/Language/locallang_db.xlf:tx_recipearpr_domain_model_recipe.nb_person',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
                'default' => ''
            ],
        ],
        'pictures' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipe_arpr/Resources/Private/Language/locallang_db.xlf:tx_recipearpr_domain_model_recipe.pictures',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'pictures',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ]
                    ],
                    'foreign_match_fields' => [
                        'fieldname' => 'pictures',
                        'tablenames' => 'tx_recipearpr_domain_model_recipe',
                        'table_local' => 'sys_file',
                    ],
                    'maxitems' => 1,
                    'minitems' => 1
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
            
        ],
        'difficulty' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipe_arpr/Resources/Private/Language/locallang_db.xlf:tx_recipearpr_domain_model_recipe.difficulty',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2,required'
            ]
        ],
        'ingredients' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipe_arpr/Resources/Private/Language/locallang_db.xlf:tx_recipearpr_domain_model_recipe.ingredients',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_recipearpr_domain_model_recipeingredient',
                'foreign_field' => 'recipe',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],

        ],
        'theme' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipe_arpr/Resources/Private/Language/locallang_db.xlf:tx_recipearpr_domain_model_recipe.theme',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_recipearpr_domain_model_theme',
                'MM' => 'tx_recipearpr_recipe_theme_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
            
        ],
        'ustencils' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipe_arpr/Resources/Private/Language/locallang_db.xlf:tx_recipearpr_domain_model_recipe.ustencils',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_recipearpr_domain_model_ustencil',
                'MM' => 'tx_recipearpr_recipe_ustencil_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
            
        ],
        'origin' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipe_arpr/Resources/Private/Language/locallang_db.xlf:tx_recipearpr_domain_model_recipe.origin',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_recipearpr_domain_model_origin',
                'default' => 0,
                'minitems' => 0,
                'maxitems' => 1,
            ],
            
        ],
        'reviews' => [
            'exclude' => true,
            'label' => 'LLL:EXT:recipe_arpr/Resources/Private/Language/locallang_db.xlf:tx_recipearpr_domain_model_recipe.reviews',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_recipearpr_domain_model_review',
                'foreign_field' => 'recipe',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],

        ],
    
    ],
];
