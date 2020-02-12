<?php


namespace App\Pagination;


class PaginatedCollection
{
    private $produits;
    private $total;
    private $count;

    public function __construct($produits, $total)
    {

        $this->produits = $produits;
        $this->total = $total;
        $this->count = count($produits);
    }

}