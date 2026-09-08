<?php
// account-opening.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Account Opening | Restaurant Admin</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* =========================GENERAL======================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f8fafc;
            color: #1e293b;
        }

        /* =========================SIDEBAR========================= */

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

        /* =========================
   MAIN CONTENT
========================= */

        .main-content {
            margin-left: 250px;
            min-height: 100vh;
            padding-bottom: 30px;
        }

        /* =========================
   HEADER
========================= */

        .header {
            height: 75px;
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header h1 {
            font-size: 22px;
            color: #1e293b;
        }

        .header p {
            color: #64748b;
            font-size: 12px;
            margin-top: 3px;
        }

        .hamburger {
            display: none;
            border: none;
            background: #f8fafc;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            cursor: pointer;
            color: #334155;
            font-size: 18px;
        }

        .admin-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: #475569;
        }

        .admin-btn i {
            font-size: 28px;
            color: #f59e0b;
        }

        /* =========================
   PAGE TITLE
========================= */

        .page-title {
            padding: 25px 30px 15px;
        }

        .page-title h2 {
            font-size: 22px;
            color: #1e293b;
        }

        .page-title p {
            color: #64748b;
            font-size: 13px;
            margin-top: 5px;
        }

        /* =========================
   OPENING CARD
========================= */

        .opening-card {
            margin: 0 30px 25px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .04);
        }

        .opening-header {
            padding: 20px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .opening-title {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .opening-icon {
            width: 45px;
            height: 45px;
            border-radius: 11px;
            background: #fff3d6;
            color: #f59e0b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .opening-title h3 {
            font-size: 18px;
        }

        .opening-title p {
            color: #64748b;
            font-size: 12px;
            margin-top: 4px;
        }

        .add-btn {
            border: none;
            background: #f59e0b;
            color: #ffffff;
            padding: 11px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .add-btn:hover {
            background: #d97706;
        }

        /* =========================
   TABLE
========================= */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        thead th {
            background: #f8fafc;
            color: #475569;
            font-size: 12px;
            text-align: left;
            padding: 14px 16px;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        tbody td {
            padding: 12px 16px;
            border-bottom: 1px solid #eef2f7;
            vertical-align: middle;
        }

        .serial {
            width: 55px;
            text-align: center !important;
            font-weight: 600;
            color: #64748b;
        }

        .product-input {
            width: 100%;
            height: 40px;
            border: 1px solid #dbe2ea;
            border-radius: 8px;
            padding: 0 12px;
            outline: none;
            font-size: 13px;
            color: #334155;
            background: #ffffff;
        }

        .product-input:focus {
            border-color: #f59e0b;
            box-shadow: 0 0 0 3px rgba(245, 158, 11, .10);
        }

        .price-input {
            min-width: 120px;
        }

        .qty-input {
            min-width: 150px;
        }

        .delete-btn {
            width: 36px;
            height: 36px;
            border: none;
            border-radius: 8px;
            background: #fef2f2;
            color: #ef4444;
            cursor: pointer;
            transition: .2s;
        }

        .delete-btn:hover {
            background: #ef4444;
            color: #ffffff;
        }

        /* =========================
   SUMMARY
========================= */

        .summary {
            padding: 20px;
            display: flex;
            justify-content: flex-end;
        }

        .summary-box {
            width: 300px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            overflow: hidden;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 13px 15px;
            font-size: 13px;
            color: #64748b;
        }

        .summary-row+.summary-row {
            border-top: 1px solid #e2e8f0;
        }

        .summary-row strong {
            color: #334155;
        }

        .grand-total {
            background: #fffaf0;
        }

        .grand-total strong {
            color: #f59e0b;
            font-size: 15px;
        }

        /* =========================
   ACTIONS
========================= */

        .actions {
            padding: 0 20px 20px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .action-btn {
            border: none;
            padding: 11px 17px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .reset-btn {
            background: #f1f5f9;
            color: #475569;
        }

        .reset-btn:hover {
            background: #e2e8f0;
        }

        .save-btn {
            background: #16a34a;
            color: #ffffff;
        }

        .save-btn:hover {
            background: #15803d;
        }

        /* =========================
   ENTERED DATA CARD
========================= */

        .entered-data-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .04);
            margin: 0 30px 25px;
        }

        .entered-data-header {
            padding: 18px 20px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .entered-data-icon {
            width: 45px;
            height: 45px;
            border-radius: 11px;
            background: #fff3d6;
            color: #f59e0b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .entered-data-header h3 {
            font-size: 18px;
        }

        .entered-data-header p {
            color: #64748b;
            font-size: 12px;
            margin-top: 4px;
        }

        .entered-table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .entered-data-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        .entered-data-table th {
            background: #f8fafc;
            color: #475569;
            font-size: 12px;
            text-align: left;
            padding: 14px 16px;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        .entered-data-table td {
            padding: 12px 16px;
            border-bottom: 1px solid #eef2f7;
            font-size: 13px;
            color: #475569;
            vertical-align: middle;
        }

        .entered-data-table tbody tr:hover {
            background: #fffbf5;
        }

        .entered-data-table tbody tr:last-child td {
            border-bottom: none;
        }

        .entered-serial {
            width: 55px;
            text-align: center !important;
            font-weight: 600;
            color: #64748b !important;
        }

        .entered-total {
            font-weight: 600;
            color: #16a34a !important;
            white-space: nowrap;
        }

        .entered-date {
            white-space: nowrap;
        }

        .view-btn {
            width: 35px;
            height: 35px;
            border: none;
            border-radius: 8px;
            background: #eff6ff;
            color: #2563eb;
            cursor: pointer;
            transition: .2s;
        }

        .view-btn:hover {
            background: #2563eb;
            color: #fff;
        }

        .entered-empty {
            text-align: center !important;
            padding: 35px 20px !important;
            color: #94a3b8 !important;
        }

        /* =========================
   VIEW MODAL
========================= */

        .view-modal {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, .55);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            opacity: 0;
            visibility: hidden;
            transition: .25s;
            z-index: 4000;
        }

        .view-modal.show {
            opacity: 1;
            visibility: visible;
        }

        .view-modal-box {
            width: 100%;
            max-width: 650px;
            max-height: 90vh;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, .2);
            overflow: hidden;
            transform: translateY(15px);
            transition: .25s;
            display: flex;
            flex-direction: column;
        }

        .view-modal.show .view-modal-box {
            transform: translateY(0);
        }

        .view-modal-header {
            padding: 18px 20px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-shrink: 0;
        }

        .view-modal-title {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .view-modal-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: #fff3d6;
            color: #f59e0b;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .view-modal-title h3 {
            font-size: 17px;
        }

        .view-modal-title p {
            color: #64748b;
            font-size: 12px;
            margin-top: 3px;
        }

        .close-modal {
            width: 35px;
            height: 35px;
            border: none;
            border-radius: 8px;
            background: #f1f5f9;
            color: #475569;
            cursor: pointer;
            font-size: 16px;
        }

        .close-modal:hover {
            background: #fee2e2;
            color: #ef4444;
        }

        .view-modal-body {
            padding: 20px;
            overflow-y: auto;
        }

        .account-info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-bottom: 20px;
        }

        .account-info-box {
            padding: 12px 14px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 9px;
        }

        .account-info-label {
            display: block;
            color: #64748b;
            font-size: 11px;
            margin-bottom: 5px;
        }

        .account-info-value {
            display: block;
            color: #1e293b;
            font-size: 14px;
            font-weight: 600;
        }

        .modal-product-table-wrapper {
            overflow-x: auto;
        }

        .modal-product-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 500px;
        }

        .modal-product-table th {
            background: #f8fafc;
            color: #475569;
            font-size: 12px;
            text-align: left;
            padding: 11px 12px;
            border-bottom: 1px solid #e2e8f0;
        }

        .modal-product-table td {
            padding: 11px 12px;
            border-bottom: 1px solid #eef2f7;
            font-size: 13px;
            color: #475569;
        }

        .modal-product-table tr:last-child td {
            border-bottom: none;
        }

        .modal-product-price {
            color: #16a34a !important;
            font-weight: 600;
            white-space: nowrap;
        }

        .modal-total-row {
            background: #fffaf0;
        }

        .modal-total-row td {
            font-weight: 700;
            color: #f59e0b !important;
        }

        .view-modal-footer {
            padding: 15px 20px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: flex-end;
            flex-shrink: 0;
        }

        .modal-close-btn {
            border: none;
            background: #f1f5f9;
            color: #475569;
            padding: 10px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
        }

        .modal-close-btn:hover {
            background: #e2e8f0;
        }

        /* =========================
   TOAST
========================= */

        .toast {
            position: fixed;
            right: 25px;
            bottom: 25px;
            background: #16a34a;
            color: #ffffff;
            padding: 13px 17px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 13px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .15);
            transform: translateY(100px);
            opacity: 0;
            visibility: hidden;
            transition: .3s;
            z-index: 5000;
        }

        .toast.show {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }

        /* =========================
   SIDEBAR OVERLAY
========================= */

        .sidebar-overlay {
            display: none;
        }

        /* =========================
   RESPONSIVE
========================= */

        @media(max-width: 900px) {

            .sidebar {
                transform: translateX(-100%);
                transition: .3s;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .hamburger {
                display: block;
            }

            .sidebar-overlay {
                display: block;
                position: fixed;
                inset: 0;
                background: rgba(15, 23, 42, .45);
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

        @media(max-width: 650px) {

            .header {
                padding: 0 15px;
            }

            .header h1 {
                font-size: 18px;
            }

            .admin-btn span {
                display: none;
            }

            .page-title {
                padding: 20px 15px 12px;
            }

            .opening-card {
                margin: 0 15px 20px;
            }

            .opening-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .add-btn {
                width: 100%;
                justify-content: center;
            }

            .summary {
                justify-content: stretch;
            }

            .summary-box {
                width: 100%;
            }

            .actions {
                flex-direction: column;
            }

            .action-btn {
                width: 100%;
                justify-content: center;
            }

            .entered-data-card {
                margin: 0 15px 20px;
            }

            .entered-data-header {
                padding: 15px;
            }

            .view-modal {
                padding: 12px;
            }

            .view-modal-header,
            .view-modal-body,
            .view-modal-footer {
                padding: 15px;
            }

            .account-info {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <!-- =========================
     SIDEBAR
========================= -->

    <aside class="sidebar" id="sidebar">
        <div class="restaurant-logo">
            <i class="fa-regular fa-circle-user"></i>
            <h2>Admin</h2>
        </div>

        <ul class="menu">
            <li><a href="dashboard.php"><i class="fa-solid fa-chart-line"></i>Dashboard</a></li>
            <li><a href="bill_generate.php"><i class="fa-solid fa-file-invoice"></i>Generate Bill</a></li>
            <li><a href="order.php"><i class="fa-solid fa-receipt"></i>Orders</a></li>
            <li><a href="menu.php"><i class="fa-solid fa-burger"></i>Menu</a></li>
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
                <a href="account-opening.php" class="active">
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
    <div class="sidebar-overlay"
        id="overlay"
        onclick="closeSidebar()"></div>


    <!-- =========================
     MAIN CONTENT
========================= -->

    <main class="main-content">

        <!-- HEADER -->

        <header class="header">

            <div class="header-left">

                <button
                    class="hamburger"
                    onclick="toggleSidebar()">

                    <i class="fa-solid fa-bars"></i>

                </button>

                <div>

                    <h1>Account Opening</h1>

                    <p>
                        Add opening products and stock
                    </p>

                </div>

            </div>

            <div class="admin-btn">

                <i class="fa-regular fa-circle-user"></i>

                <span>admin</span>

            </div>

        </header>


        <!-- PAGE TITLE -->

        <div class="page-title">

            <h2>Opening Stock</h2>

            <p>
                Add product name, price and quantity.
            </p>

        </div>


        <!-- =========================
         OPENING PRODUCT CARD
    ========================= -->

        <div class="opening-card">

            <div class="opening-header">

                <div class="opening-title">

                    <div class="opening-icon">
                        <i class="fa-solid fa-boxes-stacked"></i>
                    </div>

                    <div>

                        <h3>Opening Products</h3>

                        <p>
                            Enter product details below
                        </p>

                    </div>

                </div>

                <button
                    type="button"
                    class="add-btn"
                    onclick="addProduct()">

                    <i class="fa-solid fa-plus"></i>

                    Add Product

                </button>

            </div>


            <!-- PRODUCT TABLE -->

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th class="serial">#</th>

                            <th>Product Name</th>

                            <th>Price (₹)</th>

                            <th>Quantity</th>

                            <th>Action</th>

                        </tr>

                    </thead>


                    <tbody id="productTable">

                        <tr class="product-row">

                            <td class="serial">
                                1
                            </td>

                            <td>

                                <input
                                    type="text"
                                    class="product-input product-name"
                                    placeholder="Enter product name">

                            </td>

                            <td>

                                <input
                                    type="number"
                                    class="product-input price-input product-price"
                                    placeholder="0.00"
                                    min="0"
                                    step="0.01">

                            </td>

                            <td>

                                <input
                                    type="text"
                                    class="product-input qty-input product-qty"
                                    placeholder="e.g. 5 kg / 10 pcs">

                            </td>

                            <td>

                                <button
                                    type="button"
                                    class="delete-btn"
                                    onclick="removeProduct(this)"
                                    title="Remove Product">

                                    <i class="fa-solid fa-trash"></i>

                                </button>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>


            <!-- SUMMARY -->

            <div class="summary">

                <div class="summary-box">

                    <div class="summary-row">

                        <span>Total Products</span>

                        <strong id="totalProducts">
                            0
                        </strong>

                    </div>


                    <div class="summary-row grand-total">

                        <strong>
                            Grand Total
                        </strong>

                        <strong id="grandTotal">
                            ₹0.00
                        </strong>

                    </div>

                </div>

            </div>


            <!-- ACTIONS -->

            <div class="actions">

                <button
                    type="button"
                    class="action-btn reset-btn"
                    onclick="resetProducts()">

                    <i class="fa-solid fa-rotate-left"></i>

                    Reset

                </button>


                <button
                    type="button"
                    class="action-btn save-btn"
                    onclick="saveOpeningAccount()">

                    <i class="fa-solid fa-floppy-disk"></i>

                    Save Opening Account

                </button>

            </div>

        </div>


        <!-- =========================
         ENTERED DATA
    ========================= -->

        <div class="entered-data-card">

            <div class="entered-data-header">

                <div class="entered-data-icon">

                    <i class="fa-solid fa-table-list"></i>

                </div>

                <div>

                    <h3>Entered Data</h3>

                    <p>
                        Opening account summary
                    </p>

                </div>

            </div>


            <div class="entered-table-wrapper">

                <table class="entered-data-table">

                    <thead>

                        <tr>

                            <th class="entered-serial">
                                #
                            </th>

                            <th>
                                Total Product
                            </th>

                            <th>
                                Grand Total
                            </th>

                            <th>
                                Date
                            </th>

                            <th>
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody id="enteredDataTable">

                        <tr>

                            <td
                                colspan="5"
                                class="entered-empty">

                                No product data entered yet.

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </main>


    <!-- =========================
     TOAST
========================= -->

    <div class="toast" id="toast">

        <i class="fa-solid fa-circle-check"></i>

        <span id="toastMessage">
            Saved successfully.
        </span>

    </div>


    <!-- =========================
     VIEW DATA MODAL
========================= -->

    <div
        class="view-modal"
        id="viewModal"
        onclick="closeViewModal(event)">

        <div
            class="view-modal-box"
            onclick="event.stopPropagation()">


            <!-- MODAL HEADER -->

            <div class="view-modal-header">

                <div class="view-modal-title">

                    <div class="view-modal-icon">

                        <i class="fa-solid fa-eye"></i>

                    </div>

                    <div>

                        <h3>
                            Opening Account Details
                        </h3>

                        <p>
                            Complete product information
                        </p>

                    </div>

                </div>


                <button
                    type="button"
                    class="close-modal"
                    onclick="closeViewModal()"
                    title="Close">

                    <i class="fa-solid fa-xmark"></i>

                </button>

            </div>


            <!-- MODAL BODY -->

            <div class="view-modal-body">


                <!-- ACCOUNT INFORMATION -->

                <div class="account-info">

                    <div class="account-info-box">

                        <span class="account-info-label">
                            Total Product
                        </span>

                        <span
                            class="account-info-value"
                            id="modalTotalProducts">

                            0

                        </span>

                    </div>


                    <div class="account-info-box">

                        <span class="account-info-label">
                            Grand Total
                        </span>

                        <span
                            class="account-info-value"
                            id="modalGrandTotal">

                            ₹0.00

                        </span>

                    </div>


                    <div class="account-info-box">

                        <span class="account-info-label">
                            Date
                        </span>

                        <span
                            class="account-info-value"
                            id="modalDate">

                            —

                        </span>

                    </div>

                </div>


                <!-- PRODUCT DETAILS -->

                <div class="modal-product-table-wrapper">

                    <table class="modal-product-table">

                        <thead>

                            <tr>

                                <th>
                                    #
                                </th>

                                <th>
                                    Product Name
                                </th>

                                <th>
                                    Product Price
                                </th>

                                <th>
                                    Quantity
                                </th>

                            </tr>

                        </thead>


                        <tbody id="modalProductTable">

                        </tbody>

                    </table>

                </div>

            </div>


            <!-- MODAL FOOTER -->

            <div class="view-modal-footer">

                <button
                    type="button"
                    class="modal-close-btn"
                    onclick="closeViewModal()">

                    Close

                </button>

            </div>

        </div>

    </div>


    <script>
        /* =========================
   GLOBAL DATA
========================= */

        let enteredAccount = null;


        /* =========================
           SIDEBAR
        ========================= */

        function toggleSidebar() {

            document
                .getElementById("sidebar")
                .classList.toggle("show");

            document
                .getElementById("overlay")
                .classList.toggle("show");

        }


        function closeSidebar() {

            document
                .getElementById("sidebar")
                .classList.remove("show");

            document
                .getElementById("overlay")
                .classList.remove("show");

        }


        /* =========================
           CALCULATE SUMMARY
        ========================= */

        function calculateSummary() {

            const rows =
                document.querySelectorAll(".product-row");

            let grandTotal = 0;

            let totalProducts = 0;


            rows.forEach(function(row) {

                const name =
                    row
                    .querySelector(".product-name")
                    .value
                    .trim();


                const price =
                    parseFloat(
                        row
                        .querySelector(".product-price")
                        .value
                    ) || 0;


                const quantity =
                    row
                    .querySelector(".product-qty")
                    .value
                    .trim();


                if (
                    name !== "" ||
                    price > 0 ||
                    quantity !== ""
                ) {

                    totalProducts++;

                }


                /*
                 * Grand Total is based ONLY
                 * on product prices.
                 */

                grandTotal += price;

            });


            document
                .getElementById("totalProducts")
                .textContent = totalProducts;


            document
                .getElementById("grandTotal")
                .textContent =
                "₹" + grandTotal.toFixed(2);


            updateEnteredData();

        }


        /* =========================
           ADD PRODUCT
        ========================= */

        function addProduct() {

            const table =
                document.getElementById("productTable");


            const row =
                document.createElement("tr");


            row.className = "product-row";


            row.innerHTML = `

        <td class="serial">
            1
        </td>

        <td>

            <input
                type="text"
                class="product-input product-name"
                placeholder="Enter product name">

        </td>

        <td>

            <input
                type="number"
                class="product-input price-input product-price"
                placeholder="0.00"
                min="0"
                step="0.01">

        </td>

        <td>

            <input
                type="text"
                class="product-input qty-input product-qty"
                placeholder="e.g. 5 kg / 10 pcs">

        </td>

        <td>

            <button
                type="button"
                class="delete-btn"
                onclick="removeProduct(this)"
                title="Remove Product">

                <i class="fa-solid fa-trash"></i>

            </button>

        </td>

    `;


            table.appendChild(row);


            updateSerialNumbers();

            calculateSummary();


            row
                .querySelector(".product-name")
                .focus();

        }


        /* =========================
           REMOVE PRODUCT
        ========================= */

        function removeProduct(button) {

            const rows =
                document.querySelectorAll(".product-row");


            if (rows.length === 1) {

                const row = rows[0];


                row
                    .querySelector(".product-name")
                    .value = "";


                row
                    .querySelector(".product-price")
                    .value = "";


                row
                    .querySelector(".product-qty")
                    .value = "";


                calculateSummary();

                return;

            }


            button
                .closest(".product-row")
                .remove();


            updateSerialNumbers();

            calculateSummary();

        }


        /* =========================
           UPDATE SERIAL NUMBERS
        ========================= */

        function updateSerialNumbers() {

            const rows =
                document.querySelectorAll(".product-row");


            rows.forEach(function(row, index) {

                row
                    .querySelector(".serial")
                    .textContent = index + 1;

            });

        }


        /* =========================
           GET VALID PRODUCTS
        ========================= */

        function getProducts() {

            const rows =
                document.querySelectorAll(".product-row");


            const products = [];


            rows.forEach(function(row) {

                const name =
                    row
                    .querySelector(".product-name")
                    .value
                    .trim();


                const price =
                    parseFloat(
                        row
                        .querySelector(".product-price")
                        .value
                    ) || 0;


                const quantity =
                    row
                    .querySelector(".product-qty")
                    .value
                    .trim();


                /*
                 * Only fully completed rows
                 * are included when saving.
                 */

                if (
                    name !== "" &&
                    price > 0 &&
                    quantity !== ""
                ) {

                    products.push({

                        product_name: name,

                        product_price: price,

                        product_qty: quantity

                    });

                }

            });


            return products;

        }


        /* =========================
           UPDATE ENTERED DATA
        ========================= */

        function updateEnteredData() {

            const rows =
                document.querySelectorAll(".product-row");


            const enteredTable =
                document.getElementById("enteredDataTable");


            let products = [];

            let grandTotal = 0;


            rows.forEach(function(row) {

                const name =
                    row
                    .querySelector(".product-name")
                    .value
                    .trim();


                const price =
                    parseFloat(
                        row
                        .querySelector(".product-price")
                        .value
                    ) || 0;


                const quantity =
                    row
                    .querySelector(".product-qty")
                    .value
                    .trim();


                /*
                 * Show rows which contain
                 * any entered information.
                 */

                if (
                    name !== "" ||
                    price > 0 ||
                    quantity !== ""
                ) {

                    products.push({

                        product_name: name,

                        product_price: price,

                        product_qty: quantity

                    });

                }


                grandTotal += price;

            });


            /*
             * If nothing is entered.
             */

            if (products.length === 0) {

                enteredAccount = null;


                enteredTable.innerHTML = `

            <tr>

                <td
                    colspan="5"
                    class="entered-empty">

                    No product data entered yet.

                </td>

            </tr>

        `;

                return;

            }


            /*
             * Current date.
             */

            const now = new Date();


            const day =
                String(now.getDate())
                .padStart(2, "0");


            const month =
                String(now.getMonth() + 1)
                .padStart(2, "0");


            const year =
                now.getFullYear();


            const formattedDate =
                day + "-" + month + "-" + year;


            /*
             * Store complete account data.
             */

            enteredAccount = {

                total_products: products.length,

                grand_total: grandTotal,

                date: formattedDate,

                products: products

            };


            /*
             * Entered Data table.
             *
             * Only one row.
             */

            enteredTable.innerHTML = `

        <tr>

            <td class="entered-serial">
                1
            </td>

            <td>
                ${products.length}
            </td>

            <td class="entered-total">
                ₹${grandTotal.toFixed(2)}
            </td>

            <td class="entered-date">
                ${formattedDate}
            </td>

            <td>

                <button
                    type="button"
                    class="view-btn"
                    title="View Full Data"
                    onclick="viewAccountData()">

                    <i class="fa-solid fa-eye"></i>

                </button>

            </td>

        </tr>

    `;

        }


        /* =========================
           VIEW COMPLETE ACCOUNT
        ========================= */

        function viewAccountData() {

            if (!enteredAccount) {

                showToast(
                    "No account data available."
                );

                return;

            }


            /*
             * Account summary
             */

            document
                .getElementById("modalTotalProducts")
                .textContent =
                enteredAccount.total_products;


            document
                .getElementById("modalGrandTotal")
                .textContent =
                "₹" +
                enteredAccount.grand_total.toFixed(2);


            document
                .getElementById("modalDate")
                .textContent =
                enteredAccount.date;


            /*
             * Product table
             */

            const modalTable =
                document.getElementById(
                    "modalProductTable"
                );


            let html = "";


            enteredAccount.products.forEach(
                function(product, index) {

                    html += `

                <tr>

                    <td>
                        ${index + 1}
                    </td>

                    <td>
                        ${escapeHtml(
                            product.product_name ||
                            "—"
                        )}
                    </td>

                    <td class="modal-product-price">
                        ₹${Number(
                            product.product_price
                        ).toFixed(2)}
                    </td>

                    <td>
                        ${escapeHtml(
                            product.product_qty ||
                            "—"
                        )}
                    </td>

                </tr>

            `;

                }
            );


            /*
             * Grand total row
             */

            html += `

        <tr class="modal-total-row">

            <td colspan="2">
                Grand Total
            </td>

            <td colspan="2">
                ₹${enteredAccount.grand_total.toFixed(2)}
            </td>

        </tr>

    `;


            modalTable.innerHTML = html;


            /*
             * Show modal
             */

            document
                .getElementById("viewModal")
                .classList.add("show");

        }


        /* =========================
           ESCAPE HTML
        ========================= */

        function escapeHtml(value) {

            return String(value)

                .replace(/&/g, "&amp;")

                .replace(/</g, "&lt;")

                .replace(/>/g, "&gt;")

                .replace(/"/g, "&quot;")

                .replace(/'/g, "&#039;");

        }


        /* =========================
           CLOSE MODAL
        ========================= */

        function closeViewModal(event) {

            if (
                event &&
                event.target !==
                document.getElementById("viewModal")
            ) {

                return;

            }


            document
                .getElementById("viewModal")
                .classList.remove("show");

        }


        /* =========================
           SAVE OPENING ACCOUNT
        ========================= */

        function saveOpeningAccount() {

            const products =
                getProducts();


            if (products.length === 0) {

                showToast(
                    "Please add at least one valid product."
                );

                return;

            }


            let grandTotal = 0;


            products.forEach(function(product) {

                grandTotal +=
                    product.product_price;

            });


            /*
             * Complete account data.
             */

            const openingData = {

                date: new Date()
                    .toISOString()
                    .split("T")[0],

                total_products: products.length,

                products: products,

                grand_total: grandTotal

            };


            console.log(
                "Opening Account Data:",
                openingData
            );


            showToast(
                "Opening account saved successfully."
            );

        }


        /* =========================
           RESET PRODUCTS
        ========================= */

        function resetProducts() {

            if (
                !confirm(
                    "Are you sure you want to reset all products?"
                )
            ) {

                return;

            }


            document
                .getElementById("productTable")
                .innerHTML = `

        <tr class="product-row">

            <td class="serial">
                1
            </td>

            <td>

                <input
                    type="text"
                    class="product-input product-name"
                    placeholder="Enter product name">

            </td>

            <td>

                <input
                    type="number"
                    class="product-input price-input product-price"
                    placeholder="0.00"
                    min="0"
                    step="0.01">

            </td>

            <td>

                <input
                    type="text"
                    class="product-input qty-input product-qty"
                    placeholder="e.g. 5 kg / 10 pcs">

            </td>

            <td>

                <button
                    type="button"
                    class="delete-btn"
                    onclick="removeProduct(this)"
                    title="Remove Product">

                    <i class="fa-solid fa-trash"></i>

                </button>

            </td>

        </tr>

    `;


            enteredAccount = null;


            calculateSummary();

        }


        /* =========================
           TOAST
        ========================= */

        function showToast(message) {

            const toast =
                document.getElementById("toast");


            const toastMessage =
                document.getElementById(
                    "toastMessage"
                );


            toastMessage.textContent =
                message;


            toast.classList.add("show");


            setTimeout(function() {

                toast.classList.remove("show");

            }, 3000);

        }


        /* =========================
           LIVE INPUT
        ========================= */

        document.addEventListener(
            "input",
            function(e) {

                if (

                    e.target.classList.contains(
                        "product-name"
                    ) ||

                    e.target.classList.contains(
                        "product-price"
                    ) ||

                    e.target.classList.contains(
                        "product-qty"
                    )

                ) {

                    calculateSummary();

                }

            }
        );


        /* =========================
           KEYBOARD
        ========================= */

        document.addEventListener(
            "keydown",
            function(e) {

                if (e.key === "Escape") {

                    closeSidebar();

                    closeViewModal();

                }

            }
        );


        /* =========================
           INITIAL LOAD
        ========================= */

        calculateSummary();
    </script>

</body>

</html>