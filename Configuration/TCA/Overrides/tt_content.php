<?php
defined('TYPO3') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'RecipeArpr',
    'Pi1',
    'Recipes'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'RecipeArpr',
    'Pi2',
    'Focus'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['recipearpr_pi2'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'recipearpr_pi2',
    'FILE:EXT:recipe_arpr/Configuration/FlexForms/flexForm_pi2.xml'
);
