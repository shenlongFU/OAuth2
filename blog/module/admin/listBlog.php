<?php 
  $sqltype = "SELECT * FROM blog";
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
    List Blog</div>
    <td><a href="admin.php?module=addBlog" class="btn btn-success">Thêm Blog</a></td>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>image</th>
            <th>view</th>
            <th>time</th>
            <th>Ghim</th>
            <th>Xem</th>
            <th>Sửa</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>image</th>
            <th>view</th>
            <th>time</th>
            <th>Ghim</th>
            <th>Xem</th>
            <th>Sửa</th>
            <th>Xóa</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
          <tr <?php if ($row['pick']==1) {
            echo "style='background:#bed2e6;'";
          } ?>>
            <td><?=$row['id']?></td>
            <td><?=$row['title']?></td>
            <td><img src="asset/admin/images/<?=$row['avatar']?>" alt="" style="width: 100px;"></td>
            <td><?=$row['nview']?></td>
            <td><?=$row['timecreate']?></td>
            <td><a href="admin.php?module=pickblog&id=<?=$row['id']?>" class="btn btn-success">Ghim</a></td>
            <td><a href="admin.php?module=viewblog&id=<?=$row['id']?>" class="btn btn-info">Xem</a></td>
            <td><a href="admin.php?module=editBlog&id=<?=$row['id']?>" class="btn btn-warning">Sửa</a></td>
            <td><a href="javascript:void(0)" onclick="delBlog(<?=$row['id']?>)" class="btn btn-danger">Xóa</a></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>