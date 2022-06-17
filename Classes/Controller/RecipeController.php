<?php

declare(strict_types=1);

namespace Arpr\RecipeArpr\Controller;


use Arpr\RecipeArpr\Controller\Queries\RecipeFilter;

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
     * themeRepository
     *
     * @var \Arpr\RecipeArpr\Domain\Repository\ThemeRepository
     */
    protected $themeRepository = null;

    /**
     * @param \Arpr\RecipeArpr\Domain\Repository\RecipeRepository $recipeRepository
     */
    public function injectRecipeRepository(\Arpr\RecipeArpr\Domain\Repository\RecipeRepository $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    /**
     * @param \Arpr\RecipeArpr\Domain\Repository\ThemeRepository $themeRepository
     */
    public function injectThemeRepository(\Arpr\RecipeArpr\Domain\Repository\ThemeRepository $themeRepository)
    {
        $this->themeRepository = $themeRepository;
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
     * @param \Arpr\RecipeArpr\Domain\Model\Origin $origin
     * @param int $typeOfDish
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(?\Arpr\RecipeArpr\Domain\Model\Origin $origin = null, int $typeOfDish = 0): \Psr\Http\Message\ResponseInterface
    {
        $recipes = $this->recipeRepository->filter(new RecipeFilter($origin, $typeOfDish));
        $this->view->assign('recipes', $recipes)->assign('origin', $origin)->assign('typeOfDish', $typeOfDish);
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
        $request = $this->request->getArguments();
        $keyword = $request['search'];
        $recipes = $this->recipeRepository->searchByName($keyword);
        $this->view->assign('recipes', $recipes);
        return $this->htmlResponse();
    }

    /**
     * action focus
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function focusAction(): \Psr\Http\Message\ResponseInterface
    {
        $limit = (int) $this->settings['limit'];
        $orderBy = (string) $this->settings['orderBy'];
        $themes = array_map(static function ($x) {return intval($x);},
            explode(',', $this->settings['themes']));
        $themes = $this->themeRepository->findByUidList($themes)->toArray();
        $recipes = $this->recipeRepository->focus($limit, $orderBy, $themes);
        $this->view->assign('recipes', $recipes);
        return $this->htmlResponse();
    }
}
