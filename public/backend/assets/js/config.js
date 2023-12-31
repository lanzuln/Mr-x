

function showLoader() {
    document.getElementById('loader').classList.remove('d-none')
}
function hideLoader() {
    document.getElementById('loader').classList.add('d-none')
}

function successToast(msg) {
    Toastify({
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        text: msg,
        className: "mb-5",
        style: {
            backgroundImage: "linear-gradient(to right top, #42ac82, #49be77, #5fcf65, #80de49, #a8eb12)",
            borderRadius: "50px",
            padding:"15px 30px"
        }
    }).showToast();
}

function errorToast(msg) {
    Toastify({
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        text: msg,
        className: "mb-5",
        style: {
            backgroundImage: "linear-gradient(to right top, #d84b4b, #e4403e, #ee3230, #f7211e, #ff0000)",
            borderRadius: "50px",
            padding:"15px 30px"
        }
    }).showToast();
}
