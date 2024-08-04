<?php

namespace App\Models;

use App\Services\BlogService;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use \Sushi\Sushi;

    private BlogService $service;

    public function __construct()
    {
        $this->service = new BlogService();
    }

    public function getRows()
    {
        return $this->service->getAll();
    }
}
