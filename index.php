<?php
  include('connection.php');
  session_start();
?>
<meta charset="utf-8"/>
<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/vendor/linearicons/style.css">
  <link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">

  <link rel="stylesheet" href="assets/css/main.css">
 
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">


 
<div class="main">  
      <!-- MAIN CONTENT -->
      <div class="main-content">
        <div class="col-md-12">
        <p id="brand_success">
          <?php
          if(isset($_SESSION['brand_success'])){
            echo $_SESSION['brand_success'];
            session_unset($_SESSION['brand_success']);
          }
          ?>

        </p>
        <div id="result"></div>
      
        
              <!-- BASIC TABLE -->
              <div class="panel">
                <div class="panel-heading">
                  <h3 class="panel-title"><h3>Welcome, Manage Warehouse</h3></h3>

                </div>
                <div class="col-sm-5">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_new_warehouse" >Add New</button>
                  
                </div>
                <br><br>
                
                <div id="table_content" class="panel-body"><br/><br/>
                  
                

 
                  
                 
                </div>
              </div>
              <!-- END BASIC TABLE -->
            </div>
             
            </div>
            </div>
         <!-- add new warehouse -->
  <div aria-hidden="true"  class="modal fade add_new_warehouse" id="add_new_warehouse" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Brands</h4>
        </div>
        <div class="modal-body">
          <form action="" method="" enctype="multipart/form-data" id="warehouse_form">
             <div class="form-group">
                <label>Warehouse Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter warehouse Name"></input>
              </div>
            <div class="form-group">
                <label>Manager</label>
                <select name="manager" class="form-control" id="manager">
                  <option value="Chris">Chris</option>
                  <option value="Martin">Martin</option>
                  <option value="Polard">Polard</option>
                  <option value="Dhoni">Dhoni</option>
                 
                  
                </select> 
              </div>
             
               <div class="form-group">
                <label>Address</label>
                <textarea type="text" name="address" class="form-control" id="address" placeholder="Enter Description"></textarea> 
              </div>
               <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone"></input>
              </div>

              <div id="result"></div>
              <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           <button type="button" class="btn btn-primary" id="add_warehouse" name="add_warehouse">Add</button>
        </div>
          </form>
        </div>
        
      </div>
      
    </div>
  </div>


  <!-- delete brands -->
  <?php 
    $brands = $connection->query("SELECT * FROM warehouse WHERE warehouse_id > 0");
    while($row = $brands->fetch_array()) { ?>


  <div aria-hidden="true" class="modal fade delete_warehouse" id="delete_warehouse<?php echo $row['warehouse_id']?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Are you sure ?</h4>
        </div>
        <div class="modal-body">
          <p>Want to delete this warehouse ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" id="delete_warehouse" data-id="<?php echo $row['warehouse_id']?>">Delete</button>
        </div>
      </div>
    </div>
  </div>

 <?php }
  ?>
  <!-- update warehouse  -->
<?php 
  $select_update = $connection->query("SELECT * FROM warehouse");
  while($fetch = $select_update->fetch_array()) {

?>
  <div class="modal fade" id="edit_warehouse<?php echo $fetch['warehouse_id']?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Warehouse</h4>
        </div>
        <div class="modal-body">
          <form action="edit_warehouse.php?warehouse_id=<?php echo $fetch['warehouse_id'];?>" method="post" enctype="multipart/form-data" id="form_warehouse">

             <div class="form-group">
                <label>Manager</label>
                <select name="manager" class="form-control" id="manager">
                <?php 

                $category = $connection->query("SELECT * FROM warehouse");
                while($cat = $category->fetch_array()) { ?>
               <option value="Chris"<?=$fetch['manager_name'] == 'Chris' ? ' selected="selected"' : '';?>>Chris</option>
                <option value="Martin"<?=$fetch['manager_name'] == 'Martin' ? ' selected="selected"' : '';?>>Martin</option>
                <option value="Polard"<?=$fetch['manager_name'] == 'Polard' ? ' selected="selected"' : '';?>>Polard</option>
                <option value="Dhoni"<?=$fetch['manager_name'] == 'Dhoni' ? ' selected="selected"' : '';?>>Dhoni</option>
                  
                <?php }
                ?>
               </select> 
              </div>
               <div class="form-group">
                <label>Brand Name</label>
                <input type="text" name="warehouse_name" id="warehouse_name" class="form-control" value="<?php echo $fetch['warehouse_name'];?>" ></input>
              </div>

               <div class="form-group">
                <label>Brand Name</label>
                <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $fetch['phone'];?>" ></input>
              </div>
             
             
              <div id="result"></div>
              <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-warning" id="edit_warehouse" name="edit_warehouse">Edit</button>
        </div>
          </form>
        </div>
        
      </div>
      
    </div>
  </div>

<?php } ?>
<div class="clearfix"></div>
    <footer>
      <div class="container-fluid">
        <p class="copyright">&copy; 2018 <a href="http://shafraz.freeiz.com" target="_blank">Webrider Solution</a>. All Rights Reserved.</p>
      </div>
    </footer>
  </div>
  <!-- END WRAPPER -->
  <!-- Javascript -->
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  

  <script type="text/javascript">
    $(document).ready(function(){
      $('#add_warehouse').click(function(){
        var name = $('#name').val();
        var manager = $('#manager').val();
        var address = $('#address').val();
        var phone = $('#phone').val();
       

        // alert(brands);
        $.ajax({
          url:"add_warehouse.php",
          type:"POST",
          data:{name:name, manager:manager, address:address, phone:phone},
          dataType:"JSON",
          success:function(data){
            $('.add_new_warehouse').modal('hide');
            
          }
        });

        $('#warehouse_form').trigger('reset');
      });

      setInterval(function(){
        $('#table_content').load('fetch_warehouse.php');
      }, 200);
    });


    $(document).on('click', '#delete_warehouse', function(){
      var ids = $(this).data('id');
      // alert(ids);
      $.ajax({
        url:"delete_warehouse.php",
        type:"post",
        data:"warehouse_id="+ids,
        success:function(data){
          $('.delete_warehouse').modal('hide');
        }
      });
    });
  </script>