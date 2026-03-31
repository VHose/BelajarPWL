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
                        <a href="#">Category Form</a>
                    </li>
                </ul>
            </div>
            {{-- Tambahin isi nya di bagian ini buat isi nya --}}
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="POST">
                        {{-- tiap form wajib ada csrf --}}
                        @csrf
                        <div class=form-group>
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="Enter category name" required value="{{ old('name') }}"> {{-- name samain dengan nama kolom --}}
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class=form-group>
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" rows="2"
                                maxlength="150" name="description" required value="{{ old('description') }}"></textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
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
