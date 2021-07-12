<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use DomainException;

/**
 * @ORM\Embeddable
 */
final class AssetStatus
{
    private const VALID_STATUS = ['recent'];

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected string $status;

    public function __construct(string $status)
    {
        $this->isValidOrFail($status);
        $this->status = $status;
    }

    private function isValidOrFail(string $status): void
    {
        if (false === in_array($status, self::VALID_STATUS, true)) {
            throw new DomainException();
        }
    }


}