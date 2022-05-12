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
 * origine
 */
class Origin extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * nom
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $name = '';

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }
}
