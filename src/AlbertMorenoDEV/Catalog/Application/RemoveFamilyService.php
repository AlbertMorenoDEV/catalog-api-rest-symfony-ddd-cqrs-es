<?php
namespace AMD\Catalog\Application;

use AMD\Catalog\Domain\Model\Family;
use AMD\Catalog\Domain\Model\FamilyNotFoundException;
use AMD\Catalog\Domain\Model\FamilyRepository;

class RemoveFamilyService
{
    /** @var FamilyRepository */
    private $repository;

    public function __construct(FamilyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(RemoveFamilyRequest $request): RemoveFamilyResponse
    {
        /** @var Family $family */
        $family = $this->repository->findById($request->getId());

        if (!$family) {
            throw new FamilyNotFoundException('No family found for id '.$request->getId());
        }

        $response = new RemoveFamilyResponse($family->getId(), $family->getName());

        $this->repository->remove($family);

        return $response;
    }
}