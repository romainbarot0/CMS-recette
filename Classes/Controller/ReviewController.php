<?php

declare(strict_types=1);

namespace Arpr\RecipeArpr\Controller;


use TYPO3\CMS\Extbase\Persistence\PersistenceManagerInterface;

/**
 * This file is part of the "recipes-arpr" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 BarotRomain <romain.barot@etu.u-bordeaux.fr>
 *          "ColinPierre <pierre.colin@etu.u-bordeaux.fr>
 *          HoupinArmand <armand.houpin@etu.u-bordeaux.fr>
 *          FaucherRobin <robin.faucher@etu.u-bordeaux.fr>"
 */


/**
 * ReviewController
 */
class ReviewController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\PersistenceManagerInterface
     */
    protected $persistenceManager;

    /**
     * recipeRepository
     *
     * @var \Arpr\RecipeArpr\Domain\Repository\RecipeRepository
     */
    protected $recipeRepository = null;

    /**
     * reviewRepository
     *
     * @var \Arpr\RecipeArpr\Domain\Repository\ReviewRepository
     */
    protected $reviewRepository = null;

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\PersistenceManagerInterface $persistenceManager
     */
    public function injectPersistenceManager(PersistenceManagerInterface $persistenceManager)
    {
        $this->persistenceManager = $persistenceManager;
    }

    /**
     * @param \Arpr\RecipeArpr\Domain\Repository\RecipeRepository $recipeRepository
     */
    public function injectRecipeRepository(\Arpr\RecipeArpr\Domain\Repository\RecipeRepository $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    /**
     * @param \Arpr\RecipeArpr\Domain\Repository\ReviewRepository $reviewRepository
     */
    public function injectReviewRepository(\Arpr\RecipeArpr\Domain\Repository\ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    /**
     * action new
     *
     * @param \Arpr\RecipeArpr\Domain\Model\Recipe $recipe
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function newAction(\Arpr\RecipeArpr\Domain\Model\Recipe $recipe): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('recipe', $recipe);
        return $this->htmlResponse();
    }

    /**
     * action create
     *
     * @param \Arpr\RecipeArpr\Domain\Model\Review $newReview
     * @param \Arpr\RecipeArpr\Domain\Model\Recipe $recipe
     */
    public function createAction(\Arpr\RecipeArpr\Domain\Model\Review $newReview, \Arpr\RecipeArpr\Domain\Model\Recipe $recipe)
    {
        $cacheService = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Service\CacheService');
        $this->reviewRepository->add($newReview);
        $recipe->addReview($newReview);
        $this->persistenceManager->update($recipe);
        $cacheService->clearPageCache(85);
        $this->redirect('list', 'Recipe');
    }
}
