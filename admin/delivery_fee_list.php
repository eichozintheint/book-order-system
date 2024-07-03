<?php 
include_once 'layout/adminheader.php';
include_once 'controller/DeliveryController.php';
$del_controller=new DeliveryController();
$dels=$del_controller->getDelivery();

?>
<div class="container">
    <div class="row mt-3">
        <h2 style="color:#01031f;">Delivery List</h2>
    </div>
    <div class="row mt-3">      
        <div class="col-md-10 "></div>
        <div class="row mt-3">       
        <div class="col-md-10 m-auto">
        <table class=" table table-striped col-md-10 m-auto ">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Township</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($dels as $del){     
                    
                        echo "<tr id='".$del['id']."'>";
                        echo "<td>".$del['id']."</td>";
                        echo "<td>".$del['township_name']."</td>";
                        echo "<td>".$del['price']."</td>";
                        echo"<td>
                        <button class='btn btn-warning' id='deledit'>Edit</button>               
                                </td>";
                        echo "</tr>";                                             
                    }                                 
                ?>
                
            </tbody>
        </table>
        <!-- modalbox -->
        <div class="modal fade" id="deliveryModal" tabindex="-1" aria-labelledby="publisherModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deliveryModalLabel"> Edit Delivery Info</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="deliveryInfo"></div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="saveDelivery">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
</div>
<?php 
include_once 'layout/adminfooter.php';
?>