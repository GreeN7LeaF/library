@extends('layouts.app')

@section('content')
    @include('inc.message')
    {{-- <div class="row mb-4">
        <div class="col card-wrapper">
            <a class="card px-4 py-4 rounded-lg form-border form-hover" href="/categories?parent=books">
                <h5 class="">
                    Thể Loại
                </h5>
            </a>
        </div>
        <div class="col card-wrapper">
            <a class="card px-4 py-4 rounded-lg form-border form-hover" href="/authors?parent=book">
                <h5 class="">
                    Tác Giả
                </h5>
            </a>
        </div>
        <div class="col card-wrapper">
            <a class="card px-4 py-4 rounded-lg form-border form-hover" href="/new?parent=book">
                <h5 class="">
                    Mới Nhập
                </h5>
            </a>
        </div>
    </div> --}}
    <div class="row">
        <div class="col">
            <div class="d-flex flex-row align-middle gap-3">
                <h3 class="mb-4">Thể loại</h3>
                @if(Auth::user()->maquyen == 1)
                {{-- thủ thư --}}
                    <button class="btn btn-default btn_size">
                        <a href="/books/create">Thêm</a>
                    </button>
                @endif
            </div>
            <div class="table-wrapper form-border form-hover
             mt-1/2 capitalize">
                @if(count($categories) > 0)
                    @foreach($categories as $category)
                        <a href="/categories/{{$category->id}}" class="my-2 py-2 btn">
                                {{ $category->tentl }}
                        </a>
                    @endforeach
                @else
                    <div class="">Không có sách nào</div>
                @endif
            </div>
        </div>
        <div class="col-9">
            <div class="d-flex flex-row gap-3">
                <h1 class="mb-4">Danh mục sách</h1>
                @if(Auth::user()->maquyen == 1)
                {{-- thủ thư --}}
                    <button class="btn btn-default btn_size">
                        <a href="/books/create">Thêm</a>
                    </button>
                @endif
            </div>
            <div class="table-wrapper form-border form-hover">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Mã tựa sách</th>
                        <th scope="col">Tựa sách</th>
                        <th scope="col">Ngày nhập</th>
                        <th scope="col">Tên tác giả</th>
                        <th scope="col">Thể loại</th>
                        {{-- <th scope="col">Thao tác</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                        @if(count($booktitles) > 0)
                            @foreach($booktitles as $booktitle)
                            <tr>
                                    <td> 
                                        <a href="{{ URL::route('books.show', $booktitle->id) }}"> {{$booktitle->id}}</a>
                                    </td>
                                    <td>
                                        <a href={{ URL::route('books.show', $booktitle->id) }}  class="text-capitalize"> {{$booktitle->tents}}</a>
                                    </td>
                                    <td>
                                        <a href={{ URL::route('books.show', $booktitle->id) }}> {{$booktitle->created_at}}</a>
                                    </td>
                                    <td>
                                        <a href={{ URL::route('authors.show', $booktitle->tacgia) }}  class="text-capitalize"> 
                                            {{$authors[$booktitle->tacgia - 1]->tentg}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="./categories/{{$booktitle->theloai}}"  class="text-capitalize"> 
                                            {{$categories[$booktitle->theloai - 1]->tentl}}
                                        </a>
                                    </td>
                            </tr>
                            @endforeach
                        @else
                            <div class="">Không có sách nào</div>
                        @endif
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    
@endsection