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

                                <label class="form-label">Project Title</label>
                                <input type="text" class="form-control" id="title">


                                <div class="row">
                                    <div class="col-sm-6">
                                        <br />
                                        <img class="img-fluid" id="ThumbImg"
                                            src="{{ asset('uploads/no_image.jpg') }}" />
                                        <br />

                                        <label class="form-label">Image</label>
                                        <input oninput="ThumbImg.src=window.URL.createObjectURL(this.files[0])"
                                            type="file" class="form-control" id="thumbnailLink">
                                    </div>

                                    <div class="col-sm-6">
                                        <br />
                                        <img class="img-fluid" id="prevImg"
                                            src="{{ asset('uploads/no_image.jpg') }}" />
                                        <br />

                                        <label class="form-label">Image</label>
                                        <input oninput="prevImg.src=window.URL.createObjectURL(this.files[0])"
                                            type="file" class="form-control" id="previewLink">
                                    </div>
                                </div>

                                <label class="form-label">Project Details</label>
                                <textarea name="" id="details" cols="30" rows="10" class="form-control"></textarea>

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
        let title = document.getElementById('title').value;
        let thumbnailLink = document.getElementById('thumbnailLink').files[0];
        let previewLink = document.getElementById('previewLink').files[0];
        let details = document.getElementById('details').value;


        if (title.length === 0) {
            errorToast("Required !")
        } else if (!thumbnailLink) {
            errorToast("Required !")
        } else if (!previewLink) {
            errorToast("Required !")
        } else if (details.length === 0) {
            errorToast("Required !")
        } else {

            document.getElementById('modal-close').click();

            let formData = new FormData();
            formData.append('title', title)
            formData.append('thumbnailLink', thumbnailLink)
            formData.append('previewLink', previewLink)
            formData.append('details', details)

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }


            showLoader();
            let res = await axios.post("/create-project", formData, config);
            hideLoader();

            if (res.data['status'] == 'ok') {
                successToast('res.data.message');
                document.getElementById("save-form").reset();
                getList();
            } else {
                errorToast("Request fail!")
            }
        }
    }
</script>
