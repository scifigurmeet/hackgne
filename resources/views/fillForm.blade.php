@include('header')
    <?php $data = (getFormData(request()->id)); 
        $forms = $data['structure'];
    ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                          <h4 class="card-title">{{$data['name']}</h4>
                          <p class="card-category">{{$data['description']}}</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <form class="form" id="create-form" method="post" action="addForm">
                                        
                                        <?php
                                            foreach($forms as $form) {
                                        ?>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                    <input type="text" placeholder="Form Name" name="name" class="form-control">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                    <input type="text" placeholder="Form Description" name="description" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <?php
                                            }
                                        ?>
                                        
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
                                        <div class="row btn-submit-cont">
                                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                                <button type="submit" class="btn btn-primary btn-block">
                                                    Submit
                                                </button>
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
@include('footer')