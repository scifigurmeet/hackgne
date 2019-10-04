@include('header')
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Uploaded Documents</h4>
                  <p class="card-category"> Here, you can acces your uploaded documents.</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover responsive" id="allFiles">
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
			{render: function(data, type, row){
				return 'Hello';}}
        ]
    });
}
$(document).ready(function(){getAllFiles();});
</script>
@include('footer')