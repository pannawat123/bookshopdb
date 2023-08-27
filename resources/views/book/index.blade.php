@extends('layouts.master')
@section('title', 'Phoneshop')
@section('content')
    <div class="container">
        <h1>รายการหนังสือ</h1>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title "><strong>รายการ</strong></div>
            </div>
            <div class="panel-body">
                <a href="{{URL::to('book/edit')}}" class="btn btn-success pull-right">เพิ่มข้อมูล</a>
                <form action="{{URL::to('book/search')}}" method="post" class="form-inline">
                    {{ csrf_field() }}
                    <input type="text" name="q" class="form-control" placeholder="พิมพ์รหัสหรือชื่อเพื่อค้นหา">
                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                </form>
                <br>
                <table class="table table-bordered bs_table">
                    <thead>
                        <tr>
                            <th>รูป</th>
                            <th>รหัส</th>
                            <th>ชื่อสินค้า</th>
                            <th>ประเภท</th>
                            <th>ราคา</th>
                            <th>คงเหลือ</th>
                            <th>การทำงาน</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $p)
                            <tr>
                                <td><img src="{{ asset ($p->image_url) }}" alt="" width="100"></td>

                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->typebook->name }}</td>
                                <td class="bs-price">{{ number_format($p->price, 2) }}</td>
                                <td class="bs-price">{{ number_format($p->stock_qty, 0) }}</td>
                                
                                <td class="bs-center">
                                    <a href="{{ URL::to('book/edit/' . $p->id) }}" class="btn btn-info">
                                        <i class="fa fa-edit"></i> แก้ไข</a>
                                    <a href="#" class="btn btn-danger btn-delete" id-delete="{{ $p->id }}">
                                        <i class="fa fa-trash"></i> ลบ</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                    <tr>
                        <th colspan="4">รวม</th>
                        <th class="bs-price">{{ number_format($books->sum('price'), 2) }}</th>
                        <th class="bs-price">{{ number_format($books->sum('stock_qty'), 0) }}</th>
                    </tr>

                </table>
            </div>
            
            <div class="panel-footer ">
                <span>แสดงข้อมูลจํานวน {{ count($books) }} รายการ</span>
                
            </div>

            <div class="panel-one">
                {{ $books->links() }}
            </div>

        </div>

    </div>

    <script>
        $(document).ready(function() {
            $('.btn-delete').click(function() {
                var id = $(this).attr('id-delete');
                if (confirm('คุณต้องการลบข้อมูลใช่หรือไม่')) {
                    window.location.href = '/book/remove/' + id;
                }
            });
        });
    </script>
@endsection
