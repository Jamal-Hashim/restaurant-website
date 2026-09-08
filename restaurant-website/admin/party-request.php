<?php
// party-request.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Party Request - Restaurant Admin</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #1e293b;
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

        /* ================= MAIN ================= */

        .main-content {
            margin-left: 260px;
            width: calc(100% - 260px);
            min-height: 100vh;
            padding: 25px 30px;
        }

        /* ================= HEADER ================= */

        .header {
            background: #fff;
            min-height: 74px;
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
            color: #334155;
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
        }

        /* ================= PAGE TITLE ================= */

        .page-title {
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

        /* ================= FORM CARD ================= */

        .form-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .04);
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 17px;
            margin-bottom: 18px;
            color: #1e293b;
        }

        .section-title i {
            color: #f59e0b;
        }

        .form-section {
            margin-bottom: 30px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: 1/-1;
        }

        .form-group label {
            font-size: 13px;
            font-weight: 600;
            color: #475569;
            margin-bottom: 7px;
        }

        .form-group label span {
            color: #ef4444;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            border: 1px solid #dbe2ea;
            border-radius: 9px;
            height: 43px;
            padding: 0 12px;
            outline: none;
            font-size: 14px;
            color: #334155;
            background: #fff;
            transition: .2s;
        }

        .form-group textarea {
            height: 90px;
            padding: 12px;
            resize: vertical;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #f59e0b;
            box-shadow: 0 0 0 3px rgba(245, 158, 11, .1);
        }

        /* ================= TOTAL BOX ================= */

        .total-box {
            background: #fffaf0;
            border: 1px solid #fde68a;
            border-radius: 12px;
            padding: 18px;
            margin-top: 5px;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            font-size: 14px;
            color: #64748b;
        }

        .total-row.discount {
            color: #16a34a;
        }

        .total-row.gst {
            color: #009dff;
        }

        .total-row.final {
            border-top: 1px solid #f5d98a;
            margin-top: 8px;
            padding-top: 15px;
            color: #1e293b;
            font-size: 19px;
            font-weight: 700;
        }

        /* ================= BUTTONS ================= */

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 25px;
            border-top: 1px solid #e5e7eb;
            padding-top: 20px;
        }

        .btn {
            border: none;
            border-radius: 9px;
            padding: 11px 18px;
            cursor: pointer;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: .2s;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-clear {
            background: #f1f5f9;
            color: #475569;
        }

        .btn-submit {
            background: #f59e0b;
            color: #fff;
        }

        .btn-submit:hover {
            background: #d97706;
        }

        /* ================= BILL MODAL ================= */

        .bill-modal {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, .65);
            z-index: 3000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            opacity: 0;
            visibility: hidden;
            transition: .3s;
        }

        .bill-modal.show {
            opacity: 1;
            visibility: visible;
        }

        .bill-container {
            background: #fff;
            width: 100%;
            max-width: 900px;
            height: 94vh;
            overflow-y: auto;
            border-radius: 12px;
            padding: 20px;
        }

        .bill-toolbar {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-bottom: 15px;
        }

        .bill-toolbar button {
            border: none;
            padding: 10px 16px;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .print-btn {
            background: #009dff;
            color: #fff;
        }

        .close-btn {
            background: #fee2e2;
            color: #ef4444;
        }

        /* ================= A4 BILL ================= */

        .a4-bill {
            width: 210mm;
            min-height: 297mm;
            margin: auto;
            background: #fff;
            padding: 18mm;
            color: #111827;
            border: 1px solid #ddd;
        }

        .bill-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding-bottom: 20px;
            border-bottom: 2px solid #f59e0b;
        }

        .restaurant-info h1 {
            font-size: 27px;
            margin-bottom: 7px;
        }

        .restaurant-info p {
            font-size: 12px;
            color: #64748b;
            line-height: 1.6;
        }

        .invoice-info {
            text-align: right;
        }

        .invoice-info h2 {
            font-size: 23px;
            color: #f59e0b;
            margin-bottom: 8px;
        }

        .invoice-info p {
            font-size: 12px;
            line-height: 1.7;
        }

        .customer-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin: 25px 0;
        }

        .bill-box {
            border: 1px solid #e5e7eb;
            padding: 14px;
            border-radius: 7px;
        }

        .bill-box h4 {
            font-size: 12px;
            color: #f59e0b;
            margin-bottom: 9px;
            text-transform: uppercase;
        }

        .bill-box p {
            font-size: 13px;
            line-height: 1.7;
        }

        .bill-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .bill-table th {
            background: #f8fafc;
            font-size: 12px;
            text-align: left;
            padding: 11px;
            border: 1px solid #e5e7eb;
        }

        .bill-table td {
            font-size: 13px;
            padding: 11px;
            border: 1px solid #e5e7eb;
        }

        .bill-summary {
            width: 330px;
            margin-left: auto;
            margin-top: 20px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            font-size: 13px;
        }

        .summary-row.final {
            border-top: 2px solid #111827;
            margin-top: 5px;
            padding-top: 12px;
            font-size: 17px;
            font-weight: 700;
        }

        .bill-note {
            margin-top: 35px;
            padding-top: 15px;
            border-top: 1px solid #e5e7eb;
        }

        .bill-note h4 {
            font-size: 12px;
            margin-bottom: 7px;
        }

        .bill-note p {
            font-size: 12px;
            color: #64748b;
            line-height: 1.6;
        }

        .bill-footer {
            margin-top: 45px;
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #64748b;
        }

        .signature {
            text-align: center;
            width: 180px;
            border-top: 1px solid #333;
            padding-top: 7px;
        }

        /* ================= OVERLAY ================= */

        .sidebar-overlay {
            display: none;
        }

        /* ================= RESPONSIVE ================= */

        @media(max-width:1100px) {

            .form-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .bill-container {
                max-width: 95%;
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

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-card {
                padding: 18px;
            }

            .customer-section {
                grid-template-columns: 1fr;
            }

            .a4-bill {
                transform: scale(.8);
                transform-origin: top center;
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

            .page-title h2 {
                font-size: 19px;
            }

            .form-card {
                padding: 15px;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .bill-container {
                padding: 8px;
            }

            .a4-bill {
                transform: scale(.55);
                transform-origin: top left;
            }
        }

        /* ================= PRINT ================= */

        @media print {

            @page {
                size: A4;
                margin: 0;
            }

            body * {
                visibility: hidden;
            }

            .bill-modal,
            .bill-modal * {
                visibility: visible;
            }

            .bill-modal {
                position: absolute;
                inset: 0;
                background: #fff;
                padding: 0;
                display: block;
            }

            .bill-container {
                width: 100%;
                height: auto;
                max-width: none;
                padding: 0;
                overflow: visible;
                border-radius: 0;
            }

            .bill-toolbar {
                display: none;
            }

            .a4-bill {
                width: 210mm;
                min-height: 297mm;
                border: none;
                margin: 0;
                padding: 18mm;
                transform: none !important;
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
            <li><a href="dashboard.php"><i class="fa-solid fa-chart-line"></i>Dashboard</a></li>
            <li><a href="bill_generate.php"><i class="fa-solid fa-file-invoice"></i>Generate Bill</a></li>
            <li><a href="order.php"><i class="fa-solid fa-receipt"></i>Orders</a></li>
            <li><a href="menu.php"><i class="fa-solid fa-burger"></i>Menu</a></li>
            <li><a href="contact.php"><i class="fa-solid fa-envelope"></i>Contact Form</a></li>
            <li><a href="online-orders.php"><i class="fa-solid fa-bag-shopping"></i>Online Order</a></li>
            <li>
                <a href="party-request.php" class="active">
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


    <!-- ================= MAIN ================= -->

    <main class="main-content">

        <header class="header">

            <div class="header-left">

                <button class="hamburger" onclick="toggleSidebar()">
                    <i class="fa-solid fa-bars"></i>
                </button>

                <div>
                    <h1>New Party Request</h1>
                    <p>Create party request and generate A4 bill</p>
                </div>

            </div>

            <div class="admin-btn">
                <i class="fa-regular fa-circle-user"></i>
                <span>admin</span>
            </div>

        </header>


        <div class="page-title">

            <h2>
                <i class="fa-solid fa-champagne-glasses"
                    style="color:#f59e0b;margin-right:7px;"></i>
                Party Request Form
            </h2>

            <p>Enter customer and party details to generate the bill.</p>

        </div>


        <!-- ================= FORM ================= -->

        <form class="form-card" id="partyForm">

            <!-- REQUEST DETAILS -->

            <div class="form-section">

                <h3 class="section-title">
                    <i class="fa-solid fa-file-invoice"></i>
                    Request Details
                </h3>

                <div class="form-grid">

                    <div class="form-group">

                        <label>
                            Request ID <span>*</span>
                        </label>

                        <input
                            type="text"
                            id="requestId"
                            value="PR001"
                            required>

                    </div>


                    <div class="form-group">

                        <label>
                            Request Date <span>*</span>
                        </label>

                        <input
                            type="date"
                            id="requestDate"
                            required>

                    </div>

                </div>

            </div>


            <!-- CUSTOMER DETAILS -->

            <div class="form-section">

                <h3 class="section-title">
                    <i class="fa-solid fa-user"></i>
                    Customer Details
                </h3>

                <div class="form-grid">

                    <div class="form-group">

                        <label>
                            Customer Name <span>*</span>
                        </label>

                        <input
                            type="text"
                            id="customerName"
                            placeholder="Enter customer name"
                            required>

                    </div>


                    <div class="form-group">

                        <label>
                            Phone Number <span>*</span>
                        </label>

                        <input
                            type="tel"
                            id="phone"
                            placeholder="Enter phone number"
                            maxlength="10"
                            required>

                    </div>


                    <div class="form-group">

                        <label>
                            ID Name <span>*</span>
                        </label>

                        <select id="idName" required>

                            <option value="">
                                Select ID
                            </option>

                            <option value="Aadhaar Card">
                                Aadhaar Card
                            </option>

                            <option value="PAN Card">
                                PAN Card
                            </option>

                            <option value="Driving Licence">
                                Driving Licence
                            </option>

                            <option value="Voter ID">
                                Voter ID
                            </option>

                            <option value="Passport">
                                Passport
                            </option>

                        </select>

                    </div>


                    <div class="form-group">

                        <label>
                            ID Number <span>*</span>
                        </label>

                        <input
                            type="text"
                            id="idNumber"
                            placeholder="Enter ID number"
                            required>

                    </div>


                    <div class="form-group">

                        <label>
                            Email Address
                        </label>

                        <input
                            type="email"
                            id="email"
                            placeholder="Enter email address">

                    </div>

                </div>

            </div>


            <!-- PARTY DETAILS -->

            <div class="form-section">

                <h3 class="section-title">
                    <i class="fa-solid fa-calendar-days"></i>
                    Party Details
                </h3>

                <div class="form-grid">

                    <div class="form-group">

                        <label>
                            Event Type <span>*</span>
                        </label>

                        <select id="eventType" required>

                            <option value="">
                                Select Event
                            </option>

                            <option value="Birthday Party">
                                Birthday Party
                            </option>

                            <option value="Wedding Party">
                                Wedding Party
                            </option>

                            <option value="Anniversary">
                                Anniversary
                            </option>

                            <option value="Corporate Party">
                                Corporate Party
                            </option>

                            <option value="Family Function">
                                Family Function
                            </option>

                            <option value="Engagement">
                                Engagement
                            </option>

                            <option value="Other">
                                Other
                            </option>

                        </select>

                    </div>


                    <div class="form-group">

                        <label>
                            Number of Guests <span>*</span>
                        </label>

                        <input
                            type="number"
                            id="guests"
                            min="1"
                            placeholder="Number of guests"
                            required>

                    </div>


                    <div class="form-group">

                        <label>
                            Party Date <span>*</span>
                        </label>

                        <input
                            type="date"
                            id="partyDate"
                            required>

                    </div>


                    <div class="form-group">

                        <label>
                            Party Start Time <span>*</span>
                        </label>

                        <input
                            type="time"
                            id="startTime"
                            required>

                    </div>


                    <div class="form-group">

                        <label>
                            Party End Time <span>*</span>
                        </label>

                        <input
                            type="time"
                            id="endTime"
                            required>

                    </div>


                    <div class="form-group">

                        <label>
                            Budget <span>*</span>
                        </label>

                        <input
                            type="number"
                            id="budget"
                            min="0"
                            step="0.01"
                            placeholder="Enter budget"
                            required
                            oninput="calculateTotal()">

                    </div>

                </div>

            </div>


            <!-- BILL DETAILS -->

            <div class="form-section">

                <h3 class="section-title">
                    <i class="fa-solid fa-calculator"></i>
                    Billing Details
                </h3>

                <div class="form-grid">

                    <div class="form-group">

                        <label>
                            Discount (%)
                        </label>

                        <input
                            type="number"
                            id="discount"
                            value="0"
                            min="0"
                            max="100"
                            step="0.01"
                            oninput="calculateTotal()">

                    </div>


                    <div class="form-group">

                        <label>
                            GST (%)
                        </label>

                        <input
                            type="number"
                            id="gst"
                            value="5"
                            min="0"
                            max="100"
                            step="0.01"
                            oninput="calculateTotal()">

                    </div>


                    <div class="form-group full">

                        <label>
                            Discount Reason
                        </label>

                        <textarea
                            id="discountReason"
                            placeholder="Enter reason for discount..."></textarea>

                    </div>

                </div>


                <!-- TOTAL -->

                <div class="total-box">

                    <div class="total-row">

                        <span>Budget / Subtotal</span>

                        <strong id="subtotalDisplay">
                            ₹0.00
                        </strong>

                    </div>


                    <div class="total-row discount">

                        <span>
                            Discount
                            (<span id="discountPercentDisplay">0</span>%)
                        </span>

                        <strong id="discountDisplay">
                            - ₹0.00
                        </strong>

                    </div>


                    <div class="total-row">

                        <span>
                            Amount After Discount
                        </span>

                        <strong id="afterDiscountDisplay">
                            ₹0.00
                        </strong>

                    </div>


                    <div class="total-row gst">

                        <span>
                            GST
                            (<span id="gstPercentDisplay">5</span>%)
                        </span>

                        <strong id="gstDisplay">
                            + ₹0.00
                        </strong>

                    </div>


                    <div class="total-row final">

                        <span>Total</span>

                        <strong id="totalDisplay">
                            ₹0.00
                        </strong>

                    </div>

                </div>

            </div>


            <!-- ACTIONS -->

            <div class="form-actions">

                <button
                    type="button"
                    class="btn btn-clear"
                    onclick="clearForm()">
                    <i class="fa-solid fa-rotate-left"></i>
                    Clear
                </button>


                <button
                    type="submit"
                    class="btn btn-submit">
                    <i class="fa-solid fa-file-invoice"></i>
                    Submit & Generate Bill
                </button>

            </div>

        </form>

    </main>


    <!-- ================= BILL MODAL ================= -->

    <div class="bill-modal" id="billModal">

        <div class="bill-container">

            <div class="bill-toolbar">

                <button
                    class="print-btn"
                    onclick="printBill()">
                    <i class="fa-solid fa-print"></i>
                    Print / Save PDF
                </button>

                <button
                    class="close-btn"
                    onclick="closeBill()">
                    <i class="fa-solid fa-xmark"></i>
                    Close
                </button>

            </div>


            <!-- ================= A4 BILL ================= -->

            <div class="a4-bill" id="a4Bill">

                <div class="bill-header">

                    <div class="restaurant-info">

                        <h1>YOUR RESTAURANT</h1>

                        <p>
                            Restaurant & Party Hall<br>
                            Main Market, Mau, Uttar Pradesh<br>
                            Phone: +91 9876543210<br>
                            Email: restaurant@example.com
                        </p>

                    </div>


                    <div class="invoice-info">

                        <h2>PARTY INVOICE</h2>

                        <p>
                            <strong>Request ID:</strong>
                            <span id="billRequestId"></span>
                            <br>

                            <strong>Request Date:</strong>
                            <span id="billRequestDate"></span>
                        </p>

                    </div>

                </div>


                <!-- CUSTOMER -->

                <div class="customer-section">

                    <div class="bill-box">

                        <h4>Customer Details</h4>

                        <p>
                            <strong>Name:</strong>
                            <span id="billCustomerName"></span>
                            <br>

                            <strong>Phone:</strong>
                            <span id="billPhone"></span>
                            <br>

                            <strong>Email:</strong>
                            <span id="billEmail"></span>
                            <br>

                            <strong>ID:</strong>
                            <span id="billIdName"></span>
                            <br>

                            <strong>ID Number:</strong>
                            <span id="billIdNumber"></span>
                        </p>

                    </div>


                    <div class="bill-box">

                        <h4>Party Details</h4>

                        <p>
                            <strong>Event:</strong>
                            <span id="billEvent"></span>
                            <br>

                            <strong>Guests:</strong>
                            <span id="billGuests"></span>
                            <br>

                            <strong>Party Date:</strong>
                            <span id="billPartyDate"></span>
                            <br>

                            <strong>Time:</strong>
                            <span id="billTime"></span>
                        </p>

                    </div>

                </div>


                <!-- BILL TABLE -->

                <table class="bill-table">

                    <thead>

                        <tr>

                            <th>Description</th>

                            <th>Guests</th>

                            <th>Amount</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>
                                Party / Event Arrangement
                            </td>

                            <td id="billGuestsTable">
                                0
                            </td>

                            <td id="billSubtotal">
                                ₹0.00
                            </td>

                        </tr>

                    </tbody>

                </table>


                <!-- SUMMARY -->

                <div class="bill-summary">

                    <div class="summary-row">

                        <span>Subtotal</span>

                        <strong id="summarySubtotal">
                            ₹0.00
                        </strong>

                    </div>


                    <div class="summary-row">

                        <span>
                            Discount
                            (<span id="summaryDiscountPercent">0</span>%)
                        </span>

                        <strong id="summaryDiscount">
                            - ₹0.00
                        </strong>

                    </div>


                    <div class="summary-row">

                        <span>After Discount</span>

                        <strong id="summaryAfterDiscount">
                            ₹0.00
                        </strong>

                    </div>


                    <div class="summary-row">

                        <span>
                            GST
                            (<span id="summaryGstPercent">5</span>%)
                        </span>

                        <strong id="summaryGst">
                            + ₹0.00
                        </strong>

                    </div>


                    <div class="summary-row final">

                        <span>Grand Total</span>

                        <strong id="summaryTotal">
                            ₹0.00
                        </strong>

                    </div>

                </div>


                <!-- DISCOUNT NOTE -->

                <div class="bill-note">

                    <h4>Discount Reason</h4>

                    <p id="billDiscountReason">
                        No discount applied.
                    </p>

                </div>


                <div class="bill-footer">

                    <div>

                        <strong>Thank you for choosing us!</strong>

                        <br>

                        <span>
                            This is a computer-generated invoice.
                        </span>

                    </div>


                    <div class="signature">
                        Authorized Signature
                    </div>

                </div>

            </div>

        </div>

    </div>


    <script>
        /* ================= DEFAULT DATE ================= */

        const today = new Date();

        document.getElementById("requestDate").value =
            today.toISOString().split("T")[0];


        /* ================= CALCULATE TOTAL ================= */

        function calculateTotal() {

            const budget =
                parseFloat(
                    document.getElementById("budget").value
                ) || 0;

            const discountPercent =
                parseFloat(
                    document.getElementById("discount").value
                ) || 0;

            const gstPercent =
                parseFloat(
                    document.getElementById("gst").value
                ) || 0;


            const discountAmount =
                budget * discountPercent / 100;


            const afterDiscount =
                budget - discountAmount;


            const gstAmount =
                afterDiscount * gstPercent / 100;


            const total =
                afterDiscount + gstAmount;


            document.getElementById("subtotalDisplay").textContent =
                formatMoney(budget);

            document.getElementById("discountDisplay").textContent =
                "- " + formatMoney(discountAmount);

            document.getElementById("afterDiscountDisplay").textContent =
                formatMoney(afterDiscount);

            document.getElementById("gstDisplay").textContent =
                "+ " + formatMoney(gstAmount);

            document.getElementById("totalDisplay").textContent =
                formatMoney(total);


            document.getElementById("discountPercentDisplay").textContent =
                discountPercent;

            document.getElementById("gstPercentDisplay").textContent =
                gstPercent;

        }


        function formatMoney(amount) {

            return "₹" + Number(amount).toLocaleString(
                "en-IN", {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }
            );

        }


        /* ================= SUBMIT FORM ================= */

        document
            .getElementById("partyForm")
            .addEventListener("submit", function(e) {

                e.preventDefault();


                const requestId =
                    document.getElementById("requestId").value.trim();

                const requestDate =
                    document.getElementById("requestDate").value;

                const customerName =
                    document.getElementById("customerName").value.trim();

                const phone =
                    document.getElementById("phone").value.trim();

                const idName =
                    document.getElementById("idName").value;

                const idNumber =
                    document.getElementById("idNumber").value.trim();

                const email =
                    document.getElementById("email").value.trim();

                const eventType =
                    document.getElementById("eventType").value;

                const guests =
                    document.getElementById("guests").value;

                const partyDate =
                    document.getElementById("partyDate").value;

                const startTime =
                    document.getElementById("startTime").value;

                const endTime =
                    document.getElementById("endTime").value;

                const budget =
                    parseFloat(
                        document.getElementById("budget").value
                    ) || 0;

                const discountPercent =
                    parseFloat(
                        document.getElementById("discount").value
                    ) || 0;

                const gstPercent =
                    parseFloat(
                        document.getElementById("gst").value
                    ) || 0;

                const discountReason =
                    document.getElementById("discountReason").value.trim();


                if (
                    !requestId ||
                    !requestDate ||
                    !customerName ||
                    !phone ||
                    !idName ||
                    !idNumber ||
                    !eventType ||
                    !guests ||
                    !partyDate ||
                    !startTime ||
                    !endTime ||
                    budget <= 0
                ) {

                    alert("Please fill all required fields.");

                    return;
                }


                if (startTime >= endTime) {

                    alert("Party end time must be later than start time.");

                    return;
                }


                const discountAmount =
                    budget * discountPercent / 100;

                const afterDiscount =
                    budget - discountAmount;

                const gstAmount =
                    afterDiscount * gstPercent / 100;

                const total =
                    afterDiscount + gstAmount;


                /* ================= BILL DATA ================= */

                document.getElementById("billRequestId").textContent =
                    requestId;

                document.getElementById("billRequestDate").textContent =
                    formatDate(requestDate);

                document.getElementById("billCustomerName").textContent =
                    customerName;

                document.getElementById("billPhone").textContent =
                    phone;

                document.getElementById("billEmail").textContent =
                    email || "N/A";

                document.getElementById("billIdName").textContent =
                    idName;

                document.getElementById("billIdNumber").textContent =
                    idNumber;

                document.getElementById("billEvent").textContent =
                    eventType;

                document.getElementById("billGuests").textContent =
                    guests + " Guests";

                document.getElementById("billGuestsTable").textContent =
                    guests;

                document.getElementById("billPartyDate").textContent =
                    formatDate(partyDate);

                document.getElementById("billTime").textContent =
                    formatTime(startTime) +
                    " - " +
                    formatTime(endTime);

                document.getElementById("billSubtotal").textContent =
                    formatMoney(budget);


                /* SUMMARY */

                document.getElementById("summarySubtotal").textContent =
                    formatMoney(budget);

                document.getElementById("summaryDiscountPercent").textContent =
                    discountPercent;

                document.getElementById("summaryDiscount").textContent =
                    "- " + formatMoney(discountAmount);

                document.getElementById("summaryAfterDiscount").textContent =
                    formatMoney(afterDiscount);

                document.getElementById("summaryGstPercent").textContent =
                    gstPercent;

                document.getElementById("summaryGst").textContent =
                    "+ " + formatMoney(gstAmount);

                document.getElementById("summaryTotal").textContent =
                    formatMoney(total);


                document.getElementById("billDiscountReason").textContent =
                    discountReason || "No discount applied.";


                /* SHOW BILL */

                document
                    .getElementById("billModal")
                    .classList.add("show");

            });


        /* ================= FORMAT DATE ================= */

        function formatDate(dateString) {

            if (!dateString) return "";

            const date =
                new Date(dateString + "T00:00:00");

            return date.toLocaleDateString(
                "en-IN", {
                    day: "2-digit",
                    month: "short",
                    year: "numeric"
                }
            );

        }


        /* ================= FORMAT TIME ================= */

        function formatTime(time) {

            if (!time) return "";

            const [hour, minute] =
            time.split(":");

            const date =
                new Date();

            date.setHours(
                parseInt(hour),
                parseInt(minute)
            );

            return date.toLocaleTimeString(
                "en-IN", {
                    hour: "2-digit",
                    minute: "2-digit",
                    hour12: true
                }
            );

        }


        /* ================= PRINT BILL ================= */

        function printBill() {

            window.print();

        }


        /* ================= CLOSE BILL ================= */

        function closeBill() {

            document
                .getElementById("billModal")
                .classList.remove("show");

        }


        /* ================= CLEAR FORM ================= */

        function clearForm() {

            if (
                !confirm(
                    "Are you sure you want to clear the form?"
                )
            ) {
                return;
            }


            document
                .getElementById("partyForm")
                .reset();


            document.getElementById("requestDate").value =
                new Date().toISOString().split("T")[0];

            document.getElementById("discount").value = 0;

            document.getElementById("gst").value = 5;

            document.getElementById("requestId").value =
                generateRequestId();


            calculateTotal();

        }


        /* ================= GENERATE REQUEST ID ================= */

        function generateRequestId() {

            const random =
                Math.floor(
                    100 + Math.random() * 900
                );

            return "PR" + random;

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


        /* ================= ESC KEY ================= */

        document.addEventListener(
            "keydown",
            function(e) {

                if (e.key === "Escape") {

                    closeSidebar();

                    closeBill();

                }

            }
        );


        /* ================= INITIAL CALCULATION ================= */

        calculateTotal();
    </script>

</body>

</html>