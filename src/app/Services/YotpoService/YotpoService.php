<?php

namespace Slyusarchyn\App\Services\YotpoService;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Slyusarchyn\App\Services\YotpoService\Contracts\YotpoContract;

/**
 * Class YotpoService
 * @package Slyusarchyn\App\Services\YotpoService
 */
class YotpoService implements YotpoContract
{
    /**
     * @var string
     */
    protected $appKey;

    /**
     * @var string
     */
    protected $secretKey;

    /**
     * @var string
     */
    protected $baseUri = 'https://api.yotpo.com';

    /**
     * @var string
     */
    protected $uToken;

    /**
     * YotpoService constructor.
     */
    public function __construct()
    {
        $this->appKey = config('yotpo.app_key');
        $this->secretKey = config('yotpo.secret_key');
    }

    /**
     * @return string
     */
    public function getUToken(): string
    {
        return $this->uToken;
    }

    /**
     * @param string $uToken
     */
    public function setUToken(string $uToken): void
    {
        $this->uToken = $uToken;
    }

    /**
     * @return object|null
     */
    public function getOauthToken(): ?object
    {
        $request = [
            'grant_type' => 'client_credentials'
        ];

        $request['client_id'] = $this->appKey;
        $request['client_secret'] = $this->secretKey;

        $response = $this->sendRequest($request, 'POST', $this->baseUri . '/oauth/token');

        return json_decode($response);
    }

    /**
     * @param array $purchaseHash
     * @return string|null
     */
    public function createPurchase(array $purchaseHash)
    {
        $request = [
            'app_key'       => $this->appKey,
            'utoken'        => $this->getUToken(),
            'email'         => $purchaseHash['email'],
            'customer_name' => $purchaseHash['customer_name'],
            'order_date'    => $purchaseHash['order_date'],
            'currency_iso'  => 'USD',
            'order_id'      => $purchaseHash['order_id'],
            'platform'      => 'general',
            'products'      => $purchaseHash['products']
        ];
        $response = $this->sendRequest($request, 'POST', $this->baseUri . '/apps/' . $this->appKey . '/purchases');

        return $response;
    }

    /**
     * @param array $purchasesHash
     * @return string|null
     */
    public function createPurchases(array $purchasesHash)
    {
        $request = [
            'utoken'   => $this->getUToken(),
            'platform' => 'general',
            'orders'   => $purchasesHash['orders'],
        ];
        $response = $this->sendRequest($request, 'POST', $this->baseUri . '/apps/' . $this->appKey . '/purchases/mass_create');

        return $response;
    }

    /**
     * @param array $requestHash
     * @return string|null
     */
    public function getPurchases(array $requestHash)
    {
        $request = [
            'utoken'     => $this->getUToken(),
            'since_id'   => $requestHash['since_id'],
            'since_date' => $requestHash['since_date'],
            'page'       => $requestHash['page'],
            'count'      => $requestHash['count'],
        ];
        if (!array_key_exists('page', $request)) {
            $request['page'] = 1;
        }
        if (!array_key_exists('count', $request)) {
            $request['count'] = 10;
        }
        $response = $this->sendRequest($request, 'GET', $this->baseUri . '/apps/' . $this->appKey . '/purchases');

        return $response;
    }

    /**
     * @param $data
     * @param $type
     * @param $url
     * @return string|null
     */
    protected function sendRequest($data, $type, $url): ?string
    {
        try {
            $client = new Client();
            $body = (string)$client->request($type, $url, [
                'body'    => json_encode($data),
                'headers' => ['Content-Type' => 'application/json'],
            ])->getBody();

            return $body;
        } catch (GuzzleException $e) {
            return null;
        } catch (Exception $e) {
            return null;
        }
    }
}