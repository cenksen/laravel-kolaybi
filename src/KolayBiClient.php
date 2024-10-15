<?php

namespace Cenksen\Kolaybi;

use Illuminate\Support\Facades\Http;

class KolayBiClient
{
    protected $baseUrl;
    protected $apiKey;
    protected $channel;
    protected $accessToken;

    public function __construct()
    {
        $this->baseUrl = config('kolaybi.base_url');
        $this->apiKey = config('kolaybi.api_key');
        $this->channel = config('kolaybi.channel');

        $this->accessToken = $this->getAccessToken();
    }

    protected function getAccessToken(): string
    {
        $response = Http::withHeaders([
            'Channel' => $this->channel,
        ])
            ->asForm()
            ->post("{$this->baseUrl}/access_token", [
                'api_key' => $this->apiKey,
            ]);

        if ($response->successful()) {
            $accessToken = $response->json('data');

            if ($accessToken) {
                return $accessToken;
            } else {
                throw new \Exception('Access token not found. API response: ' . $response->body());
            }
        }

        throw new \Exception('Error obtaining access token: ' . $response->body());
    }

    protected function getHeaders(): array
    {
        return [
            'Authorization' => "Bearer {$this->accessToken}",
            'Channel' => $this->channel,
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
    }

    public function createProduct(array $data)
    {
        $response = Http::withHeaders($this->getHeaders())
            ->asForm()
            ->post("{$this->baseUrl}/products", $data);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Error creating product: ' . $response->body());
    }

    public function createAddress(array $data)
    {
        $response = Http::withHeaders($this->getHeaders())
            ->asForm()
            ->post("{$this->baseUrl}/address/create", $data);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Error creating address: ' . $response->body());
    }

    public function createAssociate(array $data)
    {
        $response = Http::withHeaders($this->getHeaders())
            ->asForm()
            ->post("{$this->baseUrl}/associates", $data);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Error creating associate: ' . $response->body());
    }

    public function createInvoice(array $data)
    {
        $response = Http::withHeaders($this->getHeaders())
            ->asForm()
            ->post("{$this->baseUrl}/invoices", $data);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Error creating invoice: ' . $response->body());
    }

    public function createInvoiceEDocument(array $data)
    {
        $response = Http::withHeaders($this->getHeaders())
            ->asForm()
            ->post("{$this->baseUrl}/invoices/e-document/create", $data);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Error creating e-document invoice: ' . $response->body());
    }

    public function createInvoiceProceed(array $data)
    {
        $response = Http::withHeaders($this->getHeaders())
            ->asForm()
            ->post("{$this->baseUrl}/invoices/proceed", $data);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Error processing invoice: ' . $response->body());
    }

    public function createTag(array $data)
    {
        $response = Http::withHeaders($this->getHeaders())
            ->asForm()
            ->post("{$this->baseUrl}/tags", $data);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Error creating tag: ' . $response->body());
    }
}
