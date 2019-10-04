@include('header')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Send Documents</h4>
                
                </div>
                <div class="card-body">
                    
                    
                    
                    
                    <div class="row">
                      <div class="col-md-12">
					  <div>
					  <?php
					  $data = getFileData(request()->id);
					  $name = $data->name;
					  ?>
					  <button class="alert alert-info" style="width: 100%;">Selected File: <input type="text" class="form-control" readonly value="{{$name}}"></button>
					  </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        Send To:
                        <div class="form-group col col-5">
					<select id="message_to" class="form-control" name="message_to" onchange="displayLogic(this.value);">
					<option value="allSchoolStudents" selected>Everyone</option>
					<option value="selectiveStudents">Groups</option>
					</select>
				</div>
				<div class="row" id="sections">
				<div class="form-group col col-2">
					<span class="label">Select the Group Name</span>
				</div>
				<div class="form-group col col-5">
					<select id="section_id" class="form-control" name="section_id" multiple>
					   <?php
					   $data = getAllGroups();
					   foreach($data as $one){
					       echo '<option value="'.$one->id.'">'.$one->group_name.'</option>';
					   }
					   ?>
					 
					</select>
				</div>
                    </form>
 
                      </div>
                    </div>
                    
                    <div class="clearfix"></div>
                  
                  
                  
                  
                  
                  
                </div>
                
    
			
		
		
			
			<input type="hidden" name="messageStatusID" value="newDraft">
			<div class="row" style="padding:20px;">
				
				<button class="btn btn-danger">Send <i class="fa fa-share"></i></button>
			</div>
                
                
                
              </div>
            </div>
          </div>
          
        </div>
      </div>
      
      
      
    
      
      
<script>

$(document).ready(function() {
    $('#section_id').select2();
    displayLogic('allSchoolStudents');
});
function displayLogic(value){
	if(value=='allSchoolStudents'){
		$('#sections').hide();
	}
	
	if(value=='selectiveStudents'){
		$('#sections').show();
		
	}
}
</script>


    
@include('footer')

