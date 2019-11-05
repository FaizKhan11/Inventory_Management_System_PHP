<?php
  $page_title = 'All User';
  require_once('includes/load.php');
?>
<?php
 page_require_level(1);
 $all_users = find_all_user();
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Users</span>
       </strong>
         <button class="pull-right"><a href="add_user.php" >Add New User</a></button>
      </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th  style="width: 50px;">#</th>
            <th>Name </th>
            <th>Username</th>
            <th  style="width: 15%;">User Role</th>
            <th  style="width: 10%;">Status</th>
            <th style="width: 20%;">Last Login</th>
            <th  style="width: 100px;">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_users as $a_user): ?>
          <tr>
           <td ><?php echo count_id();?></td>
           <td><?php echo remove_junk(ucwords($a_user['name']))?></td>
           <td><?php echo remove_junk(ucwords($a_user['username']))?></td>
           <td ><?php echo remove_junk(ucwords($a_user['group_name']))?></td>
           <td >
           <?php if($a_user['status'] === '1'): ?>
            <span ><?php echo "Active"; ?></span>
          <?php else: ?>
            <span ><?php echo "Deactive"; ?></span>
          <?php endif;?>
           </td>
           <td><?php echo read_date($a_user['last_login'])?></td>
           <td >
             <div class="btn">
                <button><a href="edit_user.php?id=<?php echo (int)$a_user['id'];?>" >
               Edit</button></a>
                <button><a href="delete_user.php?id=<?php echo (int)$a_user['id'];?>">
                Remove</button></a>
                </div>
           </td>
          </tr>
        <?php endforeach;?>
       </tbody>
     </table>
     </div>
    </div>
  </div>
</div>
  <?php include_once('layouts/footer.php'); ?>
