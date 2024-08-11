
jQuery(function () {
    getCategory(); // TODO
});

$(document).on("click", "button.save-category", function () {
    addCategory();
}).on("click", ".admin-category", function () {
    // TODO
});

function addCategory() {
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

                if (response.status != "success") {
                    $("div.toast-header").addClass("bg-danger text-white").find("strong.toast-status").text(response.status);
                    $("div.toast-body").addClass("bg-danger text-white").text(response.msg);
                    $("div.toast").toast("show");
                    return;
                }
                $("div.category-modal").modal("hide");
                $("div.toast-header").addClass("bg-success text-white").find("strong.toast-status").text(response.status);
                $("div.toast-body").addClass("bg-success text-white").text(response.msg);
                $("div.toast").toast("show");
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    } catch (error) {
        console.log(error);
    }
}
function getCategory() {
    try {
        $.ajax({
            url: "/api/admin/get-category",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                "from": "Web"
            },
            beforeSend: function () { },
            success: function (response) {
                if (response.status != "success") {
                    // Message
                    return;
                }
                $("div.category-list").html(response.view);
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    } catch (error) {
        console.log(error);
    }
}