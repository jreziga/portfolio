<?php

namespace Jrk\Portfolio\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\ORM\Query\ResultSetMapping;
use Jrk\Portfolio\CoreBundle\Entity\Configuration;

/**
 * ConfigurationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ConfigurationRepository extends EntityRepository
{

    public function getConfigurationsByLocale($locale)
    {
        $dql = "SELECT c,ct FROM JrkPortfolioCoreBundle:Configuration c LEFT OUTER JOIN c.translations ct WHERE ct.locale = :locale";
        $query = $this->_em->createQuery($dql);
        $query->setParameter("locale",$locale);
        return $query->getResult();
    }

    public function getConfigurationByLocaleAndSlug($locale,$slug)
    {
        $dql = "SELECT c,ct FROM JrkPortfolioCoreBundle:Configuration c LEFT OUTER JOIN c.translations ct WHERE ct.locale = :locale
        AND ct.slug = :slug";
        $query = $this->_em->createQuery($dql);
        $query->setParameter("locale",$locale)->setParameter('slug',$slug);
        return $query->getOneOrNullResult();
    }


    public function getConfigurationByNameAndLocale($name,$locale)
    {
        $dql = "SELECT c,ct FROM JrkPortfolioCoreBundle:Configuration c 
        LEFT OUTER JOIN c.translations ct WHERE c.name = :name AND ct.locale = :locale";
        $query = $this->_em->createQuery($dql);
        $query->setParameter("name",$name);
        $query->setParameter("locale",$locale);
        return $query->getOneOrNullResult();
    }
}
