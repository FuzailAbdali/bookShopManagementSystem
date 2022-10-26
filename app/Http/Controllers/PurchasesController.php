<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Invoices;


class PurchasesController extends Controller
{
    
     public function index(Request $request) {

        $request->validate([
                'buyer'            => 'required|string|max:150',
                'quantity'         => 'required|numeric|min:1'
            ]);
        $invoice = null;
        $buyer = $request->buyer;
        $purchaseQty = intval($request->quantity);
        $book = Books::find($request->book_id);
        $purchasePrice = $this->purchaseBook($book,$purchaseQty);

        if($purchasePrice !== null) {
            $book->available_quantity -= $purchaseQty;
            $invoice = new Invoices();
            $invoice->book_id = $book->id;
            $invoice->buyer = $buyer;
            $invoice->amount = $purchasePrice;
            $invoice->purchased_quantity = $purchaseQty;
            $invoice->created_at = date('d-m-Y H:i:s');
            $invoice->updated_at = date('d-m-Y H:i:s');
            $invoice->save();
            $book->save();

            return redirect('view-added-books')->with('status', ' Book purchased Successfully  ');
        }
        $errors = collect([ 'Avilable Books Quantity is less than you entered to buy']);
        $id = $book->id;
        return redirect('purchase-book',['id' => '$id'])->with('errors',$errors);
          // print_r($invoice);
              // return view('contact',compact('id'));
         // return view('order.product-create', compact($order));
    }

    private function purchaseBook($book , $bookPurchaseQty)
    {
        $bookPrice = $book->price;
        $bookAvailableQty = intval($book->available_quantity);
        $purchasePrice = null;

        if($bookAvailableQty >= $bookPurchaseQty && $bookPurchaseQty > 0) {
            $purchasePrice = $bookPurchaseQty * $bookPrice;
        }

        return $purchasePrice;
    }

}
