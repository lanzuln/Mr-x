<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create education</h5>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">

                                <label class="form-label">duration</label>
                                <input type="text" class="form-control" id="duration">

                                <label class="form-label">institutionName</label>
                                <input type="text" class="form-control" id="institutionName">

                                <label class="form-label">field</label>
                                <input type="text" class="form-control" id="field">

                                <label class="form-label">details</label>
                                <textarea name="" class="form-control" id="details" cols="30" rows="10"></textarea>



                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <button onclick="create()" class="btn btn-sm  btn-success">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
           async function create() {
            // debugger;
            let create_duration = document.getElementById('duration').value;
            let create_institutionName = document.getElementById('institutionName').value;
            let create_field = document.getElementById('field').value;
            let create_details= document.getElementById('details').value;


            if (create_duration.length === 0) {
                errorToast("Required !")
            } else if (create_institutionName.length === 0) {
                errorToast("Required !")
            }
            else if (create_field.length === 0) {
                errorToast("Required !")
            }
            else if (create_details.length === 0) {
                errorToast("Required !")
            } else {

                document.getElementById('modal-close').click();
                showLoader();
                let res = await axios.post("/create-education", {
                    duration : create_duration,
                    institutionName : create_institutionName,
                    create_field : create_field,
                    details : create_details
                });
                hideLoader();

                if (res.data['status'] == 'ok') {
                    successToast('Request completed');
                    document.getElementById("save-form").reset();
                    getList();
                } else {
                    errorToast("Request fail !")
                }
            }
        }
</script>
