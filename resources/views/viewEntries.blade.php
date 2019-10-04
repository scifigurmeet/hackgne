@include('header')

<?php
    $data = getFormData(request()->id);
    
    $formData = $data->structure;
?>

    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">{{ $data->name }}</h4>
                  <p class="card-category"> {{ $data->description }}</p>
                </div>
                <div class="card-body">
				<div>
					<a href="upload"><button class="btn btn-danger">Upload New Document</button></a>
				</div>
                  <div class="table-responsive">
                    <table class="table table-hover" id="allFiles">
                      <thead class="text-primary">
                          <?php
                            foreach($formData as $row) {
                                ?>
                                <th>{{ $row['field_name'] }}</th>
                                <?php
                            }
                          ?>
                          <th>Action</th>
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
        ajax: '{{getHomeURL()}}/getFormSubmissionData?id='request()->id,
		
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