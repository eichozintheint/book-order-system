<?php
include_once 'layout/header.php';
session_start();


if (isset($_GET['remove'])) {
    $id = $_GET['remove'];

   
    foreach ($_SESSION['cartList'] as $key => $item) {
        if ($item['id'] == $id) {
            unset($_SESSION['cartList'][$key]);
            // $_SESSION['cartList'] = array_values($_SESSION['cartList']);
            break;
        }
    }

    $_SESSION['cartList'] = array_values($_SESSION['cartList']);

    $_SESSION['cartListCount'] = count($_SESSION['cartList']);

    header('Location: cartList.php'); 
    exit();
}

$cartList = isset($_SESSION['cartList']) ? $_SESSION['cartList'] : [];

?>

<div class="main">
    <main class="sidebar-content">
    <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <table class="table table-striped table-hover cartListTable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(empty($cartList)){
                                echo "<tr><td colspan='6' style='text-align:center;'>No item in cartList!</td></tr>";
                            }
                            $id=0;
                            foreach($cartList as $key=>$book)
                            {
                                echo "<tr class='book_id' data-id='".$book['id']."'>";
                                echo "<td class='book_title' data-title='".$book['title']."'>".$book['title']."</td>";
                                echo "<td>".$book['category']."</td>";
                                echo "<td class='bookPrice'>".$book['price']."</td>";
                                ?>
                                <form action="">
                                    <td>
                                        <button class="btn btn-light decreaseBtn"> - </button>
                                        <span class="book-qty">1</span>
                                        <button class="btn btn-light increaseBtn"> + </button>
                                    </td>
                                </form>
                                <?php
                                echo "<td class='subTotalPrice'>".$book['price']."</td>";
                                echo "<td><a class='btn btn-danger' href='cartList.php?remove=" . $book['id'] . "'>X</a></td>";
                                ?>
                                <!-- <form action="">
                                    <td><button class="btn btn-danger deleteItem" data-id="<?php echo $book['id'] ?>"> X </button></td>
                                
                                     <td><a class="btn btn-danger" href="cartList.php?remove=<?php echo $book['id']; ?>">X</a></td>
                                </form> -->
                                <?php
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <div class="order">
                    <form action="">
                        <button class="btn btn-lg btn-dark float-end orderBtn">Order</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- <div class="cartList my-5">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <table class="table table-striped table-hover cartListTable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $id=0;
                            foreach($cartList as $key=>$book)
                            {
                                echo "<tr class='book_id' data-id='".$book['id']."'>";
                                echo "<td class='book_title' data-title='".$book['title']."'>".$book['title']."</td>";
                                echo "<td>".$book['category']."</td>";
                                echo "<td class='bookPrice'>".$book['price']."</td>";
                                ?>
                                <form action="">
                                    <td>
                                        <button class="btn btn-light decreaseBtn"> - </button>
                                        <span class="book-qty">1</span>
                                        <button class="btn btn-light increaseBtn"> + </button>
                                    </td>
                                </form>
                                <?php
                                echo "<td class='subTotalPrice'>".$book['price']."</td>";
                                ?>
                                <form action="">
                                    <td><button class="btn btn-danger deleteItem" data-id="<?php echo $book['id'] ?>"> X </button></td>
                                </form>
                                <?php
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <div class="order">
                    <form action="">
                        <button class="btn btn-lg btn-light float-end orderBtn">Order</button>
                    </form>
                </div>
            </div>
        </div>
</div> -->
<?php
include_once 'layout/footer.php';
?>
