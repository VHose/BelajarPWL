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
                  <a href="#">Category Page</a>
                </li>
              </ul>
            </div>
            {{-- Tambahin isi nya di bagian ini buat isi nya --}}
            <div class="card">
              @if (Auth::user()->role_id == 1)
              
              <div class="card-head">
                <a href="{{ route('category.create') }}" class="btn btn-primary" role="button">Add Category</a>
              </div>
              @endif
              <div class="card-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Description</th>
                      @if (Auth::user()->role_id == 1)
                      <th>Actions</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ( $a as $category )
                      <tr>
                        <td>{{ $category->idcategory }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        @if (Auth::user()->role_id == 1)
                        <td>
                          <a href="{{ route('category.edit', $category->idcategory) }}" class="btn btn-warning btn-sm">Edit</a>
                          <form action="{{ route('category.destroy', $category->idcategory) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
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