@extends('backend.master_page')
@section('menu-contents')
    <h1 class="text-dark fs-3 mt-3">Category</h1>
    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa fa-plus" aria-hidden="true"></i> Add category
    </button>
    <div class="d-flex flex-wrap category-list">
       @include('backend.category.category_record')
    </div>
    @include('backend.category.modal.add_category')
    @include('message.toast')
@endsection
