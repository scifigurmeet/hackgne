@include('header')

    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Reverse Image Search</h4>
                  <p class="card-category"> Here, you can search other similar images or documents across the Internet.</p>
                </div>
                <div class="card-body">
				<div>
				<iframe src="https://onlineocr.net" style="width:100%; min-height:800px;"></iframe>
				</div>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>
      <script>
          $('iframe').load( function() {
            $('iframe').contents().find("head")
              .append($("<style>#MainContent_mainPanel > table > tbody > tr:nth-child(1) {display: none !important;}</style>"));
        });
      </script>
@include('footer')