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
					  <button class="btn btn-primary btn-round" >Selected File is: &nbsp <b>{{$name}}</b></button>
					  </div><br>
                    <form id="form" action="sendDocument" method="post" enctype="multipart/form-data">
                    <div class="form-group col col-8">
					<span class="label">Description</span>
					<input type="text" name="description">
				</div>
                        Send To:
                        <div class="form-group col col-5">
					<select id="message_to" class="form-control" name="message_to" onchange="displayLogic(this.value);">
					<option value="allSchoolStudents" selected>Everyone</option>
					<option value="selectiveStudents">Users</option>
					</select>
				</div>
			
				<div class="row" id="sections">
				<div class="form-group col col-2">
					<span class="label">Select the User Name</span>
				</div>
				<div class="form-group col col-5">
					<select id="section_id" class="form-control" name="section_id" multiple onchange="doIt();">
					   <?php
					   $data = getAllUsers();
					   foreach($data as $one){
					       echo '<option value="'.$one->id.'">'.$one->username.'</option>';
					   }
					   ?>
					 
					</select>
				</div>
					
				
				<input type="hidden" name="document_id" value="{{request()->id}}">
				<input type="hidden" name="send_user_ids" value="0">

                    </form>
 
                      </div>
                    </div>
                    
                    <div class="clearfix"></div>
                  
                  
                  
                  
                  
                  
                </div>
                
    
			
		
		
			
			<input type="hidden" name="messageStatusID" value="newDraft">
			<div class="row" style="padding:20px;">
				
				<button onclick="$('#form').submit();" class="btn btn-danger" type="submit">Send <i class="fa fa-share"></i></button>
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
		$('[name=send_user_ids]').val(0);
	}
	
	if(value=='selectiveStudents'){
		$('#sections').show();
		$('[name=send_user_ids]').val("");
		value = $('[name=section_id]').val().join(',');
		         $('[name=send_user_ids]').val(value);
		    
		   
		
		
		
	}
}
function doIt(){
    $('[name=send_user_ids]').val("");
    value = $('[name=section_id]').val().join(',');
		$('[name=send_user_ids]').val(value);
}
</script>


    
@include('footer')

