@extends('backend.layout.sidenav-layout')
@section('content')
    <div class="container">
        <div class="row">

            {{-- about --}}
            <div class="col-md-6">
                <section>
                    <div class="section_header mb-4">
                        <h4>Home About</h4>
                    </div>
                    <div class="card">
                        <form id="save-form">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 p-1">

                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title" value="">

                                        <label class="form-label">Details</label>
                                        <input type="text" class="form-control" id="details" value="">


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
        FillAboutData();
        async function FillAboutData() {
            try {
                showLoader();
                let res = await axios.get("/about-data");
                hideLoader();

                document.getElementById('title').value = res.data['data']['title'];
                document.getElementById('details').value = res.data['data']['details'];

            } catch (error) {
                console.error('Error fetching hero data:', error);
            }
        }

        async function update() {
            let update_title = document.getElementById('title').value;
            let update_details = document.getElementById('details').value;


            if (update_title.length === 0) {
                errorToast("Required !")
            } else if (update_details.length === 0) {
                errorToast("Required !")
            } else {
                showLoader();
                let res = await axios.post("/update-about", {
                    title: update_title,
                    details: update_details
                });
                hideLoader();

                if (res.data === 1) {
                    successToast('Request completed');
                    document.getElementById("save-form").reset();
                    FillAboutData();
                } else {
                    errorToast("Request fail !")
                }
            }
        }
    </script>
@endsection
