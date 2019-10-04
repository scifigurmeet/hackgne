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
                      <tbody>
                          <?php
                            $data = json_decode(getFormSubmissionData(request()->id));
                            echo "<pre>";
                            foreach($data as $row) {
                                $arr = (array)$row;
                                echo "<tr>";
                                foreach($arr['data'] as $dat) {
                                    echo "<td>".$dat."</td>";
                                }
                                echo "<td><a href='' style='padding: 12px;' class='btn btn-warning'>Download PDF</a></td></tr>";
                            }
                          ?>
                      </tbody>
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
$(document).ready(function(){
    $('#allFiles').DataTable();
});
</script>
@include('footer')