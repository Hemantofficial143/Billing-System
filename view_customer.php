<?php 
include('base_url.php');
include('style.php');
if (!logged_in()) {
    redirect(base_url());
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php include('header.php'); ?>
<div class="container mt-5">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Sr</th>
          <th>Name</th>
          <th>Mobile</th>
          <th>Address</th>
          <th>Bill Date</th>
          <th colspan="3"><center>Action</center></th>
        </tr>
      </thead>
      <thead id="loaded_data">
        
      </thead>
    </table>
</div>
</body>
<script type="text/javascript">
  
    load_data();
    function load_data(){
      $.ajax({
        url : $('#base_url').val()+"fetch_customer.php",
        method:"GET",
        success:function(res){
            $('#loaded_data').html(res);
        }

      })
    }

  function delete_rec(id){
    $.ajax({
      url : $('#base_url').val()+"delete.php",
      data:"id="+id,
      method : "POST",
      success:function(res){
        if (res == "ok") {
          alert('Record Deleted Succesfully');
          load_data();
        }else{
          alert('Something is Wrong');
        }
      }

    })
  }
  

</script>
</html>
