<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BooksModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BooksApi extends Controller
{
    public function index_api()
    {
        $books = DB::table('books_models')->orderBy('release_date', 'asc')->get();
        //$books = BooksModel::all();
        return response(['status' => 'ok', 'response' => ['books' => $books]]);
    }

    public function create_record_about_book(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|unique:books_models',
            'author' => 'required',
            'cover' => 'required',
            'description' => 'required',
            'release_date' => 'required'
        ]);

        if($validator->fails()){
            return response(['status' => 'error', 'error' => $validator->errors()]);
        }

        $book = BooksModel::create($request->all());
        return response(['status' => 'ok', 'response' => ['book' => $book]]);
    }

    public function delete_book($id)
    {
        $book = BooksModel::destroy($id);
        if ($book == 1){
            return response(['status' => 'ok', 'response' => ['book' => "Book remove from list"]]);
        }
    }

    public function update_book(Request $request,$id)
    {
        $product=BooksModel::find($id);
        $product->update($request->all());
        return $product;

    }

}
