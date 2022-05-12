<?php
declare(strict_types=1);

namespace Arpr\RecipeArpr\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author BarotRomain <romain.barot@etu.u-bordeaux.fr>
 * @author ColinPierre <pierre.colin@etu.u-bordeaux.fr>
 * @author HoupinArmand <armand.houpin@etu.u-bordeaux.fr>
 * @author FaucherRobin <robin.faucher@etu.u-bordeaux.fr>
 */
class RecipeTest extends UnitTestCase
{
    /**
     * @var \Arpr\RecipeArpr\Domain\Model\Recipe|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Arpr\RecipeArpr\Domain\Model\Recipe::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName(): void
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('name'));
    }

    /**
     * @test
     */
    public function getDishTypeReturnsInitialValueForInt(): void
    {
        self::assertSame(
            0,
            $this->subject->getDishType()
        );
    }

    /**
     * @test
     */
    public function setDishTypeForIntSetsDishType(): void
    {
        $this->subject->setDishType(12);

        self::assertEquals(12, $this->subject->_get('dishType'));
    }

    /**
     * @test
     */
    public function getCookingTimeReturnsInitialValueForFloat(): void
    {
        self::assertSame(
            0.0,
            $this->subject->getCookingTime()
        );
    }

    /**
     * @test
     */
    public function setCookingTimeForFloatSetsCookingTime(): void
    {
        $this->subject->setCookingTime(3.14159265);

        self::assertEquals(3.14159265, $this->subject->_get('cookingTime'));
    }

    /**
     * @test
     */
    public function getPreparationTimeReturnsInitialValueForFloat(): void
    {
        self::assertSame(
            0.0,
            $this->subject->getPreparationTime()
        );
    }

    /**
     * @test
     */
    public function setPreparationTimeForFloatSetsPreparationTime(): void
    {
        $this->subject->setPreparationTime(3.14159265);

        self::assertEquals(3.14159265, $this->subject->_get('preparationTime'));
    }

    /**
     * @test
     */
    public function getReviewAggregateReturnsInitialValueForFloat|null(): void
    {
    }

    /**
     * @test
     */
    public function setReviewAggregateForFloat|nullSetsReviewAggregate(): void
    {
    }

