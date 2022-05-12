<?php
declare(strict_types=1);

namespace Arpr\RecipeArpr\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 *
 * @author BarotRomain <romain.barot@etu.u-bordeaux.fr>
 * @author ColinPierre <pierre.colin@etu.u-bordeaux.fr>
 * @author HoupinArmand <armand.houpin@etu.u-bordeaux.fr>
 * @author FaucherRobin <robin.faucher@etu.u-bordeaux.fr>
 */
class RecipeControllerTest extends UnitTestCase
{
    /**
     * @var \Arpr\RecipeArpr\Controller\RecipeController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\Arpr\RecipeArpr\Controller\RecipeController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllRecipesFromRepositoryAndAssignsThemToView(): void
    {
        $allRecipes = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $recipeRepository = $this->getMockBuilder(\Arpr\RecipeArpr\Domain\Repository\RecipeRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $recipeRepository->expects(self::once())->method('findAll')->will(self::returnValue($allRecipes));
        $this->subject->_set('recipeRepository', $recipeRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('recipes', $allRecipes);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenRecipeToView(): void
    {
        $recipe = new \Arpr\RecipeArpr\Domain\Model\Recipe();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('recipe', $recipe);

        $this->subject->showAction($recipe);
    }
}
