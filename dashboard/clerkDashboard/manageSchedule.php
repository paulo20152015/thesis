<?php include_once('clerkIncludes/header.php'); ?>
<?php include_once('clerkIncludes/navigations.php'); ?>
   

    <div class="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <div class="btn-group" role="group" aria-label="...">
                    <a class="nav-link btn btn-primary" href="#" data-toggle="modal" data-target="#addParent">
                        <i class="fa fa-fw fa-pencil-square-o "></i>
                        <span class="nav-link-text">
                        Add Schedule</span>
                    </a>    
                </div>
            </ol>
        <div class="row">

             <div class="col-lg-12">
		<div class="card-header">
                    <i class="fa fa-table"></i>
                        Parent list : 
                </div>
            <div class="table-responsive">
		<table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>NAME </th>
                          <th>GENDER </th>
                          <th>Contact Number </th>
                          <th></th>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>     
                        <tr>
                            <td>pp</td>
                            <td>75</td>
                            <td>pp</td>
                          
                            <td><a class="form-control btn btn-primary" href="#" data-toggle="modal" data-target="#addSubject2">
                                <i class="fa fa-fw fa-pencil-square-o "></i>
                                <span class="nav-link-text">
                                Edit</span>
                                </a>
                            </td>
                                
                            <td><a class="form-control btn btn-danger" href="#" data-toggle="modal" data-target="#addSubject2">
                                <i class="fa fa-fw fa-pencil-square-o "></i>
                                <span class="nav-link-text">
                                Delete</span>
                                    </a>
                            </td>
                            
                        </tr>
                          

                        
                    </tbody>
		</table>
                    </div>
           
                </div>
                  
            </div>
		
			
        </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-wrapper -->
<?php include_once('clerkIncludes/footer.php'); ?>
    