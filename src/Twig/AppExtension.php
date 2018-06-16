<?php 
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\Extension\GlobalsInterface;

class AppExtension extends AbstractExtension implements GlobalsInterface {
    public function __construct(string $locale) {
        $this->locale = $locale;
    }

    public function getFilters() {
        return [
            new TwigFilter('price', [$this, 'priceFilter'])
        ];
    }

    public function getGlobals() {
        return [
            'locale' => $this->locale
        ];
    }

    public function priceFilter($number){
        return '$'.number_format($number, 2, '.', ',');
    }
}

?>