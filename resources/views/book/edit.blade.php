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
                  <a href="#">Edit Form</a>
                </li>
              </ul>
            </div>
            {{-- Tambahin isi nya di bagian ini buat isi nya --}}
            <div class="card">
              <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                  @csrf 
                  @method('PUT')
                  <div class=form-group>
                    <label for="isbn">ISBN</label>
                    <input type="string" class="form-control" id="isbn" name="isbn" readonly value="{{ $book->isbn }}">
                  </div> 
                  <div class=form-group>
                    <label for="cover">Cover</label>
                    <input type="file" class="form-control" id="cover" name="cover">
                  </div>
                  <div class=form-group>
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter book title" autofocus required value="{{ $book->title }}" maxlength="100">
                  </div> 
                    <div class=form-group>
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" name="author" placeholder="Enter book author" required value="{{ $book->author }}" maxlength="60">
                    </div>
                    <div class=form-group>
                      <label for="description">Description</label>
                      <textarea type="text" class="form-control" id="description" rows="2" maxlength="150" name="description">{{ $book->description }}
                      </textarea>
                    </div>
                    <div class=form-group>
                        <label for="publish_year">Publish Year</label>
                        <input type="number" class="form-control" id="publish_year" name="publish_year" placeholder="Enter publish year" required value="{{ $book->publish_year }}">
                    </div>
                  <button type="submit" class="btn btn-primary">Update</button>
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