<?php 
include_once("Crud.php");
include_once("Student.php");

if (isset($_GET['id'])) {
	$id = $_GET['id'];
}else
{
	header('location: index.php');
}

$crud = new Crud();

if (isset($_POST['edit']))
{

    $student = new Student();
    $student->id = $id;
    $student->name = $_POST['name'];
    $student->age = $_POST['age'];
    $student->occupation = $_POST['occur'];
    $crud -> post($student);
    header('location: index.php');
}


$students = new Student();

$students = json_decode($crud -> get());
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Crud By cURL</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../style/style.css">
<style type="text/css">
    
</style>

</head>
<body>
   <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>Students</b></h2>
					</div>
                </div>
            </div>
            <br>
            <br>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<form action="edit.php?id=<?php echo $id?>" method="POST">
				  <div class="form-group">
				    <label for="email">Name:</label>
				    <input type="text" name="name" value="<?php echo $students[$id] -> name?>" class="form-control"  required>
				  </div>
				  <div class="form-group">
				    <label for="pwd">Age:</label>
				    <input type="text" name="age" value="<?php echo $students[$id] -> age?>" class="form-control" required>
				  </div>
				  <div class="form-group">
				    <label for="pwd">Occupation:</label>
				    <input type="text" name="occur" value="<?php echo $students[$id] -> occupation?>" class="form-control" required>
				  </div>
				  <button type="submit" name="edit" class="btn btn-default" onclick="return confirm('Edit the Student ');">Edit</button>
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
		
	</div>
	
  </div>
</div>

</body>
</html>                                		                            