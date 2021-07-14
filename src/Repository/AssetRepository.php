<?php

namespace App\Repository;

use App\Entity\Asset;
use App\Entity\AssetsCollection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class AssetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Asset::class);
    }

    /**
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\ORMException
     */
    public function saveAll(AssetsCollection $assetsCollection): void
    {
        foreach ($assetsCollection as $asset) {
            $this->_em->persist($asset);
        }
        $this->_em->flush();
    }

    public function search(string $id): ?Asset
    {
        return $this->find($id);
    }

}