<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
      <div class="card px-5 py-5">
        <div class="row justify-content-between ">
          <div class="align-items-center col">
            <h4>Customer</h4>
          </div>
          <div class="align-items-center col">
            <button id="show-selected" class="float-end btn m-0 btn-sm bg-gradient-primary">Show Selected</button>
          </div>
          <div class="flex col justify-content-end">
            <button data-bs-toggle="modal" data-bs-target="#create-modal"
              class="float-end btn m-0 btn-sm bg-gradient-primary">Create</button>
          </div>
          <div class="align-items-center col">
            <button id="send-emails" class="float-end btn m-0 btn-sm bg-gradient-primary">Send Emails</button>
          </div>
        </div>
        <hr class="bg-dark " />
        <table class="table" id="tableData">
          <thead>
            <tr class="bg-light">
              <th>Select</th>
              <th>No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Mobile</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody id="tableList">

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
getList();


async function getList() {
  showLoader();
  let res = await axios.get("/customer-list");
  hideLoader();

  let tableList = $("#tableList");
  let tableData = $("#tableData");

  tableData.DataTable().destroy();
  tableList.empty();

  res.data.forEach(function(item, index) {
    let row = `<tr>
                <td><input type="checkbox" class="select-checkbox" data-id="${item['id']}"></td>
                <td>${index+1}</td>
                <td>${item['name']}</td>
                <td>${item['email']}</td>
                <td>${item['mobile']}</td>
                <td>
                    <button data-id="${item['id']}" class="btn editBtn btn-sm btn-outline-success">Edit</button>
                    <button data-id="${item['id']}" class="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
                </td>
             </tr>`
    tableList.append(row)
  })


  $('.editBtn').on('click', async function() {
    let id = $(this).data('id');
    await FillUpUpdateForm(id)
    $("#update-modal").modal('show');
  })

  $('.deleteBtn').on('click', function() {
    let id = $(this).data('id');
    $("#delete-modal").modal('show');
    $("#deleteID").val(id);
  })

  new DataTable('#tableData', {
    order: [
      [0, 'desc']
    ],
    lengthMenu: [5, 10, 15, 20, 30]
  });

  $('#show-selected').on('click', function() {
    let selectedIds = [];
    $('.select-checkbox:checked').each(function() {
      selectedIds.push($(this).data('id'));
    });
    alert('Selected customer IDs: ' + selectedIds.join(', '));
  });

  $('#send-emails').on('click', async function() {
    let selectedIds = [];
    $('.select-checkbox:checked').each(function() {
      selectedIds.push($(this).data('id'));
    });
    console.log('Selected customer IDs: ' + selectedIds.join(', '));
    if (selectedIds.length > 0) {
      try {
        showLoader();
        let res = await axios.post('/send-emails', {
          ids: selectedIds
        });
        hideLoader();
        alert(res.data.message);
      } catch (error) {
        hideLoader();
        alert('An error occurred while sending emails.');
      }
    } else {
      alert('Please select at least one customer.');
    }
  });
}
</script>