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
     * @ORM\Embedded(class="AssetStatus", columnPrefix = false)
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

    public function setId(string $id): Asset
    {
        $this->id = $id;
        return $this;
    }

    public function setName(string $name): Asset
    {
        $this->name = $name;
        return $this;
    }

    public function setPrice(float $price): Asset
    {
        $this->price = $price;
        return $this;
    }

    public function setVolume24h(float $volume24h): Asset
    {
        $this->volume24h = $volume24h;
        return $this;
    }

    public function setChange1h(float $change1h): Asset
    {
        $this->change1h = $change1h;
        return $this;
    }

    public function setChange24h(float $change24h): Asset
    {
        $this->change24h = $change24h;
        return $this;
    }

    public function setChange7d(float $change7d): Asset
    {
        $this->change7d = $change7d;
        return $this;
    }

    public function setStatus(AssetStatus $status): Asset
    {
        $this->status = $status;
        return $this;
    }

    public function setTime(DateTime $time): Asset
    {
        $this->time = $time;
        return $this;
    }


}