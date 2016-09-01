<?php

namespace UKMNorge\EconomyBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use UKMNorge\EconomyBundle\Entity\Budget;

/**
 * ProjectRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProjectRepository extends EntityRepository
{
	public function findAllFromBudget(Budget $budget)
    {
		$em = $this->getEntityManager();

		$query = $em->createQuery('SELECT p
									FROM UKMecoBundle:Project p
									WHERE p.budget = :budget
									AND (p.deletedSince > :now OR p.deletedSince IS NULL OR p.deletedSince = 0)
									ORDER BY p.name ASC'
								   )->setParameter('budget', $budget->getId())
								   ->setParameter('now', date('Y'));
		return $query->getResult();
    }
}
