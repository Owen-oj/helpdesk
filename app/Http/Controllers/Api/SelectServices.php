<?php

namespace App\Http\Controllers\Api;

use App\Repositories\Contracts\PriorityRepository;
use App\Repositories\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SelectServices extends Controller
{
    protected $categories;
    protected $priorities;
    public function __construct(PriorityRepository $priorities,Category $categories)
    {
        $this->categories = $categories;
        $this->priorities = $priorities;
    }

    public function __invoke()
    {
        $categories = $this->categories->all();
        $priorities = $this->priorities->all();

        return json_encode(compact('categories','priorities'));
    }
}
