<?php

declare(strict_types=1);

namespace Arpr\RecipeArpr\Controller;


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
 * RecipeController
 */
class RecipeController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * recipeRepository
     *
     * @var \Arpr\RecipeArpr\Domain\Repository\RecipeRepository
     */
    protected $recipeRepository = null;

    /**
     * @param \Arpr\RecipeArpr\Domain\Repository\RecipeRepository $recipeRepository
     */
    public function injectRecipeRepository(\Arpr\RecipeArpr\Domain\Repository\RecipeRepository $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    /**
     * action index
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function indexAction(): \Psr\Http\Message\ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $recipes = $this->recipeRepository->findAll();
        $this->view->assign('recipes', $recipes);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \Arpr\RecipeArpr\Domain\Model\Recipe $recipe
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\Arpr\RecipeArpr\Domain\Model\Recipe $recipe): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('recipe', $recipe);
        return $this->htmlResponse();
    }

    /**
     * action search
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function searchAction(): \Psr\Http\Message\ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action focus
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function focusAction(): \Psr\Http\Message\ResponseInterface
    {
        return $this->htmlResponse();
    }
}
