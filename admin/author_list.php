<?php 
include_once 'layout/adminheader.php';
include_once 'controller/AuthorController.php';
$authors_controller =new AuthorController();
$authors=$authors_controller->getAuthors();
if(isset($_GET['status'])){
    $status=$_GET['status'];
    if($status == 'success'){
       echo" <div class='alert alert-success'>Job is successfully updated</div>";
    }
    else if($status=='fail'){
        echo" <div class='alert alert-danger'>Can not delete this author!</div>";
    }
}

?>
<div class="container">
    <div class="row">
        <h2 class="text-dark">Authors List</h2>
    </div>
    <div class="row">
        <div class="col-md-8"></div>
        <div class="col-md-4 mb-3">
        <a href="add_author.php" type="button" class="btn btn-dark" style="background-color:#01031f;color:#f4f4f4;" id="addAuthor">
            Add New Author
        </a>
    </div>
    <div class="row">       
        <div class="col-md-10 m-auto">
        <table class=" table table-striped">
            <thead>
                <tr>
                    <th class="text-dark">No</th>
                    <th class="text-dark">Name</th>
                    <th class="text-dark">Image</th>
                    <th class="text-dark">Email</th>
                    <th class="text-dark">Phone</th>
                    <th class="text-dark">Address</th>
                    <th class="text-dark">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($authors as $author){
                        if($author['deleted_at'] == NULL){
                            echo "<tr>";
                            echo "<td>".$author['id']."</td>";
                            echo "<td>".$author['name']."</td>";
                            echo "<td><img src='../AuthorImages/".$author['image']."' width='90px' height='120px' /></td>";
                            echo "<td>".$author['email']."</td>";
                            echo "<td>".$author['phone']."</td>";
                            echo "<td>".$author['address']."</td>";
                            echo"<td><a  href='view_author.php?id=".$author['id']." 'class='btn btn-success mx-1'>View</a>
                            <a href='edit_author.php?id=".$author['id']."' class='btn btn-warning mx-1'>Edit</a>
                            <a href='delete_author.php?id=".$author['id']."' class='btn btn-danger mx-1'>Delete</a>
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
<?php 
include_once 'layout/adminfooter.php';
?>