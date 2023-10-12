<section class="py-5">
    <div class="container px-5 mb-5">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Projects</span></h1>
        </div>
        <div class="row gx-5 justify-content-center">
            <div id="project_list" class="col-lg-11 col-xl-9 col-xxl-8">
                <!-- Project Card 1-->

            </div>
        </div>
    </div>
</section>


<script>
Get_projrcy_list();
async function Get_projrcy_list() {
    let URL = "/projectsData";
    try {

        showLoader();
        const result = await axios.get(URL);
        hideLoader();

        result.data.forEach((item) => {
            document.getElementById('project_list').innerHTML +=
                (`
                <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                    <div class="card-body p-0">
                        <div class="d-flex align-items-center">
                            <div class="p-5">
                                <h2 class="fw-bolder">${item['title']}</h2>
                                <p>${item['details']}</p>
                                <a target="_blank" href="${item['previewLink']}">see details</a>
                            </div>
                            <img class="thumbnail_poejec" src="${item['thumbnailLink']}" alt="..." />
                        </div>
                    </div>
                </div>
                `)
        });

    } catch (error) {
        alert(error)
    }


}
</script>
