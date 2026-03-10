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
              <div class="card-head">
                <a href="{{ route('category.create') }}" class="btn btn-primary" role="button">Add Category</a>
              </div>
              <div class="card-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Description</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ( $a as $category )
                      <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
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