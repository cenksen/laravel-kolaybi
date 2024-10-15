# KolayBi API Laravel Package

A Laravel package for integrating with the KolayBi API.

## Installation

You can install the package via composer:

```bash
composer require cenksen/laravel-kolaybi
```
### Configuration
After installing, you can publish the configuration file:
```bash
php artisan vendor:publish --provider="Cenksen\Kolaybi\KolayBiServiceProvider"
```
This will create a kolaybi.php config file in your config directory.

### Usage
#### Creating a Product
Here’s an example of how to create a product:

```bash
use Cenksen\Kolaybi\Facades\KolayBi;

public function createProduct()
{
   
   $productData = [
    'name' => 'Monthly',
    'code' => 'ABN002',
    'quantity' => 10,
    'vat_rate' => 20,
    'barcode' => '0000000122331',
    'description' => 'Monthly Subscription',
    'discount_type' => 'percentage', // Allowed values: numeric, percentage
    'discount_value' => 0.00,
    'product_type' => 'good', // Allowed values: good, service
    'tags' => ['label1', 'label2'],
    'price_currency' => 'TRY',
    'price' => 100.000,
    ];
    
    $response = KolayBi::createProduct($productData);
    return response()->json($response);
}
```

```bash
use Cenksen\Kolaybi\Facades\KolayBi;

public function createAssociate()
{
        $associateData = [
            'name' => 'demo',
            'surname' => 'user',
            'identity_no' => '3232322323232323',
            'tax_office' => 'Yesil VERGİ DAİRESİ MÜDÜRLÜĞÜ',
            'phone' => '+905123456789',
            'email' => 'user@example.com',
            'code' => '000001'
        ];
        
        $associateResponse = KolayBi::createAssociate($associateData);
        return response()->json($response);
}
```

```bash
use Cenksen\Kolaybi\Facades\KolayBi;

public function createInvoice()
{
        $invoiceData = [
            'contact_id' => 123123,
            'address_id' => 123123,
            'order_date' => '2024-09-13T00:00:00Z',
            'currency' => 'try',
            'type' => 'sale_invoice',
            'receiver_email' => 'user@example.com',
            'serial_no' => 'SER123456',
            'due_date' => '2024-10-13T00:00:00Z',
            'tracking_currency' => 'try',
            'items' => [
                [
                    'product_id' => 184907,
                    'quantity' => '10',
                    'unit_price' => '20.00',
                    'vat_rate' => '18',
                    'discount_amount' => '0',
                    'description' => 'Ürün Açıklaması',
                    'gtip_no' => 123456789012,
                ],
            ],
        ];
        
        $response = KolayBi::createInvoice($invoiceData);
        return response()->json($response);
}
```

```bash
use Cenksen\Kolaybi\Facades\KolayBi;

public function createInvoiceProceed()
{
        $proceedData = [
            'document_id' => 111111,
            'vault_id' => 14711167,
        ];
        
        
        $response = KolayBi::createInvoiceProceed($proceedData);
        return response()->json($response);
}
```

```bash
use Cenksen\Kolaybi\Facades\KolayBi;

 public function createInvoiceEDocument()
{
        $documentData = [
            'document_id' => 5839980,
        ];

        $response = $this->kolayBi->createInvoiceEDocument($documentData);
        return response()->json($response);
}
```







### Contributing
If you want to contribute to this project, feel free to submit a pull request or open an issue.


### License
This package is licensed under the MIT License.
