<?php

namespace Jrk\Portfolio\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * LocaleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LocaleRepository extends EntityRepository
{

    public function getLocalesIn($ids)
    {
        $sql = 'SELECT locale FROM JrkPortfolioCoreBundle:Locale locale WHERE locale.id in ('.$ids.')';
        $qba = $this->_em->createQuery($sql);
        return $qba->getResult();
    }

}
