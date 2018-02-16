<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../../css/register.css"  media="screen,projection"/>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </head>
<body>
<p id = "heading"> Delete From Inventory </p>
<br>

<form method="post" id="form">

  <div class="form-group">
    <label for="searchitem">Delete by ID:</label>
    <input type="text" class="form-control" id="id" name="id">
  </div>

  <!-- <button type="submit" class="btn btn-primary" name="deleteInventory">Delete</button> -->

  <button type="button" class="btn btn-info btn-lg" name = "deleteInventory" data-toggle="modal" data-target="#myModal">Delete</button>

  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete the record
            <?php
              require_once("processadmin.php");

              if (isset($_POST['deleteInventory']))
              {
                deleteInventory();
              }
            ?>
            .</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>



</div>
</form>