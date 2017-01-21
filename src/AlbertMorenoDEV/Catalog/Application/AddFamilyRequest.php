<?php
namespace AMD\Catalog\Application;

use AMD\Catalog\Domain\Model\Family\FamilyId;

class AddFamilyRequest
{
    private $familyId;
    private $name;

    public function __construct(string $familyId, string $name)
    {
        $this->familyId = FamilyId::create($familyId);
        $this->name = $name;
    }

    public function getFamilyId(): FamilyId
    {
        return $this->familyId;
    }

    public function getName(): string
    {
        return $this->name;
    }
}