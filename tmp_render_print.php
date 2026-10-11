<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$order = App\Models\Order::with(['customer', 'items.tracks.stage', 'items.tracks.tailor', 'items.type'])->findOrFail(5);
$item = $order->items->first();
$measurements = $item->measurements;
$measurements[36]['value'] = '40 42 43';
$measurements[38]['value'] = '12 11 3/4 12';
$measurements[37]['value'] = '25 24 25';
$item->measurements = $measurements;

$html = view('orders.print-details', compact('order'))->render();
file_put_contents('public/tmp_print_preview.html', $html);
echo (str_contains($html, 'Back Plate Loose') ? 'HAS COL HEADS' : 'MISSING COL HEADS') . "\n";
if (preg_match('/<table class="body-loose-table">.*?<\/table>/s', $html, $m)) {
    echo $m[0] . "\n";
}
