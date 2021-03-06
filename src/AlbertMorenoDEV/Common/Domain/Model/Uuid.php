<?php
namespace AMD\Common\Domain\Model;

use Ramsey\Uuid\Uuid as RamseyUuid;

abstract class Uuid
{
    private $id;

    private function __construct($id = null)
    {
        $this->id = $id ?: RamseyUuid::uuid4()->toString();
    }

    public static function create($id = null)
    {
        return new static($id);
    }

    public function __toString(): string
    {
        return $this->id;
    }

    public function getValue(): string
    {
        return $this->id;
    }

    public function isEqual(Uuid $otherUuid): bool
    {
        return $this->id === $otherUuid->getValue();
    }
}