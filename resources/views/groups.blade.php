@include('header')
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Your Groups</h4>
                  <p class="card-category"> Manage Your Private Document Sharing Groups</p>
                </div>
                <div class="card-body">
				<div>
					<a href="addGroup"><button class="btn btn-danger">Add New Group</button></a>
				</div>
                  <div class="table-responsive">
                    <table class="table table-hover" id="allFiles">
                      <thead class="text-primary">
                        <th>
                        Group ID
                        </th>
                        <th>
                        Group Name
                        </th>
                        <th>
                        Members
                        </th>
                        <th>
                        Total Sharings
                        </th>
						 <th>
                        Actions
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
        ajax: '{{getHomeURL()}}/getAllGroups',
		columns: [
			{data: 'id'},
            {data: 'group_name'},
            {data: 'member_user_ids'},
            {data: 'created_by_user_id'},
            {data: 'description'},
			{render: function(data, type, row){
				return '<button style="padding: 12px;" class="btn btn-danger" onclick="deleteFile('+row.id+');"><i class="material-icons">delete_forever</i></button>';}}
        ]
    });
}

function deleteFile(id){
	if (confirm('Are you sure to DELETE this Document?')) {
		$.ajax({
      type: 'DELETE',
      url: '{{getHomeURL()}}/deleteGroup/'+id,
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