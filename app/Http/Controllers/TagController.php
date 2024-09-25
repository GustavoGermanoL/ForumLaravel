<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Tag;


class TagController extends Controller
{
    //
    public function createTag(Request $request){

        if($request -> method() === 'GET'){
            return view('categories.createTag');

        }else {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:255|'
                // 'created_at' => 'date_format|timestamp',
                // 'updated_at' => 'date_format|timestamp|'
            ]);

            $Tag = Tag::create([
                'title' => $request->title,
                'description' => $request->description,
                // 'created_at' => now(),
                // 'update_at' => now()
            ]);



            return redirect()->route('routeListCategories');

        }
    }
    public function updateTag(Request $request, $cid){
        $Tag = Tag::where('id', $cid) -> first();
        $Tag -> title = $request -> title;
        $Tag -> description = $request -> description;
        $Tag->save();
        return redirect() -> route('routeListCategories', [$Tag -> id])
                                -> with('message', 'Atualizado com sucesso!');
    }

    public function editTag(Request $request, $cid){
        $Tag = Tag::where('id', $cid)->first();
        return view('categories.editTag', ['Tag' => $Tag]);
    }

    public function deleteTag(Request $request, $cid){
        Tag::where('id', $cid) -> delete();
        return redirect() -> route('routeListCategories')
                                -> with('message', 'Exclcido com sucesso');
    }

    public function listAllCategories(Request $request){
        $categories = Tag::all();
        return view('categories.listAllCategories', ['categories' => $categories]);
    }
}
