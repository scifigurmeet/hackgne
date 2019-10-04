@include('header')
    <?php $data = (getFormData(request()->id)); 
        $forms = $data->structure;
    ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                          <h4 class="card-title">{{$data->name}}</h4>
                          <p class="card-category">{{$data->description}}</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <form class="form" id="fill-form" method="post" action="submitForm">
                                        <input type="hidden" name="form_id" value="{{ request()->id }}">
                                        <div class="row">
                                        <?php
                                            foreach($forms as $form) {
                                        ?>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mt-3">
                                                    <b>{{$form['field_name']}}</b>
                                                    <?php
                                                        if($form['field_type'] == 'long_text') {
                                                            ?>
                                                            <textarea class="form-control" placeholder="{{$form['field_name']}}" name="data[]"></textarea>
                                                            <?php
                                                        }
                                                        else if($form['field_type'] == 'selected_options' && !is_null($form['field_description'])) {
                                                            ?>
                                                            <select class="form-control" name="data[]">
                                                                <option disabled selected>{{$form['field_name']}}</option>
                                                                <?php
                                                                    foreach(explode("|", $form['field_description']) as $option) {
                                                                        ?>
                                                                        <option value="{{$option}}">{{$option}}</option>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </select>
                                                            <?php
                                                        }
                                                        else {
                                                            ?>
                                                            <input type="{{$form['field_type']}}" placeholder="{{$form['field_name']}}" name="data[]" class="form-control">
                                                            <?php
                                                        }
                                                    ?>
                                                </div>
                                        
                                        <?php
                                            }
                                        ?>
                                        </div>
                                        <div class="row btn-submit-cont mt-4">
                                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                                <button type="submit" class="btn btn-primary btn-block">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
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