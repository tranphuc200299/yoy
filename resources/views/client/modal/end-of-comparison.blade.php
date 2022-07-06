
<div class="home-Page_content comparison_results mt-4">
    <form class="modal-content"  method="post" enctype="multipart/form-data" id="export-compare">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">照合終了</h5>
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
                        <label for="form-controll"><b>チェックしたPDFを出力しますか。</b></label>
                    </div>
                </div>
                <div class="comparison-error">
                    <dib class="file-name-error">
                        <h6><b> ファイル名：</b></h6>
                        <label for="form-controller" class="file-name-comparison-error"></label>
                    </dib>
                    <h6><b>には下記の項目が一致していません。</b></h6>
                    <ul class="list-error">
                    
                        <li class="content_error"></li>
                        <br>
                        <li>
                            <b>
                                 チェックしたPDFを出力しますか。 ?
                            </b>                     
                        </li>
                    </ul>
                </div>
       
            </div>
            <div class="modal-footer compare">
                <button type="submit" class="btn btn-primary float-left btn-export-compare">Yes</button>
                <button type="button" class="btn btn-primary btn-back-top">No</button>
            </div>
        </div>
    </form>
</div>

