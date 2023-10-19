<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">update skill</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">

                                <label class="form-label">Skill name</label>

                                <input type="text" class="form-control" id="Update_name">
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
    let res = await axios.post("/language-by-id", {
        id: id
    })
    hideLoader();


    document.getElementById('Update_name').value = res.data['name'];
}


async function Update() {


    let Update_name = document.getElementById('Update_name').value;
    let updateByID = document.getElementById('updateByID').value;

    if (Update_name.length === 0) {
        errorToast("Name Required !")
    } else {

        document.getElementById('update-modal-close').click();
        showLoader();
        let res = await axios.post("/update-language", {
            name: Update_name,
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
