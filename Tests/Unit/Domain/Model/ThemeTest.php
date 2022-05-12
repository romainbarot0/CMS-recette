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
class ThemeTest extends UnitTestCase
{
    /**
     * @var \Arpr\RecipeArpr\Domain\Model\Theme|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Arpr\RecipeArpr\Domain\Model\Theme::class,
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
}
