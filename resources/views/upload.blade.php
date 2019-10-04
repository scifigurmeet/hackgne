@include('header')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Upload File</h4>
                
                </div>
                <div class="card-body">
                    
                    
                    
                    
                    <div class="row">
                      <div class="col-md-8">
                    <form action="" method="post" enctype="multipart/form-data">
                        Select image to upload:
                        <input type="file" name="document">
                        <button type="submit" class="btn btn-primary pull-right">UpLOAD</button>
                    </form>
 
                      </div>
                    </div>
                    
                    <div class="clearfix"></div>
                  
                  
                  
                  
                  
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <script type="text/javascript">
        Dropzone.options.dropzone =
         {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 5000,
            success: function(file, response) 
            {
                console.log(response);
            },
            error: function(file, response)
            {
               return false;
            }
};
</script>    
      
        
@include('footer')