@include('header')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Text To Image Documents</h4>
                
                </div>
                <div class="card-body">
				<form action="http://172.16.19.115">
				<input type="text" class="form-control"name="text" placeholder="Enter Text in Any Language">
				<button type="submit" class="btn btn-danger">Create Image</button>
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

