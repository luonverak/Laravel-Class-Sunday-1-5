@extends('backend.master_page')
@section('menu-contents')
    <button type="button" class="btn btn-primary m-2 open-add-category">
        <i class="fa fa-plus" aria-hidden="true"></i> Add category
    </button>
    <div class="d-flex flex-wrap category-list">
        @foreach ($categories as $category)
            @include('backend.category.category_record')
        @endforeach
    </div>
    @include('backend.category.modal.add_category')
    @include('message.toast')
@endsection
