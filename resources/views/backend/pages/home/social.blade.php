@extends('backend.layout.sidenav-layout')
@section('content')
    <div class="container">
        <div class="row">

            {{-- about --}}
            <div class="col-md-6">
                <section>
                    <div class="section_header mb-4">
                        <h4>Home Social</h4>
                    </div>
                    <div class="card">
                        <form id="save-form">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 p-1">

                                        <label class="form-label">Twitter Link</label>
                                        <input type="text" class="form-control" id="twitterLink" value="">

                                        <label class="form-label">Github Link</label>
                                        <input type="text" class="form-control" id="githubLink" value="">

                                        <label class="form-label">Linkedin Link</label>
                                        <input type="text" class="form-control" id="linkedinLink" value="">

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
                let res = await axios.get("/social-data");
                hideLoader();

                document.getElementById('twitterLink').value = res.data['data']['twitterLink'];
                document.getElementById('githubLink').value = res.data['data']['githubLink'];
                document.getElementById('linkedinLink').value = res.data['data']['linkedinLink'];

            } catch (error) {
                console.error('Error fetching hero data:', error);
            }
        }

        async function update() {
            let update_twitter = document.getElementById('twitterLink').value
            let update_github = document.getElementById('githubLink').value
            let update_linkedin = document.getElementById('linkedinLink').value


            if (update_twitter.length === 0) {
                errorToast("Required !")
            } else if (update_github.length === 0) {
                errorToast("Required !")
            } else if (update_linkedin.length === 0) {
                errorToast("Required !")
            } else {
                showLoader();
                let res = await axios.post("/update-social", {
                    twitterLink: update_twitter,
                    githubLink: update_github,
                    linkedinLink: update_linkedin
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
