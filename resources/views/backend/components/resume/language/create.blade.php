<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create skill</h5>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">

                                <label class="form-label">Skill name</label>
                                <input type="text" class="form-control" id="name">

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
            let create_name = document.getElementById('name').value;


            if (create_name.length === 0) {
                errorToast("Required !")
            } else {

                document.getElementById('modal-close').click();
                showLoader();
                let res = await axios.post("/create-language", {
                    name : create_name,
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
