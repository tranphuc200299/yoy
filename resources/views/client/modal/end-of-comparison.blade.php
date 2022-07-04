
<div class="home-Page_content comparison_results mt-4">
    <form class="modal-content"  method="post" enctype="multipart/form-data" id="export-compare">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Kết thúc đối chiếu </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="comparison-success">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>filename</th>
                            <td class="fileName"></td>
                        </tr>
                        <tr>
                            <th>survey_subject</th>
                            <td class="survey_subject"></td>
                        </tr>
                        <tr>
                            <th>
                                samples
                            </th>
                            <td>
                                <div class="samples">

                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="col-12">
                        <label for="form-controll"><b>Sẽ export PDF đã check nhé ?</b></label>
                    </div>
                </div>
                <div class="comparison-error">
                    <dib class="file-name-error">
                        <h4>File Name</h4>
                        <label for="form-controller" class="file-name-comparison"></label>
                    </dib>
                    <h5>Các item sau không match</h3>
                    <ul class="list-error">
                        <label for="sample_number">- Sample_number</label>
                        <li class="sample_number"></li>

                        <label for="data_type"> - Data Type</label>
                        <li class="data_type"></li>
                        
                        <label for="content_error"> - Content Error</label>
                        <li class="content_error"></li>
                    </ul>
                    <h6>Có export PDF đã check không ?</h6>
                </div>
       
            </div>
            <div class="modal-footer compare">
                <button type="submit" class="btn btn-primary float-left btn-export-compare">Yes</button>
                <button type="button" class="btn btn-primary btn-back-top">No</button>
            </div>
        </div>
    </form>
</div>

