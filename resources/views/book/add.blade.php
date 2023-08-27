@extends('layouts.master')
@section('title', 'bookShop')
@section('content')
    {!! Form::open(array (
        'action' => 'App\Http\Controllers\BookController@insert',
        'method' => 'post',
        'enctype' => 'multipart/form-data',
     )) !!}


<h1>เพิ่มข้อมูลหนังสือ</h1>
<ul class="breadcrumb">
    <li><a href="{{ URL::to('book') }}">หน้าแรก</a></li>
    <li class="active">เพิ่มข้อมูลหนังสือ </li>
</ul>

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif


<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            <strong>เพิ่มข้อมูล</strong>
        </div>
    </div>

    <div class="panel-body">
        <table>
           
           

            <tr>
                <td>{{ Form::label('name', 'ชื่อหนังสือ') }}</td>
                <td>{{ Form::text('name', Request::old('name'), ['class' => 'form-control']) }}</td>
            </tr>

           <tr>
             <td>{{ Form::label('typebook_id', 'ประเภทหนังสือ') }}</td>
             <td>{{ Form::select('typebook_id', $typebooks, Request::old('typebook_id'), ['class' => 'form-control']) }}</td>
           </tr>

            <tr>
                 <td>{{ Form::label('price', 'ราคา') }}</td>
                 <td>{{ Form::text('price', Request::old('price'), ['class' => 'form-control']) }}</td>
            </tr>

            <tr>
                <td>{{ Form::label('stock_qty', 'จำนวน') }}</td>
                <td>{{ Form::text('stock_qty', Request::old('stock_qty'), ['class' => 'form-control']) }}</td>
            </tr>

            <tr>
                <td>{{ Form::label('image', 'เลือกรูปภาพสินค้า ') }}</td>
                <td>{{ Form::file('image') }}</td>
            </tr>

            

           

        </table>
        <br>
        <div class="panel-footer">
            <button type="reset" class="btn btn-danger">ยกเลิก</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
        </div>
    </div>
</div>

    {!! Form::close() !!}
@endsection
