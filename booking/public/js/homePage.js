$(".automatic-back").click(function () {
    $(".automatic").hide();
    $(".home-page-select").show();
});

$(".btn-back-top").click(function () {
    $(".automatic").hide();
    $(".comparison_results").hide();
    $(".home-page-select").show();
});

function fileValidation() {
    var fileInput = document.getElementById('file-select');
    var filePath = fileInput.value;
    console.log(filePath);
    // Allowing file type
    var allowedExtensions = /(\.pdf)$/i;
    if (!allowedExtensions.exec(filePath)) {
        toastr.error('Invalid file type');
        fileInput.value = '';
        return false;
    }
}

function validate() {
    var fileInput =
        document.getElementById('file-select');
    if (fileInput.files.length === 0) {
        toastr.warning("Attachment Required");
        return false;
    }
}