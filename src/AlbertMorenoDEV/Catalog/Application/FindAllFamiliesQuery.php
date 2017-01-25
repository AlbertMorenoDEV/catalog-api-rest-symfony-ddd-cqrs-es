<?php
namespace AMD\Catalog\Application;

use AMD\Catalog\Domain\Model\FamilyRepository;

class FindAllFamiliesQuery
{
    private $repository;

    public function __construct(FamilyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(): array
    {
        return $this->repository->findAll();
    }
}