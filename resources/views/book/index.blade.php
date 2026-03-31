@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Dashboard</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Pages</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Book Page</a>
                    </li>
                </ul>
            </div>
            {{-- Tambahin isi nya di bagian ini buat isi nya --}}
            <div class="card">
                @if (Auth::user()->role_id == 1)
                    <div class="card-head">
                        <a href="{{ route('book.create') }}" class="btn btn-primary" role="button">Add Book</a>
                    </div>
                @endif
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ISBN</th>
                                <th>Gambar</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Description</th>
                                <th>Publish Year</th>
                                <th>Category</th>
                                @if (Auth::user()->role_id == 1)
                                    <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($b as $book)
                                <tr>
                                    <td>{{ $book->isbn }}</td>
                                    <td>
                                        @if ($book->cover)
                                            <img src="{{ asset('storage/uploads/' . $book->cover) }}" alt="{{ $book->title }}" width="100">
                                        @endif
                                    </td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->description }}</td>
                                    <td>{{ $book->publish_year }}</td>
                                    <td>{{ $book->category->name }}</td>
                                    @if (Auth::user()->role_id == 1)
                                        <td>
                                            <a href="{{ route('book.edit', $book->isbn) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('book.destroy', $book->isbn) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Nambah CSS --}}
@section('ExtraCSS')
@endsection

{{-- Nambah JS --}}
@section('ExtraJS')
@endsection
