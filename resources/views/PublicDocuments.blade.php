@include('header')
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Shared Documents</h4>
                  <p class="card-category"> Here, you can acces/view all documents shared with you.</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover" id="allFiles">
                      <thead class="text-primary">
                        <th>
                        File Id
                        </th>
                        <th>
                          File Name
                        </th>
                        <th>
                          File type
                        </th>
                        <th>
                          File Size
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
        ajax: '{{getHomeURL()}}/getAllFiles',
		columns: [
			{data: 'id'},
            {data: 'name'},
            {data: 'mime_type'},
            {data: 'file_size'},
			{render: function(data, type, row){
				return '<a style="padding: 12px;" href="uploads/'+row.path+'" class="btn btn-info" download="download"><i class="material-icons">cloud_download</i></a>'
				+'<a style="padding: 12px;" href="sendDocument?id='+row.id+'" class="btn btn-primary"><i class="material-icons">send</i></button></a>'
				+'<button style="padding: 12px;" class="btn btn-danger" onclick="deleteFile('+row.id+');"><i class="material-icons">delete_forever</i></button>';}}
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