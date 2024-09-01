@extends('backend.master_page')
@section('menu-contents')
    <button type="button" class="btn btn-primary m-2 open-add-category">
        <i class="fa fa-plus" aria-hidden="true"></i> Add category
    </button>
    <div class="d-flex flex-wrap category-list"> </div>
    @include('backend.category.modal.add_category')
    @include('message.toast')
@endsection
@section('script')
    <script>
        jQuery(function() {
            $.ajax({
                url: "/api/admin/get-category",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                beforeSend: function() {},
                success: function(response) {

                    if (response.status != "success") {
                        return;
                    }

                    let records = "";
                    response.categories.forEach(category => {
                        records += categryRecords(category);
                    });
                    $("div.category-list").html(records);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    </script>
@endsection
