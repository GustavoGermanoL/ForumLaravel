<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;


class CategoryController extends Controller
{
    //
    public function createCategory(Request $request){

        if($request -> method() === 'GET'){
            return view('categories.createCategory');

        }else {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:255|'
                // 'created_at' => 'date_format|timestamp',
                // 'updated_at' => 'date_format|timestamp|'
            ]);

            $category = Category::create([
                'title' => $request->title,
                'description' => $request->description,
                // 'created_at' => now(),
                // 'update_at' => now()
            ]);



            return redirect()->route('routeListCategories');

        }
    }
    public function updateCategory(Request $request, $cid){
        $category = Category::where('id', $cid) -> first();
        $category -> title = $request -> title;
        $category -> description = $request -> description;
        $category->save();
        return redirect() -> route('routeListCategories', [$category -> id])
                                -> with('message', 'Atualizado com sucesso!');
    }

    public function editCategory(Request $request, $cid){
        $category = Category::where('id', $cid)->first();
        return view('categories.editCategory', ['category' => $category]);
    }

    public function deleteCategory(Request $request, $cid){
        Category::where('id', $cid) -> delete();
        return redirect() -> route('routeListCategories')
                                -> with('message', 'Exclcido com sucesso');
    }

    public function listAllCategories(Request $request){
        $categories = Category::all();
        return view('categories.listAllCategories', ['categories' => $categories]);
    }
}
