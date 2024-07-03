<?php 
include_once 'layout/adminheader.php';
include_once 'controller/PublisherController.php';
$pub_controller=new PublisherController();
$publishers=$pub_controller->getPublishers();
if(isset($_GET['status'])){
    $status=$_GET['status'];
    if($status == 'success'){
       echo" <div class='alert alert-success'>Job is successfully updated</div>";
    }
    else if($status=='fail'){
        echo" <div class='alert alert-danger'>can not delete</div>";
    }
   
}
?>
<div class="container">
    <div class="row mt-3">
        <h2 style="color:#01031f;">Publisher List</h2>
    </div>

    <div class="row mt-3">
        <div class="col-md-2">
            <a href="add_publisher.php" class="btn" style="background-color:#01031f;color:#f4f4f4;">Add New Publisher</a>
        </div>       
        <div class="col-md-10 "></div>
        <div class="row mt-3">       
        <div class="col-md-10 m-auto">
        <table class=" table table-striped col-md-10 m-auto ">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i=1;
                foreach($publishers as $pub){                  
                        echo "<tr id='".$pub['id']."'>";
                        // echo "<td>".$pub['id']."</td>";
                        echo "<td>".($i++)."</td>";
                        echo "<td>".$pub['name']."</td>";
                        echo "<td>".$pub['address']."</td>";
                        echo"<td>
                        <button class='btn btn-success' id='pubview'>View</button>
                        <button class='btn btn-warning' id='pubedit'>Edit</button>               
                        <button class='btn btn-danger' id='pubdelete'>Delete</button>
                                </td>";
                        echo "</tr>";
                    }
                   
               
                ?>
                
            </tbody>
        </table>
        <!-- modalbox -->
        <div class="modal fade" id="publisherModal" tabindex="-1" aria-labelledby="publisherModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="publisherModalLabel">Publisher Info</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="publisherInfo"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modalbox -->
         <!-- modalbox -->
        <div class="modal fade" id="publisherModal1" tabindex="-1" aria-labelledby="publisherModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="publisherModalLabel">Publisher Info</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="publisherInfo1"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="save">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modalbox -->
        </div>
        </div>
    </div>
</div>
<?php 
include_once 'layout/adminfooter.php';
?>