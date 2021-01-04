<?php

declare(strict_types=1);

namespace App\Services\Stocks;

use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class Foxtrot extends SimpleStock
{
    public function getName(): string
    {
        return 'Foxtrot';
    }

    public function getUrl(): string
    {
        return 'https://www.foxtrot.com.ua';
    }

    protected function checkAvailability(Crawler $crawler): void
    {
        $buyButton = $crawler->filter($this->availabilitySelector());

        if ($buyButton->count() > 0
            && !Str::of($buyButton->first()->attr('class'))->contains('product-not-avail-button')
        ) {
            $this->result = true;
        }
    }

    protected function waitFor(): string
    {
        return '.product-box__main';
    }

    protected function availabilitySelector(): string
    {
        return '.product-box__main-buy__button';
    }
}
