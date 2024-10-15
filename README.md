# KolayBi API Laravel Package

A Laravel package for integrating with the KolayBi API.

## Installation

You can install the package via composer:

```bash
composer require cenksen/kolaybi
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

### Contributing
If you want to contribute to this project, feel free to submit a pull request or open an issue.


### License
This package is licensed under the MIT License.
