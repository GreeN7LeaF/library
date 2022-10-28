@extends('layouts.app')

@section('content')
    @include('inc.message')
    <a href="/exchange" class="">Trở lại</a>
    <div class="d-flex flex-row justify-content-between">
        <h1 class="mb-4">Danh mục mượn sách</h1>
        <button class="btn btn-default btn_size">
            <a href="/exchange/borrow/create">Thêm</a>
        </button>
    </div>
    <div class="table-wrapper form-border form-hover">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Mã sách</th>
                <th scope="col">Tên sách</th>
                <th scope="col">Ngày nhập</th>
                <th scope="col">Trị giá</th>
                <th scope="col">Số lượng</th>
                {{-- <th scope="col">Thao tác</th> --}}
              </tr>
            </thead>
            <tbody>
                {{-- @if(count($books) > 0)
                    @foreach($books as $book) --}}
                    <tr>
                            <td> 
                                {{-- <a href="./book/{{$book->id}}"> {{$book->id}}</a> --}}
                            </td>
                            <td>
                                {{-- <a href="./book/{{$book->id}}"> {{$book->tensach}}</a> --}}
                            </td>
                            <td>
                                {{-- <a href="./book/{{$book->id}}"> {{$book->ngaynhap}}</a> --}}
                            </td>
                            <td>
                                {{-- <a href="./book/{{$book->id}}"> {{$book->trigia}}</a> --}}
                            </td>
                            <td>
                                {{-- <a href="./book/{{$book->id}}"> {{$book->soluong}}</a> --}}
                            </td>
                            {{-- <td>
                                <button class="btn btn-default">
                                    <a class="btn_a" href="./book/{{$book->id}}">Chỉnh sửa</a>
                                </button>
                                <button class="btn btn-danger">
                                    <a class="btn_a" href="./book/{{$book->id}}">Xóa</a>
                                </button>
                            </td> --}}
                    </tr>
                    {{-- @endforeach
                @else
                    <div class="">Không có sách nào</div>
                @endif --}}
            </tbody>
          </table>
    </div>
    
@endsection