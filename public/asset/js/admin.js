
jQuery(function () {

});

$(document)
    .on("click", "button.open-add-category", function () {
        $("div.category-modal").find("h1").text("Add category");
        $("#accept-button").addClass("save-category").removeClass("edit-category").text("Save").attr("data-id", "");
        $("div.category-modal").modal("show");
    })
    .on("click", "button.save-category", function () {
        addCategory();
    }).on("click", "span.open-edit-category", function () {

        let record = $(this).siblings();
        let name = record.find("h5").text();
        let thumbnail = record.find("img").attr("src");
        let description = record.find("p").text();

        $("input#name").val(name);
        $("input#old_thumbnail").val(thumbnail);
        $("textarea#description").val(description);

        $("div.category-modal").find("h1").text("Edit category");
        $("#accept-button").removeClass("save-category").addClass("edit-category").text("Save change").attr("data-id", $(this).attr("data-id"));
        $("div.category-modal").modal("show");



    }).on("click", ".edit-category", function () {
        let id = $(this).attr("data-id");
        let name = $("input#name").val();
        let description = $("textarea#description").val();
        let thumbnail = $("input#thumbnail")[0].files[0];
        let oldThumbnail = $("input#old_thumbnail").val();

        editCategory(id, name, description, thumbnail, oldThumbnail);
    });

function toastErrorMessage(response) {
    $("div.toast-header").addClass("bg-danger text-white").find("strong.toast-status").text(response.status);
    $("div.toast-body").addClass("bg-danger text-white").text(response.msg);
    $("div.toast").toast("show");
}
function toastSuccessMessage(response) {
    $("div.toast-header").addClass("bg-success text-white").find("strong.toast-status").text(response.status);
    $("div.toast-body").addClass("bg-success text-white").text(response.msg);
    $("div.toast").toast("show");
}

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
                    toastErrorMessage(response);
                    return;
                }
                $("div.category-modal").modal("hide");
                toastSuccessMessage(response);
                $("div.category-list").append(response.view);
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    } catch (error) {
        console.log(error);
    }
}
function editCategory(id, name, description, thumbnail, oldThumbnail) {

    let form = new FormData();
    form.append("id", id);
    form.append("name", name);
    form.append("description", description);
    form.append("thumbnail", thumbnail);
    form.append("old_thumbnail", oldThumbnail);

    try {
        $.ajax({
            url: "/api/admin/edit-category",
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
                    toastErrorMessage(response);
                    return;
                }
                $("div.category-modal").modal("hide");
                toastSuccessMessage(response);
                $("div.category-list").find("div.category-item[data-id='" + id + "'").replaceWith(response.view);
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    } catch (error) {
        console.log(error);
    }
}