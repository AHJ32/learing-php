<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insert</title>
  <style>
    .container {
      width: 50%;
      border: 2px solid black;
      padding: 30px;
      margin: 0 auto;
    }

    h1 {
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Update form</h1>
    <form method="POST">
      <?php
      include 'connection.php';
      $getId = $_GET['userid'];
      $grab_data = "SELECT * FROM `test-table` WHERE `id` = $getId";
      $exe_grab_data = mysqli_query($con, $grab_data);
      $final_data = mysqli_fetch_array($exe_grab_data);
      ?>
      $id =
      Name : <input type="text" name="name" value="<?php echo $final_data['name'] ?>"> <br><br>
      Email : <input type="email" name="email" value="<?php echo $final_data['email'] ?>"> <br><br>
      Department : <select name="dpt">
        <option value="Computer" <?php if ($final_data['department'] == 'Computer') {
                                    echo 'selected';
                                  } ?>>Computer</option>
        <option value="Mechanical" <?php if ($final_data['department'] == 'Mechanical') {
                                      echo 'selected';
                                    } ?>>Mechanical</option>
        <option value="Civil" <?php if ($final_data['department'] == 'Civil') {
                                echo 'selected';
                              } ?>>Civil</option>
        <option value="Automobile" <?php if ($final_data['department'] == 'Automobile') {
                                      echo 'selected';
                                    } ?>>Automobile</option>
        <option value="Electrical" <?php if ($final_data['department'] == 'Electrical') {
                                      echo 'selected';
                                    } ?>>Electrical</option>
      </select> <br><br>
      <button name="update">
        Update
      </button>
    </form>
    <br><br>
    <a href="showdata.php">Click Here to view all data</a>
  </div>
</body>

</html>

<?php
if (isset($_POST['update'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $dpt = $_POST['dpt'];

  $update_quary = "UPDATE `test-table` SET `name`='$name',`email`='$email',`department`='$dpt' WHERE `id` = $getId";

  $exe_update = mysqli_query($con, $update_quary);

  if ($exe_update) {
?><script>
      alert('Updated Successfully');
      location.replace('showdata.php');
    </script>
  <?php
  } else {
  ?> <script>
      alert('Something went wrong. Try again!');
      location.replace('showdata.php');
    </script>
<?php
  }
}
?>