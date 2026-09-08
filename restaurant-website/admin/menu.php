<?php
// menu.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Restaurant Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #1e293b;
            overflow-x: hidden;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            background: #fff;
            border-right: 1px solid #e5e7eb;
            padding: 20px 15px;
            z-index: 1000;
            overflow-y: auto;
        }

        .restaurant-logo {
            height: 65px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 12px;
            margin-bottom: 25px;
            border-bottom: 1px solid #e5e7eb;
        }

        .restaurant-logo i {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff7e6;
            color: #f59e0b;
            border-radius: 12px;
            font-size: 22px;
        }

        .restaurant-logo h2 {
            font-size: 20px;
        }

        .menu {
            list-style: none
        }

        .menu li {
            margin: 6px 0
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 13px 15px;
            text-decoration: none;
            color: #64748b;
            border-radius: 8px;
            transition: .3s
        }

        .menu a i {
            width: 20px;
            text-align: center
        }

        .menu a:hover,
        .menu a.active {
            background: #fff4db;
            color: #f59e0b;
            transform: translateX(4px)
        }

        .logout {
            margin-top: 7px;
            border: 1px solid #fecaca;
            background: #fff5f5;
            color: #ef4444 !important;
        }

        .logout i {
            color: #b91c1c;
        }

        .logout:hover {
            background: #fef2f2 !important;
            color: #dc2626 !important;
            transform: translateX(3px);
        }

        .main-content {
            margin-left: 260px;
            width: calc(100% - 260px);
            min-height: 100vh;
            padding: 25px 30px;
        }

        .top-header {
            width: 100%;
            height: 74px;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 25px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(15, 23, 42, .03);
        }

        .top-header h1 {
            font-size: 24px;
            font-weight: 700;
            color: #1e293b;
        }

        .admin-button {
            height: 43px;
            min-width: 115px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            background: #fff;
            color: #334155;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-size: 14px;
        }

        .admin-button i {
            color: #f59e0b;
        }

        .hamburger {
            display: none;
            width: 43px;
            height: 43px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            background: #fff;
            color: #334155;
            font-size: 19px;
            cursor: pointer;
        }

        .page-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .page-title h2 {
            font-size: 22px;
            color: #1e293b;
        }

        .item-count {
            background: #fff3d6;
            color: #f59e0b;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }

        .toolbar {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 15px;
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
        }

        .search-box {
            flex: 1;
            height: 45px;
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        .search-box input {
            width: 100%;
            height: 100%;
            border: 1px solid #dbe2ea;
            border-radius: 9px;
            outline: none;
            padding: 0 15px 0 43px;
            font-size: 14px;
        }

        .search-box input:focus {
            border-color: #f59e0b;
        }

        .add-btn {
            height: 45px;
            padding: 0 20px;
            border: 0;
            border-radius: 9px;
            background: #f59e0b;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .add-btn:hover {
            background: #d97706;
        }

        .menu-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(15, 23, 42, .03);
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .menu-table {
            width: 100%;
            min-width: 950px;
            border-collapse: collapse;
        }

        .menu-table th {
            height: 52px;
            background: #f8fafc;
            color: #475569;
            font-size: 13px;
            font-weight: 600;
            text-align: left;
            padding: 0 15px;
            border-bottom: 1px solid #e2e8f0;
        }

        .menu-table td {
            height: 85px;
            padding: 10px 15px;
            border-bottom: 1px solid #edf0f4;
            font-size: 14px;
            color: #334155;
        }

        .menu-table tr:last-child td {
            border-bottom: 0;
        }

        .menu-table tbody tr:hover {
            background: #fffaf0;
        }

        .food-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .food-image {
            width: 55px;
            height: 55px;
            border-radius: 10px;
            overflow: hidden;
            background: #fff3d6;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #f59e0b;
            font-size: 20px;
            flex-shrink: 0;
        }

        .food-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .food-name {
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 5px;
        }

        .food-description {
            color: #94a3b8;
            font-size: 12px;
            max-width: 280px;
            line-height: 1.4;
        }

        .price {
            font-weight: 700;
            color: #1e293b;
        }

        .stock-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .stock-badge.in-stock {
            color: #059669;
            background: #ecfdf5;
        }

        .stock-badge.out-stock {
            color: #dc2626;
            background: #fef2f2;
        }

        .stock-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: currentColor;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 44px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            inset: 0;
            background: #cbd5e1;
            border-radius: 30px;
            transition: .3s;
        }

        .slider:before {
            content: "";
            position: absolute;
            width: 18px;
            height: 18px;
            left: 3px;
            top: 3px;
            background: #fff;
            border-radius: 50%;
            transition: .3s;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .2);
        }

        .switch input:checked+.slider {
            background: #10b981;
        }

        .switch input:checked+.slider:before {
            transform: translateX(20px);
        }

        .actions {
            display: flex;
            gap: 7px;
        }

        .action-btn {
            width: 35px;
            height: 35px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .edit-btn {
            color: #2563eb;
        }

        .edit-btn:hover {
            background: #eff6ff;
            border-color: #bfdbfe;
        }

        .delete-btn {
            color: #ef4444;
        }

        .delete-btn:hover {
            background: #fef2f2;
            border-color: #fecaca;
        }

        .modal {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, .45);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 2000;
            padding: 20px;
        }

        .modal.show {
            display: flex;
        }

        .modal-box {
            width: 100%;
            max-width: 550px;
            max-height: 90vh;
            overflow-y: auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 20px 50px rgba(15, 23, 42, .2);
        }

        .modal-header {
            height: 65px;
            padding: 0 20px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal-header h3 {
            font-size: 19px;
        }

        .close-btn {
            width: 35px;
            height: 35px;
            border: 0;
            border-radius: 8px;
            background: #f8fafc;
            color: #64748b;
            cursor: pointer;
        }

        .close-btn:hover {
            background: #fef2f2;
            color: #ef4444;
        }

        .modal-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 17px;
        }

        .form-group label.form-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #475569;
            margin-bottom: 7px;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group textarea {
            width: 100%;
            border: 1px solid #dbe2ea;
            border-radius: 8px;
            outline: none;
            padding: 11px 12px;
            font-size: 14px;
            color: #334155;
        }

        .form-group input[type="text"],
        .form-group input[type="number"] {
            height: 44px;
        }

        .form-group textarea {
            height: 90px;
            resize: none;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #f59e0b;
        }

        .image-upload {
            border: 2px dashed #dbe2ea;
            border-radius: 10px;
            min-height: 130px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 8px;
            cursor: pointer;
            color: #94a3b8;
            transition: .2s;
            overflow: hidden;
            position: relative;
        }

        .image-upload:hover {
            border-color: #f59e0b;
            background: #fffaf0;
        }

        .image-upload i {
            font-size: 28px;
            color: #f59e0b;
        }

        .image-upload span {
            font-size: 13px;
        }

        .image-upload input {
            display: none;
        }

        .image-preview {
            width: 100%;
            height: 180px;
            object-fit: cover;
            display: none;
        }

        .image-preview.show {
            display: block;
        }

        .upload-content.hide {
            display: none;
        }

        .stock-control {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .stock-control-text {
            font-size: 13px;
            font-weight: 600;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding: 15px 20px 20px;
        }

        .cancel-btn {
            height: 42px;
            padding: 0 18px;
            border: 1px solid #dbe2ea;
            background: #fff;
            color: #475569;
            border-radius: 8px;
            cursor: pointer;
        }

        .save-btn {
            height: 42px;
            padding: 0 20px;
            border: 0;
            background: #f59e0b;
            color: #fff;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
        }

        .save-btn:hover {
            background: #d97706;
        }

        .sidebar-overlay {
            display: none;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @media(max-width:900px) {
            .toolbar {
                flex-wrap: wrap;
            }

            .search-box {
                flex-basis: 100%;
            }
        }

        @media(max-width:768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform .3s ease;
                box-shadow: 5px 0 20px rgba(0, 0, 0, .08);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 20px;
            }

            .hamburger {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .sidebar-overlay {
                display: block;
                position: fixed;
                inset: 0;
                background: rgba(15, 23, 42, .35);
                z-index: 999;
                opacity: 0;
                visibility: hidden;
                transition: .3s;
            }

            .sidebar-overlay.show {
                opacity: 1;
                visibility: visible;
            }
        }

        @media(max-width:550px) {
            .main-content {
                padding: 15px;
            }

            .top-header {
                height: auto;
                min-height: 70px;
                padding: 12px 15px;
            }

            .top-header h1 {
                font-size: 19px;
            }

            .admin-button {
                min-width: auto;
                padding: 0 12px;
            }

            .admin-button span {
                display: none;
            }

            .page-title h2 {
                font-size: 19px;
            }

            .modal {
                padding: 10px;
            }

            .modal-box {
                max-height: 95vh;
            }
        }

        @media(max-width:400px) {
            .main-content {
                padding: 10px;
            }

            .add-btn {
                padding: 0 14px;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">
        <div class="restaurant-logo">
            <i class="fa-regular fa-circle-user"></i>
            <h2>Admin</h2>
        </div>

        <ul class="menu">
            <li><a href="dashboard.php"><i class="fa-solid fa-chart-line"></i>Dashboard</a></li>
            <li><a href="bill_generate.php"><i class="fa-solid fa-file-invoice"></i>Generate Bill</a></li>
            <li><a href="order.php"><i class="fa-solid fa-receipt"></i>Orders</a></li>
            <li><a href="menu.php" class="active"><i class="fa-solid fa-burger"></i>Menu</a></li>
            <li><a href="contact.php"><i class="fa-solid fa-envelope"></i>Contact Form</a></li>
            <li><a href="online-orders.php"><i class="fa-solid fa-bag-shopping"></i>Online Order</a></li>
            <li>
                <a href="party-request.php">
                    <i class="fa-solid fa-champagne-glasses"></i>
                    <span>Party Request</span>
                </a>
            </li>
            <li>
                <a href="party-request-data.php">
                    <i class="fa-solid fa-database"></i>
                    <span>Party Data</span>
                </a>
            </li>

            <li>
                <a href="account-opening.php">
                    <i class="fa-solid fa-user-plus"></i>
                    <span>Account Opening</span>
                </a>
            </li>
            <li>
                <a href="account-closing.php">
                    <i class="fa-solid fa-user-xmark"></i>
                    <span>Account Closing</span>
                </a>
            </li>
            <li><a href="setting.php"><i class="fa-solid fa-gear"></i>Setting</a></li>
            <li><a href="../logout.php" class="logout"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
        </ul>
    </aside>

    <div class="sidebar-overlay" id="overlay" onclick="closeSidebar()"></div>

    <!-- MAIN CONTENT -->
    <main class="main-content">

        <!-- HEADER -->
        <header class="top-header">

            <button class="hamburger" onclick="toggleSidebar()">
                <i class="fa-solid fa-bars"></i>
            </button>

            <h1>Menu</h1>

            <div class="admin-button">
                <i class="fa-regular fa-circle-user"></i>
                <span>admin</span>
            </div>

        </header>

        <!-- TITLE -->
        <div class="page-title">
            <h2>Menu Items</h2>

            <div class="item-count">
                <span id="itemCount">5</span> Items
            </div>
        </div>

        <!-- TOOLBAR -->
        <div class="toolbar">

            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="searchInput" placeholder="Search item name...">
            </div>

            <button class="add-btn" onclick="openAddModal()">
                <i class="fa-solid fa-plus"></i>
                Add Item
            </button>

        </div>

        <!-- MENU TABLE -->
        <div class="menu-card">

            <div class="table-wrapper">

                <table class="menu-table">

                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Stock</th>
                            <th>Availability</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody id="menuTable">

                        <tr>
                            <td>
                                <div class="food-info">
                                    <div class="food-image">
                                        <i class="fa-solid fa-bowl-food"></i>
                                    </div>
                                    <div>
                                        <div class="food-name">Chicken Biryani</div>
                                    </div>
                                </div>
                            </td>

                            <td class="price">₹250</td>

                            <td>
                                <div class="food-description">
                                    Delicious chicken biryani cooked with aromatic spices and basmati rice.
                                </div>
                            </td>

                            <td>
                                <label class="switch">
                                    <input type="checkbox" checked onchange="changeStock(this)">
                                    <span class="slider"></span>
                                </label>
                            </td>

                            <td>
                                <span class="stock-badge in-stock">
                                    <span class="stock-dot"></span>
                                    In Stock
                                </span>
                            </td>

                            <td>
                                <div class="actions">
                                    <button class="action-btn edit-btn" onclick="editItem(this)">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button class="action-btn delete-btn" onclick="deleteItem(this)">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="food-info">
                                    <div class="food-image">
                                        <i class="fa-solid fa-bowl-food"></i>
                                    </div>
                                    <div>
                                        <div class="food-name">Mutton Biryani</div>
                                    </div>
                                </div>
                            </td>

                            <td class="price">₹300</td>

                            <td>
                                <div class="food-description">
                                    Flavorful mutton biryani prepared with tender mutton and special spices.
                                </div>
                            </td>

                            <td>
                                <label class="switch">
                                    <input type="checkbox" checked onchange="changeStock(this)">
                                    <span class="slider"></span>
                                </label>
                            </td>

                            <td>
                                <span class="stock-badge in-stock">
                                    <span class="stock-dot"></span>
                                    In Stock
                                </span>
                            </td>

                            <td>
                                <div class="actions">
                                    <button class="action-btn edit-btn" onclick="editItem(this)">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button class="action-btn delete-btn" onclick="deleteItem(this)">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="food-info">
                                    <div class="food-image">
                                        <i class="fa-solid fa-bowl-food"></i>
                                    </div>
                                    <div>
                                        <div class="food-name">Veg Biryani</div>
                                    </div>
                                </div>
                            </td>

                            <td class="price">₹220</td>

                            <td>
                                <div class="food-description">
                                    Fresh vegetable biryani made with basmati rice and flavorful herbs.
                                </div>
                            </td>

                            <td>
                                <label class="switch">
                                    <input type="checkbox" checked onchange="changeStock(this)">
                                    <span class="slider"></span>
                                </label>
                            </td>

                            <td>
                                <span class="stock-badge in-stock">
                                    <span class="stock-dot"></span>
                                    In Stock
                                </span>
                            </td>

                            <td>
                                <div class="actions">
                                    <button class="action-btn edit-btn" onclick="editItem(this)">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button class="action-btn delete-btn" onclick="deleteItem(this)">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="food-info">
                                    <div class="food-image">
                                        <i class="fa-solid fa-utensils"></i>
                                    </div>
                                    <div>
                                        <div class="food-name">Paneer Butter Masala</div>
                                    </div>
                                </div>
                            </td>

                            <td class="price">₹320</td>

                            <td>
                                <div class="food-description">
                                    Soft paneer cooked in a creamy tomato and butter gravy.
                                </div>
                            </td>

                            <td>
                                <label class="switch">
                                    <input type="checkbox" checked onchange="changeStock(this)">
                                    <span class="slider"></span>
                                </label>
                            </td>

                            <td>
                                <span class="stock-badge in-stock">
                                    <span class="stock-dot"></span>
                                    In Stock
                                </span>
                            </td>

                            <td>
                                <div class="actions">
                                    <button class="action-btn edit-btn" onclick="editItem(this)">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button class="action-btn delete-btn" onclick="deleteItem(this)">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="food-info">
                                    <div class="food-image">
                                        <i class="fa-solid fa-bread-slice"></i>
                                    </div>
                                    <div>
                                        <div class="food-name">Butter Naan</div>
                                    </div>
                                </div>
                            </td>

                            <td class="price">₹100</td>

                            <td>
                                <div class="food-description">
                                    Soft and delicious naan topped with melted butter.
                                </div>
                            </td>

                            <td>
                                <label class="switch">
                                    <input type="checkbox" onchange="changeStock(this)">
                                    <span class="slider"></span>
                                </label>
                            </td>

                            <td>
                                <span class="stock-badge out-stock">
                                    <span class="stock-dot"></span>
                                    Out of Stock
                                </span>
                            </td>

                            <td>
                                <div class="actions">
                                    <button class="action-btn edit-btn" onclick="editItem(this)">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button class="action-btn delete-btn" onclick="deleteItem(this)">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </main>

    <!-- ADD / EDIT MODAL -->
    <div class="modal" id="itemModal">

        <div class="modal-box">

            <div class="modal-header">

                <h3 id="modalTitle">Add Menu Item</h3>

                <button class="close-btn" onclick="closeModal()">
                    <i class="fa-solid fa-xmark"></i>
                </button>

            </div>

            <div class="modal-body">

                <div class="form-group">

                    <label class="form-label">Item Name</label>

                    <input
                        type="text"
                        id="itemName"
                        placeholder="Enter item name">

                </div>

                <div class="form-group">

                    <label class="form-label">Item Price</label>

                    <input
                        type="number"
                        id="itemPrice"
                        placeholder="Enter item price">

                </div>

                <div class="form-group">

                    <label class="form-label">Item Description</label>

                    <textarea
                        id="itemDescription"
                        placeholder="Enter item description"></textarea>

                </div>

                <div class="form-group">

                    <label class="form-label">Item Image</label>

                    <label class="image-upload">

                        <input
                            type="file"
                            id="itemImage"
                            accept="image/*"
                            onchange="previewImage(event)">

                        <div class="upload-content" id="uploadContent">

                            <i class="fa-solid fa-cloud-arrow-up"></i>

                            <span>Click to upload item image</span>

                        </div>

                        <img
                            id="imagePreview"
                            class="image-preview">

                    </label>

                </div>

                <div class="form-group">

                    <label class="form-label">Stock Status</label>

                    <div class="stock-control">

                        <label class="switch">

                            <input
                                type="checkbox"
                                id="itemStock"
                                checked>

                            <span class="slider"></span>

                        </label>

                        <span
                            id="stockText"
                            class="stock-control-text"
                            style="color:#059669;">
                            In Stock
                        </span>

                    </div>

                </div>

            </div>

            <div class="modal-footer">

                <button class="cancel-btn" onclick="closeModal()">
                    Cancel
                </button>

                <button class="save-btn" onclick="saveItem()">
                    <i class="fa-solid fa-check"></i>
                    Save Item
                </button>

            </div>

        </div>

    </div>

    <script>
        let editRow = null;

        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("show");
            document.getElementById("overlay").classList.toggle("show");
        }

        function closeSidebar() {
            document.getElementById("sidebar").classList.remove("show");
            document.getElementById("overlay").classList.remove("show");
        }

        function openAddModal() {
            editRow = null;
            document.getElementById("modalTitle").textContent = "Add Menu Item";
            document.getElementById("itemName").value = "";
            document.getElementById("itemPrice").value = "";
            document.getElementById("itemDescription").value = "";
            document.getElementById("itemStock").checked = true;
            document.getElementById("stockText").textContent = "In Stock";
            document.getElementById("stockText").style.color = "#059669";
            document.getElementById("itemImage").value = "";
            document.getElementById("imagePreview").src = "";
            document.getElementById("imagePreview").classList.remove("show");
            document.getElementById("uploadContent").classList.remove("hide");
            document.getElementById("itemModal").classList.add("show");
        }

        function closeModal() {
            document.getElementById("itemModal").classList.remove("show");
        }

        function previewImage(event) {
            const file = event.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("imagePreview").src = e.target.result;
                document.getElementById("imagePreview").classList.add("show");
                document.getElementById("uploadContent").classList.add("hide");
            };
            reader.readAsDataURL(file);
        }
        document.getElementById("itemStock").addEventListener("change", function() {
            const text = document.getElementById("stockText");
            if (this.checked) {
                text.textContent = "In Stock";
                text.style.color = "#059669";
            } else {
                text.textContent = "Out of Stock";
                text.style.color = "#dc2626";
            }
        });

        function changeStock(input) {
            const row = input.closest("tr");
            const status = row.querySelector(".stock-badge");
            if (input.checked) {
                status.className = "stock-badge in-stock";
                status.innerHTML = '<span class="stock-dot"></span> In Stock';
            } else {
                status.className = "stock-badge out-stock";
                status.innerHTML = '<span class="stock-dot"></span> Out of Stock';
            }
        }

        function saveItem() {
            const name = document.getElementById("itemName").value.trim();
            const price = document.getElementById("itemPrice").value.trim();
            const description = document.getElementById("itemDescription").value.trim();
            const stock = document.getElementById("itemStock").checked;
            const image = document.getElementById("imagePreview").src;
            if (name === "") {
                alert("Please enter item name.");
                return;
            }
            if (price === "") {
                alert("Please enter item price.");
                return;
            }
            if (description === "") {
                alert("Please enter item description.");
                return;
            }
            if (editRow) {
                updateRow(editRow, name, price, description, stock, image);
            } else {
                createRow(name, price, description, stock, image);
            }
            updateCount();
            closeModal();
        }

        function createRow(name, price, description, stock, image) {
            const tbody = document.getElementById("menuTable");
            const row = document.createElement("tr");
            let imageHTML = '<i class="fa-solid fa-utensils"></i>';
            if (image) {
                imageHTML = '<img src="' + image + '">';
            }
            row.innerHTML = `
        <td>
            <div class="food-info">
                <div class="food-image">${imageHTML}</div>
                <div>
                    <div class="food-name">${escapeHTML(name)}</div>
                </div>
            </div>
        </td>
        <td class="price">₹${escapeHTML(price)}</td>
        <td>
            <div class="food-description">${escapeHTML(description)}</div>
        </td>
        <td>
            <label class="switch">
                <input type="checkbox" ${stock?"checked":""} onchange="changeStock(this)">
                <span class="slider"></span>
            </label>
        </td>
        <td>
            <span class="stock-badge ${stock?"in-stock":"out-stock"}">
                <span class="stock-dot"></span>
                ${stock?"In Stock":"Out of Stock"}
            </span>
        </td>
        <td>
            <div class="actions">
                <button class="action-btn edit-btn" onclick="editItem(this)">
                    <i class="fa-solid fa-pen"></i>
                </button>
                <button class="action-btn delete-btn" onclick="deleteItem(this)">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>
        </td>
    `;
            tbody.appendChild(row);
        }

        function updateRow(row, name, price, description, stock, image) {
            row.querySelector(".food-name").textContent = name;
            row.querySelector(".price").textContent = "₹" + price;
            row.querySelector(".food-description").textContent = description;
            const checkbox = row.querySelector(".switch input");
            checkbox.checked = stock;
            const status = row.querySelector(".stock-badge");
            if (stock) {
                status.className = "stock-badge in-stock";
                status.innerHTML = '<span class="stock-dot"></span> In Stock';
            } else {
                status.className = "stock-badge out-stock";
                status.innerHTML = '<span class="stock-dot"></span> Out of Stock';
            }
            if (image) {
                row.querySelector(".food-image").innerHTML = '<img src="' + image + '">';
            }
        }

        function editItem(button) {
            editRow = button.closest("tr");
            const name = editRow.querySelector(".food-name").textContent;
            const price = editRow.querySelector(".price").textContent.replace("₹", "");
            const description = editRow.querySelector(".food-description").textContent;
            const stock = editRow.querySelector(".switch input").checked;
            const imageElement = editRow.querySelector(".food-image img");
            document.getElementById("modalTitle").textContent = "Edit Menu Item";
            document.getElementById("itemName").value = name;
            document.getElementById("itemPrice").value = price;
            document.getElementById("itemDescription").value = description;
            document.getElementById("itemStock").checked = stock;
            if (stock) {
                document.getElementById("stockText").textContent = "In Stock";
                document.getElementById("stockText").style.color = "#059669";
            } else {
                document.getElementById("stockText").textContent = "Out of Stock";
                document.getElementById("stockText").style.color = "#dc2626";
            }
            if (imageElement) {
                document.getElementById("imagePreview").src = imageElement.src;
                document.getElementById("imagePreview").classList.add("show");
                document.getElementById("uploadContent").classList.add("hide");
            } else {
                document.getElementById("imagePreview").src = "";
                document.getElementById("imagePreview").classList.remove("show");
                document.getElementById("uploadContent").classList.remove("hide");
            }
            document.getElementById("itemModal").classList.add("show");
        }

        function deleteItem(button) {
            if (confirm("Are you sure you want to delete this item?")) {
                button.closest("tr").remove();
                updateCount();
            }
        }

        function updateCount() {
            const rows = document.querySelectorAll("#menuTable tr");
            document.getElementById("itemCount").textContent = rows.length;
        }
        document.getElementById("searchInput").addEventListener("input", function() {
            const search = this.value.toLowerCase();
            const rows = document.querySelectorAll("#menuTable tr");
            let count = 0;
            rows.forEach(function(row) {
                const name = row.querySelector(".food-name");
                if (!name) return;
                const itemName = name.textContent.toLowerCase();
                if (itemName.includes(search)) {
                    row.style.display = "";
                    count++;
                } else {
                    row.style.display = "none";
                }
            });
            document.getElementById("itemCount").textContent = count;
        });

        function escapeHTML(value) {
            return value
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }
        document.getElementById("itemModal").addEventListener("click", function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
        document.addEventListener("keydown", function(e) {
            if (e.key === "Escape") {
                closeModal();
                closeSidebar();
            }
        });
    </script>

</body>

</html>