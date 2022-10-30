<?php

@include 'connect.php';
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!isset($_SESSION['admin'])){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/bootstrap.css">
   
   <title>Admin Page</title>
   
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand fs-3 fw-bold text-uppercase" href="#">Admin</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add.php">Add New</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
   
<!---<p class="text-center bg-secondary fs-2 fw-bold">ENROLLED STUDENTS</p> -->

<table class="table table-striped container">
   
  <thead>
    <tr>
      <th scope="col">ID</th> <br>
      <th scope="col">First Name</th>
      <th scope="col">Middle Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Degree</th>
      <th scope="col">Year Level</th>
      <th scope="col">Gender</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
<?php

$sql = "SELECT * from tb_enrollment";
$result = mysqli_query($conn, $sql);
if($result){
  while($row = mysqli_fetch_assoc($result)){
   $id = $row['student_id'];
   $firstname = $row['first_name'];
   $middlename = $row['middle_name'];
   $lastname = $row['last_name'];
   $email = $row['email'];
   $pnumber = $row['phone_number'];
   $degree = $row['degree'];
   $yearlevel = $row['yearlevel'];
   $gender = $row['gender'];
   
   echo ' <tr> 
   <th scope="row">'.$id.'</th>
   <td>'.$firstname.'</td>
   <td>'.$middlename.'</td>
   <td>'.$lastname.'</td>
   <td>'.$email.'</td>
   <td>'.$pnumber.'</td>
   <td>'.$degree.'</td>
   <td>'.$yearlevel.'</td>
   <td>'.$gender.'</td>
   <td>
        <a class="btn btn-secondary" href="#">Edit</a>
        <a class="btn btn-secondary" name=delete href="delete.php?">Delete</a>
      </td>
  </tr>
  ';
  }
}
?>

</tbody>
</table>

</body>
</html>