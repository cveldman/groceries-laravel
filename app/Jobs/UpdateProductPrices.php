<?php

namespace App\Jobs;

use App\Models\Product;
use Goutte\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateProductPrices implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function handle()
    {
        $products = Product::all();

        $client = new Client();

        foreach($products as $product) {
            foreach($product->prices as $price) {
                if($price->supermarket_id == 1) {
                    $crawler = $client->request('GET', 'https://www.jumbo.com/producten/' . $price->sku);
                    $node = $crawler->filter('.current-price')->first();
                    $price->update(['price' => str_replace(' ', '', $node->text())]);
                } else if ($price->supermarket_id == 2) {
                    $crawler = $client->request('GET', 'https://www.ah.nl/producten/product/wi' . $price->sku);
                    $node = $crawler->filterXPath('//div[@data-testhook="price-amount"]')->first();
                    $price->update(['price' => str_replace('.', '', $node->text())]);
                } else if ($price->supermarket_id == 3) {
                    $crawler = $client->request('GET', 'https://www.aldi.nl/producten' . $price->sku);
                    $node = $crawler->filter('.price')->first();
                    $price->update(['price' => str_replace('.', '', $node->text())]);
                }
            }
        }

    }
}
