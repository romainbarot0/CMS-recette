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
class ReviewControllerTest extends UnitTestCase
{
    /**
     * @var \Arpr\RecipeArpr\Controller\ReviewController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\Arpr\RecipeArpr\Controller\ReviewController::class))
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
    public function createActionAddsTheGivenReviewToReviewRepository(): void
    {
        $review = new \Arpr\RecipeArpr\Domain\Model\Review();

        $reviewRepository = $this->getMockBuilder(\::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $reviewRepository->expects(self::once())->method('add')->with($review);
        $this->subject->_set('reviewRepository', $reviewRepository);

        $this->subject->createAction($review);
    }
}
