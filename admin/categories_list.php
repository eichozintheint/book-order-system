<?php 
include_once 'layout/adminheader.php';
include_once 'controller/CategoryController.php';
$cat_controller = new CategoryController();
$categories=$cat_controller->getCategories();
if(isset($_GET['status'])){
    $status=$_GET['status'];
    if($status == 'success'){
       echo" <div class='alert alert-success'>Job is successfully updated</div>";
    }
    else if($status=='fail'){
        echo" <div class='alert alert-danger'>Can't delete this category</div>";
    }
    else if($status=='deleteSuccess'){
        echo" <div class='alert alert-danger'>Category is successfully deleted</div>";
    }
    else if($status == 'addcat'){
        echo "<div class='alert alert-success'>Category is successfully added</div>";
    }
    else if($status == "existcat"){
        echo "<div class='alert alert-danger'>Category is alreay exist</div>";
    }
    else if($status == 'updatesuccess'){
        echo "<div class='alert alert-success'>Category is successfully updated</div>";
    }
}

?>
<div class="container">
    <div class="row mt-3">
        <h2 style="color:#01031f;">Categories List</h2>
    </div>
    <div class="row mt-3">
        <div class="col-md-2">
            <a href="add_categories.php" class="btn" style="background-color:#01031f;color:#f4f4f4;">Add New Category</a>
        </div>
        <div class="col-md-10 "></div>
        <div class="row mt-3">       
        <div class="col-md-10 m-auto">
        <table class=" table table-striped col-md-10 m-auto ">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i=1;
                foreach($categories as $cat){
                    if($cat['deleted_at'] == NULL){
                        echo "<tr>";
                        // echo "<td>".$cat['id']."</td>";
                        echo "<td>".($i++)."</td>";
                        echo "<td>".$cat['name']."</td>";
                        echo "<td>".$cat['description']."</td>";
                        echo"<td><a  href='view_categories.php?id=".$cat['id']." 'class='btn btn-success mx-2'>View</a>
                                <a href='edit_categories.php?id=".$cat['id']."' class='btn btn-warning mx-2'>Edit</a>
                                <a href='delete_categories.php?id=".$cat['id']."' class='btn btn-danger mx-2' id='delete'>Delete</a>
                                </td>";
                        echo "</tr>";
                    }
                   
                }
                ?>
                
            </tbody>
        </table>
        </div>
        </div>
    </div>
</div>
<?php 
include_once 'layout/adminfooter.php';
?>