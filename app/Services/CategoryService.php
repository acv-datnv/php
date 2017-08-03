<?php

namespace App\Services;

use App\Categories;
use App\Services\Interfaces\CategoryServiceInterface;

class CategoryService implements CategoryServiceInterface
{
    public function createCategory(array $data)
    {
        $categoryData = [
            'name' => $data['name']
        ];

        return Categories::create($categoryData);
    }

    public function updateCategory(array $data, $id)
    {
        $category = Categories::findOrFail($id);

        $categoryData = [
            'name' => $data['name']
        ];

        return $category->update($categoryData);
    }

}