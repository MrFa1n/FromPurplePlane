<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BooksModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = DB::table('books_models')->orderBy('release_date', 'asc')->get();

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'description' => 'required',
            'cover' => 'required',
            'release_date' => 'required',
        ]);

        BooksModel::create($request->all());

        return redirect()->route('books.index')->with('success','Book list created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = BooksModel::findOrFail($id);
        return view('books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'description' => 'required',
            'cover' => 'required',
            'release_date' => 'required',
        ]);

        $name = $request->input('name');
        DB::update('update books_models set name = ? where id = ?',[$name,$id]);

        //$books->update($request->all());
        //DB::update('update books_models set name = ?,author=?,description=?,cover=?,release_date=? where id = ?',[$name, $author,$description,$cover,$release_date,$id]);

        return redirect()->route('books.index')->with('success','Book list updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BooksModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$books->delete();
        DB::delete('delete from books_models where id = ?',[$id]);

        return redirect()->route('books.index')->with('success','Book list deleted successfully');
    }
}
