<?php


namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="asset")
 */
final class Asset
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", nullable=false)
     */
    protected string $id;
    /**
     * @ORM\Column(type="string", nullable=false)
     */
    protected string $name;
    /**
     * @ORM\Column(type="decimal", nullable=false, precision=30, scale=20)
     */
    protected float $price;

    /**
     * @ORM\Column(type="decimal", nullable=false, precision=30, scale=20)
     */
    protected float $volume24h;

    /**
     * @ORM\Column(type="decimal", nullable=false, precision=30, scale=20)
     */
    protected float $change1h;

    /**
     * @ORM\Column(type="decimal", nullable=false, precision=30, scale=20)
     */
    protected float $change24h;

    /**
     * @ORM\Column(type="decimal", nullable=false, precision=30, scale=20)
     */
    protected float $change7d;

    /**
     * @ORM\Embedded(class="AssetStatus")
     */
    protected AssetStatus $status;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    protected DateTime $time;

    public function __construct(string $id, string $name, float $price, float $volume24h, float $change1h,
                                float $change24h, float $change7d, AssetStatus $status, DateTime $time)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->volume24h = $volume24h;
        $this->change1h = $change1h;
        $this->change24h = $change24h;
        $this->change7d = $change7d;
        $this->status = $status;
        $this->time = $time;
    }


}