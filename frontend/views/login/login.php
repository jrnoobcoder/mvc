<!-- frontend/views/index.php -->

<?php
$title = 'Login Page';
ob_start();
?>

<!-- <div class="col-md-6 col-sm-6 m-auto mt-3"> -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-5">
          <!-- left column -->
          <div class="form-box col-md-6 col-lg-6 m-auto">
            <!-- jquery validation -->
            <div class="card">
              <div class="card-header">
                <h2 class="text-center">Log In</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="p-4" id="quickForm" action="http://localhost:8000/admin/validate" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <!-- <label for="exampleInputEmail1">Email address</label> -->
                    <input type="email" name="email" class="form-control p-4 mb-5" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <!-- <label for="exampleInputPassword1">Password</label> -->
                    <input type="password" name="password" class="form-control p-4" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <!-- <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                    </div>
                  </div> -->
                  <div class="form-group mb-0">
                    
                      <!-- <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1"> -->
                      <label class="" for="fogotPassword"><a href="#">Forgot password ?</a>.</label>
                    
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer bg-white">
                  <button type="submit" class="btn btn-purple w-100 p-3" >Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  <!-- </div> -->
  <script>
	$(document).ready(function(){
    // Toast = Swal.mixin({
    //     toast : true,
    //     position : 'top-end',
    //     showConfirmButton : false,
    //     timer : 5000
    // });
    $('#signin').submit(function(e){
        e.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            url: '{{url("/signin")}}',
            type: "POST",
            data: formData,
            processData : false,
            contentType : false,
            success: function(response){
                // $('span').text('');
                if(response.status_code == 301){
                    $.each(response.errors, function(key, value){
                        $("#signin #"+key).text(value[0]);
                        // toastr.error(value[0]);
                    });
                }else if(response.status_code == 200){
					alert("Success");
                    // Toast.fire({
                    //     icon : 'success',
                    //     title : response.message
                    // })
                    window.location = response.redirect_url;
                    
                }else if(response.status_code == 201){
					alert(response.message);

				}
            } 
        });
    });
});
</script>
<?php
$content = ob_get_clean();
include __DIR__ . '/layout.php';
?>
