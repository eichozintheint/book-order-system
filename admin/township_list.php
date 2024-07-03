<?php 
include_once 'layout/adminheader.php';
include_once 'controller/TownshipController.php';
$township_controller=new TownshipController();
$townships=$township_controller->getTownship();

?>
<div class="container">
    <div class="row mt-3">
        <h2 style="color:#01031f;">Township List</h2>
    </div>
    <div class="row mt-3">
        <div class="col-md-2">
            <button class="btn" style="background-color:#01031f;color:#f4f4f4;" id="addTownship">Add New Township</button>
        </div>       
        <div class="col-md-10 "></div>
        <div class="row mt-3">       
        <div class="col-md-10 m-auto">
        <table class=" table table-striped col-md-10 m-auto ">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Region</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($townships as $township){     
                    
                        echo "<tr id='".$township['id']."'>";
                        echo "<td>".$township['id']."</td>";
                        echo "<td>".$township['name']."</td>";
                        echo "<td>".$township['region_name']."</td>";
                        echo"<td>
                        <button class='btn btn-warning' id='townshipview'>View</button>             
                        
                                </td>";
                        echo "</tr>";                                             
                    }    
                    // <button class='btn btn-danger' id='townshipdelete'>Delete</button>                             
                ?>
                
            </tbody>
        </table>
        <!-- modalbox -->
        <div class="modal fade" id="townshipModal" tabindex="-1" aria-labelledby="publisherModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="townshipModalLabel">Region Info</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="townshipInfo"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modalbox -->
         <!-- modalbox -->
        <div class="modal fade" id="townshipModal1" tabindex="-1" aria-labelledby="publisherModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="townshipModalLabel">Township Info</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="townshipInfo1"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="saveTownship">Save</button>
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