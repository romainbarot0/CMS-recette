<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_recipearpr_domain_model_recipe', 'EXT:recipe_arpr/Resources/Private/Language/locallang_csh_tx_recipearpr_domain_model_recipe.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_recipearpr_domain_model_recipe');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_recipearpr_domain_model_ingredient', 'EXT:recipe_arpr/Resources/Private/Language/locallang_csh_tx_recipearpr_domain_model_ingredient.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_recipearpr_domain_model_ingredient');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_recipearpr_domain_model_ustencil', 'EXT:recipe_arpr/Resources/Private/Language/locallang_csh_tx_recipearpr_domain_model_ustencil.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_recipearpr_domain_model_ustencil');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_recipearpr_domain_model_recipeingredient', 'EXT:recipe_arpr/Resources/Private/Language/locallang_csh_tx_recipearpr_domain_model_recipeingredient.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_recipearpr_domain_model_recipeingredient');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_recipearpr_domain_model_origin', 'EXT:recipe_arpr/Resources/Private/Language/locallang_csh_tx_recipearpr_domain_model_origin.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_recipearpr_domain_model_origin');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_recipearpr_domain_model_theme', 'EXT:recipe_arpr/Resources/Private/Language/locallang_csh_tx_recipearpr_domain_model_theme.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_recipearpr_domain_model_theme');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_recipearpr_domain_model_review', 'EXT:recipe_arpr/Resources/Private/Language/locallang_csh_tx_recipearpr_domain_model_review.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_recipearpr_domain_model_review');
})();
