<?php

namespace Slyusarchyn\App\Services\YotpoService\Contracts;

/**
 * Interface YotpoContract
 * @package Slyusarchyn\App\Services\YotpoService\Contracts
 */
interface YotpoContract
{
    /**
     * @return string
     */
    public function getUToken(): string;

    /**
     * @param string $uToken
     */
    public function setUToken(string $uToken): void;

    /**
     * @return array|object|string
     */
    public function getOauthToken();

    /**
     * @param array $purchaseHash
     * @return array|object|string
     */
    public function createPurchase(array $purchaseHash);

    /**
     * @param array $purchasesHash
     * @return array|object|string
     */
    public function createPurchases(array $purchasesHash);


    public function getPurchases(array $requestHash);
}