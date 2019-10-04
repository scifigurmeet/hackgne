@include('header')
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Your Created Forms</h4>
                  <p class="card-category"> Here, you can view your created forms.</p>
                </div>
                <div class="card-body">
				<div>
					<a href="createForm"><button class="btn btn-danger">Create New Form</button></a>
				</div>
                  <div class="table-responsive">
                    <table class="table table-hover" id="allFiles">
                      <thead class="text-primary">
                        <th>
						  Form Id
                        </th>
                        <th>
                          Form Name
                        </th>
                        <th>
                          Description
                        </th>
						 <th>
                          Actions
                        </th>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>
<script>
function getAllFiles(){
	 $('#allFiles').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{getHomeURL()}}/getAllForms',
		columns: [
			{data: 'id'},
            {data: 'name'},
            {data: 'description'},
			{render: function(data, type, row){
				return '<a style="padding: 12px;" href="uploads/'+row.path+'" class="btn btn-info" download="download">Generate QR Code</a>'
				+'<a href="viewEntries?id='+row.id+'" style="padding: 12px;" class="btn btn-warning">View Entries</a>';}}
        ]
    });
}

function deleteFile(id){
	if (confirm('Are you sure to DELETE this Document?')) {
		$.ajax({
      type: 'POST',
      url: '{{getHomeURL()}}/deleteFile/'+id,
      success: function(resultData) { $('#allFiles').DataTable().ajax.reload();},
      error: function(resultData) { $('#allFiles').DataTable().ajax.reload();}
		});
	} else {
    return;
	}
}
$(document).ready(function(){getAllFiles();});
</script>
@include('footer')