<div class="container">
    <div class="row">

        {{-- about --}}
        <div class="col-md-12">
            <section>
                <div class="section_header mb-4">
                    <h4>Resume</h4>
                </div>
                <div class="card px-5 py-5">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>Education List</h4>
                        </div>
                        <div class="align-items-center col">
                            <button data-bs-toggle="modal" data-bs-target="#create-modal"
                                class="float-end btn m-0 btn-sm bg-gradient-primary">Create</button>
                        </div>
                    </div>
                    <hr class="bg-dark " />
                    <table class="table" id="tableData">
                        <thead>
                            <tr class="bg-light">
                                <th style="width: 5%">No</th>
                                <th>duration</th>
                                <th>institutionName</th>
                                <th>details</th>
                                <th>field</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableList">
                            {{-- Table Data --}}
                        </tbody>
                    </table>
                </div>
            </section>
        </div>

    </div>
</div>

<script>
    getList();


    async function getList() {

        showLoader();
        let res = await axios.get("/education-data");
        hideLoader();


        let tableData = $('#tableData');
        let tableList = $('#tableList');

        tableData.DataTable().destroy();
        tableList.empty();


        res.data.forEach(function(item, index) {
            let shortSentence = item['details'].split(' ').slice(0, 5).join(' ');
            let row = `<tr>
                    <td>${index + 1}</td>
                    <td>${item['duration']}</td>
                    <td>${item['institutionName']}</td>
                    <td style="white-space: normal !important;">${shortSentence}</td>
                    <td>${item['field']}</td>
                    <td>
                        <button data-sl="${item['id']}" class="edit  btn btn-sm btn-outline-success">Edit</button>
                        <button data-id="${item['id']}" class="delete btn  btn-sm btn-outline-danger">Delete</button>
                    </td>
                </tr>`;
            tableList.append(row);
        })


        $('.edit').on('click', async function() {
            let id = $(this).data('sl');
            await FillUpUpdateForm(id);
            $("#update-modal").modal('show');
        })

        $('.delete').on('click', function() {
            let id = $(this).data('id');


            $("#deleteID").val(id);
            $("#delete-modal").modal('show');

        })


        tableData.DataTable({
            lengthMenu: [ 10, 15, 20, 25, 30, 35, 40, 45, 50],
            order: [
                [0, 'ASC']
            ],
            language: {
                paginate: {
                    next: '&#8594;', // or '→'
                    previous: '&#8592;' // or '←'
                }
            }
        });
    }

    $('#tableData').dataTable({
        "autoWidth": false
    });
</script>
