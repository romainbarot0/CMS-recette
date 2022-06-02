<?php

declare(strict_types=1);

namespace Arpr\RecipeArpr\Controller\Queries;


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
 * RecipeFilter
 */
class RecipeFilter{
    private $origin;
    private $typeOfDish;

    public function __construct(?\Arpr\RecipeArpr\Domain\Model\Origin $origin = null, int $typeOfDish = 0)
    {
        $this->origin = $origin;
        $this->typeOfDish = $typeOfDish;
    }

    public function getOrigin() : ?\Arpr\RecipeArpr\Domain\Model\Origin
    {
        return $this->origin;
    }

    public function getTypeOfDish() : ?int
    {
        return $this->typeOfDish;
    }
}