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
            return view('tags.createTag');

        }else {
            $request->validate([
                'title' => 'required|string|max:255',
            ]);

            $Tag = Tag::create([
                'title' => $request->title,
                // 'created_at' => now(),
                // 'update_at' => now()
            ]);



            return redirect()->route('routeListTags');

        }
    }
    public function updateTag(Request $request, $tid){
        $Tag = Tag::where('id', $tid) -> first();
        $Tag -> title = $request -> title;
        $Tag->save();
        return redirect() -> route('routeListTags', [$Tag -> id])
                                -> with('message', 'Atualizado com sucesso!');
    }

    public function editTag(Request $request, $tid){
        $Tag = Tag::where('id', $tid)->first();
        return view('tags.editTag', ['Tag' => $Tag]);
    }

    public function deleteTag(Request $request, $tid){
        Tag::where('id', $tid) -> delete();
        return redirect() -> route('routeListTags')
                                -> with('message', 'Excltido com sucesso');
    }

    public function listAllTags(Request $request){
        $tags = Tag::all();
        return view('tags.listAllTags', ['tags' => $tags]);
    }
}
