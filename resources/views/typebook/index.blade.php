@extends('layouts.master')
@section('title', 'bookshop')
@section('content')
<div class="container">
    <h1>ประเภทสินค้า</h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title"><strong>ประเภทสินค้า</strong></div>
        </div>
        <div class="panel-body">
            <a href="{{URL::to('typebook/edit')}}" class="btn btn-success pull-right">เพิ่มข้อมูล</a>
            <form action="{{URL::to('typebook/search')}}" method="post" class="form-inline">
                {{ csrf_field() }}
                <input type="text" name="q" class="form-control" placeholder="พิมพ์รหัสหรือชื่อเพื่อค้นหา">
                <button type="submit" class="btn btn-primary">ค้นหา</button>
            </form>
            <br>
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>รหัส</th>
                        <th>ประเภท</th>
                        <th>การทำงาน</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($typebooks as $t)
                        <tr>
                            <td>{{ $t->id }}</td>
                            <td>{{ $t->name }}</td>
                            <td class="bs-center">
                                <a href="{{ URL::to('typebook/edit/' . $t->id) }}" class="btn btn-info">
                                    <i class="fa fa-edit"></i> แก้ไข</a>
                                <a href="#" class="btn btn-danger btn-delete" id-delete="{{ $t->id }}">
                                    <i class="fa fa-trash"></i> ลบ</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>


            </table>
        </div>
        <div class="panel-footer ">
            <span>แสดงข้อมูลจํานวน {{ count($typebooks) }} รายการ</span>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        $('.btn-delete').click(function() {
            var id = $(this).attr('id-delete');
            if (confirm('คุณต้องการลบข้อมูลใช่หรือไม่')) {
                window.location.href = '/typebook/remove/' + id;
            }
        });
    });
</script>


@endsection