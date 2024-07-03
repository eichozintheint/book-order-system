<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Book Heaven</title>
        <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" /> -->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark nav-background">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 " href="index.php" >BookHeaven</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 " id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <!-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div> -->
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sidebar-background" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="users.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Users
                            </a>
                            <a class="nav-link collapsed" href="books.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Books
                            </a>
                            <a class="nav-link collapsed" href="orders.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-file-invoice"></i></div>
                                Orders
                            </a>
                            <a class="nav-link collapsed" href="author_list.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Authors
                            </a>
                            <a class="nav-link collapsed" href="categories_list.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-layer-group"></i></div>
                                Categories
                            </a>
                            <a class="nav-link collapsed" href="publishers.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                                Publishers
                            </a>
                            <!-- <a class="nav-link collapsed" href="region_list.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-map"></i></div>
                                Regions
                            </a> -->
                            <a class="nav-link collapsed" href="township_list.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-map-pin"></i></div>
                                Townships
                            </a>
                            <a class="nav-link collapsed" href="delivery_fee_list.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-dollar-sign"></i></div>
                                Delivery Fee
                            </a>
                            <a class="nav-link collapsed" href="payment_list.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                Payment Type
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">