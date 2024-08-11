@foreach ($categories as $category)
    <div class="col-3 p-2 category-item position-relative d-flex justify-content-end">
        <div class="w-100 h-100 bg-primary rounded d-flex justify-content-center flex-column align-items-center">
            <img class="mt-1" src="{{ $category['thumbnail'] }}" alt="">
            <h5 class="fw-semibold pt-3 text-white">{{$category['name']}}</h5>
        </div>
        <span class="position-absolute p-1">
            <img src="{{ asset('/asset/icon/edit.svg') }}" alt="">
        </span>
    </div>
@endforeach
