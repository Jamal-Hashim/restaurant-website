<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Online Orders - Restaurant Admin</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        html,
        body {
            width: 100%;
            overflow-x: hidden;
        }

        body {
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
            color: #1e293b;
        }

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

        /* ================= MAIN ================= */

        .main-content {
            margin-left: 260px;
            width: calc(100% - 260px);
            min-height: 100vh;
            padding: 25px 30px;
        }

        /* ================= HEADER ================= */

        .header {
            min-height: 74px;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 22px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, .04);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
            min-width: 0;
        }

        .header h1 {
            font-size: 23px;
            color: #1e293b;
        }

        .header p {
            font-size: 13px;
            color: #64748b;
            margin-top: 4px;
        }

        .admin-btn {
            border: 1px solid #e5e7eb;
            background: #fff;
            padding: 10px 15px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
            color: #334155;
            flex-shrink: 0;
        }

        .admin-btn i {
            color: #f59e0b;
            font-size: 18px;
        }

        /* ================= HAMBURGER ================= */

        .hamburger {
            display: none;
            width: 42px;
            height: 42px;
            border: none;
            background: #fff7e6;
            color: #f59e0b;
            border-radius: 10px;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 20px;
            flex-shrink: 0;
        }

        /* ================= CARD ================= */

        .orders-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, .04);
            min-width: 0;
        }

        .orders-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .orders-title {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0;
        }

        .title-icon {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff7e6;
            color: #f59e0b;
            border-radius: 12px;
            font-size: 20px;
            flex-shrink: 0;
        }

        .orders-title h2 {
            font-size: 19px;
        }

        .orders-title p {
            color: #64748b;
            font-size: 13px;
            margin-top: 4px;
        }

        .order-count {
            background: #fff7e6;
            color: #f59e0b;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
        }

        /* ================= TABLE ================= */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            border: 1px solid #eef2f7;
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1050px;
        }

        th {
            background: #f8fafc;
            color: #64748b;
            font-size: 13px;
            text-align: left;
            padding: 14px;
            border-bottom: 1px solid #e5e7eb;
            white-space: nowrap;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #eef2f7;
            font-size: 13px;
            color: #475569;
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background: #fafafa;
        }

        .order-id {
            font-weight: 600;
            color: #1e293b;
        }

        .customer-name {
            font-weight: 600;
            color: #1e293b;
        }

        .phone {
            color: #475569;
            text-decoration: none;
        }

        .phone:hover {
            color: #f59e0b;
        }

        .address {
            max-width: 220px;
            line-height: 1.5;
        }

        .dish-list {
            line-height: 1.8;
        }

        .date {
            white-space: nowrap;
            color: #64748b;
        }

        /* ================= ACTION ================= */

        .action-buttons {
            display: flex;
            gap: 7px;
            flex-wrap: wrap;
        }

        .action-btn {
            height: 36px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: .2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
        }

        .view-btn {
            width: 36px;
            background: #e0f2fe;
            color: #0284c7;
        }

        .view-btn:hover {
            background: #0284c7;
            color: #fff;
        }

        .print-btn {
            width: 36px;
            background: #f1f5f9;
            color: #475569;
        }

        .print-btn:hover {
            background: #475569;
            color: #fff;
        }

        .whatsapp-btn {
            padding: 0 12px;
            background: #25d366;
            color: #fff;
        }

        .whatsapp-btn:hover {
            background: #1ebe5d;
        }

        /* ================= EMPTY ================= */

        .empty {
            text-align: center;
            padding: 50px 20px;
            color: #94a3b8;
        }

        .empty i {
            font-size: 45px;
            margin-bottom: 15px;
        }

        .empty h3 {
            color: #475569;
            margin-bottom: 5px;
        }

        /* ================= MODAL ================= */

        .modal {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, .5);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            opacity: 0;
            visibility: hidden;
            transition: .25s;
            z-index: 2000;
        }

        .modal.show {
            opacity: 1;
            visibility: visible;
        }

        .modal-box {
            width: 100%;
            max-width: 650px;
            max-height: 90vh;
            overflow-y: auto;
            background: #fff;
            border-radius: 16px;
            padding: 25px;
            transform: translateY(20px);
            transition: .25s;
        }

        .modal.show .modal-box {
            transform: translateY(0);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 22px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e5e7eb;
        }

        .modal-header h2 {
            font-size: 20px;
        }

        .modal-header-actions {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .modal-print-btn {
            height: 36px;
            padding: 0 12px;
            border: none;
            border-radius: 8px;
            background: #f59e0b;
            color: #fff;
            cursor: pointer;
            font-weight: 600;
        }

        .modal-print-btn:hover {
            background: #d97706;
        }

        .close-btn {
            width: 36px;
            height: 36px;
            border: none;
            border-radius: 8px;
            background: #f1f5f9;
            color: #64748b;
            cursor: pointer;
        }

        .close-btn:hover {
            background: #fee2e2;
            color: #ef4444;
        }

        /* ================= DETAILS ================= */

        .details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .detail-box {
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 14px;
            min-width: 0;
        }

        .detail-box.full {
            grid-column: 1 / -1;
        }

        .detail-box label {
            display: block;
            font-size: 12px;
            color: #64748b;
            margin-bottom: 6px;
        }

        .detail-box p {
            font-size: 14px;
            color: #1e293b;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .order-items {
            margin-top: 20px;
        }

        .order-items h3 {
            font-size: 16px;
            margin-bottom: 12px;
        }

        .modal-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            padding: 12px;
            background: #f8fafc;
            border-radius: 9px;
            margin-bottom: 7px;
        }

        .modal-item-name {
            font-weight: 600;
            font-size: 14px;
        }

        .modal-item-qty {
            color: #64748b;
            font-size: 13px;
            margin-top: 3px;
        }

        .modal-summary {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #e5e7eb;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding: 5px 0;
            color: #475569;
            font-size: 14px;
        }

        .summary-row.gst {
            color: #475569;
        }

        .summary-row.grand-total {
            margin-top: 8px;
            padding-top: 12px;
            border-top: 1px dashed #cbd5e1;
            color: #1e293b;
            font-size: 17px;
            font-weight: 700;
        }

        /* ================= OVERLAY ================= */

        .sidebar-overlay {
            display: none;
        }

        /* ================= RESPONSIVE ================= */

        @media(max-width:1100px) {

            .main-content {
                padding: 20px;
            }

            .orders-card {
                padding: 20px;
            }
        }

        @media(max-width:768px) {

            .sidebar {
                transform: translateX(-100%);
                transition: transform .3s ease;
                box-shadow: 8px 0 25px rgba(0, 0, 0, .12);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 18px;
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

            .orders-header {
                align-items: flex-start;
            }
        }

        @media(max-width:550px) {

            .main-content {
                padding: 12px;
            }

            .header {
                min-height: 62px;
                margin-bottom: 15px;
            }

            .header p {
                display: none;
            }

            .header h1 {
                font-size: 18px;
            }

            .admin-btn {
                padding: 9px;
            }

            .admin-btn span {
                display: none;
            }

            .orders-card {
                padding: 15px;
                border-radius: 13px;
            }

            .orders-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .orders-title h2 {
                font-size: 17px;
            }

            .details-grid {
                grid-template-columns: 1fr;
            }

            .detail-box.full {
                grid-column: auto;
            }

            .modal {
                padding: 10px;
            }

            .modal-box {
                padding: 18px;
                max-height: 94vh;
                border-radius: 13px;
            }

            .modal-header {
                align-items: flex-start;
            }

            .modal-header h2 {
                font-size: 18px;
            }

            .modal-print-btn {
                width: 36px;
                padding: 0;
            }

            .modal-print-btn span {
                display: none;
            }
        }

        @media(max-width:400px) {

            .main-content {
                padding: 8px;
            }

            .orders-card {
                padding: 12px;
            }

            .hamburger {
                width: 38px;
                height: 38px;
            }

            .header-left {
                gap: 9px;
            }

            .header h1 {
                font-size: 17px;
            }

            .modal-box {
                padding: 15px;
            }

            .modal-item {
                padding: 10px;
            }
        }

        /* ================= PRINT ================= */

        @media print {

            body * {
                visibility: hidden !important;
            }

            #printArea,
            #printArea * {
                visibility: visible !important;
            }

            #printArea {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                background: #fff;
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
                    Dashboard
                </a>
            </li>

            <li>
                <a href="bill_generate.php">
                    <i class="fa-solid fa-file-invoice"></i>
                    Generate Bill
                </a>
            </li>

            <li>
                <a href="order.php">
                    <i class="fa-solid fa-receipt"></i>
                    Orders
                </a>
            </li>

            <li>
                <a href="menu.php">
                    <i class="fa-solid fa-burger"></i>
                    Menu
                </a>
            </li>

            <li>
                <a href="contact.php">
                    <i class="fa-solid fa-envelope"></i>
                    Contact Form
                </a>
            </li>

            <li>
                <a href="online-orders.php" class="active">
                    <i class="fa-solid fa-bag-shopping"></i>
                    Online Order
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
                    Setting
                </a>
            </li>

            <li>
                <a href="../logout.php" class="logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Logout
                </a>
            </li>

        </ul>

    </aside>


    <div class="sidebar-overlay"
        id="overlay"
        onclick="closeSidebar()">
    </div>


    <!-- ================= MAIN ================= -->

    <main class="main-content">


        <!-- HEADER -->

        <header class="header">

            <div class="header-left">

                <button class="hamburger"
                    onclick="toggleSidebar()">

                    <i class="fa-solid fa-bars"></i>

                </button>


                <div>

                    <h1>Online Orders</h1>

                    <p>Manage customer online orders</p>

                </div>

            </div>


            <button class="admin-btn">

                <i class="fa-regular fa-circle-user"></i>

                <span>admin</span>

            </button>

        </header>


        <!-- ================= ORDERS ================= -->

        <section class="orders-card">


            <div class="orders-header">

                <div class="orders-title">

                    <div class="title-icon">

                        <i class="fa-solid fa-bag-shopping"></i>

                    </div>

                    <div>

                        <h2>Online Orders</h2>

                        <p>Customer online food orders</p>

                    </div>

                </div>


                <div class="order-count">

                    <span id="orderCount">0</span> Orders

                </div>

            </div>


            <!-- TABLE -->

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>Order ID</th>

                            <th>Customer</th>

                            <th>Phone</th>

                            <th>Email</th>

                            <th>Delivery Address</th>

                            <th>Dish / Quantity</th>

                            <th>Subtotal</th>

                            <th>GST</th>

                            <th>Grand Total</th>

                            <th>Date</th>

                            <th>Action</th>

                        </tr>

                    </thead>


                    <tbody id="orderTable">
                    </tbody>

                </table>

            </div>

        </section>


    </main>


    <!-- ================= DETAILS MODAL ================= -->

    <div class="modal" id="detailsModal">

        <div class="modal-box">


            <div class="modal-header">

                <h2>Order Details</h2>


                <div class="modal-header-actions">

                    <button
                        class="modal-print-btn"
                        onclick="printCurrentOrder()"
                        title="Print Order">

                        <i class="fa-solid fa-print"></i>

                        <span>Print</span>

                    </button>


                    <button class="close-btn"
                        onclick="closeDetails()">

                        <i class="fa-solid fa-xmark"></i>

                    </button>

                </div>

            </div>


            <div class="details-grid">


                <div class="detail-box">

                    <label>Order ID</label>

                    <p id="detailOrderId"></p>

                </div>


                <div class="detail-box">

                    <label>Order Date</label>

                    <p id="detailDate"></p>

                </div>


                <div class="detail-box">

                    <label>Customer Name</label>

                    <p id="detailName"></p>

                </div>


                <div class="detail-box">

                    <label>Phone Number</label>

                    <p id="detailPhone"></p>

                </div>


                <div class="detail-box full">

                    <label>Email Address</label>

                    <p id="detailEmail"></p>

                </div>


                <div class="detail-box full">

                    <label>Delivery Address</label>

                    <p id="detailAddress"></p>

                </div>

            </div>


            <div class="order-items">

                <h3>Ordered Items</h3>

                <div id="detailItems"></div>


                <!-- BILL SUMMARY -->

                <div class="modal-summary">

                    <div class="summary-row">

                        <span>Subtotal</span>

                        <strong id="detailSubtotal"></strong>

                    </div>


                    <div class="summary-row gst">

                        <span>GST (5%)</span>

                        <strong id="detailGST"></strong>

                    </div>


                    <div class="summary-row grand-total">

                        <span>Grand Total</span>

                        <strong id="detailTotal"></strong>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- ================= PRINT AREA ================= -->

    <div id="printArea" style="display:none;"></div>


    <script>

        /* ================= GST RATE ================= */

        const GST_RATE = 5;


        /* ================= SAMPLE ORDERS ================= */

        const orders = [

            {
                id: "ORD001",
                name: "Rahul Kumar",
                phone: "9876543210",
                email: "rahul@gmail.com",
                address: "Main Market, Mau, Uttar Pradesh",
                items: [
                    {
                        name: "Chicken Biryani",
                        quantity: 2,
                        price: 250
                    },
                    {
                        name: "Cold Drink",
                        quantity: 1,
                        price: 100
                    }
                ],
                date: "02 Sep 2026"
            },


            {
                id: "ORD002",
                name: "Aman Singh",
                phone: "9876543211",
                email: "aman@gmail.com",
                address: "Shahganj, Mau, Uttar Pradesh",
                items: [
                    {
                        name: "Mutton Biryani",
                        quantity: 2,
                        price: 300
                    },
                    {
                        name: "Butter Naan",
                        quantity: 2,
                        price: 100
                    }
                ],
                date: "02 Sep 2026"
            },


            {
                id: "ORD003",
                name: "Mohammad Ali",
                phone: "9876543212",
                email: "mohammad@gmail.com",
                address: "Chandasi, Mau, Uttar Pradesh",
                items: [
                    {
                        name: "Veg Biryani",
                        quantity: 1,
                        price: 220
                    }
                ],
                date: "01 Sep 2026"
            },


            {
                id: "ORD004",
                name: "Priya Sharma",
                phone: "9876543213",
                email: "priya@gmail.com",
                address: "Indira Nagar, Mau, Uttar Pradesh",
                items: [
                    {
                        name: "Paneer Butter Masala",
                        quantity: 1,
                        price: 320
                    },
                    {
                        name: "Butter Naan",
                        quantity: 2,
                        price: 100
                    }
                ],
                date: "01 Sep 2026"
            },


            {
                id: "ORD005",
                name: "Arif Khan",
                phone: "9876543214",
                email: "arif@gmail.com",
                address: "Munshi Pura, Mau, Uttar Pradesh",
                items: [
                    {
                        name: "Chicken Roll",
                        quantity: 2,
                        price: 175
                    },
                    {
                        name: "Tea",
                        quantity: 2,
                        price: 50
                    }
                ],
                date: "31 Aug 2026"
            }

        ];


        /* ================= CALCULATE BILL ================= */

        function calculateBill(order) {

            const subtotal = order.items.reduce(
                (sum, item) =>
                sum + (item.price * item.quantity),
                0
            );


            const gst = subtotal * GST_RATE / 100;


            const grandTotal = subtotal + gst;


            return {
                subtotal: subtotal,
                gst: gst,
                grandTotal: grandTotal
            };

        }


        /* ================= DISPLAY ORDERS ================= */

        function displayOrders() {

            const table =
                document.getElementById("orderTable");


            table.innerHTML = "";


            document.getElementById("orderCount")
                .textContent = orders.length;


            if (orders.length === 0) {

                table.innerHTML = `

                    <tr>

                        <td colspan="11">

                            <div class="empty">

                                <i class="fa-solid fa-bag-shopping"></i>

                                <h3>No Online Orders</h3>

                                <p>
                                    No online orders available.
                                </p>

                            </div>

                        </td>

                    </tr>

                `;

                return;

            }


            orders.forEach(order => {

                let dishes = "";


                order.items.forEach(item => {

                    dishes += `
                        ${item.name}
                        × ${item.quantity}
                        <br>
                    `;

                });


                const bill = calculateBill(order);


                const row =
                    document.createElement("tr");


                row.innerHTML = `

                    <td>

                        <span class="order-id">
                            ${order.id}
                        </span>

                    </td>


                    <td>

                        <span class="customer-name">
                            ${order.name}
                        </span>

                    </td>


                    <td>

                        <a
                            href="tel:${order.phone}"
                            class="phone">

                            ${order.phone}

                        </a>

                    </td>


                    <td>

                        ${order.email}

                    </td>


                    <td>

                        <div class="address">
                            ${order.address}
                        </div>

                    </td>


                    <td>

                        <div class="dish-list">
                            ${dishes}
                        </div>

                    </td>


                    <td>

                        <strong>
                            ₹${bill.subtotal.toFixed(2)}
                        </strong>

                    </td>


                    <td>

                        ₹${bill.gst.toFixed(2)}

                    </td>


                    <td>

                        <strong>
                            ₹${bill.grandTotal.toFixed(2)}
                        </strong>

                    </td>


                    <td>

                        <span class="date">
                            ${order.date}
                        </span>

                    </td>


                    <td>

                        <div class="action-buttons">


                            <!-- VIEW -->

                            <button
                                class="action-btn view-btn"
                                title="View Details"
                                onclick="viewDetails('${order.id}')">

                                <i class="fa-solid fa-eye"></i>

                            </button>


                            <!-- PRINT -->

                            <button
                                class="action-btn print-btn"
                                title="Print Order"
                                onclick="printOrder('${order.id}')">

                                <i class="fa-solid fa-print"></i>

                            </button>


                            <!-- WHATSAPP -->

                            <button
                                class="action-btn whatsapp-btn"
                                title="Send WhatsApp"
                                onclick="sendWhatsApp('${order.id}')">

                                <i class="fa-brands fa-whatsapp"></i>

                                WhatsApp

                            </button>


                        </div>

                    </td>

                `;


                table.appendChild(row);

            });

        }


        /* ================= CURRENT ORDER ================= */

        let currentOrderId = null;


        /* ================= VIEW DETAILS ================= */

        function viewDetails(orderId) {

            const order =
                orders.find(
                    item => item.id === orderId
                );


            if (!order) return;


            currentOrderId = orderId;


            document.getElementById("detailOrderId")
                .textContent = order.id;


            document.getElementById("detailDate")
                .textContent = order.date;


            document.getElementById("detailName")
                .textContent = order.name;


            document.getElementById("detailPhone")
                .textContent = order.phone;


            document.getElementById("detailEmail")
                .textContent = order.email;


            document.getElementById("detailAddress")
                .textContent = order.address;


            const itemsContainer =
                document.getElementById("detailItems");


            itemsContainer.innerHTML = "";


            order.items.forEach(item => {

                const itemTotal =
                    item.price * item.quantity;


                const div =
                    document.createElement("div");


                div.className = "modal-item";


                div.innerHTML = `

                    <div>

                        <div class="modal-item-name">
                            ${item.name}
                        </div>

                        <div class="modal-item-qty">
                            ₹${item.price} × ${item.quantity}
                        </div>

                    </div>


                    <strong>
                        ₹${itemTotal.toFixed(2)}
                    </strong>

                `;


                itemsContainer.appendChild(div);

            });


            const bill = calculateBill(order);


            document.getElementById("detailSubtotal")
                .textContent =
                "₹" + bill.subtotal.toFixed(2);


            document.getElementById("detailGST")
                .textContent =
                "₹" + bill.gst.toFixed(2);


            document.getElementById("detailTotal")
                .textContent =
                "₹" + bill.grandTotal.toFixed(2);


            document
                .getElementById("detailsModal")
                .classList.add("show");

        }


        /* ================= CLOSE DETAILS ================= */

        function closeDetails() {

            document
                .getElementById("detailsModal")
                .classList.remove("show");

            currentOrderId = null;

        }


        /* ================= PRINT ORDER ================= */

       /* ================= THERMAL PRINT ================= */

function printOrder(orderId) {

    const order = orders.find(
        item => item.id === orderId
    );

    if (!order) return;

    const bill = calculateBill(order);

    let itemsHTML = "";

    order.items.forEach(item => {

        const itemTotal =
            item.price * item.quantity;

        itemsHTML += `
            <tr>
                <td class="item-name">
                    ${item.name}
                </td>

                <td class="qty">
                    ${item.quantity}
                </td>

                <td class="amount">
                    ₹${itemTotal.toFixed(2)}
                </td>
            </tr>
        `;
    });


    const printWindow = window.open(
        "",
        "_blank",
        "width=400,height=700"
    );


    printWindow.document.write(`

        <!DOCTYPE html>

        <html>

        <head>

            <title>${order.id}</title>

            <style>

                * {
                    box-sizing: border-box;
                }

                html,
                body {
                    margin: 0;
                    padding: 0;
                    width: 80mm;
                    background: #fff;
                }

                body {
                    font-family: Arial, Helvetica, sans-serif;
                    color: #000;
                    font-size: 12px;
                }

                .receipt {

                    width: 80mm;

                    padding: 5mm 4mm;

                    margin: 0 auto;

                }


                /* RESTAURANT */

                .restaurant {

                    text-align: center;

                    border-bottom: 1px dashed #000;

                    padding-bottom: 8px;

                    margin-bottom: 8px;

                }

                .restaurant h1 {

                    font-size: 20px;

                    margin: 0 0 4px;

                    font-weight: 700;

                }

                .restaurant p {

                    margin: 2px 0;

                    font-size: 11px;

                }


                /* TITLE */

                .invoice-title {

                    text-align: center;

                    font-size: 14px;

                    font-weight: bold;

                    margin: 8px 0;

                }


                /* ORDER INFO */

                .order-info {

                    border-bottom: 1px dashed #000;

                    padding-bottom: 7px;

                    margin-bottom: 7px;

                    line-height: 1.6;

                    font-size: 11px;

                }

                .order-info div {

                    display: flex;

                    justify-content: space-between;

                    gap: 8px;

                }

                .order-info .customer {

                    display: block;

                }


                /* ITEMS */

                table {

                    width: 100%;

                    border-collapse: collapse;

                }

                th {

                    border-top: 1px dashed #000;

                    border-bottom: 1px dashed #000;

                    padding: 5px 2px;

                    font-size: 11px;

                }

                td {

                    padding: 5px 2px;

                    vertical-align: top;

                    font-size: 11px;

                }

                .item-name {

                    width: 52%;

                    word-break: break-word;

                }

                .qty {

                    width: 13%;

                    text-align: center;

                }

                .amount {

                    width: 35%;

                    text-align: right;

                }


                /* SUMMARY */

                .summary {

                    border-top: 1px dashed #000;

                    margin-top: 5px;

                    padding-top: 7px;

                }

                .summary-row {

                    display: flex;

                    justify-content: space-between;

                    padding: 3px 0;

                    font-size: 12px;

                }

                .grand-total {

                    border-top: 1px solid #000;

                    margin-top: 5px;

                    padding-top: 7px;

                    font-size: 15px;

                    font-weight: bold;

                }


                /* ADDRESS */

                .address {

                    border-top: 1px dashed #000;

                    margin-top: 8px;

                    padding-top: 7px;

                    font-size: 11px;

                    line-height: 1.5;

                }


                /* FOOTER */

                .footer {

                    text-align: center;

                    border-top: 1px dashed #000;

                    margin-top: 10px;

                    padding-top: 8px;

                    font-size: 11px;

                    line-height: 1.5;

                }


                @page {

                    size: 80mm auto;

                    margin: 0;

                }


                @media print {

                    html,
                    body {

                        width: 80mm;

                        margin: 0;

                        padding: 0;

                    }

                    .receipt {

                        width: 80mm;

                        padding: 5mm 4mm;

                    }

                }

            </style>

        </head>


        <body>

            <div class="receipt">


                <!-- RESTAURANT -->

                <div class="restaurant">

                    <h1>RESTAURANT NAME</h1>

                    <p>Restaurant Address</p>

                    <p>Mau, Uttar Pradesh</p>

                    <p>Phone: +91 XXXXXXXXXX</p>

                </div>


                <!-- TITLE -->

                <div class="invoice-title">

                    ONLINE ORDER

                </div>


                <!-- ORDER INFO -->

                <div class="order-info">

                    <div>

                        <span>
                            <strong>Order:</strong>
                            ${order.id}
                        </span>

                        <span>
                            ${order.date}
                        </span>

                    </div>


                    <div class="customer">

                        <strong>Customer:</strong>
                        ${order.name}

                    </div>


                    <div>

                        <span>
                            <strong>Phone:</strong>
                            ${order.phone}
                        </span>

                    </div>

                </div>


                <!-- ITEMS -->

                <table>

                    <thead>

                        <tr>

                            <th style="text-align:left;">
                                Item
                            </th>

                            <th style="text-align:center;">
                                Qty
                            </th>

                            <th style="text-align:right;">
                                Amount
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        ${itemsHTML}

                    </tbody>

                </table>


                <!-- SUMMARY -->

                <div class="summary">


                    <div class="summary-row">

                        <span>
                            Subtotal
                        </span>

                        <strong>
                            ₹${bill.subtotal.toFixed(2)}
                        </strong>

                    </div>


                    <div class="summary-row">

                        <span>
                            GST (${GST_RATE}%)
                        </span>

                        <strong>
                            ₹${bill.gst.toFixed(2)}
                        </strong>

                    </div>


                    <div class="summary-row grand-total">

                        <span>
                            GRAND TOTAL
                        </span>

                        <strong>
                            ₹${bill.grandTotal.toFixed(2)}
                        </strong>

                    </div>


                </div>


                <!-- DELIVERY ADDRESS -->

                <div class="address">

                    <strong>
                        Delivery Address:
                    </strong>

                    <br>

                    ${order.address}

                </div>


                <!-- FOOTER -->

                <div class="footer">

                    Thank you for ordering!

                    <br>

                    Please visit us again.

                    <br><br>

                    *** THIS IS A COMPUTER GENERATED BILL ***

                </div>


            </div>


            <script>

                window.onload = function() {

                    setTimeout(function() {

                        window.print();

                    }, 300);

                };


                window.onafterprint = function() {

                    setTimeout(function() {

                        window.close();

                    }, 300);

                };

            <\/script>


        </body>

        </html>

    `);


    printWindow.document.close();

}


        /* ================= PRINT CURRENT ORDER ================= */

        function printCurrentOrder() {

            if (!currentOrderId) return;

            printOrder(currentOrderId);

        }


        /* ================= WHATSAPP ================= */

        function sendWhatsApp(orderId) {

            const order =
                orders.find(
                    item => item.id === orderId
                );


            if (!order) return;


            const bill = calculateBill(order);


            let message =

                `Hello ${order.name},

Thank you for ordering from our restaurant.

Order ID: ${order.id}

Order Details:
`;


            order.items.forEach(item => {

                const itemTotal =
                    item.price * item.quantity;


                message +=
                    `• ${item.name} × ${item.quantity} = ₹${itemTotal}
`;

            });


            message +=
                `
Subtotal: ₹${bill.subtotal.toFixed(2)}

GST (${GST_RATE}%): ₹${bill.gst.toFixed(2)}

Grand Total: ₹${bill.grandTotal.toFixed(2)}

Delivery Address:
${order.address}

Thank you for choosing us!`;


            let phone =
                order.phone.replace(/\D/g, "");


            if (phone.length === 10) {

                phone = "91" + phone;

            }


            const whatsappURL =
                "https://wa.me/" +
                phone +
                "?text=" +
                encodeURIComponent(message);


            window.open(
                whatsappURL,
                "_blank"
            );

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


        /* ================= ESCAPE ================= */

        document.addEventListener(
            "keydown",
            function(e) {

                if (e.key === "Escape") {

                    closeSidebar();

                    closeDetails();

                }

            }
        );


        /* ================= MODAL BACKGROUND ================= */

        document
            .getElementById("detailsModal")
            .addEventListener(
                "click",
                function(e) {

                    if (e.target === this) {

                        closeDetails();

                    }

                }
            );


        /* ================= INITIAL LOAD ================= */

        displayOrders();

    </script>

</body>

</html>