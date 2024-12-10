<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavenewAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthorController extends Controller
{

    public function index(){

        $data = [
            'authors' => Author::all(),
            'title' => 'Authors'
        ];

        return view('author.index', $data);
    }

    public function addNewAuthor(){
        return view('author.new_author');

    }

    public function saveNewAuthor(SavenewAuthorRequest $request){
        $input = $request->input();


        $authorData = [
            'first_name' => $input['first_name'],
            'last_name'=> $input['last_name'],
            'age' => $input['age'],
            'date_of_birth'=> $input['date_of_birth'],
        ];

        if($input['place_of_birth']){
            $authorData['place_of_birth'] = $input['place_of_birth'];
        }

        Author::create($authorData);


        return redirect('/authors');

    }

    public function editAuthor($id){
        $author = Author::findOrFail($id);

        $data = [
            'author' => $author
        ];
        return view('author.edit_author', $data);
    }

    public function updateAuthor(UpdateAuthorRequest $request){
        $input = $request->input();

        $author = Author::findOrFail($input['id']);

        $authorData = [
            'first_name' => $input['first_name'],
            'last_name'=> $input['last_name'],
            'date_of_birth'=> $input['date_of_birth'],
        ];

        if($input['place_of_birth']){
            $authorData['place_of_birth'] = $input['place_of_birth'];
        }


        $author->update($authorData);

        return redirect('/authors');

    }
}
