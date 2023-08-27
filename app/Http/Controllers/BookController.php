<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Typebook;
use Config , Validator;
class BookController extends Controller
{ 
    var $rp = 2;

    public function index () {
        $books = book::paginate($this->rp);
        return view('book/index', compact('books'));
    }

    public function search(Request $request) {
        $query = $request->q;
        
        if($query) {
        $books = book::where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('price', 'LIKE', '%' . $query . '%')
            ->orWhere('id', 'LIKE', '%' . $query . '%')
            ->paginate($this->rp);
        } else {
            $books = book::paginate($this->rp);
        }


        return view('book/index', compact('books'));
    }

    public function edit ($id = null) {

        $typebooks = typebook::pluck('name', 'id')->prepend('Please select', '');
        if ($id) {
            $books = book::find($id); return view('book/edit')
            ->with('books', $books)
            ->with('typebooks', $typebooks);
        } else {
            return view('book/add')
            ->with('typebooks', $typebooks);
        }
        
    }

    public function update (Request $request) {
        $rules = [
            'name' => 'required',
            'price' => 'numeric',
            'typebook_id' => 'required|numeric',
            'stock_qty' => 'numeric',
        ];

        $messages = array(
            'required' => 'Please enter name',
            'numeric' => 'Please enter price',
        );  

        $id = $request->id;
        
        $temp = array(
        'name' => $request->name,
        'price' => $request->price,
        'typebook_id' => $request->typebook_id,
        'stock_qty' => $request->stock_qty);

        $validator = Validator::make($temp, $rules, $messages);
        if ($validator->fails()) {
            return redirect('book/edit/' . $id)
            ->withErrors($validator)
            ->withInput();
        }

        $books = book::find($id);
        $books->name = $request->name;
        $books->price = $request->price;
        $books->typebook_id = $request->typebook_id;
        $books->stock_qty = $request->stock_qty;
        
        $books->save();

        if($request->hasFile('image'))
        {
            $f = $request->file('image');
            $upload_to = 'upload/images';
    
            $relative_path = $upload_to.'/'.$f->getClientOriginalName();
            $absolute_path = public_path().'/'.$upload_to;
    
            $f->move($absolute_path, $f->getClientOriginalName());
            $books->image_url = $relative_path;
            $books->save();
        }
        
    
        return redirect('book')
        ->with('ok', 'True')
        ->with('msg', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    public function insert(Request $request) {

        $rules = array (
            'name' => 'required',
            'price' => 'numeric',
            'typebook_id' => 'required|numeric',
            'stock_qty' => 'numeric',
        );

        $messages = array(
            'required' => 'Please enter name',
            'numeric' => 'Please enter price',
        );

        $id = $request->id;
        $temp = array (
            'name' => $request->name,
            'price' => $request->price,
            'typebook_id' => $request->typebook_id,
            'stock_qty' => $request->stock_qty
        );

        $validator = Validator::make($temp, $rules, $messages);
        if ($validator->fails()) {
            return redirect('book/edit/' . $id)
            ->withErrors($validator)
            ->withInput();
        }

        $books = new book();
        $books->name = $request->name;
        $books->price = $request->price;
        $books->typebook_id = $request->typebook_id;
        $books->stock_qty = $request->stock_qty;
        
        $books->save();

        if($request->hasFile('image'))
        {
            $f = $request->file('image');
            $upload_to = 'upload/images';
    
            $relative_path = $upload_to.'/'.$f->getClientOriginalName();
            $absolute_path = public_path().'/'.$upload_to;
    
            $f->move($absolute_path, $f->getClientOriginalName());
            $books->image_url = $relative_path;
            $books->save();
        }


        return redirect('book')
        ->with('ok', 'True')
        ->with('msg', 'บันทึกข้อมูลเรียบร้อยแล้ว');
        
    }

    public function remove($id) {
        book::find($id)->delete();
        return redirect('product')
        ->with('ok', 'True')
        ->with('msg', 'ลบข้อมูลเรียบร้อยแล้ว');

    }


}
