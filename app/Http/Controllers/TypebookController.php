<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\typebook;
use Config , Validator;

class TypebookController extends Controller
{
    public function index () {
        $typebooks = typebook::all();
        return view('typebook/index', compact('typebooks'));
    }

    public function search(Request $request) {
        $query = $request->q;
        
        if($query) {
        $typebooks = typebook::where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('id', 'LIKE', '%' . $query . '%')
            ->get();
        } else {
            $typebooks = typebook::all();
        }

        return view('typebook/index', compact('typebooks'));
    }

    public function edit ($id = null) {

        if ($id) {
            $typebooks = typebook::find($id); return view('typebook/edit')
            ->with('typebooks', $typebooks);
        } else {
            return view('typebook/add');
        }
        
    }

    public function update (Request $request) {
        $rules = [
            'name' => 'required',
        ];

        $messages = array(
            'required' => 'Please enter name',
            'numeric' => 'Please enter price',
        );

        $id = $request->id;
       
        $temp = array(
            'name' => $request->name, 
        );

        $validator = Validator::make($temp, $rules, $messages);
        if($validator->fails()) {
            return redirect('typebook/edit/' . $id)
            ->withErrors($validator)
            ->withInput();
        }

        $typebooks = typebook::find($id);
        $typebooks->name = $request->name;
        $typebooks->save();

        return redirect('typebook')
        ->with('ok' , 'true')
        ->with('msg' ,'บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    public function insert (Request $request) {
        $rules = [
            'name' => 'required',
        ];

        $messages = array(
            'required' => 'Please enter name',
            'numeric' => 'Please enter price',
        );

        $temp = array(
            'name' => $request->name, 
        );

        $id = $request->id;

        $validator = Validator::make($temp, $rules, $messages);
        if($validator->fails()) {
            return redirect('typebook/edit/' . $id)
            ->withErrors($validator)
            ->withInput();
        }

        $typebooks = new typebook();
        $typebooks->name = $request->name;
        $typebooks->save();
    
    
        return redirect('typebook')
        ->with('ok' , 'true')
        ->with('msg' ,'บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    public function remove($id) {
        typebook::find($id)->delete();
        return redirect('typebook')
        ->with('ok', 'True')
        ->with('msg', 'ลบข้อมูลเรียบร้อยแล้ว');
  }







}
