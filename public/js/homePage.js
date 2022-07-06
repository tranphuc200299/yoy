$(".automatic-back").click(function () {
    $(".automatic").hide();
    $(".form-homePage").show();
});

$(".btn-back-top").click(function () {
    $(".automatic").hide();
    $(".comparison_results").hide();
    $(".form-homePage").show();
});

function fileValidation() {
    var fileInput = document.getElementById('file-select');
    var filePath = fileInput.value;
    console.log(filePath);
    var allowedExtensions = /(\.pdf)$/i;
    if (!allowedExtensions.exec(filePath)) {
        $(".form-message").html('Invalid file type');
        fileInput.value = '';
        return false;
    }
    else{
        $(".form-message").html(' ');
    }
}

function validate() {
    var fileInput =
        document.getElementById('file-select');
    if (fileInput.files.length === 0) {
        $(".form-message").html('Attachment Required');
        return false;
    }
}
