<!-- Modal -->
@extends('client.layout.homePage')
@section('content')
<div class="home-Page_content home-page-select">
    <form class="modal-content form-homePage"  method="post" enctype="multipart/form-data" id="form_page">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Bạn sẽ làm ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-check">
                    <input type="radio" class="form-check-input" value="0" id="customControlValidation1"
                           name="survey_type"
                           required checked>
                    <label class="form-check-label mb-0" for="customControlValidation1">Đối chiếu data sheet bảng list *
                        vật lý</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" value="1" id="customControlValidation2"
                           name="survey_type"
                           required>
                    <label class="form-check-label mb-0" for="customControlValidation2">Đối chiếu data sheet bảng list *
                        vật lý * cơ học</label>
                </div>
                <div class="form-file float-left mt-4">
                    <input type="file" name="file" value="file" class="file_upload" id="file-select"><br>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-home-page-next btn-save">Next</button>
            </div>
        </div>
    </form>
</div>
@include('client.modal.modal-automatic-collation')
@include('client.modal.end-of-comparison')
@endsection
@push('scripts')
<script>
    function loadDataAjax(data) {
        let survey_type = $('input[name="survey_type"]:checked').val();
        console.log(survey_type);
        let myFile = document.getElementById("file-select");
        data.append('survey_type', survey_type);
        data.append("file",myFile.files[0]);
    }
     $(".automatic").hide();
    $('.comparison_results').hide();
     $('.btn-home-page-next').on('click', function (event)  {
         let data = new FormData();
         let form_page = $(this).parents('#form_page');
         loadDataAjax(data);
        $.ajax({
          "url": "https://searchapi.ntq.solutions/confirm-before",
          "method": "POST",
          "timeout": 0,
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "data": data,
           beforeSend: function() {
                    form_page.find('.btn-save').html('<i class="fas fa-spinner fa-pulse"></i>');
                },
           success: function(response) {
                  var data = JSON.parse(response);
                  console.log(data);
                  form_page.find('.btn-save').prop('disabled', false);
                  form_page.find('.btn-save').html('Next');
                  $(".home-page-select").hide();
                  $(".automatic").show();
                  $(".fileName").html(data.filename);
                  $(".survey_subject").html(data.survey_subject);
                  $(".samples").html((data.samples));
                  toastr.success('call api success');
            }, error: function (error) {
                console.log(error);
            }
        });
   })

    $('.btn-show-compare-next').on('click', function (event)  {
        let data = new FormData();
        let form_compare = $(this).parents('#form_compare');
        loadDataAjax(data);
        $.ajax({
            "url": "https://searchapi.ntq.solutions/compare",
            "method": "POST",
            "timeout": 0,
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
            "data": data,
            beforeSend: function() {
                form_compare.find('.btn-save').html('<i class="fas fa-spinner fa-pulse"></i>');
            },
            success: function(response) {
                console.log('aaaa');
                var data = JSON.parse(response);
                console.log(data);
                $('.automatic').hide();
                $('.comparison_results').show();
                $('.btn-back-top').show();
                form_compare.find('.btn-save').prop('disabled', false);
                form_compare.find('.btn-save').html('Next');
                toastr.success('call api compare success');

            }, error: function (error) {
                console.log(error);
            }
        });
    })
</script>

@endpush


