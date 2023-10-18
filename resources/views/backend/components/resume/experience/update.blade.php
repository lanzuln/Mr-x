<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">update Experience</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">

                                <label class="form-label">Duration</label>
                                <input type="text" class="form-control" id="Update_duration">

                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" id="Update_title">

                                <label class="form-label">Designation</label>
                                <input type="text" class="form-control" id="Update_designation">

                                <label class="form-label">Details</label>
                                <textarea class="form-control" name="" id="Update_details" cols="30" rows="10"></textarea>

                                <input type="text" class="" id="updateByID">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <button onclick="Update()"  class="btn btn-sm  btn-success">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
async function FillUpUpdateForm(id) {
    document.getElementById('updateByID').value = id;
    showLoader();
    let res = await axios.post("/customer-by-id", {
        id: id
    })
    hideLoader();


    document.getElementById('Update_duration').value = res.data['duration'];
    document.getElementById('Update_title').value = res.data['title'];
    document.getElementById('Update_designation').value = res.data['designation'];
    document.getElementById('Update_details').value = res.data['details'];
}


async function Update() {

    let Update_duration = document.getElementById('Update_duration').value;
    let Update_title = document.getElementById('Update_title').value;
    let Update_designation = document.getElementById('Update_designation').value;
    let Update_details = document.getElementById('Update_details').value;
    let updateByID = document.getElementById('updateByID').value;

    if (Update_duration.length === 0) {
        errorToast("duration Required !")
    } else if (Update_title.length === 0) {
        errorToast("title Required !")
    } else if (Update_designation.length === 0) {
        errorToast("designation Required !")
    }else if (Update_details.length === 0) {
        errorToast("details Required !")
    } else {

        document.getElementById('update-modal-close').click();
        showLoader();
        let res = await axios.post("/update-experience", {
            duration: Update_duration,
            title: Update_title,
            designation: Update_designation,
            details: Update_details,
            id: updateByID
        })
        hideLoader();

        if (res.data['status'] == 'ok') {
            document.getElementById("update-form").reset();
            successToast(res.data.message)
            await getList();
        } else {
            errorToast("Request fail !")
        }


    }



}
</script>
