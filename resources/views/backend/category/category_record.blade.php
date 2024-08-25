<div class="col-3 p-2 category-item position-relative d-flex justify-content-end">
    <div class="w-100 h-100 bg-secondary bg-opacity-25 rounded d-flex justify-content-center flex-column align-items-center">
        <img class="mt-1" src="{{ $category['thumbnail'] }}" alt="">
        <h5 class="fw-semibold pt-3 text-dark">{{ $category['name'] }}</h5>
        <p class="d-none">{{$category['description']}}</p>
    </div>
    <span class="position-absolute open-edit-category p-1" role="button" data-id="{{ Encryption($category['id']) }}">
        <img src="{{ asset('/asset/icon/edit.svg') }}" alt="">
    </span>
</div>