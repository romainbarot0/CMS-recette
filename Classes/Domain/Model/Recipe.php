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
 * recette
 */
class Recipe extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * nom de la recette
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $name = '';

    /**
     * type de plat
     *
     * @var int
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $dishType = 0;

    /**
     * Temps de cuisson (min)
     *
     * @var float
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $cookingTime = 0.0;

    /**
     * Temps de préparation(min)
     *
     * @var float
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $preparationTime = 0.0;

    /**
     * moyenne
     *
     * @var float|null
     */
    protected $reviewAggregate = null;

    /**
     * etapes
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $steps = '';

    /**
     * nombre de personnes
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $nbPerson = '';

    /**
     * illustrations
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $pictures = null;

    /**
     * difficulte
     *
     * @var float
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $difficulty = 0.0;

    /**
     * ingredient
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Arpr\RecipeArpr\Domain\Model\RecipeIngredient>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $ingredients = null;

    /**
     * theme
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Arpr\RecipeArpr\Domain\Model\Theme>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $theme = null;

    /**
     * ustencils
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Arpr\RecipeArpr\Domain\Model\Ustencil>
     */
    protected $ustencils = null;

    /**
     * origine
     *
     * @var \Arpr\RecipeArpr\Domain\Model\Origin
     */
    protected $origin = null;

    /**
     * avis
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Arpr\RecipeArpr\Domain\Model\Review>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $reviews = null;

    /**
     * __construct
     */
    public function __construct()
    {

        // Do not remove the next line: It would break the functionality
        $this->initializeObject();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    public function initializeObject()
    {
        $this->ingredients = $this->ingredients ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->theme = $this->theme ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->ustencils = $this->ustencils ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->reviews = $this->reviews ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

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

    /**
     * Returns the dishType
     *
     * @return int $dishType
     */
    public function getDishType()
    {
        return $this->dishType;
    }

    /**
     * Sets the dishType
     *
     * @param int $dishType
     * @return void
     */
    public function setDishType(int $dishType)
    {
        $this->dishType = $dishType;
    }

    /**
     * Returns the cookingTime
     *
     * @return float $cookingTime
     */
    public function getCookingTime()
    {
        return $this->cookingTime;
    }

    /**
     * Sets the cookingTime
     *
     * @param float $cookingTime
     * @return void
     */
    public function setCookingTime(float $cookingTime)
    {
        $this->cookingTime = $cookingTime;
    }

    /**
     * Returns the preparationTime
     *
     * @return float $preparationTime
     */
    public function getPreparationTime()
    {
        return $this->preparationTime;
    }

    /**
     * Sets the preparationTime
     *
     * @param float $preparationTime
     * @return void
     */
    public function setPreparationTime(float $preparationTime)
    {
        $this->preparationTime = $preparationTime;
    }

    /**
     * Returns the reviewAggregate
     *
     * @return float|null $reviewAggregate
     */
    public function getReviewAggregate()
    {
        return $this->reviewAggregate;
    }

    /**
     * Sets the reviewAggregate
     *
     * @param float|null $reviewAggregate
     * @return void
     */
    public function setReviewAggregate(?float $reviewAggregate)
    {
        $this->reviewAggregate = $reviewAggregate;
    }

    /**
     * Returns the steps
     *
     * @return string $steps
     */
    public function getSteps()
    {
        return $this->steps;
    }

    /**
     * Sets the steps
     *
     * @param string $steps
     * @return void
     */
    public function setSteps(string $steps)
    {
        $this->steps = $steps;
    }

    /**
     * Returns the nbPerson
     *
     * @return string $nbPerson
     */
    public function getNbPerson()
    {
        return $this->nbPerson;
    }

    /**
     * Sets the nbPerson
     *
     * @param string $nbPerson
     * @return void
     */
    public function setNbPerson(string $nbPerson)
    {
        $this->nbPerson = $nbPerson;
    }

    /**
     * Returns the pictures
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $pictures
     */
    public function getPictures()
    {
        return $this->pictures;
    }

    /**
     * Sets the pictures
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $pictures
     * @return void
     */
    public function setPictures(\TYPO3\CMS\Extbase\Domain\Model\FileReference $pictures)
    {
        $this->pictures = $pictures;
    }

    /**
     * Returns the difficulty
     *
     * @return float $difficulty
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * Sets the difficulty
     *
     * @param float $difficulty
     * @return void
     */
    public function setDifficulty(float $difficulty)
    {
        $this->difficulty = $difficulty;
    }

    /**
     * Adds a RecipeIngredient
     *
     * @param \Arpr\RecipeArpr\Domain\Model\RecipeIngredient $ingredient
     * @return void
     */
    public function addIngredient(\Arpr\RecipeArpr\Domain\Model\RecipeIngredient $ingredient)
    {
        $this->ingredients->attach($ingredient);
    }

    /**
     * Removes a RecipeIngredient
     *
     * @param \Arpr\RecipeArpr\Domain\Model\RecipeIngredient $ingredientToRemove The RecipeIngredient to be removed
     * @return void
     */
    public function removeIngredient(\Arpr\RecipeArpr\Domain\Model\RecipeIngredient $ingredientToRemove)
    {
        $this->ingredients->detach($ingredientToRemove);
    }

    /**
     * Returns the ingredients
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Arpr\RecipeArpr\Domain\Model\RecipeIngredient> $ingredients
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * Sets the ingredients
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Arpr\RecipeArpr\Domain\Model\RecipeIngredient> $ingredients
     * @return void
     */
    public function setIngredients(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $ingredients)
    {
        $this->ingredients = $ingredients;
    }

    /**
     * Adds a Theme
     *
     * @param \Arpr\RecipeArpr\Domain\Model\Theme $theme
     * @return void
     */
    public function addTheme(\Arpr\RecipeArpr\Domain\Model\Theme $theme)
    {
        $this->theme->attach($theme);
    }

    /**
     * Removes a Theme
     *
     * @param \Arpr\RecipeArpr\Domain\Model\Theme $themeToRemove The Theme to be removed
     * @return void
     */
    public function removeTheme(\Arpr\RecipeArpr\Domain\Model\Theme $themeToRemove)
    {
        $this->theme->detach($themeToRemove);
    }

    /**
     * Returns the theme
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Arpr\RecipeArpr\Domain\Model\Theme> $theme
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Sets the theme
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Arpr\RecipeArpr\Domain\Model\Theme> $theme
     * @return void
     */
    public function setTheme(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $theme)
    {
        $this->theme = $theme;
    }

    /**
     * Adds a Ustencil
     *
     * @param \Arpr\RecipeArpr\Domain\Model\Ustencil $ustencil
     * @return void
     */
    public function addUstencil(\Arpr\RecipeArpr\Domain\Model\Ustencil $ustencil)
    {
        $this->ustencils->attach($ustencil);
    }

    /**
     * Removes a Ustencil
     *
     * @param \Arpr\RecipeArpr\Domain\Model\Ustencil $ustencilToRemove The Ustencil to be removed
     * @return void
     */
    public function removeUstencil(\Arpr\RecipeArpr\Domain\Model\Ustencil $ustencilToRemove)
    {
        $this->ustencils->detach($ustencilToRemove);
    }

    /**
     * Returns the ustencils
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Arpr\RecipeArpr\Domain\Model\Ustencil> $ustencils
     */
    public function getUstencils()
    {
        return $this->ustencils;
    }

    /**
     * Sets the ustencils
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Arpr\RecipeArpr\Domain\Model\Ustencil> $ustencils
     * @return void
     */
    public function setUstencils(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $ustencils)
    {
        $this->ustencils = $ustencils;
    }

    /**
     * Returns the origin
     *
     * @return \Arpr\RecipeArpr\Domain\Model\Origin $origin
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * Sets the origin
     *
     * @param \Arpr\RecipeArpr\Domain\Model\Origin $origin
     * @return void
     */
    public function setOrigin(\Arpr\RecipeArpr\Domain\Model\Origin $origin)
    {
        $this->origin = $origin;
    }

    /**
     * Adds a Review
     *
     * @param \Arpr\RecipeArpr\Domain\Model\Review $review
     * @return void
     */
    public function addReview(\Arpr\RecipeArpr\Domain\Model\Review $review)
    {
        $this->reviews->attach($review);
    }

    /**
     * Removes a Review
     *
     * @param \Arpr\RecipeArpr\Domain\Model\Review $reviewToRemove The Review to be removed
     * @return void
     */
    public function removeReview(\Arpr\RecipeArpr\Domain\Model\Review $reviewToRemove)
    {
        $this->reviews->detach($reviewToRemove);
    }

    /**
     * Returns the reviews
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Arpr\RecipeArpr\Domain\Model\Review> $reviews
     */
    public function getReviews()
    {
        return $this->reviews;
    }

    /**
     * Sets the reviews
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Arpr\RecipeArpr\Domain\Model\Review> $reviews
     * @return void
     */
    public function setReviews(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $reviews)
    {
        $this->reviews = $reviews;
    }
}
