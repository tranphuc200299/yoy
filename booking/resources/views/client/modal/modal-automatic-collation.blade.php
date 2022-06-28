<div class="home-Page_content automatic">
    <form class="modal-content" method="post" enctype="multipart/form-data" id="form_compare">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Start đối chiếu tự động </h5>
                <input type="hidden" value="" name="survey_type" class="survey_type_compare">
                <input type="hidden"  name="file" class="file_compare">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
            </div>
            <div class="modal-footer automatic">
                <button type="button" class="btn btn-primary float-left automatic-back">No (Back)</button>
                <button type="button" class="btn btn-primary btn-show-compare-next btn-save">OK</button>
            </div>
        </div>
    </form>
</div>
