<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'RecipeArpr',
        'Pi1',
        [
            \Arpr\RecipeArpr\Controller\RecipeController::class => 'list, show, search',
            \Arpr\RecipeArpr\Controller\ReviewController::class => 'new, create'
        ],
        // non-cacheable actions
        [
            \Arpr\RecipeArpr\Controller\RecipeController::class => 'search',
            \Arpr\RecipeArpr\Controller\ReviewController::class => 'create'
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'RecipeArpr',
        'Pi2',
        [
            \Arpr\RecipeArpr\Controller\RecipeController::class => 'focus'
        ],
        // non-cacheable actions
        [
            \Arpr\RecipeArpr\Controller\RecipeController::class => '',
            \Arpr\RecipeArpr\Controller\ReviewController::class => 'create'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    pi1 {
                        iconIdentifier = recipe_arpr-plugin-pi1
                        title = LLL:EXT:recipe_arpr/Resources/Private/Language/locallang_db.xlf:tx_recipe_arpr_pi1.name
                        description = LLL:EXT:recipe_arpr/Resources/Private/Language/locallang_db.xlf:tx_recipe_arpr_pi1.description
                        tt_content_defValues {
                            CType = list
                            list_type = recipearpr_pi1
                        }
                    }
                    pi2 {
                        iconIdentifier = recipe_arpr-plugin-pi2
                        title = LLL:EXT:recipe_arpr/Resources/Private/Language/locallang_db.xlf:tx_recipe_arpr_pi2.name
                        description = LLL:EXT:recipe_arpr/Resources/Private/Language/locallang_db.xlf:tx_recipe_arpr_pi2.description
                        tt_content_defValues {
                            CType = list
                            list_type = recipearpr_pi2
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
