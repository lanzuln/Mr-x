@extends('backend.layout.sidenav-layout')
@section('content')

<div class="container">
    <div class="row">
        {{-- hero --}}
        <div class="col-md-6">
            <section>
                <div class="section_header mb-4">
                    <h4>Hero</h4>
                </div>
                <div class="card">
                    <form id="save-form">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 p-1">


                                    <label class="form-label">Key Line</label>
                                    <input type="text" class="form-control" id="key_line" value="">

                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" value="">

                                    <label class="form-label">Short Title</label>
                                    <input type="text" class="form-control" id="short_title" value="">

                                    <br />
                                    <img class="w-15" id="newImg" src="{{asset('images/avator.png')}}" />
                                    <br />

                                    <label class="form-label">Image</label>
                                    <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file"
                                        class="form-control" id="img">

                                    <input type="text" class="d-none" id="img_path">
                                    <input type="text" class="d-none" id="hero_id">
                                    <br>

                                    <button onclick="update()" id="update-btn"
                                        class="btn btn-sm btn-success mt-3">Update</button>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>

        </div>
    </div>
</div>

<script>
    FillHeroData();
    async function FillHeroData() {
        try {
            showLoader();
            let res = await axios.get("/hero-data");
            hideLoader();

            document.getElementById('key_line').value = res.data['data']['key_line'];
            document.getElementById('title').value = res.data['data']['title'];
            document.getElementById('short_title').value = res.data['data']['short_title'];
            document.getElementById('img_path').value = res.data['data']['img'];
            document.getElementById('hero_id').value = res.data['data']['id'];
            document.getElementById('newImg').src = res.data['data']['img'];

        } catch (error) {
            console.error('Error fetching hero data:', error);
        }
    }

// ========== update

    async function update() {

    let update_key_line = document.getElementById('key_line').value;
    let update_title = document.getElementById('title').value;
    let update_short_title = document.getElementById('short_title').value;
    let update_img = document.getElementById('img').files[0];
    let update_ImagePath = document.getElementById('img_path').value;
    let update_id = document.getElementById('hero_id').value;


    if (update_key_line.length === 0) {
        errorToast("Required !")
    } else if (update_title.length === 0) {
        errorToast("Required !")
    } else if (update_short_title.length === 0) {
        errorToast("Required !")
    } else {

    let formData = new FormData();
    formData.append('key_line', update_key_line)
    formData.append('title', update_title)
    formData.append('short_title', update_short_title)
    formData.append('img', update_img)
    formData.append('img_path', update_ImagePath)
    formData.append('id', update_id)

    const config = {
        headers: {
            'content-type': 'multipart/form-data'
        }
    }

    showLoader();
    let res = await axios.post("/update-hero", formData, config)
    hideLoader();

    if (res.data === 1) {
        successToast('Request completed');
        document.getElementById("update-form").reset();
    } else {
        errorToast("Request fail !")
    }
}
}


</script>


@endsection
