<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavenewAuthorRequest;
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
}
