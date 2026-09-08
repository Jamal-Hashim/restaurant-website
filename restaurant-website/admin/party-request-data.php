<?php
// party-approval.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Party Approval | Restaurant Admin</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #1e293b;
        }

        /* SIDEBAR */

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
        /* MAIN */

        .main-content {
            margin-left: 260px;
            width: calc(100% - 260px);
            min-height: 100vh;
            padding: 25px 30px;
        }

        /* HEADER */

        .header {
            min-height: 74px;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 15px 22px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .04);
            margin-bottom: 25px;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header h1 {
            font-size: 24px;
            color: #1e293b;
        }

        .header p {
            font-size: 13px;
            color: #64748b;
            margin-top: 4px;
        }

        .admin-btn {
            border: 1px solid #e2e8f0;
            background: #fff;
            padding: 10px 15px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 9px;
            color: #475569;
        }

        .admin-btn i {
            color: #f59e0b;
            font-size: 18px;
        }

        .hamburger {
            display: none;
            width: 42px;
            height: 42px;
            border: 1px solid #e2e8f0;
            background: #fff;
            border-radius: 10px;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 18px;
            color: #475569;
        }

        /* PAGE TOP */

        .page-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 18px;
        }

        .page-title h2 {
            font-size: 21px;
            margin-bottom: 5px;
        }

        .page-title p {
            color: #64748b;
            font-size: 13px;
        }

        /* SEARCH */

        .search-box {
            width: 300px;
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        .search-box input {
            width: 100%;
            height: 42px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            outline: none;
            background: #fff;
            padding: 0 15px 0 40px;
            font-size: 14px;
        }

        .search-box input:focus {
            border-color: #f59e0b;
        }

        /* STATS */

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-bottom: 20px;
        }

        .stat-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 18px;
            display: flex;
            align-items: center;
            gap: 14px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .03);
            transition: .25s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, .07);
        }

        .stat-icon {
            width: 45px;
            height: 45px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .pending-icon {
            background: #fff7e6;
            color: #f59e0b;
        }

        .approved-icon {
            background: #ecfdf5;
            color: #16a34a;
        }

        .rejected-icon {
            background: #fff1f2;
            color: #ef4444;
        }

        .total-icon {
            background: #eaf6ff;
            color: #009dff;
        }

        .stat-card small {
            color: #64748b;
            font-size: 12px;
        }

        .stat-card h3 {
            margin-top: 4px;
            font-size: 21px;
        }

        /* FILTER */

        .filter-bar {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 13px;
            padding: 13px;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 8px;
            overflow-x: auto;
        }

        .filter-btn {
            border: none;
            background: #f8fafc;
            color: #64748b;
            padding: 9px 15px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            white-space: nowrap;
            transition: .2s;
        }

        .filter-btn:hover {
            background: #fff3d6;
            color: #d97706;
        }

        .filter-btn.active {
            background: #f59e0b;
            color: #fff;
        }

        /* TABLE */

        .table-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .04);
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 1300px;
            border-collapse: collapse;
        }

        th {
            background: #f8fafc;
            color: #475569;
            font-size: 13px;
            font-weight: 600;
            text-align: left;
            padding: 15px;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eef2f7;
            font-size: 13px;
            color: #475569;
            vertical-align: middle;
        }

        tbody tr {
            transition: .2s;
        }

        tbody tr:hover {
            background: #fffbf5;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        /* TABLE CONTENT */

        .request-id {
            font-weight: 700;
            color: #1e293b;
        }

        .customer-name {
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 4px;
        }

        .phone {
            color: #64748b;
            font-size: 12px;
        }

        .phone a {
            color: #64748b;
            text-decoration: none;
        }

        .phone a:hover {
            color: #009dff;
        }

        .event-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #fff7e6;
            color: #d97706;
            padding: 6px 9px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .discount-high {
            color: #ef4444;
            font-weight: 700;
        }

        .total {
            font-weight: 700;
            color: #1e293b;
        }

        /* STATUS */

        .status {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 7px 10px;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
        }

        .status.pending {
            background: #fff7e6;
            color: #d97706;
        }

        .status.approved {
            background: #ecfdf5;
            color: #16a34a;
        }

        .status.rejected {
            background: #fff1f2;
            color: #ef4444;
        }

        /* ACTIONS */

        .actions {
            display: flex;
            gap: 7px;
        }

        .action-btn {
            width: 35px;
            height: 35px;
            border: none;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: .2s;
        }

        .view-btn {
            background: #eaf6ff;
            color: #009dff;
        }

        .view-btn:hover {
            background: #009dff;
            color: #fff;
        }

        .approve-btn {
            background: #ecfdf5;
            color: #16a34a;
        }

        .approve-btn:hover {
            background: #16a34a;
            color: #fff;
        }

        .reject-btn {
            background: #fff1f2;
            color: #ef4444;
        }

        .reject-btn:hover {
            background: #ef4444;
            color: #fff;
        }

        /* NO DATA */

        .no-data {
            display: none;
            text-align: center;
            padding: 60px 20px;
        }

        .no-data i {
            font-size: 42px;
            color: #cbd5e1;
            margin-bottom: 12px;
        }

        .no-data h3 {
            color: #475569;
            margin-bottom: 6px;
        }

        .no-data p {
            color: #94a3b8;
            font-size: 13px;
        }

        /* MODAL */

        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, .55);
            z-index: 2000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            opacity: 0;
            visibility: hidden;
            transition: .25s;
        }

        .modal-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        .modal {
            width: 100%;
            max-width: 800px;
            max-height: 92vh;
            overflow-y: auto;
            background: #fff;
            border-radius: 17px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, .2);
        }

        .modal-header {
            padding: 20px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            background: #fff;
            z-index: 2;
        }

        .modal-header h3 {
            font-size: 19px;
        }

        .close-btn {
            width: 36px;
            height: 36px;
            border: none;
            background: #f8fafc;
            color: #64748b;
            border-radius: 9px;
            cursor: pointer;
            font-size: 15px;
        }

        .close-btn:hover {
            background: #fee2e2;
            color: #ef4444;
        }

        .modal-body {
            padding: 20px;
        }

        /* DETAILS */

        .details-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 13px;
        }

        .detail-box {
            background: #fafbfc;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 13px;
        }

        .detail-box.full {
            grid-column: 1/-1;
        }

        .detail-label {
            display: block;
            color: #94a3b8;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: .3px;
            margin-bottom: 5px;
        }

        .detail-value {
            color: #334155;
            font-size: 14px;
            font-weight: 500;
            line-height: 1.5;
        }

        /* APPROVAL BOX */

        .approval-box {
            margin-top: 18px;
            padding: 15px;
            border: 1px solid #fde68a;
            background: #fffbeb;
            border-radius: 11px;
        }

        .approval-box h4 {
            font-size: 14px;
            color: #b45309;
            margin-bottom: 12px;
        }

        .form-group {
            margin-bottom: 12px;
        }

        .form-group label {
            display: block;
            font-size: 12px;
            color: #475569;
            margin-bottom: 6px;
        }

        .form-group textarea {
            width: 100%;
            min-height: 85px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 10px;
            resize: vertical;
            outline: none;
            font-family: Arial, sans-serif;
            font-size: 13px;
        }

        .form-group textarea:focus {
            border-color: #f59e0b;
        }

        /* MODAL FOOTER */

        .modal-footer {
            padding: 16px 20px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: flex-end;
            gap: 9px;
            flex-wrap: wrap;
        }

        .modal-action {
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 13px;
            transition: .2s;
        }

        .modal-action:hover {
            opacity: .9;
            transform: translateY(-1px);
        }

        .approve-action {
            background: #16a34a;
            color: #fff;
        }

        .reject-action {
            background: #ef4444;
            color: #fff;
        }

        .whatsapp-action {
            background: #16a34a;
            color: #fff;
        }

        .print-action {
            background: #009dff;
            color: #fff;
        }

        /* SIDEBAR OVERLAY */

        .sidebar-overlay {
            display: none;
        }

        /* RESPONSIVE */

        @media(max-width:1100px) {

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .main-content {
                padding: 20px;
            }

        }

        @media(max-width:768px) {

            .sidebar {
                transform: translateX(-100%);
                box-shadow: 8px 0 30px rgba(0, 0, 0, .12);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 15px;
            }

            .hamburger {
                display: flex;
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

            .header {
                padding: 12px 15px;
            }

            .header h1 {
                font-size: 20px;
            }

            .header p {
                display: none;
            }

            .admin-btn span {
                display: none;
            }

            .admin-btn {
                width: 42px;
                height: 42px;
                justify-content: center;
                padding: 0;
            }

            .page-top {
                flex-direction: column;
                align-items: stretch;
            }

            .search-box {
                width: 100%;
            }

            .filter-bar {
                overflow-x: auto;
                white-space: nowrap;
            }

            .details-grid {
                grid-template-columns: 1fr;
            }

            .detail-box.full {
                grid-column: auto;
            }

        }

        @media(max-width:550px) {

            .main-content {
                padding: 12px;
            }

            .header {
                min-height: 65px;
            }

            .header h1 {
                font-size: 18px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .page-title h2 {
                font-size: 19px;
            }

            .modal-overlay {
                padding: 10px;
            }

            .modal-header,
            .modal-body {
                padding: 15px;
            }

            .modal-footer {
                padding: 13px 15px;
            }

            .modal-action {
                flex: 1;
                justify-content: center;
            }

        }

        @media(max-width:360px) {

            .main-content {
                padding: 9px;
            }

            .stat-card {
                padding: 14px;
            }

            .header {
                padding: 10px;
            }

            .header h1 {
                font-size: 16px;
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
                <a href="party-request-data.php" class="active">
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

    <div class="sidebar-overlay"
        id="overlay"
        onclick="closeSidebar()">
    </div>

    <!-- MAIN -->

    <main class="main-content">

        <header class="header">

            <div class="header-left">

                <button class="hamburger"
                    onclick="toggleSidebar()">

                    <i class="fa-solid fa-bars"></i>

                </button>

                <div>

                    <h1>Party Approval</h1>

                    <p>
                        Manage party requests with discount greater than 20%
                    </p>

                </div>

            </div>

            <div class="admin-btn">

                <i class="fa-regular fa-circle-user"></i>

                <span>admin</span>

            </div>

        </header>

        <!-- PAGE TOP -->

        <div class="page-top">

            <div class="page-title">

                <h2>

                    Approval Requests

                    <span id="requestCount"
                        style="color:#f59e0b;">
                        (0)
                    </span>

                </h2>

                <p>
                    Requests with discount above 20% require approval
                </p>

            </div>

            <div class="search-box">

                <i class="fa-solid fa-magnifying-glass"></i>

                <input
                    type="text"
                    id="searchInput"
                    placeholder="Search request..."
                    onkeyup="searchRequests()">

            </div>

        </div>

        <!-- STATS -->

        <div class="stats">

            <div class="stat-card">

                <div class="stat-icon pending-icon">
                    <i class="fa-solid fa-clock"></i>
                </div>

                <div>
                    <small>Pending</small>
                    <h3 id="pendingCount">0</h3>
                </div>

            </div>

            <div class="stat-card">

                <div class="stat-icon approved-icon">
                    <i class="fa-solid fa-circle-check"></i>
                </div>

                <div>
                    <small>Approved</small>
                    <h3 id="approvedCount">0</h3>
                </div>

            </div>

            <div class="stat-card">

                <div class="stat-icon rejected-icon">
                    <i class="fa-solid fa-circle-xmark"></i>
                </div>

                <div>
                    <small>Rejected</small>
                    <h3 id="rejectedCount">0</h3>
                </div>

            </div>

            <div class="stat-card">

                <div class="stat-icon total-icon">
                    <i class="fa-solid fa-file-circle-exclamation"></i>
                </div>

                <div>
                    <small>Total Requests</small>
                    <h3 id="totalCount">0</h3>
                </div>

            </div>

        </div>

        <!-- FILTER -->

        <div class="filter-bar">

            <button
                class="filter-btn active"
                onclick="setFilter('All',this)">
                All
            </button>

            <button
                class="filter-btn"
                onclick="setFilter('Pending',this)">
                Pending
            </button>

            <button
                class="filter-btn"
                onclick="setFilter('Approved',this)">
                Approved
            </button>

            <button
                class="filter-btn"
                onclick="setFilter('Rejected',this)">
                Rejected
            </button>

        </div>

        <!-- TABLE -->

        <div class="table-card">

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>Request ID</th>
                            <th>Customer</th>
                            <th>Event</th>
                            <th>Guests</th>
                            <th>Party Date</th>
                            <th>Budget</th>
                            <th>Discount</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody id="approvalTable"></tbody>

                </table>

                <div class="no-data"
                    id="noData">

                    <i class="fa-regular fa-folder-open"></i>

                    <h3>No Approval Requests</h3>

                    <p>
                        Party requests requiring approval will appear here.
                    </p>

                </div>

            </div>

        </div>

    </main>

    <!-- DETAILS MODAL -->

    <div class="modal-overlay"
        id="detailsModal">

        <div class="modal">

            <div class="modal-header">

                <h3>

                    <i class="fa-solid fa-user-check"
                        style="color:#f59e0b;margin-right:7px;">
                    </i>

                    Party Approval Details

                </h3>

                <button
                    class="close-btn"
                    onclick="closeModal()">

                    <i class="fa-solid fa-xmark"></i>

                </button>

            </div>

            <div class="modal-body">

                <div class="details-grid">

                    <div class="detail-box">

                        <span class="detail-label">
                            Request ID
                        </span>

                        <div class="detail-value"
                            id="dId">
                        </div>

                    </div>

                    <div class="detail-box">

                        <span class="detail-label">
                            Request Date
                        </span>

                        <div class="detail-value"
                            id="dRequestDate">
                        </div>

                    </div>

                    <div class="detail-box">

                        <span class="detail-label">
                            Customer Name
                        </span>

                        <div class="detail-value"
                            id="dName">
                        </div>

                    </div>

                    <div class="detail-box">

                        <span class="detail-label">
                            Phone Number
                        </span>

                        <div class="detail-value"
                            id="dPhone">
                        </div>

                    </div>

                    <div class="detail-box">

                        <span class="detail-label">
                            Email
                        </span>

                        <div class="detail-value"
                            id="dEmail">
                        </div>

                    </div>

                    <!-- ID NAME -->

                    <div class="detail-box">

                        <span class="detail-label">
                            ID Name
                        </span>

                        <div class="detail-value"
                            id="dIdName">
                        </div>

                    </div>

                    <!-- ID NUMBER -->

                    <div class="detail-box">

                        <span class="detail-label">
                            ID Number
                        </span>

                        <div class="detail-value"
                            id="dIdNumber">
                        </div>

                    </div>

                    <div class="detail-box">

                        <span class="detail-label">
                            Event Type
                        </span>

                        <div class="detail-value"
                            id="dEvent">
                        </div>

                    </div>

                    <div class="detail-box">

                        <span class="detail-label">
                            Number of Guests
                        </span>

                        <div class="detail-value"
                            id="dGuests">
                        </div>

                    </div>

                    <div class="detail-box">

                        <span class="detail-label">
                            Party Date
                        </span>

                        <div class="detail-value"
                            id="dPartyDate">
                        </div>

                    </div>

                    <div class="detail-box">

                        <span class="detail-label">
                            Party Time
                        </span>

                        <div class="detail-value"
                            id="dTime">
                        </div>

                    </div>

                    <div class="detail-box">

                        <span class="detail-label">
                            Budget
                        </span>

                        <div class="detail-value"
                            id="dBudget">
                        </div>

                    </div>

                    <div class="detail-box">

                        <span class="detail-label">
                            Requested Discount
                        </span>

                        <div class="detail-value"
                            id="dDiscount">
                        </div>

                    </div>

                    <div class="detail-box">

                        <span class="detail-label">
                            Discount Amount
                        </span>

                        <div class="detail-value"
                            id="dDiscountAmount">
                        </div>

                    </div>

                    <div class="detail-box">

                        <span class="detail-label">
                            After Discount
                        </span>

                        <div class="detail-value"
                            id="dAfterDiscount">
                        </div>

                    </div>

                    <div class="detail-box">

                        <span class="detail-label">
                            GST
                        </span>

                        <div class="detail-value"
                            id="dGst">
                        </div>

                    </div>

                    <div class="detail-box">

                        <span class="detail-label">
                            Grand Total
                        </span>

                        <div class="detail-value"
                            id="dTotal">
                        </div>

                    </div>

                    <div class="detail-box">

                        <span class="detail-label">
                            Status
                        </span>

                        <div class="detail-value"
                            id="dStatus">
                        </div>

                    </div>

                    <div class="detail-box full">

                        <span class="detail-label">
                            Discount Reason
                        </span>

                        <div class="detail-value"
                            id="dReason">
                        </div>

                    </div>

                    <div class="detail-box full"
                        id="approvalInfo"
                        style="display:none;">

                        <span class="detail-label">
                            Approval Remarks
                        </span>

                        <div class="detail-value"
                            id="dRemarks">
                        </div>

                        <br>

                        <span class="detail-label">
                            Approved / Rejected By
                        </span>

                        <div class="detail-value"
                            id="dApprovedBy">
                        </div>

                    </div>

                </div>

                <!-- APPROVAL FORM -->

                <div class="approval-box"
                    id="approvalBox">

                    <h4>

                        <i class="fa-solid fa-shield-halved"></i>

                        Approval Decision

                    </h4>

                    <div class="form-group">

                        <label>
                            Approval / Rejection Remarks
                        </label>

                        <textarea
                            id="approvalRemarks"
                            placeholder="Enter remarks..."></textarea>

                    </div>

                </div>

            </div>

            <div class="modal-footer">

                <button
                    class="modal-action whatsapp-action"
                    onclick="sendWhatsApp()">

                    <i class="fa-brands fa-whatsapp"></i>

                    WhatsApp

                </button>

                <button
                    class="modal-action print-action"
                    onclick="printApprovalBill()">

                    <i class="fa-solid fa-print"></i>

                    Print

                </button>

                <button
                    class="modal-action reject-action"
                    id="modalRejectBtn"
                    onclick="rejectRequest()">

                    <i class="fa-solid fa-xmark"></i>

                    Reject

                </button>

                <button
                    class="modal-action approve-action"
                    id="modalApproveBtn"
                    onclick="approveRequest()">

                    <i class="fa-solid fa-check"></i>

                    Approve

                </button>

            </div>

        </div>

    </div>

    <script>
        /* STORAGE */

        const STORAGE_KEY = "restaurantPartyApproval";

        /* SAMPLE DATA */

        if (!localStorage.getItem(STORAGE_KEY)) {

            const sampleData = [

                {
                    requestId: "PR001",
                    requestDate: "2026-09-03",
                    customerName: "Rahul Kumar",
                    phone: "9876543210",

                    idName: "Aadhaar Card",
                    idNumber: "XXXX XXXX 1234",

                    email: "rahul@gmail.com",

                    eventType: "Birthday Party",
                    guests: 30,

                    partyDate: "2026-09-15",
                    startTime: "19:00",
                    endTime: "22:00",

                    budget: 50000,

                    discountPercent: 25,

                    discountReason: "Special birthday event discount",

                    discountAmount: 12500,

                    amountAfterDiscount: 37500,

                    gstPercent: 5,
                    gstAmount: 1875,

                    total: 39375,

                    status: "Pending",

                    remarks: "",
                    approvedBy: "",
                    approvalDate: ""
                },

                {
                    requestId: "PR002",
                    requestDate: "2026-09-03",
                    customerName: "Aman Singh",
                    phone: "9876543211",

                    idName: "Driving Licence",
                    idNumber: "DL-XXXX1234",

                    email: "aman@gmail.com",

                    eventType: "Wedding Party",
                    guests: 100,

                    partyDate: "2026-09-25",
                    startTime: "20:00",
                    endTime: "23:30",

                    budget: 100000,

                    discountPercent: 30,

                    discountReason: "Wedding special package",

                    discountAmount: 30000,

                    amountAfterDiscount: 70000,

                    gstPercent: 5,
                    gstAmount: 3500,

                    total: 73500,

                    status: "Pending",

                    remarks: "",
                    approvedBy: "",
                    approvalDate: ""
                },

                {
                    requestId: "PR003",
                    requestDate: "2026-09-02",
                    customerName: "Priya Sharma",
                    phone: "9876543213",

                    idName: "Aadhaar Card",
                    idNumber: "XXXX XXXX 7890",

                    email: "priya@gmail.com",

                    eventType: "Anniversary",
                    guests: 40,

                    partyDate: "2026-09-20",
                    startTime: "18:30",
                    endTime: "22:00",

                    budget: 60000,

                    discountPercent: 22,

                    discountReason: "Returning customer",

                    discountAmount: 13200,

                    amountAfterDiscount: 46800,

                    gstPercent: 5,
                    gstAmount: 2340,

                    total: 49140,

                    status: "Approved",

                    remarks: "Approved for returning customer.",

                    approvedBy: "Admin",

                    approvalDate: "2026-09-03"
                },

                {
                    requestId: "PR004",
                    requestDate: "2026-09-01",
                    customerName: "Arif Khan",
                    phone: "9876543214",

                    idName: "Aadhaar Card",
                    idNumber: "XXXX XXXX 4567",

                    email: "arif@gmail.com",

                    eventType: "Corporate Party",
                    guests: 70,

                    partyDate: "2026-09-18",
                    startTime: "19:00",
                    endTime: "23:00",

                    budget: 80000,

                    discountPercent: 35,

                    discountReason: "Special corporate discount",

                    discountAmount: 28000,

                    amountAfterDiscount: 52000,

                    gstPercent: 5,
                    gstAmount: 2600,

                    total: 54600,

                    status: "Rejected",

                    remarks: "Discount is too high for this booking.",

                    approvedBy: "Admin",

                    approvalDate: "2026-09-02"
                }

            ];

            localStorage.setItem(
                STORAGE_KEY,
                JSON.stringify(sampleData)
            );

        }

        /* VARIABLES */

        let currentRequest = null;

        let currentFilter = "All";

        /* GET REQUESTS */

        function getRequests() {

            return JSON.parse(
                localStorage.getItem(STORAGE_KEY)
            ) || [];

        }

        /* SAVE REQUESTS */

        function saveRequests(data) {

            localStorage.setItem(
                STORAGE_KEY,
                JSON.stringify(data)
            );

        }

        /* LOAD REQUESTS */

        function loadRequests() {

            const table =
                document.getElementById("approvalTable");

            const noData =
                document.getElementById("noData");

            const search =
                document
                .getElementById("searchInput")
                .value
                .toLowerCase()
                .trim();

            let data = getRequests();

            if (currentFilter !== "All") {

                data = data.filter(
                    request =>
                    request.status === currentFilter
                );

            }

            if (search) {

                data = data.filter(request =>

                    request.requestId
                    .toLowerCase()
                    .includes(search)

                    ||

                    request.customerName
                    .toLowerCase()
                    .includes(search)

                    ||

                    request.phone
                    .includes(search)

                    ||

                    request.eventType
                    .toLowerCase()
                    .includes(search)

                );

            }

            table.innerHTML = "";

            document.getElementById("requestCount")
                .textContent =
                "(" + data.length + ")";

            if (data.length === 0) {

                noData.style.display = "block";

                updateStats();

                return;

            }

            noData.style.display = "none";

            data.forEach(request => {

                const row =
                    document.createElement("tr");

                const statusClass =
                    request.status.toLowerCase();

                let actions = `

            <button
                class="action-btn view-btn"
                title="View Details"
                onclick="viewDetails('${request.requestId}')">

                <i class="fa-regular fa-eye"></i>

            </button>

        `;

                if (request.status === "Pending") {

                    actions += `

                <button
                    class="action-btn approve-btn"
                    title="Approve"
                    onclick="quickApprove('${request.requestId}')">

                    <i class="fa-solid fa-check"></i>

                </button>

                <button
                    class="action-btn reject-btn"
                    title="Reject"
                    onclick="quickReject('${request.requestId}')">

                    <i class="fa-solid fa-xmark"></i>

                </button>

            `;

                }

                row.innerHTML = `

            <td>

                <span class="request-id">

                    ${request.requestId}

                </span>

            </td>

            <td>

                <div class="customer-name">

                    ${request.customerName}

                </div>

                <div class="phone">

                    <a href="tel:${request.phone}">

                        <i class="fa-solid fa-phone"></i>

                        ${request.phone}

                    </a>

                </div>

            </td>

            <td>

                <span class="event-badge">

                    <i class="fa-solid fa-calendar-days"></i>

                    ${request.eventType}

                </span>

            </td>

            <td>
                ${request.guests}
            </td>

            <td>
                ${formatDate(request.partyDate)}
            </td>

            <td>
                ₹${money(request.budget)}
            </td>

            <td>

                <span class="discount-high">

                    ${request.discountPercent}%

                </span>

                <br>

                <small>
                    -₹${money(request.discountAmount)}
                </small>

            </td>

            <td>

                <span class="total">

                    ₹${money(request.total)}

                </span>

            </td>

            <td>

                <span class="status ${statusClass}">

                    <i class="fa-solid ${
                        request.status === "Pending"
                            ? "fa-clock"
                            : request.status === "Approved"
                                ? "fa-circle-check"
                                : "fa-circle-xmark"
                    }"></i>

                    ${request.status}

                </span>

            </td>

            <td>

                <div class="actions">

                    ${actions}

                </div>

            </td>

        `;

                table.appendChild(row);

            });

            updateStats();

        }

        /* UPDATE STATS */

        function updateStats() {

            const data = getRequests();

            const pending =
                data.filter(
                    x => x.status === "Pending"
                ).length;

            const approved =
                data.filter(
                    x => x.status === "Approved"
                ).length;

            const rejected =
                data.filter(
                    x => x.status === "Rejected"
                ).length;

            document.getElementById("pendingCount")
                .textContent = pending;

            document.getElementById("approvedCount")
                .textContent = approved;

            document.getElementById("rejectedCount")
                .textContent = rejected;

            document.getElementById("totalCount")
                .textContent = data.length;

        }

        /* FILTER */

        function setFilter(filter, button) {

            currentFilter = filter;

            document
                .querySelectorAll(".filter-btn")
                .forEach(btn => {

                    btn.classList.remove("active");

                });

            button.classList.add("active");

            loadRequests();

        }

        /* SEARCH */

        function searchRequests() {

            loadRequests();

        }

        /* VIEW DETAILS */

        function viewDetails(id) {

            const request =
                getRequests()
                .find(
                    item =>
                    item.requestId === id
                );

            if (!request) {

                return;

            }

            currentRequest = request;

            document.getElementById("dId")
                .textContent =
                request.requestId;

            document.getElementById("dRequestDate")
                .textContent =
                formatDate(request.requestDate);

            document.getElementById("dName")
                .textContent =
                request.customerName;

            document.getElementById("dPhone")
                .textContent =
                request.phone;

            document.getElementById("dEmail")
                .textContent =
                request.email || "-";

            /* ID NAME */

            document.getElementById("dIdName")
                .textContent =
                request.idName || "-";

            /* ID NUMBER */

            document.getElementById("dIdNumber")
                .textContent =
                request.idNumber || "-";

            document.getElementById("dEvent")
                .textContent =
                request.eventType;

            document.getElementById("dGuests")
                .textContent =
                request.guests + " Guests";

            document.getElementById("dPartyDate")
                .textContent =
                formatDate(request.partyDate);

            document.getElementById("dTime")
                .textContent =
                formatTime(request.startTime) +
                " - " +
                formatTime(request.endTime);

            document.getElementById("dBudget")
                .textContent =
                "₹" + money(request.budget);

            document.getElementById("dDiscount")
                .textContent =
                request.discountPercent + "%";

            document.getElementById("dDiscountAmount")
                .textContent =
                "- ₹" + money(request.discountAmount);

            document.getElementById("dAfterDiscount")
                .textContent =
                "₹" + money(request.amountAfterDiscount);

            document.getElementById("dGst")
                .textContent =
                request.gstPercent +
                "% (+₹" +
                money(request.gstAmount) +
                ")";

            document.getElementById("dTotal")
                .textContent =
                "₹" + money(request.total);

            document.getElementById("dStatus")
                .textContent =
                request.status;

            document.getElementById("dReason")
                .textContent =
                request.discountReason ||
                "No reason provided.";

            document.getElementById("approvalRemarks")
                .value =
                request.remarks || "";

            const approvalInfo =
                document.getElementById("approvalInfo");

            const approvalBox =
                document.getElementById("approvalBox");

            const approveBtn =
                document.getElementById("modalApproveBtn");

            const rejectBtn =
                document.getElementById("modalRejectBtn");

            if (request.status === "Pending") {

                approvalBox.style.display = "block";

                approveBtn.style.display = "flex";

                rejectBtn.style.display = "flex";

                approvalInfo.style.display = "none";

            } else {

                approvalBox.style.display = "none";

                approveBtn.style.display = "none";

                rejectBtn.style.display = "none";

                approvalInfo.style.display = "block";

                document.getElementById("dRemarks")
                    .textContent =
                    request.remarks || "-";

                document.getElementById("dApprovedBy")
                    .textContent =
                    request.approvedBy || "-";

                if (request.approvalDate) {

                    document.getElementById("dApprovedBy")
                        .textContent +=
                        " - " +
                        formatDate(
                            request.approvalDate
                        );

                }

            }

            document
                .getElementById("detailsModal")
                .classList.add("show");

        }

        /* APPROVE */

        function approveRequest() {

            if (!currentRequest) {

                return;

            }

            const remarks =
                document
                .getElementById("approvalRemarks")
                .value
                .trim();

            const confirmApproval =
                confirm(
                    "Are you sure you want to approve " +
                    currentRequest.requestId +
                    "?"
                );

            if (!confirmApproval) {

                return;

            }

            updateStatus(
                currentRequest.requestId,
                "Approved",
                remarks || "Approved by Admin"
            );

            closeModal();

        }

        /* REJECT */

        function rejectRequest() {

            if (!currentRequest) {

                return;

            }

            const remarks =
                document
                .getElementById("approvalRemarks")
                .value
                .trim();

            if (!remarks) {

                alert(
                    "Please enter rejection remarks."
                );

                return;

            }

            const confirmReject =
                confirm(
                    "Are you sure you want to reject " +
                    currentRequest.requestId +
                    "?"
                );

            if (!confirmReject) {

                return;

            }

            updateStatus(
                currentRequest.requestId,
                "Rejected",
                remarks
            );

            closeModal();

        }

        /* QUICK APPROVE */

        function quickApprove(id) {

            const confirmApproval =
                confirm(
                    "Approve party request " +
                    id +
                    "?"
                );

            if (!confirmApproval) {

                return;

            }

            updateStatus(
                id,
                "Approved",
                "Approved by Admin"
            );

        }

        /* QUICK REJECT */

        function quickReject(id) {

            const remarks =
                prompt(
                    "Enter rejection reason:"
                );

            if (remarks === null) {

                return;

            }

            if (!remarks.trim()) {

                alert(
                    "Rejection reason is required."
                );

                return;

            }

            updateStatus(
                id,
                "Rejected",
                remarks
            );

        }

        /* UPDATE STATUS */

        function updateStatus(id, status, remarks) {

            const data = getRequests();

            const index =
                data.findIndex(
                    request =>
                    request.requestId === id
                );

            if (index === -1) {

                return;

            }

            data[index].status = status;

            data[index].remarks = remarks;

            data[index].approvedBy = "Admin";

            data[index].approvalDate =
                new Date()
                .toISOString()
                .split("T")[0];

            saveRequests(data);

            loadRequests();

        }

        /* CLOSE MODAL */

        function closeModal() {

            document
                .getElementById("detailsModal")
                .classList.remove("show");

            currentRequest = null;

        }

        /* WHATSAPP */

        function sendWhatsApp() {

            if (!currentRequest) {

                return;

            }

            let phone =
                currentRequest.phone
                .replace(/\D/g, "");

            if (phone.length === 10) {

                phone = "91" + phone;

            }

            const message =

                `Hello ${currentRequest.customerName},

Party Request Update

Request ID: ${currentRequest.requestId}

Event: ${currentRequest.eventType}

Guests: ${currentRequest.guests}

Party Date: ${formatDate(currentRequest.partyDate)}

Requested Discount: ${currentRequest.discountPercent}%

Discount Amount: ₹${money(currentRequest.discountAmount)}

GST: ${currentRequest.gstPercent}%

Grand Total: ₹${money(currentRequest.total)}

Status: ${currentRequest.status}

${currentRequest.remarks
    ? "Remarks: " + currentRequest.remarks
    : ""}

Thank you for choosing our restaurant.`;

            window.open(
                "https://wa.me/" +
                phone +
                "?text=" +
                encodeURIComponent(message),
                "_blank"
            );

        }

        /* PRINT */

        function printApprovalBill() {

            if (!currentRequest) {

                return;

            }

            printRequestBill(currentRequest);

        }

        /* PRINT BILL */

        function printRequestBill(request) {

            const billWindow =
                window.open(
                    "",
                    "_blank",
                    "width=900,height=800"
                );

            billWindow.document.write(`

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>
Party Approval - ${request.requestId}
</title>

<style>

@page{
    size:A4;
    margin:0;
}

*{
    box-sizing:border-box;
}

body{
    margin:0;
    font-family:Arial,sans-serif;
    background:#eee;
    color:#111827;
}

.a4{
    width:210mm;
    min-height:297mm;
    background:#fff;
    margin:auto;
    padding:18mm;
}

.header{
    display:flex;
    justify-content:space-between;
    border-bottom:2px solid #f59e0b;
    padding-bottom:18px;
}

.restaurant h1{
    margin:0 0 8px;
    font-size:27px;
}

.restaurant p,
.invoice p{
    font-size:12px;
    line-height:1.6;
    margin:0;
    color:#64748b;
}

.invoice{
    text-align:right;
}

.invoice h2{
    margin:0 0 8px;
    color:#f59e0b;
    font-size:23px;
}

.approval-status{
    margin:25px 0;
    padding:14px;
    text-align:center;
    border:2px solid #f59e0b;
    border-radius:7px;
    font-size:18px;
    font-weight:bold;
}

.info{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
    margin-bottom:25px;
}

.box{
    border:1px solid #ddd;
    border-radius:7px;
    padding:14px;
}

.box h4{
    margin:0 0 9px;
    color:#f59e0b;
    font-size:12px;
    text-transform:uppercase;
}

.box p{
    font-size:13px;
    line-height:1.8;
    margin:0;
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#f8fafc;
    text-align:left;
    padding:11px;
    font-size:12px;
    border:1px solid #ddd;
}

td{
    padding:11px;
    font-size:13px;
    border:1px solid #ddd;
}

.summary{
    width:330px;
    margin-left:auto;
    margin-top:20px;
}

.row{
    display:flex;
    justify-content:space-between;
    padding:8px 0;
    font-size:13px;
}

.final{
    border-top:2px solid #111;
    padding-top:12px;
    font-size:17px;
    font-weight:bold;
}

.note{
    margin-top:30px;
    border:1px solid #ddd;
    padding:14px;
}

.note h4{
    margin:0 0 8px;
    font-size:12px;
}

.note p{
    margin:0;
    font-size:12px;
    color:#64748b;
}

.signature-area{
    margin-top:55px;
    display:flex;
    justify-content:space-between;
}

.signature{
    width:190px;
    text-align:center;
    border-top:1px solid #333;
    padding-top:7px;
    font-size:12px;
}

.footer{
    margin-top:45px;
    padding-top:15px;
    border-top:1px solid #ddd;
    text-align:center;
    color:#64748b;
    font-size:11px;
}

@media print{

    body{
        background:#fff;
    }

    .a4{
        margin:0;
    }

}

</style>

</head>

<body>

<div class="a4">

    <div class="header">

        <div class="restaurant">

            <h1>
                YOUR RESTAURANT
            </h1>

            <p>

                Restaurant & Party Hall

                <br>

                Main Market, Mau, Uttar Pradesh

                <br>

                Phone: +91 9876543210

                <br>

                Email: restaurant@example.com

            </p>

        </div>

        <div class="invoice">

            <h2>
                PARTY APPROVAL
            </h2>

            <p>

                <strong>
                    Request ID:
                </strong>

                ${request.requestId}

                <br>

                <strong>
                    Request Date:
                </strong>

                ${formatDate(request.requestDate)}

            </p>

        </div>

    </div>

    <div class="approval-status">

        STATUS:
        ${request.status.toUpperCase()}

    </div>

    <div class="info">

        <div class="box">

            <h4>
                Customer Details
            </h4>

            <p>

                <strong>Name:</strong>
                ${request.customerName}

                <br>

                <strong>Phone:</strong>
                ${request.phone}

                <br>

                <strong>Email:</strong>
                ${request.email || "N/A"}

                <br>

                <strong>ID Name:</strong>
                ${request.idName || "N/A"}

                <br>

                <strong>ID Number:</strong>
                ${request.idNumber || "N/A"}

            </p>

        </div>

        <div class="box">

            <h4>
                Party Details
            </h4>

            <p>

                <strong>Event:</strong>
                ${request.eventType}

                <br>

                <strong>Guests:</strong>
                ${request.guests}

                <br>

                <strong>Date:</strong>
                ${formatDate(request.partyDate)}

                <br>

                <strong>Time:</strong>

                ${formatTime(request.startTime)}

                -

                ${formatTime(request.endTime)}

            </p>

        </div>

    </div>

    <table>

        <thead>

            <tr>

                <th>
                    Description
                </th>

                <th>
                    Amount
                </th>

            </tr>

        </thead>

        <tbody>

            <tr>

                <td>
                    Party / Event Budget
                </td>

                <td>
                    ₹${money(request.budget)}
                </td>

            </tr>

        </tbody>

    </table>

    <div class="summary">

        <div class="row">

            <span>
                Budget
            </span>

            <strong>
                ₹${money(request.budget)}
            </strong>

        </div>

        <div class="row">

            <span>
                Discount (${request.discountPercent}%)
            </span>

            <strong>
                - ₹${money(request.discountAmount)}
            </strong>

        </div>

        <div class="row">

            <span>
                After Discount
            </span>

            <strong>
                ₹${money(request.amountAfterDiscount)}
            </strong>

        </div>

        <div class="row">

            <span>
                GST (${request.gstPercent}%)
            </span>

            <strong>
                + ₹${money(request.gstAmount)}
            </strong>

        </div>

        <div class="row final">

            <span>
                Grand Total
            </span>

            <strong>
                ₹${money(request.total)}
            </strong>

        </div>

    </div>

    <div class="note">

        <h4>
            Discount Reason
        </h4>

        <p>
            ${request.discountReason || "No reason provided."}
        </p>

        <br>

        <h4>
            Approval Remarks
        </h4>

        <p>
            ${request.remarks || "No remarks."}
        </p>

    </div>

    <div class="signature-area">

        <div class="signature">

            Customer Signature

        </div>

        <div class="signature">

            ${request.approvedBy || "Authorized Person"}

            <br>

            ${request.approvalDate
                ? formatDate(request.approvalDate)
                : ""}

        </div>

    </div>

    <div class="footer">

        This is a computer-generated party approval document.

    </div>

</div>

<script>

window.onload = function(){

    window.print();

};

<\/script>

</body>

</html>

    `);

            billWindow.document.close();

        }

        /* MONEY */

        function money(value) {

            return Number(value || 0)
                .toLocaleString(
                    "en-IN", {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }
                );

        }

        /* DATE */

        function formatDate(value) {

            if (!value) {

                return "-";

            }

            return new Date(
                value + "T00:00:00"
            ).toLocaleDateString(
                "en-IN", {
                    day: "2-digit",
                    month: "short",
                    year: "numeric"
                }
            );

        }

        /* TIME */

        function formatTime(value) {

            if (!value) {

                return "-";

            }

            const parts =
                value.split(":");

            const date =
                new Date();

            date.setHours(
                Number(parts[0]),
                Number(parts[1])
            );

            return date.toLocaleTimeString(
                "en-IN", {
                    hour: "2-digit",
                    minute: "2-digit",
                    hour12: true
                }
            );

        }

        /* SIDEBAR */

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

        /* ESCAPE */

        document.addEventListener(
            "keydown",
            function(e) {

                if (e.key === "Escape") {

                    closeSidebar();

                    closeModal();

                }

            }
        );

        /* OUTSIDE MODAL CLICK */

        document
            .getElementById("detailsModal")
            .addEventListener(
                "click",
                function(e) {

                    if (e.target === this) {

                        closeModal();

                    }

                }
            );

        /* INITIAL LOAD */

        loadRequests();
    </script>

</body>

</html>