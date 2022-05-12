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
class ReviewTest extends UnitTestCase
{
    /**
     * @var \Arpr\RecipeArpr\Domain\Model\Review|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Arpr\RecipeArpr\Domain\Model\Review::class,
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
    public function getTitleReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle(): void
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('title'));
    }

    /**
     * @test
     */
    public function getContentReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getContent()
        );
    }

    /**
     * @test
     */
    public function setContentForStringSetsContent(): void
    {
        $this->subject->setContent('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('content'));
    }

    /**
     * @test
     */
    public function getGradeReturnsInitialValueForInt(): void
    {
        self::assertSame(
            0,
            $this->subject->getGrade()
        );
    }

    /**
     * @test
     */
    public function setGradeForIntSetsGrade(): void
    {
        $this->subject->setGrade(12);

        self::assertEquals(12, $this->subject->_get('grade'));
    }

    /**
     * @test
     */
    public function getAuthorReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getAuthor()
        );
    }

    /**
     * @test
     */
    public function setAuthorForStringSetsAuthor(): void
    {
        $this->subject->setAuthor('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('author'));
    }
}
