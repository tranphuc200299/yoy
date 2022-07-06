@extends('client.layout.homePage')
@section('content')
<form class="home-Page_content home-page-select  mt-4" action="{{route('handlerExport.home')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal-content form-homePage"  id="form_page">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">何をしますか？</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-check">
                    <input type="radio" class="form-check-input" value="0" id="customControlValidation1"
                           name="survey_type"
                           required checked>
                    <label class="form-check-label mb-0" for="customControlValidation1">一覧表・物理データシート照合</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" value="1" id="customControlValidation2"
                           name="survey_type"
                           required>
                    <label class="form-check-label mb-0" for="customControlValidation2"> 一覧表・物理・力学データシート照合</label>
                </div>
                <div class="form-file float-left mt-4">
                    <input type="file" name="file" value="file" class="file_upload" onchange="return fileValidation()"
                           id="file-select"><br>
                   <span class="form-message mt-4" style="color:red;font-weight: 500;"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-home-page-next btn-save" onclick="return validate()">Next</button>
            </div>
        </div>
    </div>
    @include('client.modal.end-of-comparison')

</form>
@include('client.modal.modal-automatic-collation')
@endsection
@push('scripts')
<script>
    function loadDataAjax(data) {
        let survey_type = $('input[name="survey_type"]:checked').val();
        let survey_type_comparison =$('input[name="survey_type_comparison"]:checked').val();
        survey_type_comparison =survey_type
        $(".survey_type_highlight").val(survey_type_comparison);
        let myFile = document.getElementById("file-select");
        let file_page = myFile.files[0];
        data.append('survey_type', survey_type);
        data.append("file",myFile.files[0]);
        data.append('_token',"{{csrf_token()}}");
    }

     $('.comparison_results').hide();
     $('.btn-home-page-next').on('click', function (event)  {
         event.preventDefault();
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
                $(".form-homePage").hide();
                $(".automatic").show();
                $(".fileName").html(data.filename);
                $(".file-name-comparison-error").html(data.filename);
                $(".survey_subject").html(data.survey_subject);
                let samplesArr =  data.samples;
                let SampleStr = ' ';
                samplesArr.forEach(function (e) {
                    $(".samples").html(SampleStr += e + '</br>');
                });
                form_page.find('.btn-save').prop('disabled', false);
                form_page.find('.btn-save').html('Next');
            }, error: function (error) {
                console.log(error);
                if(error.status === 400){
                    $(".form-message").html('Invalid Format');
                }
                form_page.find('.btn-save').prop('disabled', false);
                form_page.find('.btn-save').html('Next');
            }
        });
   })
    $(".automatic").hide();
    $('.btn-show-compare-next').on('click', function (event)  {
        let data = new FormData();
        let form_compare = $(this).parents('#form_compare');
        loadDataAjax(data);
        // let myFile = document.getElementById("file-select");
        // let file_page = myFile.files[0];
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
                var data = JSON.parse(response);
            if(data.total == 0){
                $('.comparison_results').show();
                $('.comparison-success').show();
                $('.comparison-error').hide();
                $('.automatic').hide();
                $('.btn-back-top').show();

                form_compare.find('.btn-save').prop('disabled', false);
                form_compare.find('.btn-save').html('Next');
            }
            if(data.total > 0){
                $('.comparison_results').show();
                $('.automatic').hide();
                $('.comparison-success').hide();
                $('.comparison-error').show();
                console.log(data);
                let samplesArr =  data.mismatches;
                let SampleStr = ' ';
                let data_type = 'data type :'
                console.log(samplesArr);
                samplesArr.forEach(function (e) {
                    $(".data_type").html(SampleStr+= e.data_type + '</br>');  
                    $(".sample_number").html(SampleStr+= e.sample_number + '</br>');   
                    $(".content_error").html(SampleStr+= e.content + '</br>');  
                                          
                });

                form_compare.find('.btn-save').prop('disabled', false);
                form_compare.find('.btn-save').html('Next');
            }
            
            }, error: function (error) {
                console.log(error);
            }
        });
    })
</script>

@endpush


