@include('header')
      <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                          <h4 class="card-title">Create Form</h4>
                          <p class="card-category">Create a Custom Form</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <form class="form" id="create-form">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <b>Form Field 1</b>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3">
                                                    <input type="text" placeholder="Field Name" class="form-control" name="form_fields_name[]">
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <select name="form_fields_datatypes[]" class="form-control selected-option-dp" onchange="javascript:addInput()">
                                                        <option value="text">Text</option>
                                                        <option value="number">Number</option>
                                                        <option value="long_text">Long Text</option>
                                                        <option value="selected_options">Selected Options</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3">
                                                    <input type="text" placeholder="Description" class="form-control" name="form_fields_description[]">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 btn btn-primary mt-3 pull-right add-row-btn">
                                        +
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <script>
      
      function del(elm){
          $(elm).parent().parent().remove();
      }
      
      function addRow(count) {
                  var htm = '<div class="form-group"><div class="row"><div class="col-lg-2 col-md-2 col-sm-2"><b>Form Field '+count+'</b></div><div class="col-lg-3 col-md-3 col-sm-3"><input type="text" placeholder="Field Name" class="form-control" name="form_fields_name[]"></div><div class="col-lg-2 col-md-2 col-sm-2"><select name="form_fields_datatypes[]" class="form-control selected-option-dp"><option value="text">Text</option><option value="number">Number</option><option value="long_text">Long Text</option><option value="selected_options">Selected Options</option></select></div><div class="col-lg-3 col-md-3 col-sm-3"><input type="text" placeholder="Description" class="form-control" name="form_fields_description[]"></div><div class="col-lg-1 col-md-1 col-sm-1 btn btn-primary text-center" onclick="del(this);"><i class="material-icons">delete</i></div></div></div>';
                  
                  $("#create-form").append(htm);
                  /*
                  $(".selected-option-dp").on("change", function() {
                      if($(this).val() == 'selected_options') {
                          $(this).after('<input type="text" class="form-control" placeholder="Enter values separated by | ">');
                      }
                      else {
                          $(this).siblings().hide();
                      }
                  });
                  */
                  
                  
      }
      /*
      function addInput() {
          var val1 = $(this).val();
          if(val1 == 'selected_options') {
                          $(this).after('<input type="text" class="form-control" placeholder="Enter values separated by | ">');
                      }
                      else {
                          $(this).siblings().hide();
                      }
      }
      */
      $(document).ready(function() {
          var count = 2;
          $(".add-row-btn").on("click", function() {
            addRow(count);
            count++;
          });
          
          /*
          $(".selected-option-dp").on("change", function() {
                      if($(this).val() == 'selected_options') {
                          $(this).after('<input type="text" class="form-control" placeholder="Enter values separated by | ">');
                      }
                      else {
                          $(this).siblings().hide();
                      }
                  });
                  */
      });
      </script>
@include('footer')