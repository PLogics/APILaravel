<?php

namespace App\Repositories\Interfaces;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface{
    public function all(){
        return Category::all();
    }
} 
