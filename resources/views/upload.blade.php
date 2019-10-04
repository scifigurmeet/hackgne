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

        
      
        
@include('footer')