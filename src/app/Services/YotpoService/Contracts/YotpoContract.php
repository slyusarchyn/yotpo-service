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
     * @return object|null
     */
    public function getOauthToken();

    /**
     * @param array $purchaseHash
     * @return string|null
     */
    public function createPurchase(array $purchaseHash);

    /**
     * @param array $purchasesHash
     * @return string|null
     */
    public function createPurchases(array $purchasesHash);

    /**
     * @param array $requestHash
     * @return string|null
     */
    public function getPurchases(array $requestHash);
}