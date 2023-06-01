<?php


namespace App\Services\Interfaces;


interface NewsServiceInterface
{
    public function store();
    public function index($request);
}
