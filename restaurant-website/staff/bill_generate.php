<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Generate Bill - Restaurant Admin</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: #f5f7fb;
            color: #1e293b;
            overflow-x: hidden;
        }

        /* ================= SIDEBAR ================= */

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
            transition: transform .3s ease;
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
            flex-shrink: 0;
        }

        .restaurant-logo h2 {
            font-size: 20px;
            white-space: nowrap;
        }

        /* ================= MENU ================= */

        .menu {
            list-style: none;
        }

        .menu li {
            margin: 6px 0;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 13px 15px;
            text-decoration: none;
            color: #64748b;
            border-radius: 8px;
            transition: .3s;
        }

        .menu a i {
            width: 20px;
            min-width: 20px;
            text-align: center;
        }

        .menu a:hover,
        .menu a.active {
            background: #fff4db;
            color: #f59e0b;
            transform: translateX(4px);
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

        /* ================= OVERLAY ================= */

        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, .4);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: all .3s ease;
        }

        /* ================= MAIN ================= */

        .main-content {
            margin-left: 260px;
            min-height: 100vh;
            padding: 25px;
            width: calc(100% - 260px);
        }

        /* ================= HEADER ================= */

        .top-header {
            width: 100%;
            min-height: 65px;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 10px 22px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 25px;
        }

        .top-header h1 {
            font-size: 23px;
            flex: 1;
        }

        /* ================= HAMBURGER ================= */

        .hamburger {
            display: none;
            width: 45px;
            height: 45px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            background: #fff;
            color: #334155;
            font-size: 20px;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            transition: all .25s ease;
            box-shadow: 0 2px 8px rgba(15, 23, 42, .05);
            flex-shrink: 0;
        }

        .hamburger:hover {
            color: #f59e0b;
            border-color: #fcd34d;
            background: #fffaf0;
        }

        /* ================= ADMIN BUTTON ================= */

        .admin-btn {
            border: 1px solid #e2e8f0;
            background: #fff;
            padding: 9px 15px;
            min-height: 42px;
            border-radius: 7px;
            color: #475569;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            flex-shrink: 0;
        }

        .admin-btn i {
            color: #f59e0b;
        }

        /* ================= BILL LAYOUT ================= */

        .bill-layout {
            display: grid;
            grid-template-columns: minmax(0, 1.4fr) minmax(320px, 1fr);
            gap: 20px;
            align-items: start;
        }

        /* ================= CARD ================= */

        .card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 20px;
            min-width: 0;
        }

        .card-title {
            font-size: 18px;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .card-title i {
            color: #f59e0b;
        }

        /* ================= FORM ================= */

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 15px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
            min-width: 0;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            font-size: 13px;
            font-weight: bold;
            color: #475569;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            height: 42px;
            border: 1px solid #dbe2ea;
            border-radius: 7px;
            padding: 0 12px;
            outline: none;
            background: #fff;
            color: #334155;
            font-size: 14px;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #f59e0b;
        }

        /* ================= ADD ITEM ================= */

        .add-item {
            display: grid;
            grid-template-columns: minmax(150px, 2fr) minmax(70px, .7fr) minmax(100px, 1fr) auto;
            gap: 10px;
            align-items: end;
            margin-top: 20px;
        }

        .add-item select,
        .add-item input {
            width: 100%;
            height: 42px;
            border: 1px solid #dbe2ea;
            border-radius: 7px;
            padding: 0 10px;
            outline: none;
            background: #fff;
            min-width: 0;
        }

        .add-item select:focus,
        .add-item input:focus {
            border-color: #f59e0b;
        }

        .add-btn {
            height: 42px;
            border: 0;
            background: #f59e0b;
            color: #fff;
            padding: 0 18px;
            border-radius: 7px;
            cursor: pointer;
            font-weight: bold;
            white-space: nowrap;
        }

        .add-btn:hover {
            background: #d97706;
        }

        /* ================= BILL TABLE ================= */

        .bill-table-wrap {
            overflow-x: auto;
            margin-top: 20px;
            width: 100%;
            -webkit-overflow-scrolling: touch;
        }

        .bill-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 550px;
        }

        .bill-table th {
            background: #f8fafc;
            color: #64748b;
            font-size: 12px;
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        .bill-table td {
            padding: 12px;
            border-bottom: 1px solid #eef2f7;
            font-size: 14px;
        }

        .bill-table td:last-child,
        .bill-table th:last-child {
            text-align: center;
        }

        .qty-control {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            white-space: nowrap;
        }

        .qty-btn {
            width: 28px;
            height: 28px;
            border: 1px solid #e2e8f0;
            background: #fff;
            border-radius: 5px;
            cursor: pointer;
        }

        .qty-btn:hover {
            background: #fff4db;
            color: #f59e0b;
        }

        .remove-btn {
            width: 30px;
            height: 30px;
            border: 0;
            background: #fee2e2;
            color: #dc2626;
            border-radius: 5px;
            cursor: pointer;
        }

        .remove-btn:hover {
            background: #fecaca;
        }

        /* ================= SUMMARY ================= */

        .bill-summary {
            margin-top: 20px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 9px 0;
            color: #475569;
            font-size: 14px;
        }

        .summary-row strong {
            color: #1e293b;
            white-space: nowrap;
        }

        .discount-control,
        .gst-control {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: nowrap;
        }

        .discount-control select,
        .gst-control select {
            height: 32px;
            border: 1px solid #dbe2ea;
            border-radius: 5px;
            padding: 0 7px;
            background: #fff;
            outline: none;
        }

        .grand-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            border-top: 2px solid #e2e8f0;
            margin-top: 8px;
            padding-top: 15px;
            font-size: 20px;
            font-weight: bold;
        }

        .grand-total span:last-child {
            color: #f59e0b;
            white-space: nowrap;
        }

        /* ================= BUTTONS ================= */

        .button-group {
            display: grid;
            grid-template-columns: auto 1fr 1fr;
            gap: 10px;
            margin-top: 20px;
        }

        .generate-btn,
        .print-btn,
        .clear-btn {
            min-height: 44px;
            border: 0;
            border-radius: 7px;
            padding: 0 20px;
            cursor: pointer;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            white-space: nowrap;
        }

        .generate-btn {
            background: #f59e0b;
            color: #fff;
        }

        .generate-btn:hover {
            background: #d97706;
        }

        .print-btn {
            background: #2563eb;
            color: #fff;
        }

        .print-btn:hover {
            background: #1d4ed8;
        }

        .clear-btn {
            background: #f1f5f9;
            color: #475569;
        }

        .clear-btn:hover {
            background: #e2e8f0;
        }

        /* ================= BILL PREVIEW ================= */

        .bill-preview {
            border: 1px dashed #cbd5e1;
            padding: 18px;
            background: #fff;
            width: 100%;
            overflow: hidden;
        }

        .preview-header {
            text-align: center;
            border-bottom: 1px dashed #94a3b8;
            padding-bottom: 12px;
        }

        .preview-header h2 {
            font-size: 20px;
        }

        .preview-header p {
            font-size: 11px;
            color: #64748b;
            margin-top: 4px;
            line-height: 1.5;
        }

        .preview-info {
            margin: 12px 0;
            border-bottom: 1px dashed #94a3b8;
            padding-bottom: 10px;
        }

        .preview-info div {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            font-size: 12px;
            margin: 5px 0;
        }

        .preview-info strong {
            text-align: right;
            word-break: break-word;
        }

        .preview-items {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
            table-layout: fixed;
        }

        .preview-items th,
        .preview-items td {
            padding: 6px 2px;
            text-align: left;
            word-break: break-word;
        }

        .preview-items th:first-child,
        .preview-items td:first-child {
            width: 55%;
        }

        .preview-items th:not(:first-child),
        .preview-items td:not(:first-child) {
            text-align: right;
        }

        .preview-items th {
            border-bottom: 1px dashed #94a3b8;
        }

        .preview-summary {
            border-top: 1px dashed #94a3b8;
            margin-top: 8px;
            padding-top: 8px;
        }

        .preview-summary div {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            font-size: 12px;
            margin: 5px 0;
        }

        .preview-grand {
            border-top: 1px dashed #000;
            border-bottom: 1px dashed #000;
            padding: 8px 0;
            font-size: 15px !important;
            font-weight: bold;
        }

        .preview-footer {
            text-align: center;
            margin-top: 15px;
            font-size: 11px;
            line-height: 1.5;
        }

        /* ================= EMPTY ================= */

        .empty-items {
            text-align: center;
            padding: 30px;
            color: #94a3b8;
        }

        .empty-items i {
            font-size: 35px;
            margin-bottom: 8px;
        }

        /* ================= NOTIFICATION ================= */

        .notification {
            position: fixed;
            right: 25px;
            bottom: 25px;
            max-width: calc(100vw - 50px);
            background: #1e293b;
            color: #fff;
            padding: 13px 18px;
            border-radius: 7px;
            display: none;
            z-index: 3000;
            font-size: 14px;
        }

        .notification.show {
            display: block;
        }

        /* =====================================================
           TABLET
        ===================================================== */

        @media (max-width: 1200px) {

            .bill-layout {
                grid-template-columns: minmax(0, 1.2fr) minmax(300px, 1fr);
            }

            .add-item {
                grid-template-columns: 2fr 1fr;
            }

            .add-item select {
                grid-column: 1 / -1;
            }

            .add-btn {
                width: 100%;
            }
        }

        /* =====================================================
           TABLET / MOBILE
        ===================================================== */

        @media (max-width: 900px) {

            .sidebar {
                transform: translateX(-100%);
                box-shadow: 5px 0 20px rgba(0, 0, 0, .1);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .sidebar-overlay.show {
                display: block;
                opacity: 1;
                visibility: visible;
            }

            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 20px;
            }

            .hamburger {
                display: flex;
            }

            .bill-layout {
                grid-template-columns: 1fr;
            }

            .card {
                width: 100%;
            }
        }

        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 600px) {

            .main-content {
                padding: 12px;
            }

            .top-header {
                min-height: 60px;
                padding: 8px 12px;
                margin-bottom: 15px;
                border-radius: 9px;
                gap: 10px;
            }

            .top-header h1 {
                font-size: 18px;
                text-align: center;
            }

            .hamburger {
                width: 40px;
                height: 40px;
                font-size: 18px;
            }

            .admin-btn {
                min-height: 40px;
                width: 40px;
                padding: 0;
            }

            .admin-btn span {
                display: none;
            }

            .admin-btn i {
                font-size: 17px;
            }

            .card {
                padding: 15px;
                border-radius: 9px;
            }

            .card-title {
                font-size: 16px;
                margin-bottom: 15px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 13px;
            }

            .form-group input,
            .form-group select {
                height: 44px;
            }

            .add-item {
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            .add-item select {
                grid-column: 1 / -1;
            }

            .add-item input {
                height: 44px;
            }

            .add-btn {
                grid-column: 1 / -1;
                height: 44px;
            }

            .bill-table-wrap {
                margin-left: 0;
                margin-right: 0;
            }

            .bill-summary {
                margin-top: 15px;
            }

            .summary-row {
                font-size: 13px;
                padding: 8px 0;
            }

            .grand-total {
                font-size: 18px;
                padding-top: 13px;
            }

            .button-group {
                grid-template-columns: 1fr;
                gap: 9px;
            }

            .generate-btn,
            .print-btn,
            .clear-btn {
                width: 100%;
                min-height: 45px;
            }

            .bill-preview {
                padding: 13px;
            }

            .preview-header h2 {
                font-size: 18px;
            }

            .preview-info div {
                font-size: 11px;
            }

            .preview-items {
                font-size: 10px;
            }

            .preview-summary div {
                font-size: 11px;
            }

            .preview-grand {
                font-size: 13px !important;
            }

            .notification {
                left: 12px;
                right: 12px;
                bottom: 12px;
                max-width: none;
                text-align: center;
            }
        }

        /* =====================================================
           SMALL MOBILE
        ===================================================== */

        @media (max-width: 400px) {

            .main-content {
                padding: 8px;
            }

            .top-header {
                padding: 8px 10px;
            }

            .top-header h1 {
                font-size: 16px;
            }

            .hamburger {
                width: 38px;
                height: 38px;
            }

            .admin-btn {
                width: 38px;
                min-height: 38px;
            }

            .card {
                padding: 12px;
            }

            .card-title {
                font-size: 15px;
            }

            .add-item {
                grid-template-columns: 1fr;
            }

            .add-item select,
            .add-btn {
                grid-column: auto;
            }

            .summary-row {
                align-items: flex-start;
            }

            .discount-control,
            .gst-control {
                justify-content: flex-end;
            }

            .grand-total {
                font-size: 16px;
            }

            .bill-preview {
                padding: 10px;
            }

            .preview-header h2 {
                font-size: 16px;
            }

            .preview-info div {
                font-size: 10px;
            }
        }

        /* =====================================================
           PRINT
        ===================================================== */

        @media print {
            body {
                display: none;
            }
        }
    </style>
</head>

<body>

    <!-- ================= SIDEBAR ================= -->

    <aside class="sidebar" id="sidebar">

        <div class="restaurant-logo">
            <i class="fa-regular fa-circle-user"></i>
            <h2>Admin</h2>
        </div>

        <ul class="menu">

            <li>
                <a href="dashboard.php">
                    <i class="fa-solid fa-chart-line"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="bill_generate.php" class="active">
                    <i class="fa-solid fa-file-invoice"></i>
                    <span>Generate Bill</span>
                </a>
            </li>

            <li>
                <a href="order.php">
                    <i class="fa-solid fa-receipt"></i>
                    <span>Orders</span>
                </a>
            </li>

            <li>
                <a href="menu.php">
                    <i class="fa-solid fa-burger"></i>
                    <span>Menu</span>
                </a>
            </li>

            <li>
                <a href="contact.php">
                    <i class="fa-solid fa-envelope"></i>
                    <span>Contact Form</span>
                </a>
            </li>

            <li>
                <a href="online-orders.php">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <span>Online Order</span>
                </a>
            </li>

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

            <li>
                <a href="setting.php">
                    <i class="fa-solid fa-gear"></i>
                    <span>Setting</span>
                </a>
            </li>

            <li>
                <a href="../logout.php" class="logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </a>
            </li>

        </ul>

    </aside>

    <!-- ================= OVERLAY ================= -->

    <div class="sidebar-overlay"
        id="overlay"
        onclick="closeSidebar()">
    </div>

    <!-- ================= MAIN ================= -->

    <main class="main-content">

        <!-- HEADER -->

        <header class="top-header">

            <button class="hamburger"
                onclick="toggleSidebar()"
                aria-label="Open menu">

                <i class="fa-solid fa-bars"></i>

            </button>

            <h1>Generate Bill</h1>

            <button class="admin-btn">
                <i class="fa-regular fa-circle-user"></i>
                <span>admin</span>
            </button>

        </header>

        <!-- ================= BILL LAYOUT ================= -->

        <div class="bill-layout">

            <!-- ================= LEFT ================= -->

            <div class="card">

                <h2 class="card-title">
                    <i class="fa-solid fa-user"></i>
                    Customer Details
                </h2>

                <div class="form-grid">

                    <div class="form-group">

                        <label>Customer Name</label>

                        <input type="text"
                            id="customerName"
                            placeholder="Enter customer name">

                    </div>

                    <div class="form-group">

                        <label>Phone Number</label>

                        <input type="tel"
                            id="customerPhone"
                            placeholder="Enter phone number">

                    </div>

                    <div class="form-group">

                        <label>Customer Count</label>

                        <input type="number"
                            id="customerCount"
                            value="1"
                            min="1">

                    </div>

                    <div class="form-group">

                        <label>Order Type</label>

                        <select id="orderType">

                            <option value="Dine-in">
                                Dine-in
                            </option>

                            <option value="Takeaway">
                                Takeaway
                            </option>

                        </select>

                    </div>

                </div>

                <!-- ADD ITEMS -->

                <h2 class="card-title"
                    style="margin-top:25px">

                    <i class="fa-solid fa-burger"></i>

                    Add Food Items

                </h2>

                <div class="add-item">

                    <select id="itemSelect">

                        <option value="">
                            Select Food Item
                        </option>

                        <option value="Chicken Biryani"
                            data-price="250">
                            Chicken Biryani - ₹250
                        </option>

                        <option value="Mutton Biryani"
                            data-price="300">
                            Mutton Biryani - ₹300
                        </option>

                        <option value="Veg Biryani"
                            data-price="220">
                            Veg Biryani - ₹220
                        </option>

                        <option value="Paneer Butter Masala"
                            data-price="320">
                            Paneer Butter Masala - ₹320
                        </option>

                        <option value="Butter Naan"
                            data-price="100">
                            Butter Naan - ₹100
                        </option>

                        <option value="Chicken Roll"
                            data-price="175">
                            Chicken Roll - ₹175
                        </option>

                        <option value="Cold Drink"
                            data-price="100">
                            Cold Drink - ₹100
                        </option>

                        <option value="Tea"
                            data-price="50">
                            Tea - ₹50
                        </option>

                    </select>

                    <input type="number"
                        id="itemQty"
                        value="1"
                        min="1">

                    <input type="text"
                        id="itemPrice"
                        placeholder="Price"
                        readonly>

                    <button class="add-btn"
                        onclick="addItem()">

                        <i class="fa-solid fa-plus"></i>

                        Add

                    </button>

                </div>

                <!-- BILL ITEMS -->

                <div class="bill-table-wrap">

                    <table class="bill-table">

                        <thead>

                            <tr>

                                <th>Item</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody id="billItems">

                            <tr>

                                <td colspan="5">

                                    <div class="empty-items">

                                        <i class="fa-solid fa-cart-shopping"></i>

                                        <p>No items added</p>

                                    </div>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

                <!-- SUMMARY -->

                <div class="bill-summary">

                    <div class="summary-row">

                        <span>Subtotal</span>

                        <strong id="subtotal">
                            ₹0.00
                        </strong>

                    </div>

                    <div class="summary-row">

                        <span>Discount</span>

                        <div class="discount-control">

                            <select id="discount"
                                onchange="calculateBill()">

                                <option value="0">0%</option>
                                <option value="5">5%</option>
                                <option value="10" selected>10%</option>
                                <option value="15">15%</option>
                                <option value="20">20%</option>

                            </select>

                            <strong id="discountAmount">
                                - ₹0.00
                            </strong>

                        </div>

                    </div>

                    <div class="summary-row">

                        <span>After Discount</span>

                        <strong id="afterDiscount">
                            ₹0.00
                        </strong>

                    </div>

                    <div class="summary-row">

                        <span>GST</span>

                        <div class="gst-control">

                            <select id="gst"
                                onchange="calculateBill()">

                                <option value="0">0%</option>
                                <option value="5" selected>5%</option>
                                <option value="12">12%</option>
                                <option value="18">18%</option>

                            </select>

                            <strong id="gstAmount">
                                ₹0.00
                            </strong>

                        </div>

                    </div>

                    <div class="grand-total">

                        <span>Grand Total</span>

                        <span id="grandTotal">
                            ₹0.00
                        </span>

                    </div>

                </div>

                <!-- BUTTONS -->

                <div class="button-group">

                    <button class="clear-btn"
                        onclick="clearBill()">

                        <i class="fa-solid fa-rotate-left"></i>

                        Clear

                    </button>

                    <button class="generate-btn"
                        onclick="generateBill()">

                        <i class="fa-solid fa-file-invoice"></i>

                        Generate Bill

                    </button>

                    <button class="print-btn"
                        onclick="printBill()">

                        <i class="fa-solid fa-print"></i>

                        Print

                    </button>

                </div>

            </div>

            <!-- ================= RIGHT ================= -->

            <div class="card">

                <h2 class="card-title">

                    <i class="fa-solid fa-eye"></i>

                    Bill Preview

                </h2>

                <div class="bill-preview">

                    <div class="preview-header">

                        <h2>YOUR RESTAURANT</h2>

                        <p>
                            Restaurant Address<br>
                            Mau, Uttar Pradesh
                        </p>

                    </div>

                    <div class="preview-info">

                        <div>
                            <span>Bill No:</span>
                            <strong id="previewBillNo">#NEW</strong>
                        </div>

                        <div>
                            <span>Customer:</span>
                            <strong id="previewCustomer">
                                Walk-in Customer
                            </strong>
                        </div>

                        <div>
                            <span>Phone:</span>
                            <strong id="previewPhone">-</strong>
                        </div>

                        <div>
                            <span>Customers:</span>
                            <strong id="previewCount">1</strong>
                        </div>

                        <div>
                            <span>Type:</span>
                            <strong id="previewType">
                                Dine-in
                            </strong>
                        </div>

                        <div>
                            <span>Date:</span>
                            <strong id="previewDate"></strong>
                        </div>

                    </div>

                    <table class="preview-items">

                        <thead>

                            <tr>

                                <th>Item</th>
                                <th>Qty</th>
                                <th>Total</th>

                            </tr>

                        </thead>

                        <tbody id="previewItems">

                            <tr>

                                <td colspan="3"
                                    style="text-align:center">

                                    No items

                                </td>

                            </tr>

                        </tbody>

                    </table>

                    <div class="preview-summary">

                        <div>
                            <span>Subtotal</span>
                            <span id="previewSubtotal">
                                ₹0.00
                            </span>
                        </div>

                        <div>
                            <span>Discount</span>
                            <span id="previewDiscount">
                                - ₹0.00
                            </span>
                        </div>

                        <div>
                            <span>GST</span>
                            <span id="previewGST">
                                ₹0.00
                            </span>
                        </div>

                        <div class="preview-grand">

                            <span>GRAND TOTAL</span>

                            <span id="previewTotal">
                                ₹0.00
                            </span>

                        </div>

                    </div>

                    <div class="preview-footer">

                        Thank You!<br>

                        Please Visit Again

                    </div>

                </div>

            </div>

        </div>

    </main>

    <!-- ================= NOTIFICATION ================= -->

    <div class="notification"
        id="notification">
    </div>

    <script>

        let billItems = [];
        let billNumber = 1001;

        const itemSelect =
            document.getElementById("itemSelect");

        /* ================= ITEM PRICE ================= */

        itemSelect.addEventListener("change", function() {

            const option =
                this.options[this.selectedIndex];

            document.getElementById("itemPrice").value =
                option.dataset.price
                    ? "₹" + option.dataset.price
                    : "";

        });

        /* ================= ADD ITEM ================= */

        function addItem() {

            const select =
                document.getElementById("itemSelect");

            const name = select.value;

            const option =
                select.options[select.selectedIndex];

            if (!name) {

                showNotification(
                    "Please select a food item"
                );

                return;
            }

            const price =
                parseFloat(option.dataset.price);

            const qty =
                parseInt(
                    document.getElementById("itemQty").value
                );

            if (!qty || qty < 1) {

                showNotification(
                    "Please enter valid quantity"
                );

                return;
            }

            const existing =
                billItems.find(
                    item => item.name === name
                );

            if (existing) {

                existing.qty += qty;

            } else {

                billItems.push({
                    name: name,
                    price: price,
                    qty: qty
                });

            }

            document.getElementById("itemQty").value = 1;

            select.value = "";

            document.getElementById("itemPrice").value = "";

            renderItems();

        }

        /* ================= RENDER ITEMS ================= */

        function renderItems() {

            const table =
                document.getElementById("billItems");

            if (billItems.length === 0) {

                table.innerHTML = `
                    <tr>
                        <td colspan="5">
                            <div class="empty-items">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <p>No items added</p>
                            </div>
                        </td>
                    </tr>
                `;

                updatePreview();

                calculateBill();

                return;
            }

            let html = "";

            billItems.forEach((item, index) => {

                const total =
                    item.price * item.qty;

                html += `
                    <tr>

                        <td>${item.name}</td>

                        <td>

                            <div class="qty-control">

                                <button
                                    class="qty-btn"
                                    onclick="changeQty(${index}, -1)">
                                    −
                                </button>

                                <strong>
                                    ${item.qty}
                                </strong>

                                <button
                                    class="qty-btn"
                                    onclick="changeQty(${index}, 1)">
                                    +
                                </button>

                            </div>

                        </td>

                        <td>
                            ₹${item.price.toFixed(2)}
                        </td>

                        <td>
                            <strong>
                                ₹${total.toFixed(2)}
                            </strong>
                        </td>

                        <td>

                            <button
                                class="remove-btn"
                                onclick="removeItem(${index})">

                                <i class="fa-solid fa-trash"></i>

                            </button>

                        </td>

                    </tr>
                `;

            });

            table.innerHTML = html;

            calculateBill();

        }

        /* ================= CHANGE QUANTITY ================= */

        function changeQty(index, value) {

            billItems[index].qty += value;

            if (billItems[index].qty <= 0) {

                billItems.splice(index, 1);

            }

            renderItems();

        }

        /* ================= REMOVE ITEM ================= */

        function removeItem(index) {

            billItems.splice(index, 1);

            renderItems();

        }

        /* ================= CALCULATE BILL ================= */

        function calculateBill() {

            let subtotal = 0;

            billItems.forEach(item => {

                subtotal +=
                    item.price * item.qty;

            });

            const discountRate =
                parseFloat(
                    document.getElementById("discount").value
                );

            const gstRate =
                parseFloat(
                    document.getElementById("gst").value
                );

            const discountAmount =
                subtotal * discountRate / 100;

            const afterDiscount =
                subtotal - discountAmount;

            const gstAmount =
                afterDiscount * gstRate / 100;

            const grandTotal =
                afterDiscount + gstAmount;

            document.getElementById("subtotal")
                .textContent =
                "₹" + subtotal.toFixed(2);

            document.getElementById("discountAmount")
                .textContent =
                "- ₹" + discountAmount.toFixed(2);

            document.getElementById("afterDiscount")
                .textContent =
                "₹" + afterDiscount.toFixed(2);

            document.getElementById("gstAmount")
                .textContent =
                "₹" + gstAmount.toFixed(2);

            document.getElementById("grandTotal")
                .textContent =
                "₹" + grandTotal.toFixed(2);

            updatePreview();

        }

        /* ================= PREVIEW ================= */

        function updatePreview() {

            const name =
                document.getElementById("customerName").value ||
                "Walk-in Customer";

            const phone =
                document.getElementById("customerPhone").value ||
                "-";

            const count =
                document.getElementById("customerCount").value ||
                1;

            const type =
                document.getElementById("orderType").value;

            document.getElementById("previewCustomer")
                .textContent = name;

            document.getElementById("previewPhone")
                .textContent = phone;

            document.getElementById("previewCount")
                .textContent = count;

            document.getElementById("previewType")
                .textContent = type;

            let html = "";

            billItems.forEach(item => {

                const total =
                    item.price * item.qty;

                html += `
                    <tr>

                        <td>${item.name}</td>

                        <td>${item.qty}</td>

                        <td>
                            ₹${total.toFixed(2)}
                        </td>

                    </tr>
                `;

            });

            if (!html) {

                html = `
                    <tr>

                        <td colspan="3"
                            style="text-align:center">

                            No items

                        </td>

                    </tr>
                `;

            }

            document.getElementById("previewItems")
                .innerHTML = html;

            let subtotal = 0;

            billItems.forEach(item => {

                subtotal +=
                    item.price * item.qty;

            });

            const discountRate =
                parseFloat(
                    document.getElementById("discount").value
                );

            const gstRate =
                parseFloat(
                    document.getElementById("gst").value
                );

            const discountAmount =
                subtotal * discountRate / 100;

            const afterDiscount =
                subtotal - discountAmount;

            const gstAmount =
                afterDiscount * gstRate / 100;

            const grandTotal =
                afterDiscount + gstAmount;

            document.getElementById("previewSubtotal")
                .textContent =
                "₹" + subtotal.toFixed(2);

            document.getElementById("previewDiscount")
                .textContent =
                "- ₹" + discountAmount.toFixed(2);

            document.getElementById("previewGST")
                .textContent =
                "₹" + gstAmount.toFixed(2);

            document.getElementById("previewTotal")
                .textContent =
                "₹" + grandTotal.toFixed(2);

        }

        /* ================= GENERATE BILL ================= */

        function generateBill() {

            if (billItems.length === 0) {

                showNotification(
                    "Please add at least one item"
                );

                return;

            }

            document.getElementById("previewBillNo")
                .textContent =
                "#BILL" + billNumber;

            showNotification(
                "Bill generated successfully"
            );

            billNumber++;

        }

        /* ================= CLEAR BILL ================= */

        function clearBill() {

            if (!confirm("Clear the current bill?")) {
                return;
            }

            billItems = [];

            document.getElementById("customerName").value = "";

            document.getElementById("customerPhone").value = "";

            document.getElementById("customerCount").value = 1;

            document.getElementById("orderType").value =
                "Dine-in";

            document.getElementById("discount").value = 10;

            document.getElementById("gst").value = 5;

            document.getElementById("previewBillNo")
                .textContent = "#NEW";

            renderItems();

            showNotification(
                "Bill cleared"
            );

        }

        /* ================= PRINT BILL ================= */

        function printBill() {

            if (billItems.length === 0) {

                showNotification(
                    "Please add items before printing"
                );

                return;

            }

            const name =
                document.getElementById("customerName").value ||
                "Walk-in Customer";

            const phone =
                document.getElementById("customerPhone").value ||
                "-";

            const count =
                document.getElementById("customerCount").value ||
                1;

            const type =
                document.getElementById("orderType").value;

            const billNo =
                document.getElementById("previewBillNo")
                    .textContent;

            let subtotal = 0;

            let items = "";

            billItems.forEach(item => {

                const total =
                    item.price * item.qty;

                subtotal += total;

                items += `
                    <tr>

                        <td>${item.name}</td>

                        <td>${item.qty}</td>

                        <td>
                            ₹${item.price.toFixed(2)}
                        </td>

                        <td>
                            ₹${total.toFixed(2)}
                        </td>

                    </tr>
                `;

            });

            const discountRate =
                parseFloat(
                    document.getElementById("discount").value
                );

            const gstRate =
                parseFloat(
                    document.getElementById("gst").value
                );

            const discountAmount =
                subtotal * discountRate / 100;

            const afterDiscount =
                subtotal - discountAmount;

            const gstAmount =
                afterDiscount * gstRate / 100;

            const grandTotal =
                afterDiscount + gstAmount;

            const now = new Date();

            const date =
                now.toLocaleDateString("en-IN");

            const time =
                now.toLocaleTimeString("en-IN");

            const printWindow =
                window.open(
                    "",
                    "_blank",
                    "width=400,height=650"
                );

            if (!printWindow) {

                alert(
                    "Please allow pop-ups to print the bill"
                );

                return;

            }

            printWindow.document.write(`

                <!DOCTYPE html>

                <html>

                <head>

                    <title>Restaurant Bill</title>

                    <style>

                        @page {
                            size: 80mm auto;
                            margin: 0;
                        }

                        * {
                            box-sizing: border-box;
                        }

                        body {
                            width: 80mm;
                            margin: 0;
                            padding: 10px;
                            font-family: Arial, sans-serif;
                            font-size: 12px;
                            color: #000;
                        }

                        .center {
                            text-align: center;
                        }

                        .restaurant {
                            font-size: 20px;
                            font-weight: bold;
                            margin-bottom: 4px;
                        }

                        .address {
                            font-size: 11px;
                            line-height: 16px;
                        }

                        .line {
                            border-top: 1px dashed #000;
                            margin: 8px 0;
                        }

                        .info {
                            display: flex;
                            justify-content: space-between;
                            gap: 10px;
                            margin: 4px 0;
                        }

                        .info span:last-child,
                        .info strong {
                            text-align: right;
                            word-break: break-word;
                        }

                        table {
                            width: 100%;
                            border-collapse: collapse;
                            margin-top: 8px;
                        }

                        th {
                            font-size: 10px;
                            border-bottom: 1px dashed #000;
                            padding: 5px 2px;
                            text-align: left;
                        }

                        td {
                            padding: 5px 2px;
                            vertical-align: top;
                        }

                        th:not(:first-child),
                        td:not(:first-child) {
                            text-align: right;
                        }

                        .summary {
                            border-top: 1px dashed #000;
                            margin-top: 8px;
                            padding-top: 6px;
                        }

                        .summary-row {
                            display: flex;
                            justify-content: space-between;
                            margin: 5px 0;
                        }

                        .grand {
                            display: flex;
                            justify-content: space-between;
                            border-top: 1px dashed #000;
                            border-bottom: 1px dashed #000;
                            padding: 8px 0;
                            margin-top: 7px;
                            font-size: 16px;
                            font-weight: bold;
                        }

                        .thank {
                            text-align: center;
                            font-weight: bold;
                            margin-top: 15px;
                        }

                        .footer {
                            text-align: center;
                            font-size: 10px;
                            margin-top: 5px;
                        }

                    </style>

                </head>

                <body>

                    <div class="center">

                        <div class="restaurant">
                            YOUR RESTAURANT
                        </div>

                        <div class="address">
                            Restaurant Address<br>
                            Mau, Uttar Pradesh
                        </div>

                    </div>

                    <div class="line"></div>

                    <div class="info">
                        <span>Bill No:</span>
                        <strong>${billNo}</strong>
                    </div>

                    <div class="info">
                        <span>Date:</span>
                        <span>${date}</span>
                    </div>

                    <div class="info">
                        <span>Time:</span>
                        <span>${time}</span>
                    </div>

                    <div class="info">
                        <span>Customer:</span>
                        <span>${name}</span>
                    </div>

                    <div class="info">
                        <span>Phone:</span>
                        <span>${phone}</span>
                    </div>

                    <div class="info">
                        <span>Customers:</span>
                        <span>${count}</span>
                    </div>

                    <div class="info">
                        <span>Type:</span>
                        <span>${type}</span>
                    </div>

                    <div class="line"></div>

                    <table>

                        <thead>

                            <tr>

                                <th>Item</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Total</th>

                            </tr>

                        </thead>

                        <tbody>

                            ${items}

                        </tbody>

                    </table>

                    <div class="summary">

                        <div class="summary-row">
                            <span>Subtotal</span>
                            <span>
                                ₹${subtotal.toFixed(2)}
                            </span>
                        </div>

                        <div class="summary-row">
                            <span>
                                Discount (${discountRate}%)
                            </span>
                            <span>
                                - ₹${discountAmount.toFixed(2)}
                            </span>
                        </div>

                        <div class="summary-row">
                            <span>After Discount</span>
                            <span>
                                ₹${afterDiscount.toFixed(2)}
                            </span>
                        </div>

                        <div class="summary-row">
                            <span>
                                GST (${gstRate}%)
                            </span>
                            <span>
                                ₹${gstAmount.toFixed(2)}
                            </span>
                        </div>

                        <div class="grand">
                            <span>GRAND TOTAL</span>
                            <span>
                                ₹${grandTotal.toFixed(2)}
                            </span>
                        </div>

                    </div>

                    <div class="thank">
                        Thank You!
                    </div>

                    <div class="footer">
                        Please Visit Again
                    </div>

                    <script>

                        window.onload = function() {
                            window.print();
                        };

                        window.onafterprint = function() {
                            window.close();
                        };

                    <\/script>

                </body>

                </html>

            `);

            printWindow.document.close();

        }

        /* ================= SIDEBAR ================= */

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

        /* ================= NOTIFICATION ================= */

        function showNotification(message) {

            const notification =
                document.getElementById("notification");

            notification.textContent = message;

            notification.classList.add("show");

            setTimeout(() => {

                notification.classList.remove("show");

            }, 2500);

        }

        /* ================= LIVE PREVIEW ================= */

        document
            .getElementById("customerName")
            .addEventListener("input", updatePreview);

        document
            .getElementById("customerPhone")
            .addEventListener("input", updatePreview);

        document
            .getElementById("customerCount")
            .addEventListener("input", updatePreview);

        document
            .getElementById("orderType")
            .addEventListener("change", updatePreview);

        /* ================= ESC CLOSE ================= */

        document.addEventListener("keydown", function(e) {

            if (e.key === "Escape") {
                closeSidebar();
            }

        });

        /* ================= CLOSE SIDEBAR AFTER LINK ================= */

        document.querySelectorAll(".menu a")
            .forEach(function(link) {

                link.addEventListener("click", function() {

                    if (window.innerWidth <= 900) {
                        closeSidebar();
                    }

                });

            });

        /* ================= DATE ================= */

        document.getElementById("previewDate")
            .textContent =
            new Date().toLocaleDateString("en-IN");

        /* ================= INITIAL BILL ================= */

        calculateBill();

    </script>

</body>

</html>