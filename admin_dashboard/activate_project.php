<?php
include('admin_header.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

  <script>
  $( function() {
    $( "#datepicker1" ).datepicker();
    $( "#datepicker2" ).datepicker();
  } );
  </script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#project').DataTable();
} );
</script>
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">

  <h2>Hello,  <span style="color: blue"> <?php echo $_SESSION['username']?></span> Manage Project Here. </h2> <br />
   <br />           
  <table class="table table-bordered" id="project">
    <thead>
      <tr>
        <th>project_id</th>
        <th>project_name</th>
        <th>project_description</th>
        <th>project_type </th>
        <th>project_owner </th>
        <th>project_status</th>
        <th>Image</th>
        <th>Action</th>
        
        
      </tr>
    </thead>
    <tbody>
      <?php
      $project= $connection->query("SELECT * FROM project");
      while($row = $project->fetch_array()) {
       ?>
      	<tr>
        <td><?php echo $row['project_id'];?></td>
        <td><?php echo $row['project_name'];?></td>
      	<td><?php echo $row['project_description'];?></td>
        <td><?php echo $row['project_type'];?></td>
        <td><?php echo $row['project_owner'];?></td>
        <td><?php  if($row['project_status'] == '1') { echo 'Activated'; } else {  echo 'Unactive'; }?></td>
        
       
        <td><?php if($row['image'] == ''){ ?>
        <img src="http://wiki.bdtnrm.org.au/images/8/8d/Empty_profile.jpg" width="30px" height="30px">
        <?php   } else { ?>
        <img src="../user_dashboard/images/<?php echo $row['image']?>" width="30px" height="30px">
        <?php  } ?></td>
      		
      			<td>
      			
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#active<?php echo $row['project_id']?>" <?php if($row['project_status'] == '1') { echo 'disabled'; }?>><?php
          if($row['project_status'] == '1') { echo 'Activated'; } else {  echo 'Active'; }
           ?></button>
           
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#unactive<?php echo $row['project_id']?>" <?php if($row['project_status'] != '1') { echo 'disabled'; }?>><?php
          if($row['project_status'] != '1') { echo 'Unactivated'; } else {  echo 'UnActive'; }
           ?></button>
		
           </td>
         
      	</tr>
      	
      	
  
  <!-- active modal -->
  <div class="modal fade" id="active<?php echo $row['project_id']?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Are you sure ?</h4>
        </div>
        <div class="modal-body">
          <p>Want to activated this record? ?</p>
          <form action="../manage_project/edit_status.php?status_id=<?php echo $row['project_id']?>" method="post">
            <input type="hidden" name="status" value="1"></input>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-success">Activate</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  
  <!-- end of active  modal -->
  
  <!-- un active modal -->
  <div class="modal fade" id="unactive<?php echo $row['project_id']?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Are you sure ?</h4>
        </div>
        <div class="modal-body">
          <p>Want to unactivated this record? ?</p>
          <form action="../manage_project/edit_status.php?status_id=<?php echo $row['project_id']?>" method="post">
            <input type="hidden" name="status" value="0"></input>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-success">Unactivate</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- end of un active  modal -->
   
<?php }
      ?>
    </tbody> 
  </table>
</div>
	</div>
</div>


<?php
include('admin_footer.php');
?>