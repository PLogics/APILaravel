<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    //
    public function index()
    {
        $categories = Category::latest()->paginate(4);
        return view('categories.list', ['categories' => $categories]);
    }

    public function create()
    {
        return view('categories.new');
    }

    public function store(Request $request)
    {
        //validate data
        $request->validate([
            'title' => 'required|unique:categories|max:30'
        ]);

        $category = new Category;
        $category->title = $request->title;
        $category->save();
        return redirect('/')->withSuccess('New Category Created');
    }

    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        return view('categories.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::where('id', $id)->first();
        $category->title = $request->title;
        $category->save();
        return redirect('/')->withSuccess('Category Updated');
    }

    public function destroy($id)
    {
        $category = Category::whereId($id)->first();
        $category->delete();
        return redirect('/')->withSuccess('Category deleted');
    }
}
