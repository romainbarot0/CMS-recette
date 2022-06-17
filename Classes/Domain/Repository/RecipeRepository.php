<?php

declare(strict_types=1);

namespace Arpr\RecipeArpr\Domain\Repository;


use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * This file is part of the "recipes-arpr" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 BarotRomain <romain.barot@etu.u-bordeaux.fr>
 *          ColinPierre <pierre.colin@etu.u-bordeaux.fr>
 *          HoupinArmand <armand.houpin@etu.u-bordeaux.fr>
 *          FaucherRobin <robin.faucher@etu.u-bordeaux.fr>
 */


/**
 * The repository for Recipes
 */
class RecipeRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    public function filter(?\Arpr\RecipeArpr\Controller\Queries\RecipeFilter $recipeFilter)
    {
        $query = $this->createQuery();
        $specifications = [];
        if ($recipeFilter->getOrigin() !== null){
            $specifications[] = $query->equals('origin', $recipeFilter->getOrigin());
        }

        if($recipeFilter->getTypeOfDish() !== 0){
            $specifications[] = $query->equals('dishType', $recipeFilter->getTypeOfDish());
        }

        if (!empty($specifications)){
            $query->matching($query->logicalAnd($specifications));
        }
        return $query->execute();
    }

    public function focus(int $limit, string $orderBy, array $themes)
    {
        $query = $this->createQuery();

        $query->setOrderings([$orderBy => QueryInterface::ORDER_DESCENDING]);
        $specifications = [];
        foreach ($themes as $theme){
            $specifications[] = $query->contains('theme', $theme);
        }
        $query->matching($query->logicalOr(...$specifications));
        $query->setLimit($limit);

        return $query->execute();
    }

    public function searchByName($name): array
    {
        $recipes = $this->findAll()->toArray();
        $matches = array();

        foreach($recipes as $recipe){
            if(str_contains(strtolower($recipe->getName()), strtolower($name)) ||
                str_contains(strtolower($recipe->getOrigin()->getName()), strtolower($name)) ||
                  str_contains(strval($recipe->getNbPerson()), strtolower($name)))
                $matches[] = $recipe;
        }
        return $matches;
    }
}
