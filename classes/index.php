<?php 
include_once("Crud.php");
include_once("Student.php");


$crud = new Crud();

if (isset($_POST['add']))
{
    $student = new Student();
    $student->name = $_POST['name'];
    $student->age = $_POST['age'];
    $student->occupation = $_POST['occur'];
    $crud -> put($student);
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	
	$crud -> delete($id);
	
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
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Student</span></a>						
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
						<th>Age</th>
                        <th>Occupation</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                	<?php
                	$c = 0;
                    foreach ($students as $student) {
                     $c++;
                     ?>
                    <tr>
						<td><?php echo $c ?></td>
                        <td><?php echo $student->name ?></td>
						<td><?php echo $student->age ?></td>
                        <td><?php echo $student->occupation ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $c-1 ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="index.php?del=<?php echo $c-1?>" onclick="return confirm('Delete the Student by ID <?php echo $c-1 ?>');" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>

                <?php
                 }
                ?>
                </tbody>
            </table>
			
        </div>
    </div>

	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="index.php" method="post">
					<div class="modal-header">						
						<h4 class="modal-title">Add Student</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" name="name" required>
						</div>
						<div class="form-group">
							<label>Age</label>
							<input type="text" class="form-control" name="age" required>
						</div>
						<div class="form-group">
							<label>Occupation</label>
							<input type="text" class="form-control" name="occur" required>
						</div>				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" name="add" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>                                		                            