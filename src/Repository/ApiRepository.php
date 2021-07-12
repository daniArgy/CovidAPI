<?php


namespace App\Repository;


final class ApiRepository extends CurlRepository
{

    public function getAllAssets(): string
    {
        $url = 'https://www.cryptingup.com/api/assets';

        return $this->get($url);
    }
}