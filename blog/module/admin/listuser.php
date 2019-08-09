<?php 
  $sqltype = "SELECT * FROM user WHERE role!=1";
  $result = mysqli_query($conn,$sqltype) or die("Lỗi select");
?>
<div class="card mb-3">
  <div class="card-header">
     <?php 
        if (isset($_SESSION['success'])){
       ?>
       <h4 style="color: green;"><?=$_SESSION['success']?></h4>
      <?php
        }
        unset($_SESSION['success']);
      ?>
    <i class="fas fa-table"></i>
    List User</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>emai</th>
            <th>username</th>
            <th>password</th>
            <th>avatar</th>
            <th>role</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>ID</th>
            <th>emai</th>
            <th>username</th>
            <th>password</th>
            <th>avatar</th>
            <th>role</th>
            <th>Xóa</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
          <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['mail']?></td>
            <td><?=$row['username']?></td>
            <td><?=$row['password']?></td>
            <td><img src="asset/page/upload/<?=$row['avartar']?>" alt="" style="width: 100px;"></td>
            <td><?php 
            	if ($row['role']==1) {
            		echo "Admin";
            	}else{
            		echo "User";
            	}

            ?></td>
            <td><a href="javascript:void(0)" onclick="delUser(<?=$row['id']?>)" class="btn btn-danger">Xóa</a></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>