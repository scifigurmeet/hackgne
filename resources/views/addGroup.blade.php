@include('header')
	<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add New group</h4>
                  <p class="card-category">Add your own members to the group</p>
                </div>
                <div class="card-body">
                  <form action="addNewGroup" method="POST">
                    
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Group Name</label>
                          <input type="text" class="form-control" name="group_name">
                        </div>
						
						
						<div class="form-group">
					<Label class="bmd-label-floating">Select the Group Members</span>
				</div>
				<div class="form-group">
					<select id="section_id" class="form-control" name="section_id" multiple onchange="doIt();">
					   <?php
					   $data = getAllUsers();
					   foreach($data as $one){
					       echo '<option value="'.$one->id.'">'.$one->username.'</option>';
					   }
					   ?>
					 
					</select>
				</div><br>
				
				
						 
						
                      </div>
                    </div>
                   
					<input type="hidden" name="member_ids" value="">
                    <button type="submit" class="btn btn-primary pull-right">Add Group</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>
	  
	  <script>

$(document).ready(function() {
    $('#section_id').select2();
});

function doIt(){
    $('[name=member_ids]').val("");
    value = $('[name=section_id]').val().join(',');
	$('[name=member_ids]').val(value);
}
</script>
@include('footer')