
jQuery(function () {
});

$(document).on("click", "button.save-category", function () {

    let name = $("input#name").val();
    let description = $("textarea#description").val();
    let thumbnail = $("input#thumbnail")[0].files[0];

    let form = new FormData();
    form.append("name", name);
    form.append("description", description);
    form.append("thumbnail", thumbnail);
    
    try {
        $.ajax({
            url: "/api/admin/add-category",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: form,
            processData: false,
            contentType: false,
            beforeSend: function () { },
            success: function (response) {
                console.log(response);
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    } catch (error) {
        console.log(error);
    }

});