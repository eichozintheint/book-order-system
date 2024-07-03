<?php 
include_once 'layout/adminheader.php';
include_once 'controller/RegionController.php';
$region_controller=new RegionController();
$regions=$region_controller->getRegion();

?>
<div class="container">
    <div class="row mt-3">
        <h2 class="text-success">Region List</h2>
    </div>
    <div class="row mt-3">
        <div class="col-md-2">
            <button class="btn btn-primary" id="addregion">Add New Region</button>
        </div>       
        <div class="col-md-10 "></div>
        <div class="row mt-3">       
        <div class="col-md-10 m-auto">
        <table class=" table table-striped col-md-10 m-auto ">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($regions as $region){                  
                        echo "<tr id='".$region['id']."'>";
                        echo "<td>".$region['id']."</td>";
                        echo "<td>".$region['name']."</td>";
                        echo"<td>
                        <button class='btn btn-success' id='regionview'>View</button>
                        <button class='btn btn-warning' id='regionedit'>Edit</button>               
                        <button class='btn btn-danger' id='regiondelete'>Delete</button>
                                </td>";
                        echo "</tr>";
                    }
                   
               
                ?>
                
            </tbody>
        </table>
        <!-- modalbox -->
        <div class="modal fade" id="regionModal" tabindex="-1" aria-labelledby="publisherModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="regionModalLabel">Region Info</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="regionInfo"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modalbox -->
         <!-- modalbox -->
        <div class="modal fade" id="regionModal1" tabindex="-1" aria-labelledby="publisherModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="regionModalLabel">Publisher Info</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="regionInfo1"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="saveregion">Save</button>
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