<?php

declare(strict_types=1);

namespace Arpr\RecipeArpr\Domain\Model;


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
 * ingredients
 */
class RecipeIngredient extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * quantité
     *
     * @var int
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $quantity = 0;

    /**
     * ingredient
     *
     * @var \Arpr\RecipeArpr\Domain\Model\Ingredient
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $ingredient = null;

    /**
     * Returns the quantity
     *
     * @return int $quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Sets the quantity
     *
     * @param int $quantity
     * @return void
     */
    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * Returns the ingredient
     *
     * @return \Arpr\RecipeArpr\Domain\Model\Ingredient $ingredient
     */
    public function getIngredient()
    {
        return $this->ingredient;
    }

    /**
     * Sets the ingredient
     *
     * @param \Arpr\RecipeArpr\Domain\Model\Ingredient $ingredient
     * @return void
     */
    public function setIngredient(\Arpr\RecipeArpr\Domain\Model\Ingredient $ingredient)
    {
        $this->ingredient = $ingredient;
    }
}
