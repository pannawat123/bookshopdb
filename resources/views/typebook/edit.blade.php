@extends('layouts.master')
@section('title', 'bookshop')
@section('content')
    <h1>แก้ไขประเภท</h1>
    <ul class="breadcrumb">
        <li><a href="{{ URL::to('typebook') }}">ประเภท</a></li>
        <li class="active">แก้ไขประเภท</li>
    </ul>

    {!! Form::model($typebooks, [
        'action' => 'App\Http\Controllers\TypebookController@update',
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

    <input type="hidden" name="id" value="{{ $typebooks->id }}">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <strong>ประเภท</strong>
            </div>
        </div>

    <div class="panel-body">
        <table>
            <tr>
                <td>{{ Form::label('id', 'รหัสหนังสือ') }}</td>
                <td>{{ Form::text('id', $typebooks->id, ['class' => 'form-control', 'readonly']) }}</td>
            </tr>   

          <tr>
            <td>{{ Form::label('name', 'ชื่อหนังสือ') }}</td>
            <td>{{ Form::text('name', $typebooks->name, ['class' => 'form-control']) }}</td>
            </tr>


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
