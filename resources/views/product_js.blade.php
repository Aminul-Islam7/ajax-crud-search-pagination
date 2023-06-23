<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
  crossorigin="anonymous"></script>

<script>
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
</script>

<script>
  $(document).ready(function(){

    // Add Product
    $(document).on('click', '.add_product', function(e) {
      e.preventDefault();
      let name = $('#name').val();
      let price = $('#price').val();

      $.ajax({
        url:"{{ route('add.product') }}",
        method: 'post',
        data: {name: name, price:price},
        success:function(res){
          if(res.status == 'success') {
            $('#addModal').modal('hide');
            $('#addProductForm')[0].reset();
            $('.table').load(location.href+' .table');
            Command: toastr["success"]("Product Added!", "Success")
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "newestOnTop": false,
              "progressBar": true,
              "positionClass": "toast-bottom-left",
              "preventDuplicates": false,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "6000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }
          }
        },
        error:function(err){
          let error = err.responseJSON;
          $.each(error.errors, function(index, value) {
            $('.errMsgContainer').append('<span class="text-danger">'+value+'</span><br>');
          });
        }
      });
    })

    // Show proudct value in update form
    $(document).on('click', '.update_product_form', function(){
      let id = $(this).data('id');
      let name = $(this).data('name');
      let price = $(this).data('price');

      $('#up_id').val(id);
      $('#up_name').val(name);
      $('#up_price').val(price);
    })


    // Update Product
    $(document).on('click', '.update_product', function(e) {
      e.preventDefault();
      let up_id = $('#up_id').val();
      let up_name = $('#up_name').val();
      let up_price = $('#up_price').val();

      $.ajax({
        url:"{{ route('update.product') }}",
        method: 'post',
        data: {up_id: up_id, up_name: up_name, up_price:up_price},
        success:function(res){
          if(res.status == 'success') {
            $('#updateModal').modal('hide');
            $('#updateProductForm')[0].reset();
            $('.table').load(location.href+' .table');
            Command: toastr["success"]("Product Updated!", "Success")
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "newestOnTop": false,
              "progressBar": true,
              "positionClass": "toast-bottom-left",
              "preventDuplicates": false,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "6000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }
          }
        },
        error:function(err){
          let error = err.responseJSON;
          $.each(error.errors, function(index, value) {
            $('.errMsgContainer').append('<span class="text-danger">'+value+'</span><br>');
          });
        }
      });
    })

    // Delete Product
    $(document).on('click', '.delete_product', function(e) {
      e.preventDefault();
      let product_id = $(this).data('id');

      if(confirm('Are you sure to delete the product?')){
        $.ajax({
          url:"{{ route('delete.product') }}",
          method: 'post',
          data: {product_id: product_id},
          success:function(res){
            if(res.status == 'success') {
              $('.table').load(location.href+' .table');
              Command: toastr["success"]("Product Deleted!", "Success")
              toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-left",
                "preventDuplicates": false,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "6000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
              }
            }
          }
        });
      }
    })
  });
</script>

<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
