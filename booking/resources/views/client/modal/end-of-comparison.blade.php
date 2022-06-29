
<div class="home-Page_content comparison_results">
    <form class="modal-content" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Kết thúc đối chiếu </h5>
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
            <div class="modal-footer compare">
                <button type="button" class="btn btn-primary float-left btn-export-compare">Yes</button>
                <button type="button" class="btn btn-primary btn-back-top" data-dismiss="modal">No</button>
            </div>
        </div>
    </form>
</div>