    /**
     * @test
     */
    public function getStepsReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getSteps()
        );
    }

    /**
     * @test
     */
    public function setStepsForStringSetsSteps(): void
    {
        $this->subject->setSteps('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('steps'));
    }

    /**
     * @test
     */
    public function getNbPersonReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getNbPerson()
        );
    }

    /**
     * @test
     */
    public function setNbPersonForStringSetsNbPerson(): void
    {
        $this->subject->setNbPerson('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('nbPerson'));
    }

    /**
     * @test
     */
    public function getPicturesReturnsInitialValueForFileReference(): void
    {
        self::assertEquals(
            null,
            $this->subject->getPictures()
        );
    }

    /**
     * @test
     */
    public function setPicturesForFileReferenceSetsPictures(): void
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setPictures($fileReferenceFixture);

        self::assertEquals($fileReferenceFixture, $this->subject->_get('pictures'));
    }

    /**
     * @test
     */
    public function getDifficultyReturnsInitialValueForFloat(): void
    {
        self::assertSame(
            0.0,
            $this->subject->getDifficulty()
        );
    }

    /**
     * @test
     */
    public function setDifficultyForFloatSetsDifficulty(): void
    {
        $this->subject->setDifficulty(3.14159265);

        self::assertEquals(3.14159265, $this->subject->_get('difficulty'));
    }

    /**
     * @test
     */
    public function getIngredientsReturnsInitialValueForRecipeIngredient(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getIngredients()
        );
    }

    /**
     * @test
     */
    public function setIngredientsForObjectStorageContainingRecipeIngredientSetsIngredients(): void
    {
        $ingredient = new \Arpr\RecipeArpr\Domain\Model\RecipeIngredient();
        $objectStorageHoldingExactlyOneIngredients = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneIngredients->attach($ingredient);
        $this->subject->setIngredients($objectStorageHoldingExactlyOneIngredients);

        self::assertEquals($objectStorageHoldingExactlyOneIngredients, $this->subject->_get('ingredients'));
    }

    /**
     * @test
     */
    public function addIngredientToObjectStorageHoldingIngredients(): void
    {
        $ingredient = new \Arpr\RecipeArpr\Domain\Model\RecipeIngredient();
        $ingredientsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $ingredientsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($ingredient));
        $this->subject->_set('ingredients', $ingredientsObjectStorageMock);

        $this->subject->addIngredient($ingredient);
    }

    /**
     * @test
     */
    public function removeIngredientFromObjectStorageHoldingIngredients(): void
    {
        $ingredient = new \Arpr\RecipeArpr\Domain\Model\RecipeIngredient();
        $ingredientsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $ingredientsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($ingredient));
        $this->subject->_set('ingredients', $ingredientsObjectStorageMock);

        $this->subject->removeIngredient($ingredient);
    }

    /**
     * @test
     */
    public function getThemeReturnsInitialValueForTheme(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getTheme()
        );
    }

    /**
     * @test
     */
    public function setThemeForObjectStorageContainingThemeSetsTheme(): void
    {
        $theme = new \Arpr\RecipeArpr\Domain\Model\Theme();
        $objectStorageHoldingExactlyOneTheme = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneTheme->attach($theme);
        $this->subject->setTheme($objectStorageHoldingExactlyOneTheme);

        self::assertEquals($objectStorageHoldingExactlyOneTheme, $this->subject->_get('theme'));
    }

    /**
     * @test
     */
    public function addThemeToObjectStorageHoldingTheme(): void
    {
        $theme = new \Arpr\RecipeArpr\Domain\Model\Theme();
        $themeObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $themeObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($theme));
        $this->subject->_set('theme', $themeObjectStorageMock);

        $this->subject->addTheme($theme);
    }

    /**
     * @test
     */
    public function removeThemeFromObjectStorageHoldingTheme(): void
    {
        $theme = new \Arpr\RecipeArpr\Domain\Model\Theme();
        $themeObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $themeObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($theme));
        $this->subject->_set('theme', $themeObjectStorageMock);

        $this->subject->removeTheme($theme);
    }

    /**
     * @test
     */
    public function getUstencilsReturnsInitialValueForUstencil(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getUstencils()
        );
    }

    /**
     * @test
     */
    public function setUstencilsForObjectStorageContainingUstencilSetsUstencils(): void
    {
        $ustencil = new \Arpr\RecipeArpr\Domain\Model\Ustencil();
        $objectStorageHoldingExactlyOneUstencils = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneUstencils->attach($ustencil);
        $this->subject->setUstencils($objectStorageHoldingExactlyOneUstencils);

        self::assertEquals($objectStorageHoldingExactlyOneUstencils, $this->subject->_get('ustencils'));
    }

    /**
     * @test
     */
    public function addUstencilToObjectStorageHoldingUstencils(): void
    {
        $ustencil = new \Arpr\RecipeArpr\Domain\Model\Ustencil();
        $ustencilsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $ustencilsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($ustencil));
        $this->subject->_set('ustencils', $ustencilsObjectStorageMock);

        $this->subject->addUstencil($ustencil);
    }

    /**
     * @test
     */
    public function removeUstencilFromObjectStorageHoldingUstencils(): void
    {
        $ustencil = new \Arpr\RecipeArpr\Domain\Model\Ustencil();
        $ustencilsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $ustencilsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($ustencil));
        $this->subject->_set('ustencils', $ustencilsObjectStorageMock);

        $this->subject->removeUstencil($ustencil);
    }

    /**
     * @test
     */
    public function getOriginReturnsInitialValueForOrigin(): void
    {
        self::assertEquals(
            null,
            $this->subject->getOrigin()
        );
    }

    /**
     * @test
     */
    public function setOriginForOriginSetsOrigin(): void
    {
        $originFixture = new \Arpr\RecipeArpr\Domain\Model\Origin();
        $this->subject->setOrigin($originFixture);

        self::assertEquals($originFixture, $this->subject->_get('origin'));
    }

    /**
     * @test
     */
    public function getReviewsReturnsInitialValueForReview(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getReviews()
        );
    }

    /**
     * @test
     */
    public function setReviewsForObjectStorageContainingReviewSetsReviews(): void
    {
        $review = new \Arpr\RecipeArpr\Domain\Model\Review();
        $objectStorageHoldingExactlyOneReviews = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneReviews->attach($review);
        $this->subject->setReviews($objectStorageHoldingExactlyOneReviews);

        self::assertEquals($objectStorageHoldingExactlyOneReviews, $this->subject->_get('reviews'));
    }

    /**
     * @test
     */
    public function addReviewToObjectStorageHoldingReviews(): void
    {
        $review = new \Arpr\RecipeArpr\Domain\Model\Review();
        $reviewsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $reviewsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($review));
        $this->subject->_set('reviews', $reviewsObjectStorageMock);

        $this->subject->addReview($review);
    }

    /**
     * @test
     */
    public function removeReviewFromObjectStorageHoldingReviews(): void
    {
        $review = new \Arpr\RecipeArpr\Domain\Model\Review();
        $reviewsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $reviewsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($review));
        $this->subject->_set('reviews', $reviewsObjectStorageMock);

        $this->subject->removeReview($review);
    }
}
