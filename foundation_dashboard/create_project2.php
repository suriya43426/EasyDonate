<?php
include('foundation_header.php');
$id = $_SESSION['membername'];
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

  <h2>Hello,  <span style="color: blue"> <?php echo $_SESSION['membername']?></span> Manage Project Here. </h2> <br />
  <p><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addproject">Add new</button></p> <br />           
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
      $project= $connection->query("SELECT * FROM project where project_owner ='".$id."'");
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
        <img src="../<?php echo $row['image'];?>" width="30px" height="30px">
        <?php  } ?></td>
      		
      			<td><button type="button" data-toggle="modal" data-target="#deletproject<?php echo $row['project_id']?>" class="btn btn-danger">Delete</button>
      		<button type="button" data-toggle="modal" data-target="#editproject<?php echo $row['project_id'];?>" class="btn btn-warning">Edit</button>

           </td>
         
      	</tr>
      	
      	
      	 <!-- delete  modal -->
      	<div class="modal fade" id="deletproject<?php echo $row['project_id']?>" role="dialog">
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
         <a href="../manage_project/delete_project.php?project_id=<?php echo $row['project_id'];?>"> <button type="button" class="btn btn-danger">Delete</button></a>
        </div>
      </div>
    </div>
  </div>
  <!-- end of delete  modal -->
  
 
   <!-- edit  modal -->
  <div class="modal fade" id="editproject<?php echo $row['project_id'];?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Project</h4>
        </div>
        <div class="modal-body">
        <form enctype="multipart/form-data" action="../manage_project/edit_project.php?project_id=<?php echo $row['project_id'];?>" method="post" >
         
         <div class="form-group">
           <input type="text" name="project_name" id="project_name" class="form-control" value="<?php echo $row['project_name']?>"></input>
         </div>
          <div class="form-group">
           <input type="text" name="project_description" id="project_description" class="form-control" value="<?php echo $row['project_description']?>"></input>
         </div>
          <div class="form-group">
           <input type="text" name="project_type" id="project_type" class="form-control"  value="<?php echo $row['project_type']?>" ></input>
         </div>
         <div class="form-group">
           <input type="text" name="project_owner" id="project_owner" class="form-control" value="<?php echo $row['project_owner']?>" ></input>
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

  <!-- end of edit  modal -->
   
<?php }
      ?>
    </tbody> 
  </table>
</div>
	</div>
</div>

<!-- add  modal -->
<div class="modal fade" id="addproject" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Project Details</h4>
        </div>
        
        <div class="modal-body">
        <form action="../manage_project/add_project.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <input type="text" class="form-control" name="project_name" id="project_name" placeholder="Enter project_name"></input>
          </div>
          
          <div class="form-group">
            <input type="text" class="form-control" name="project_description" id="project_description" placeholder="Enter project_description"></input>
          </div>
			
          <div class="form-group">
            <input type="text" class="form-control" name="datepicker1" id="datepicker1" placeholder="Enter project_start"></input>
          </div>
          
          <div class="form-group">
            <input type="text" class="form-control" name="datepicker2" id="datepicker2" placeholder="Enter project_end"></input>
          </div>
          
          <div class="form-group">
            <select class="form-control" name="project_type" id="project_type" >
              <option value="Religious">Religious</option>
              <option value="Hospital">Hospital</option>
               <option value="Education">Education</option>
            </select>
          </div>
           <div class="form-group">
            <input type="text" class="form-control" name="project_owner" id="project_owner" placeholder="Enter project_owner" value="<?php echo $id;?>"></input>
          </div>
			
          <div class="form-group">
            <input type="file" class="form-control" name="photo" id="photo" ></input>
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="addproject">Add</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
<?php
include('foundation_footer.php');
?>