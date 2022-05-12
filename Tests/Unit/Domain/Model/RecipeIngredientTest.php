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
class RecipeIngredientTest extends UnitTestCase
{
    /**
     * @var \Arpr\RecipeArpr\Domain\Model\RecipeIngredient|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Arpr\RecipeArpr\Domain\Model\RecipeIngredient::class,
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
    public function getQuantityReturnsInitialValueForInt(): void
    {
        self::assertSame(
            0,
            $this->subject->getQuantity()
        );
    }

    /**
     * @test
     */
    public function setQuantityForIntSetsQuantity(): void
    {
        $this->subject->setQuantity(12);

        self::assertEquals(12, $this->subject->_get('quantity'));
    }

    /**
     * @test
     */
    public function getIngredientReturnsInitialValueForIngredient(): void
    {
        self::assertEquals(
            null,
            $this->subject->getIngredient()
        );
    }

    /**
     * @test
     */
    public function setIngredientForIngredientSetsIngredient(): void
    {
        $ingredientFixture = new \Arpr\RecipeArpr\Domain\Model\Ingredient();
        $this->subject->setIngredient($ingredientFixture);

        self::assertEquals($ingredientFixture, $this->subject->_get('ingredient'));
    }
}
