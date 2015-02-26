<?php

namespace UKMNorge\EconomyBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ProjectAllocatedAmountRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProjectAllocatedAmountRepository extends EntityRepository
{
	
	public function getTotalByProject( $project, $year ) {
	    $q = $this->createQueryBuilder('e')
	        ->addSelect('SUM(e.amount) AS total')
	        ->where('e.project = :project')
	        ->whereAnd('e.year = :year')
	        ->setParameter(array('project','year'), array($project,$year))
	        ->getQuery();
	        
	    $result = $q->getSingleResult();
	    return $result['total'];
	}
}
