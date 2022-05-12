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
 * avis
 */
class Review extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * titre
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $title = '';

    /**
     * contenu
     *
     * @var string
     */
    protected $content = '';

    /**
     * note
     *
     * @var int
     */
    protected $grade = 0;

    /**
     * auteur
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $author = '';

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Returns the content
     *
     * @return string $content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Sets the content
     *
     * @param string $content
     * @return void
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }

    /**
     * Returns the grade
     *
     * @return int $grade
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Sets the grade
     *
     * @param int $grade
     * @return void
     */
    public function setGrade(int $grade)
    {
        $this->grade = $grade;
    }

    /**
     * Returns the author
     *
     * @return string $author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Sets the author
     *
     * @param string $author
     * @return void
     */
    public function setAuthor(string $author)
    {
        $this->author = $author;
    }
}
