<?php
error_reporting(0);
include('config.php');

$stid=intval($_GET['stid']);

if(isset($_POST['update']))
{
    $updateQuery = "UPDATE accounts SET name='$_POST[name]', password='$_POST[password]' ,studentid='$_POST[studentid]', email='$_POST[email]', gender='$_POST[gender]', contactno='$_POST[contactno]',dob='$_POST[dob]' WHERE id=$stid";
    mysqli_query($link,$updateQuery);
/*    
$studentname=$_POST['fullanme'];
$roolid=$_POST['rollid']; 
$studentemail=$_POST['emailid']; 
$gender=$_POST['gender']; 
$classid=$_POST['class']; 
$dob=$_POST['dob']; 
$status=$_POST['status'];
$sql="update tblstudents set StudentName=:studentname,RollId=:roolid,StudentEmail=:studentemail,Gender=:gender,DOB=:dob,Status=:status where StudentId=:stid ";
$query = $dbh->prepare($sql);
$query->bindParam(':studentname',$studentname,PDO::PARAM_STR);
$query->bindParam(':roolid',$roolid,PDO::PARAM_STR);
$query->bindParam(':studentemail',$studentemail,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':stid',$stid,PDO::PARAM_STR);
$query->execute();
*/
$msg="Student info updated successfully";
};

if(isset($_POST['delete'])) {
    $deleteQuery = "DELETE FROM accounts WHERE id=$stid";
    mysqli_query($link,$deleteQuery);

    $msg="Student deleted successfully";
};


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PTE Training Centre Admin| Edit Student < </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/select2/select2.min.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
  <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                   <?php include('includes/leftbar.php');?>  
                    <!-- /.left-sidebar -->

                    <div class="main-page">

                     <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Student Admission</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="admin.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Student Admission</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Fill the Student info</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                                <form action="edit-student.php" class="form-horizontal" method="post">
<?php 
$query = "SELECT * FROM accounts WHERE id=$stid";
mysqli_query($link,$query) or die ('Error qyery student db');



$result = mysqli_query($link,$query);
while($record = mysqli_fetch_array($result)) {

?>
<!-------------------------------
$sql = "SELECT tblstudents.StudentName,tblstudents.RollId,tblstudents.RegDate,tblstudents.StudentId,tblstudents.Status,tblstudents.StudentEmail,tblstudents.Gender,tblstudents.DOB,tblclasses.ClassName,tblclasses.Section from tblstudents join tblclasses on tblclasses.id=tblstudents.ClassId where tblstudents.StudentId=:stid";
$query = $dbh->prepare($sql);
$query->bindParam(':stid',$stid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>
------------------------------------------------>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Full Name</label>
<div class="col-sm-10">
<input type="text" name="name" class="form-control" id="name" value="<?php echo $record['name'] ?>" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Password</label>
<div class="col-sm-10">
<input type="text" name="password" class="form-control" id="password" value="<?php echo $record['password'] ?>" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Student Id</label>
<div class="col-sm-10">
<input type="text" name="studentid" class="form-control" id="studentid" value="<?php echo $record['studentid'] ?>" maxlength="10" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Email Address</label>
<div class="col-sm-10">
<input type="text" name="email" class="form-control" id="email" value="<?php echo $record['email'] ?>" required="required" autocomplete="off">
</div>
</div>



<div class="form-group">
<label for="default" class="col-sm-2 control-label">Gender</label>
<div class="col-sm-10">
<?php  $gndr=$record[gender];
if($gndr=="Male")
{
?>
<input type="radio" name="gender" value="Male" required="required" checked>Male <input type="radio" name="gender" value="Female" required="required">Female <input type="radio" name="gender" value="Other" required="required">Other
<?php }?>
<?php  
if($gndr=="Female")
{
?>
<input type="radio" name="gender" value="Male" required="required" >Male <input type="radio" name="gender" value="Female" required="required" checked>Female <input type="radio" name="gender" value="Other" required="required">Other
<?php }?>
<?php  
if($gndr=="Other")
{
?>
<input type="radio" name="gender" value="Male" required="required" >Male <input type="radio" name="gender" value="Female" required="required">Female <input type="radio" name="gender" value="Other" required="required" checked>Other
<?php }?>
<?php
if($gndr=="")
{
?>
<input type="radio" name="gender" value="Male" required="required" >Male <input type="radio" name="gender" value="Female" required="required">Female <input type="radio" name="gender" value="Other" required="required">Other
<?php } ?>


</div>
</div>

<div class="form-group">
                                                        <label for="dob" class="col-sm-2 control-label">DOB</label>
                                                        <div class="col-sm-10">
                <input type="date"  name="dob" class="form-control" value="<?php echo $record['dob'] ?>" id="dob">
                                                        </div>
                                                    </div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Reg Date: </label>
<div class="col-sm-10">
<?php echo $record['createdat'] ?>
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Status</label>
<div class="col-sm-10">
<?php  $stats=$record[webadmin];
if($stats=="1")
{
?>
<input type="radio" name="webadmin" value="1" required="required" checked>Admin <input type="radio" name="webadmin" value="0" required="required">Student 
<?php }?>
<?php  
if($stats=="0")
{
?>
<input type="radio" name="webadmin" value="1" required="required" >Admin <input type="radio" name="webadmin" value="0" required="required" checked>Student 
<?php }?>



</div>
</div>

<?php } ?>                                                    

                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" value="update" name="update" class="btn btn-primary">Update</button>

                                                        </div>
                                                    </div>
                                                </form>
                                                <form action="edit-student.php" class="form-horizontal" method="post">
                                                    <button type="submit" value="delete" name="delete" class="btn btn-primary">Delete</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.main-wrapper -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });
        </script>
    </body>
</html>

