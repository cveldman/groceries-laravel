<?php

use App\Models\Product;
use Goutte\Client;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('scrape', function () {
    \App\Jobs\UpdateProductPrices::dispatchSync();
});

Artisan::command('products {name}', function ($name) {
    $client = new Client();

    if(true) {
        $crawler = $client->request('GET', 'https://www.jumbo.com/zoeken/?searchTerms=' . $name);

        $crawler->filter('.title')->each(function ($node) {
            print $node->text()."\n";
        });

        $crawler->filter('.product-container')->each(function ($node) {
            $nameNode = $node->filter('.title')->first();
            $priceNode = $node->filter('.current-price')->first();

            print $nameNode->text() . " " . $priceNode->text() . "\n";
        });
    } else if (true) {
        $crawler = $client->request('GET', 'https://www.ah.nl/zoeken?query=' . $name);

        $crawler->filterXPath('//article[@data-testhook="product-card"]')->each(function ($node) {
            $priceNode = $node->filterXPath('//div[@data-testhook="price-amount"]')->first();
            $nameNode = $node->filterXPath('//strong[@data-testhook="product-title"]')->first();
            print $nameNode->text() . " " . $priceNode->text() . "\n";
        });
    }
});

Artisan::command('prices', function () {
    $product = Product::find(1);

    dump($product->name);

    foreach($product->prices as $price) {
            dump($price->supermarket->name . ': ' . $price->price);
    }
});
