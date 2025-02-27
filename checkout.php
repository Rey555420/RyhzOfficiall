// Proses pembayaran di checkout.php
require 'vendor/autoload.php';
use Xendit\Xendit;

Xendit::setApiKey('API_KEY_ANDA');

$invoice = \Xendit\Invoice::create([
    'external_id' => 'checkout-' . time(),
    'amount' => 100000,
    'payer_email' => 'customer@email.com',
    'description' => 'Pembayaran Produk TokoKu'
]);

header('Location: ' . $invoice['invoice_url']);