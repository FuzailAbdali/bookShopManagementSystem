<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoices;
use PDF;

class InvoicesController extends Controller
{
      public function index(Request $request) {
        if ($request->id == null) {
            $invoices = Invoices::join('books', 'invoices.book_id', '=', 'books.id')
                ->select(
                    'invoices.id',
                    'invoices.amount',
                    'invoices.purchased_quantity',
                    'invoices.buyer',
                    'invoices.created_at',
                    'invoices.updated_at', 
                    'books.title',
                    'books.id as book_id',
                    'books.author',
                    'books.price',
                    'books.available_quantity'
                )
                ->getQuery()
                ->get();
        } else {
            $invoices = Invoices::join('books', 'invoices.book_id', '=', 'books.id')
                ->select(
                    'invoices.id',
                    'invoices.amount',
                    'invoices.buyer',
                    'invoices.purchased_quantity',
                    'invoices.created_at',
                    'invoices.updated_at',
                    'books.title',
                    'books.id as book_id',
                    'books.author',
                    'books.price',
                    'books.available_quantity'
                )->where('book_id','=',$request->id)->get();
        }
        return view('invoice',compact('invoices'));
    }

        public function store(Request $request) {
        $invoice = new Invoices;

        $invoice->title = $request->title;
        $invoice->author = $request->author;
        $invoice->description = $request->description;
        $invoice->reference = $request->reference;
        $invoice->publication = $request->publication;
        $invoice->price = $request->price;
        $invoice->purchased_quantity = $request->purchased_quantity;
        $invoice->save();

        return 'Invoice record successfully created with id ' . $invoice->id;
    }

    public function createPDF(Request $request) {
        $book_id = $request->book_id;
        $id = $request->id;
      // retreive  record from db
      $data = Invoices::join('books', 'invoices.book_id', '=', 'books.id')
                ->select(
                    'invoices.id',
                    'invoices.amount',
                    'invoices.buyer',
                    'invoices.purchased_quantity',
                    'invoices.created_at',
                    'invoices.updated_at',
                    'books.id as book_id',
                    'books.title',
                    'books.author',
                    'books.price',
                    'books.available_quantity'
                )->where('book_id','=',$book_id)->where('invoices.id','=', $id)
                ->get();

      // share data to view
      view()->share('invoice-view-pdf',compact('data'));
      $pdf = PDF::loadView('invoice-view-pdf', compact('data'));
      // download PDF file with download method
       return $pdf->download('pdf_file.pdf');
       // return view('invoice-view-pdf',compact('data'))->with($pdf);
    }

    // public function downloadPDF()
    // {
    //     $pdf = PDF::loadView('invoice-view-pdf');
    //   return $pdf->download('invoice.pdf');
    // }

}
