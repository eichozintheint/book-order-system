<?php
include_once 'layout/adminheader.php';
include_once 'controller/BookController.php';

$book_controller=new BookController();
$books=$book_controller->getBooks();
// var_dump($books);
?>

<!-- <main>
    <div class="container-fluid px-4">
        <h1>Book Lists</h1>
        <div class="my-4">
            <a href="bookCreate.php" class="btn btn-secondary">Create New Book</a>
        </div>
        <table class="table table-striped" id="myTable">
            <thead>
                <th>No</th>
                <th>Title</th>
                <th>Image</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Status</th>
                <th>Author</th>
                <th>Publisher</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                    $i=0;
                    foreach($books as $book){
                        if($book['delete_status']!='deleted'){
                            echo "<tr class='book' id='".$book['id']."'>";
                            echo "<td>".(++$i)."</td>";
                            echo "<td>".$book['title']."</td>";
                            echo "<td><img src='../BookImages/".$book['image']."' width='90px' height='120px' /></td>";
                            echo "<td>".$book['category']."</td>";
                            echo "<td>".$book['price']."</td>";
                            echo "<td>".$book['stock']."</td>";
                            echo "<td>".$book['status']."</td>";
                            echo "<td>".$book['author']."</td>";
                            echo "<td>".$book['publisher']."</td>";
                            echo "<td><a class='btn btn-warning mx-2' href='viewBook.php?id=".$book['id']."'>View</a><a class='btn btn-success mx-2' href='bookEdit.php?id=".$book['id']."'>Edit</a><form action=''><button class='btn btn-danger deleteBook mx-2'>Delete</button></form></td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</main> -->

<main>
    <div class="container-fluid px-4">
        <h1>Book Lists</h1>
        <div class="my-4">
            <a href="bookCreate.php" class="btn btn-secondary" style="background-color:#01031f;color:#f4f4f4;">Create New Book</a>
        </div>
        <table class="table table-striped" id="myTable">
            <thead>
                <th>No</th>
                <th>Title</th>
                <th>Image</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Status</th>
                <th>Author</th>
                <th>Publisher</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                    $i=0;
                    foreach($books as $book){
                        if($book['delete_status']!='deleted'){
                            echo "<tr class='book' id='".$book['id']."'>";
                            echo "<td>".(++$i)."</td>";
                            echo "<td>".$book['title']."</td>";
                            echo "<td><img src='../BookImages/".$book['image']."' width='90px' height='120px' /></td>";
                            echo "<td>".$book['category']."</td>";
                            echo "<td>".$book['price']."</td>";
                            echo "<td>".$book['stock']."</td>";
                            echo "<td>".$book['status']."</td>";
                            echo "<td>".$book['author']."</td>";
                            echo "<td>".$book['publisher']."</td>";
                            echo "<td>
                                    <div style='display: flex; gap: 5px;'>
                                        <a class='btn btn-warning' href='viewBook.php?id=".$book['id']."'>View</a>
                                        <a class='btn btn-success' href='bookEdit.php?id=".$book['id']."'>Edit</a>
                                        <form action=''>
                                            
                                            <button class='btn btn-danger deleteBook'>Delete</button>
                                        </form>
                                    </div>
                                  </td>";
                            echo "</tr>";
                        }
                        
                    }
                ?>
            </tbody>
        </table>
    </div>
</main>


<?php
include_once 'layout/adminfooter.php';
?>
