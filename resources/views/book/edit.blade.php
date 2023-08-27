@extends('layouts.master')
@section('title', 'bookshop')
@section('content')
    <h1>แก้ไขหนังสือ</h1>
    <ul class="breadcrumb">
        <li><a href="{{ URL::to('book') }}">หนังสือ</a></li>
        <li class="active">แก้ไขหนังสือ</li>
    </ul>

    {!! Form::model($books, [
        'action' => 'App\Http\Controllers\BookController@update',
        'method' => 'post',
        'enctype' => 'multipart/form-data',
    ]) !!}


    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
    @endif

    <input type="hidden" name="id" value="{{ $books->id }}">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <strong>หนังสือ</strong>
            </div>
        </div>

    <div class="panel-body">
        <table>

            
            <tr>
                <td>{{ Form::label('id', 'รหัสหนังสือ') }}</td>
                <td>{{ Form::text('id', $books->id, ['class' => 'form-control', 'readonly']) }}</td>
            </tr>   

          <tr>
            <td>{{ Form::label('name', 'ชื่อหนังสือ') }}</td>
            <td>{{ Form::text('name', $books->name, ['class' => 'form-control']) }}</td>
            </tr>

            <tr>
                <td>{{ Form::label('typebook_id', 'ประเภทหนังสือ') }}</td>
                <td>{{ Form::select('typebook_id', $typebooks, $books->typebook_id, ['class' => 'form-control']) }}</td>

            </tr>

            <tr>
                <td>{{ Form::label('price', 'ราคา') }}</td>
                <td>{{ Form::text('price', $books->price, ['class' => 'form-control']) }}</td>

            </tr>

            <tr>
                <td>{{ Form::label('stock_qty', 'จำนวน') }}</td>
                <td>{{ Form::text('stock_qty', $books->stock_qty, ['class' => 'form-control']) }}</td>
            </tr>

            <tr>
                <td>{{ Form::label('image', 'เลือกรูปภาพสินค้า ') }}</td>
                <td>{{ Form::file('image') }}</td>
            </tr>

            @if ($books->image_url)
            <tr>
                <td>{{ Form::label('image', 'รูปภาพสินค้า ') }}</td>
                <td><img src="{{asset($books->image_url) }}" alt="" width="100"></td>
            </tr>
            @endif

            
           


        </table>
    </div>
    <div class="panel-footer">
        <button type="reset" class="btn btn-danger">ยกเลิก</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
    </div>

</div>
</div>



    {!! Form::close() !!}
@endsection
