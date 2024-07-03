<?php
include_once './layout/adminheader.php';
include_once 'controller/UserController.php';

$user_controller=new UserController();
$users=$user_controller->getUsers();
// var_dump($users);
?>

<main>
    <div class="container-fluid px-4">
        <h1>Users</h1>
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i=0;
                    foreach($users as $user){
                        echo "<tr class='user' user-id='".$user['id']."'>";
                        echo "<td>".(++$i)."</td>";
                        echo "<td>".$user['username']."</td>";
                        echo "<td>".$user['email']."</td>";
                        echo "<td>".$user['phone']."</td>";
                        echo "<td>";
                        ?>
                        <form action="">
                            <button class="btn btn-danger userDeleteBtn"> Delete </button>
                        </form>
                        <?php
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</main>

<?php
include_once './layout/adminfooter.php';
?>