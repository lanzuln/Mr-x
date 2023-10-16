<section class="bg-light py-5">
    <div class="container px-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-xxl-8">
                <div class="text-center my-5">
                    <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">About Me</span></h2>
                    <p id="about_title" class="lead fw-light mb-4"></p>
                    <p id="about_detail" class="text-muted"></p>

                    <div class="d-flex justify-content-center fs-2 gap-4">
                        <a id="social_twitter" target="_blank" class="text-gradient" href=""><i
                                class="bi bi-twitter"></i></a>
                        <a id="social_linkedin" target="_blank" class="text-gradient" href=""><i
                                class="bi bi-linkedin"></i></a>
                        <a id="social_github" target="_blank" class="text-gradient" href=""><i
                                class="bi bi-github"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
get_about();
async function get_about() {
    try {
        let URL = "/aboutData";
        const result = await axios.get(URL);


        document.getElementById('about_title').innerText  = result.data['title'];
        document.getElementById('about_detail').innerText  = result.data['details'];
    } catch (error) {
        alert(error)
    }

}


// about social
get_about_social();
async function get_about_social() {

        let URL = "/socialData";
        const result = await axios.get(URL);
        hideLoader();

        document.getElementById('loading-div').classList.add('d-none');
        document.getElementById('content-div').classList.remove('d-none');

        document.getElementById('social_twitter').href = result.data['twitterLink'];
        document.getElementById('social_linkedin').href = result.data['linkedinLink'];
        document.getElementById('social_github').href = result.data['githubLink'];


}
</script>
