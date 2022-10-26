<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use Dingo\Api\Exception\StoreResourceFailedException;

class BooksController extends Controller
{

    public function store(Request $request) {

         $request->validate([
            'title'            => 'required|max:150',
            'author'           => 'required|max:150',
            'description'      => 'required|string|max:255',
            'reference'        => 'string|max:255',
            'publication'      => 'required|string|max:150',
            'price'            => 'required|numeric|min:0|digits_between:1,12', 
            'quantity'         => 'required|numeric|min:1'
        ]);



        $book = new Books;

        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->reference = $request->description;
        $book->publication = $request->publication;
        $book->price = $request->price;
        $book->available_quantity = $request->quantity;
        $book->save();
        return redirect('view-added-books')->with('status', 'Record Saved Successfully #'. $book->id);
        // return 'Book record successfully created with id ' . $book->id;
    }

      public function update(Request $request) {
       //validate


         $request->validate([
            'title'            => 'required|max:150',
            'author'           => 'required|max:150',
            'description'      => 'required|string|max:255',
            'reference'        => 'string|max:255',
            'publication'      => 'required|string|max:150',
            'price'            => 'required|numeric|min:0|digits_between:1,12', 
            'quantity'         => 'required|numeric|min:1'
        ]);


        $book = Books::find($request->id);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->reference = $request->description;
        $book->publication = $request->publication;
        $book->price = $request->price;
        $book->quantity = $request->quantity;
        $book->save();
        return redirect('view-added-books')->with('status', 'Successfully updated book #' . $request->id);
    }


     public function index(Request $request) {
        
        $books = Books::orderBy('id', 'asc');
        if(!empty($request->id))
        {
            $books->where('id', $request->id);
        }
        $books = $books->get();
         return view('view-added-books',compact('books'));
    }


    public function destroy(Request $request) {
        $book = Books::find($request->id);
        $book->delete();
        return redirect('view-added-books')->with('status', 'Successfully deleted book #' . $request->id);
    }
    

}
