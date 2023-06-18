<?php
$err ="";
 if (isset($_POST['create']))
 {
// $seller_req_id = $_POST ['seller_req_id'];
$seller_account = $_POST ['seller_account'];
$seller_password = $_POST ['seller_password'];
$seller_country = $_POST ['seller_country'];
$seller_city = $_POST ['seller_city'];
$seller_profile = $_FILES ['seller_profile']['name'];
// $seller_license = $_FILES ['seller_license']['name'];
// $seller_logo = $_FILES ['seller_logo']['name'];
$seller_company_detail = $_POST ['seller_details'];
$status = $_POST ['status'];


//profile file upload
$profile_file = time().'_'.basename($_FILES["seller_profile"]["tmp_name"]);
$fileupload ="data_files/".$profile_file;
// //license file upload
// $license_file = time().'_'.basename($_FILES["seller_license"]["tmp_name"]);
// $fileupload ="data_files/".$license_file;
// //logo upload
// $logo_file = time().'_'.basename($_FILES["seller_logo"]["tmp_name"]);
// $fileupload ="data_files/".$logo_file;

$date = date('Y-M-d');

$sql = "INSERT INTO seller_profile_table
 (`seller_req_id`,
  `seller_user`,
  `seller_password`,
   `seller_country`,
    `seller_city`,
     `seller_profile`,
      `seller_license`,
       `seller_logo`,
        `seller_details`
        , `seller_status`,
             `seller_join_date` )
  VALUES ('1',
 '$seller_account',
  '$seller_password',
   '$seller_country',
   '$seller_city',
   '$profile_file',
    'license_file',
     'logo_file',
      '$seller_company_detail',
       '$status',
        '$date');";

if($result = mysqli_query($conn,$sql))

{
//
move_uploaded_file($_FILES["seller_profile"]["tmp_name"], $fileupload);
//
// move_uploaded_file($_FILES["seller_license"]["tmp_name"], $fileupload);
// //
// move_uploaded_file($_FILES["seller_logo"]["tmp_name"], $fileupload);

  echo "Error: " . $sql . "<br>";




?>

<!--    <script>
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });
      Toast.fire({
        type: 'success',
        title: 'Update successfully.'
      })
    });
</script>
 -->
<?php
$err = "true";
}
else
{
  echo "Error: " . $sql . "<br>" . $conn->error;

  $err ="field";
}

}

echo $err;;
?>

<div style="text-align: left;" class="modal fade" id="modal-edit<?php echo $row['seller_id']; ?>">
<div class="modal-dialog modal-lg">
<!-- moded for edid -->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"><br>



Create Profile</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form method="POST" enctype="multipart/form-data">

<div class="modal-body">

  <!-- ============== -->

<div class="form-group">
<input type="hidden" class="form-control"  name="seller_req_id" value="<?php echo $row['seller_id']; ?>">
<!--  -->
<div class="row">
<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">Account User:</label>
<input class="form-control" type="text" placeholder="Account Name" name="seller_account">
</div>
<!--  -->
<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">Password:</label>
<input class="form-control" type="Password" placeholder="Password" name="seller_password">
</div>
<!--  -->
<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">Country:</label>
<input class="form-control" type="text" placeholder="" name="seller_country">
</div>
<!--  -->
<div class="col-lg-6 col-md-6 mb-3">
<label class="mb-2 mr-sm-2">City:</label>
<input class="form-control" type="text" placeholder="City" name="seller_city">
</div>
<!--  -->
<div class="col-lg-12 col-md-12 mb-3">
    <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name="seller_profile">
    <label class="custom-file-label" for="customFile">Company Profile</label>
  </div>
</div>
<!--  -->
<div class="col-lg-12 col-md-12 mb-3">
    <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name="seller_license">
    <label class="custom-file-label" for="customFile">License</label>
  </div>
</div>
<!--  -->
<div class="col-lg-12 col-md-12 mb-3">
    <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name="seller_logo">
    <label class="custom-file-label" for="customFile">Logo</label>
  </div>
</div>

<!--  -->
<div class="col-lg-12 col-md-12 mb-3">
<label class="mb-2 mr-sm-2">Company Details:</label>
<textarea class="form-control" rows="5" type="text" placeholder="Detals" name="seller_details">
  </textarea>
</div>
<!-- ---- -->

<div class="form-check-inline ml-5" style="">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="status" value="unlock">Active
  </label>
</div>
<!--  -->
<div class="form-check-inline ml-5" style="">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="status" value="lock" checked>Lock
  </label>
</div>
<!--  -->
</div>
<!--  -->

<!-- ================ -->



</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary" name="create">Create</button>
</div>
</div>
</form>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<?php echo $err."<br>"; 




?>
<!-- ========================edit modal end ============================================== -->