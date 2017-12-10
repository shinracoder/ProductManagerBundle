<?php

namespace App\Oni\ProductManagerBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Gedmo\Tree\RepositoryInterface;
use App\Oni\CoreBundle\CoreGlobals;
use App\Oni\CoreBundle\Doctrine\Spec\Specification;
use App\Oni\CoreBundle\Entity\Repository\RepositorySpecificationInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * ProductsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductRepository extends EntityRepository implements RepositorySpecificationInterface
{

    /**
     * @param Specification $specification
     * @return array
     */
    public function match(Specification $specification)
    {
        if ( ! $specification->supports($this->getEntityName())) {
            throw new \InvalidArgumentException("Specification not supported by this repository.");
        }

        $qb = $this->createQueryBuilder('p');
        $expr = $specification->match($qb, 'p');
        $query = $qb->where($expr)->getQuery();
        $specification->modifyQuery($query);

        return $query->getResult();
    }

}
