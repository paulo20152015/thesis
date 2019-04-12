<?php include_once('clerkIncludes/header.php'); ?>
<?php include_once('clerkIncludes/navigations.php'); ?>
 <?php 
 //
 if(isset($_POST['floor'])){
     if(!empty($_POST['floorNum'])){
         $fNum   = $_POST['floorNum'];
         $sql    = $classes->checkExistQuery('floor','floorNum');
         $count  = $classes->checkExist($sql,$fNum);
         if($count == 0){
         $sql    = $classes->insertQuery('floor','floorNum');
         $result = $classes->insert($sql,$fNum);
            if($result == true){
                $fmes = "Floor Added";
            }else{
                $fmes = "Query Fail";
            }
         }else{
             $fmes = "Floor Exist";
         }
     }
 }
 
  if(isset($_POST['room'])){
     if(!empty($_POST['roomNum']) && !empty($_POST['roomName']) && !empty($_POST['floorNum']) ){
         $roomNum   = $_POST['roomNum'];
         $roomName  = $_POST['roomName'];
         $fNum      = $_POST['floorNum'];
         $sql       = $classes->checkExistTwoQuery('room','roomNum','floorNum');
         $count     = $classes->checkExistTwo($sql,$roomNum,$fNum);
         if($count == 0){
         $sql    = $classes->insertThreeQuery('room','roomNum','roomName','floorNum');
         $result = $classes->insertThreeReturn($sql,$roomNum,$roomName,$fNum);
            if($result == true){
                $rmes = "Room Added";
            }else{
                $rmes = "Query Fail";
            }
         }else{
             $rmes = "Room Exist";
         }
     }
 }
 ?>

    <div class="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumbs -->
            <ol class="breadcrumb">

            </ol>
            
        <div class="row">

          <div class="col-lg-6">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-university"></i>
                 Room Number
              </div>
              <div class="card-body">
                
                    <form action="roomsAndFloor.php" method="post">
                        <div class="form-group">
                            <label>Room Number</label>
                            <input type="number" class="form-control" name="roomNum" placeholder="Enter Room Number"  required>
                        </div>
                        <div class="form-group">
                            <label>Room Name</label>
                            <input type="text" class="form-control" name="roomName" placeholder="Enter Floor Name"  required>
                        </div>
                        <div class="form-group">
                            <label>Floor</label>
                            <select class="form-control" name="floorNum">
                                <?php 
                                 $sql = $classes->selectAllQueryAsc('floor','floorNum');
                                 $smt = $classes->selectAll($sql);
                                while($row = $smt->fetch(PDO::FETCH_ASSOC)){
                                 $floor = $row['floorNum'];   
                                ?>
                                <option value="<?php echo $floor; ?>" ><?php echo $floor; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                            <?php echo $formClass->triggerField('room');?>
                        <button class="btn btn-success form-control"><i class="fa fa-lg fa-plus-circle"></i> </button>
                    </form>
                
              </div>
              <div class="card-footer small text-muted">
               <?php if(!empty($rmes)){
                     echo $rmes;
                 }?>
              </div>
            </div>
             
                        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-university"></i>
            Rooms
          </div>
          <div class="card-body">
             <table class='table table-bordered' width='100%' cellspacing='0'>
                    <thead>
                    <tr>
                      <th>Room Number</th>    
                      <th>Room Name</th>
                      <th>Floor #</th>  
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      $sql = $classes->selectAllQueryAsc('room','floorNum');
                      $smt = $classes->selectAll($sql);
                      while($row = $smt->fetch(PDO::FETCH_ASSOC) ){
                          $roomNum = $row['roomNum'];
                          $roomName = $row['roomName'];          
                          $fNum = $row['floorNum'];
                          ?>
                     <tr>
                      <td><?php echo $roomNum; ?></td>
                      <td><?php echo $roomName; ?></td>
                      <td><?php echo $fNum; ?></td>
                    </tr>
                      <?php } ?>
                  </tbody>
            </table>
          </div>
          <div class="card-footer small text-muted">
            
          </div>
        </div> 
             
        </div>
            
         <div class="col-lg-6">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-university"></i>
                 Floor Number
              </div>
              <div class="card-body">
                
                    <form action="roomsAndFloor.php" method="post">
                        <div class="form-group">
                            <label>Floor</label>
                            <input type="number" class="form-control" name="floorNum" placeholder="Enter Floor Number"  required>
                        </div>
                            <?php echo $formClass->triggerField('floor');?>
                        <button class="btn btn-success form-control"><i class="fa fa-lg fa-plus-circle"></i> </button>
                    </form>
                
              </div>
              <div class="card-footer small text-muted">
               <?php if(!empty($fmes)){
                     echo $fmes;
                 }?>
              </div>
            </div>
             
                        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-university"></i>
            Floors
          </div>
          <div class="card-body">
             <table class='table table-bordered' width='100%' cellspacing='0'>
                    <thead>
                    <tr>
                      <th>Floor</th>                
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      $sql = $classes->selectAllQueryAsc('floor','floorNum');
                      $smt = $classes->selectAll($sql);
                      while($row = $smt->fetch(PDO::FETCH_ASSOC) ){
                          $floor = $row['floorNum'];
                          ?>
                     <tr>
                      <td>Floor Num <?php echo $floor; ?></td>
                    </tr>
                      <?php } ?>
                  </tbody>
            </table>
          </div>
          <div class="card-footer small text-muted">
            
          </div>
        </div> 
             
        </div>
                  
        </div>
		
			
        </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-wrapper -->
<?php include_once('clerkIncludes/footer.php'); ?>
    