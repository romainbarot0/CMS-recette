<?php

namespace Arpr\RecipeArpr\Domain\Repository;

class ThemeRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    public function findByUidList(array $uids){
        $query = $this->createQuery();

        $query->matching($query->in('uid', $uids));

        return $query->execute();
    }
}