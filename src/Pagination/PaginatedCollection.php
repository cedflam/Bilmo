<?php


namespace App\Pagination;


class PaginatedCollection
{
    private $produits;
    private $totalProduits;
    private $count;

    public function __construct($produits, $totalProduits)
    {
        $this->produits = $produits;
        $this->totalProduits = $totalProduits;
        $this->count = count($produits);
    }
}