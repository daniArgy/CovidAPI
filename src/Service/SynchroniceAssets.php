<?php


namespace App\Service;


use App\Entity\Asset;
use App\Entity\AssetsCollection;
use App\Entity\AssetStatus;
use App\Repository\ApiRepository;
use App\Repository\AssetRepository;
use DateTime;
use Throwable;

final class SynchroniceAssets
{
    private ApiRepository $apiRepository;
    private AssetRepository $assetRepository;

    public function __construct(ApiRepository $apiRepository, AssetRepository $assetRepository)
    {
        $this->apiRepository = $apiRepository;
        $this->assetRepository = $assetRepository;
    }

    public function __invoke(): void
    {
        $stringAssets = $this->apiRepository->getAllAssets();
        $arrayAssets = json_decode($stringAssets, true)['assets'];

        try {
            $assetsCollection = $this->createCollection($arrayAssets);
            $this->assetRepository->saveAll($assetsCollection);
        } catch (Throwable $exception) {
            dump($exception);
        }
    }

    private function createCollection(array $assets): AssetsCollection
    {
        $assetsCollection = new AssetsCollection();
        foreach ($assets as $asset) {
            $id = $asset['id'];
            $assetClass = $this->assetRepository->search($id);
            $status = new AssetStatus($asset['status']);
            $time = new DateTime($asset['time']);
            if (null === $assetClass) {
                $assetClass = new Asset(
                    $id,
                    $asset['name'],
                    $asset['price'],
                    $asset['volume_24h'],
                    $asset['change_1h'],
                    $asset['change_24h'],
                    $asset['change_7d'],
                    $status,
                    $time
                );
            } else {
                $assetClass->setName($asset['name'])
                    ->setPrice($asset['price'])
                    ->setVolume24h($asset['volume_24h'])
                    ->setChange1h($asset['change_1h'])
                    ->setChange24h($asset['change_24h'])
                    ->setChange7d($asset['change_7d'])
                    ->setStatus($status)
                    ->setTime($time);
            }
            $assetsCollection->add($assetClass);
        }
        return $assetsCollection;
    }

}