<?php
	include_once('user_header.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#members').DataTable();
} );
</script>
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">

  <h2 style="color: black">Hello,  <span style="color: blue"> <?php echo $_SESSION['membername']?></span>. It is your transactions. </h2> <br />           
  <table class="table table-bordered" id="members">
    <thead>
      <tr>
        <th>Donate payment ID</th>
		<th>Project Name</th>
        <th>Amount</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $members= $connection->query("SELECT donate_payment_id,project_id_fk,donate_amount,donate_payment_date,project_name FROM donate_payment left join project on project_id_fk = project_id where donate_payment.username_fk like '".$_SESSION['membername']."' and (donate_payment_status <> 404)");
      while($row = $members->fetch_array()) {
       ?>
      	<tr>
        <td><?php echo $row['donate_payment_id'];?></td>
		<td><?php echo $row['project_name'];?></td>
        <td><?php echo $row['donate_amount'];?></td>
      	<td><?php echo $row['donate_payment_date'];?></td>
      	</tr>
      	
      	
      	 <!-- delete  modal -->
      	<div class="modal fade" id="deletemember<?php echo $row['member_id']?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Are you sure ?</h4>
        </div>
        <div class="modal-body">
          <p>Want to delete ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <a href="../manage_member/delete_member.php?filepath=foundation_dashboard&&member_id=<?php echo $row['member_id'];?>"> <button type="button" class="btn btn-danger">Delete</button></a>
        
        
        </div>
      </div>
    </div>
  </div>
  <!-- end of delete state modal

  <!-- edit member modal -->
  <div class="modal fade" id="editmember<?php echo $row['member_id'];?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Member</h4>
        </div>
        <div class="modal-body">
         <form enctype="multipart/form-data" action="../manage_member/edit_member.php?filepath=foundation_dashboard&&member_id=<?php echo $row['member_id'];?>" method="post" >
       
        
         <div class="form-group">
           <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['name']?>"></input>
         </div>
          <div class="form-group">
           <input type="text" name="username" id="username" class="form-control" value="<?php echo $row['username']?>" disabled=""></input>
         </div>

          <div class="form-group">
           <input type="text" name="password" id="password" class="form-control" disabled="" value="<?php echo $row['password']?>" ></input>
         </div>
          
          <div class="form-group">
            <select class="form-control" name="usertype" id="usertype" >
              <option value="admin">admin</option>
              <option value="user">user</option>
               <option value="foundation">foundation</option>
            </select>
          </div>
         
         <div class="form-group">
           <input type="file" name="photo" id="photo" class="form-control" ></input>
         </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning">Edit</button>

        </div>
      </div>
      </form>
      
    </div>
  </div> 
   
<?php }
      ?>
    </tbody> 
  </table>
</div>
	</div>
</div>

<!-- add state modal -->
<div class="modal fade" id="addmember" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Members</h4>
        </div>
        <div class="modal-body">
        <form action="../manage_member/add_member.php" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="filepath" value="foundation_dashboard"></input>
        
          <div class="form-group">
          	<input type="text" class="form-control" name="name" id="name" placeholder="Enter Name"></input>
          </div>
          
          <div class="form-group">
            <input type="text" class="form-control" name="username" id="username" placeholder="Enter username"></input>
          </div>

          <div class="form-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password"></input>
          </div>
          
          <div class="form-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email"></input>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone"></input>
          </div>
          <div class="form-group">
            <textarea type="text" class="form-control" name="address" id="address" placeholder="Enter Address"></textarea>
          </div>
          
          <div class="form-group">
            <input type="file" class="form-control" name="photo" id="photo" ></input>
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="addmember">Add</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
<?php
	include('user_footer.php');
?>