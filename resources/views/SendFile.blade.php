@include('header')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Send Documents</h4>
                
                </div>
                <div class="card-body">
                    
                    
                    
                    
                    <div class="row">
                      <div class="col-md-8">
                    <form action="" method="post" enctype="multipart/form-data">
                        Send To:
                        <div class="form-group col col-5">
					<select id="message_to" class="form-control" name="message_to" onchange="displayLogic(this.value);">
					<option value="allSchoolStudents" selected>All Students of School</option>
					<option value="allSchoolEmployees" selected>All Employees of School</option>
					<option value="selectiveStudents">Selective Student(s)</option>
					<option value="selectiveSections">Selective Section(s)</option>
					<option value="selectiveStandards">Selective Standard(s)</option>
					<option value="selectiveEmployees">Selective Employee(s)</option>
					</select>
				</div>
				<div class="row" id="sections">
				<div class="form-group col col-2">
					<span class="label">Choose Section(s)</span>
				</div>
				<div class="form-group col col-5">
					<select id="section_id" class="form-control" name="section_id" multiple>
					</select>
				</div>
                    </form>
 
                      </div>
                    </div>
                    
                    <div class="clearfix"></div>
                  
                  
                  
                  
                  
                  
                </div>
                
                <div class="row" id="sections">
				<div class="form-group col col-2">
					<span class="label">Choose Section(s)</span>
				</div>
				<div class="form-group col col-5">
					<select id="section_id" class="form-control" name="section_id" multiple>
					</select>
				</div>
			</div>
			<div class="row" id="standards">
				<div class="form-group col col-2">
					<span class="label">Choose Standard(s)</span>
				</div>
				<div class="form-group col col-5">
					<select id="standard_id" class="form-control" name="standard_id" multiple>
					</select>
				</div>
			</div>
			<div class="row" id="students">
				<div class="form-group col col-2">
					<span class="label">Choose Student(s)</span>
				</div>
				<div class="form-group col col-5">
					<select id="student_id" class="form-control" name="student_id" multiple>
					</select>
				</div>
			</div>
			<div class="row" id="employees">
				<div class="form-group col col-2">
					<span class="label">Choose Employee(s)</span>
				</div>
				<div class="form-group col col-5">
					<select id="employee_id" class="form-control" name="employee_id" multiple>
					</select>
				</div>
			</div>
			
			<input type="hidden" name="messageStatusID" value="newDraft">
			<div class="row" style="padding:20px;">
				<button class="btn btn-success" onclick="newDraft();">New <i class="fa fa-plus-circle"></i></button>
				<button class="btn btn-info" onclick="saveDraft();">Save <i class="fa fa-save"></i></button>
				<button id="delete" style="display:none;" class="btn btn-danger" onclick="deleteDraftAndNewDraft($('input[name=messageStatusID]').val());">Delete <i class="fa fa-trash"></i></button>
				<button class="btn btn-danger" onclick="sendMessage();">Send <i class="fa fa-share"></i></button>
			</div>
                
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
<script>
function displayLogic(value){
	if(value=='allSchoolStudents'){
		$('#sections, #standards, #students, #employees').hide();
		$('#sendTo').val('all');
	}
	if(value=='allSchoolEmployees'){
		$('#sections, #standards, #students, #employees').hide();
		$('#sendTo').val('allEmployees');
	}
	if(value=='selectiveStudents'){
		$('#sections, #standards, #employees').hide(); $('#students').show();
		$('#sendTo').val('students');
		
	}
	if(value=='selectiveSections'){
		$('#students, #standards, #employees').hide(); $('#sections').show();
		$('#sendTo').val('sections');
	}
	if(value=='selectiveStandards'){
		$('#sections, #students, #employees').hide(); $('#standards').show();
		$('#sendTo').val('standards');
	}
	if(value=='selectiveEmployees'){
		$('#sections, #students, #standards').hide(); $('#employees').show();
		$('#sendTo').val('employees');
	}
}
$(document).ready(function(){
	displayLogic($('#message_to').val());
	$("#mediumModal").appendTo("body");
	getAllSections();
	$('#messageArea').trumbowyg();
	getAllMessages();
	getAllStandards();
	getAllStudents();
	getAllEmployees();
	getAllReceivedMessages();
});
window.onmousedown = function (e) {
    var el = e.target;
    if (el.tagName.toLowerCase() == 'option' && el.parentNode.hasAttribute('multiple')) {
        e.preventDefault();

        // toggle selection
        if (el.hasAttribute('selected')) el.removeAttribute('selected');
        else el.setAttribute('selected', '');

        // hack to correct buggy behavior
        var select = el.parentNode.cloneNode(true);
        el.parentNode.parentNode.replaceChild(select, el.parentNode);
    }
}

function getAllSections(){
	$(document).ready(function(){
	 $.ajax({
      type: 'GET',
      url: "{{getHomeURL()}}/api/attendanceSections",
	  data: {token: $.cookie('token')},
      success: function(resultData) {
		  var data = resultData.data;
		  $.each(data, function(key,value) {   
			$('select[name=section_id]')
				 .append($("<option></option>")
							.attr("value",value.ID)
							.text(value.section_full_name+" ("+value.section_short_name+")")); 
			});
			$('#section_id').select2();
			$('#message_to').select2();
	  }
});
});
}

function getAllEmployees(){
	$(document).ready(function(){
	 $.ajax({
      type: 'GET',
      url: "{{getHomeURL()}}/api/employees",
	  data: {token: $.cookie('token')},
      success: function(resultData) {
		  var data = resultData.data;
		  $.each(data, function(key,value) {   
			$('select[name=employee_id]')
				 .append($("<option></option>")
							.attr("value",value.ID)
							.text(value.employee_full_name+" ("+value.type_name+")")); 
			});
			$('#employee_id').select2();
	  }
});
});
}

function getAllStudents(){
	$(document).ready(function(){
	 $.ajax({
      type: 'GET',
      url: "{{getHomeURL()}}/api/students",
	  data: {token: $.cookie('token')},
      success: function(resultData) {
		  var data = resultData.data;
		  $.each(data, function(key,value) {   
			$('select[name=student_id]')
				 .append($("<option></option>")
							.attr("value",value.ID)
							.text(value.student_full_name+" ("+value.student_last_name+") | "+value.standard_section_full_name)); 
			});
			$('#student_id').select2();
	  }
});
});
}


function getAllStandards(){
	$(document).ready(function(){
	 $.ajax({
      type: 'GET',
      url: "{{getHomeURL()}}/api/standards",
	  data: {token: $.cookie('token')},
      success: function(resultData) {
		  var data = resultData.data;
		  $.each(data, function(key,value) {   
			$('select[name=standard_id]')
				 .append($("<option></option>")
							.attr("value",value.ID)
							.text(value.standard_full_name+" ("+value.standard_short_name+")")); 
			});
			$('#standard_id').select2();
	  }
});
});
}
    
</script>      

    
@include('footer')

