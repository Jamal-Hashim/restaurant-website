<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Orders - Restaurant Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif
        }

        body {
            background: #f5f7fb;
            color: #1e293b
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
            min-height: 100vh;
            padding: 25px
        }



        .top-header {
            height: 65px;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 0 22px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px
        }

        /* Hamburger */
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
        }

        .hamburger:hover {
            color: #f59e0b;
            border-color: #fcd34d;
            background: #fffaf0;
            transform: scale(1.03);
        }

        .top-header h1 {
            font-size: 23px
        }

        .admin-btn {
            border: 1px solid #e2e8f0;
            background: #fff;
            padding: 9px 15px;
            border-radius: 7px;
            color: #475569;
            display: flex;
            align-items: center;
            gap: 8px
        }

        .admin-btn i {
            color: #f59e0b
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px
        }

        .order-header h2 {
            font-size: 21px
        }

        .order-count {
            background: #fff4db;
            color: #f59e0b;
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold
        }

        .order-tools {
            display: flex;
            gap: 12px;
            margin-bottom: 20px
        }

        .search-box {
            position: relative;
            flex: 1
        }

        .search-box i {
            position: absolute;
            left: 14px;
            top: 13px;
            color: #94a3b8
        }

        .search-box input {
            width: 100%;
            height: 42px;
            border: 1px solid #e2e8f0;
            border-radius: 7px;
            padding: 0 15px 0 40px;
            outline: none;
            background: #fff
        }

        .search-box input:focus {
            border-color: #f59e0b
        }

        .filter {
            height: 42px;
            border: 1px solid #e2e8f0;
            border-radius: 7px;
            padding: 0 15px;
            background: #fff;
            color: #475569;
            outline: none
        }

        .orders-box {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            overflow: hidden
        }

        .table-wrap {
            overflow-x: auto
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px
        }

        th {
            background: #f8fafc;
            color: #64748b;
            font-size: 13px;
            text-align: left;
            padding: 15px;
            border-bottom: 1px solid #e2e8f0
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eef2f7;
            font-size: 14px
        }

        tr:last-child td {
            border-bottom: none
        }

        .order-id {
            font-weight: bold
        }

        .customer {
            display: flex;
            align-items: center;
            gap: 10px
        }

        .customer-icon {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: #fff4db;
            color: #f59e0b;
            display: flex;
            align-items: center;
            justify-content: center
        }

        .phone-link {
            color: #2563eb;
            text-decoration: none
        }

        .phone-link:hover {
            text-decoration: underline
        }

        .amount {
            font-weight: bold
        }

        .status-select {
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 7px 10px;
            font-size: 12px;
            font-weight: bold;
            outline: none;
            cursor: pointer;
            background: #fff
        }

        .status-select.pending {
            background: #fff7ed;
            color: #ea580c
        }

        .status-select.confirmed {
            background: #eff6ff;
            color: #2563eb
        }

        .status-select.completed {
            background: #ecfdf5;
            color: #059669
        }

        .status-select.cancelled {
            background: #fef2f2;
            color: #dc2626
        }

        .action-btn {
            border: 1px solid #e2e8f0;
            background: #fff;
            width: 34px;
            height: 34px;
            border-radius: 6px;
            color: #64748b;
            cursor: pointer;
            transition: .3s
        }

        .action-btn:hover {
            color: #f59e0b;
            border-color: #f59e0b;
            background: #fffaf0
        }

        /* MODAL */
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, .55);
            z-index: 2000;
            align-items: center;
            justify-content: center;
            padding: 20px
        }

        .modal.show {
            display: flex
        }

        .modal-box {
            width: 100%;
            max-width: 680px;
            max-height: 92vh;
            overflow-y: auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, .2)
        }

        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 22px;
            border-bottom: 1px solid #e5e7eb;
            position: sticky;
            top: 0;
            background: #fff;
            z-index: 2
        }

        .modal-header h2 {
            font-size: 20px
        }

        .close-btn {
            border: 0;
            background: #f1f5f9;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            cursor: pointer;
            color: #64748b
        }

        .close-btn:hover {
            background: #fee2e2;
            color: #dc2626
        }

        .modal-body {
            padding: 22px
        }

        .order-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 22px
        }

        .info-box {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 12px
        }

        .info-box small {
            display: block;
            color: #94a3b8;
            font-size: 12px;
            margin-bottom: 5px
        }

        .info-box strong {
            color: #1e293b
        }

        .items-title {
            font-size: 16px;
            margin-bottom: 10px
        }

        .items-table {
            width: 100%;
            border-collapse: collapse
        }

        .items-table th,
        .items-table td {
            padding: 10px;
            border-bottom: 1px solid #e5e7eb
        }

        .items-table th {
            background: #f8fafc;
            font-size: 12px
        }

        .items-table td {
            font-size: 13px
        }

        .billing-summary {
            margin-top: 20px;
            border-top: 1px solid #e5e7eb;
            padding-top: 12px
        }

        .billing-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            font-size: 14px;
            color: #475569
        }

        .billing-row strong {
            color: #1e293b
        }

        .discount-row {
            color: #dc2626
        }

        .discount-row strong {
            color: #dc2626
        }

        .billing-control {
            display: flex;
            align-items: center;
            gap: 8px
        }

        .billing-control select {
            height: 32px;
            border: 1px solid #e2e8f0;
            border-radius: 5px;
            padding: 0 7px;
            background: #fff;
            outline: none
        }

        .billing-control input {
            width: 65px;
            height: 32px;
            border: 1px solid #e2e8f0;
            border-radius: 5px;
            padding: 0 8px;
            text-align: center;
            outline: none
        }

        .billing-control input:focus {
            border-color: #f59e0b
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            padding-top: 13px;
            border-top: 2px solid #e5e7eb;
            font-size: 19px;
            font-weight: bold
        }

        .total-row span:last-child {
            color: #f59e0b
        }

        .modal-footer {
            padding: 15px 22px;
            background: #f8fafc;
            border-top: 1px solid #e5e7eb;
            text-align: right;
            position: sticky;
            bottom: 0
        }

        .close-modal,
        .print-btn {
            border: 0;
            padding: 10px 18px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 14px
        }

        .close-modal {
            background: #64748b;
            color: #fff
        }

        .print-btn {
            background: #f59e0b;
            color: #fff;
            margin-left: 8px
        }

        .close-modal:hover {
            background: #475569
        }

        .print-btn:hover {
            background: #d97706
        }

        @media(max-width:768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: .3s;
                box-shadow: 5px 0 20px rgba(0, 0, 0, .1)
            }

            .sidebar.show {
                transform: translateX(0)
            }

            .main-content {
                margin-left: 0;
                padding: 15px
            }

            .hamburger {
                display: flex;
                align-items: center;
                justify-content: center
            }

            .top-header {
                height: 58px;
                padding: 0 15px;
                margin-bottom: 18px
            }

            .top-header h1 {
                font-size: 18px
            }

            .admin-btn {
                padding: 8px 10px
            }

            .admin-btn span {
                display: none
            }

            .order-header h2 {
                font-size: 18px
            }

            .order-tools {
                flex-direction: column
            }

            .filter {
                width: 100%
            }

            .order-info {
                grid-template-columns: 1fr
            }

            .modal {
                padding: 10px
            }

            .modal-box {
                max-height: 95vh
            }
        }

        @media print {
            body {
                display: none
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar" id="sidebar">
        <div class="restaurant-logo">
            <i class="fa-regular fa-circle-user"></i>
            <h2>Admin</h2>
        </div>

        <ul class="menu">
            <li><a href="dashboard.php"><i class="fa-solid fa-chart-line"></i>Dashboard</a></li>
            <li><a href="bill_generate.php"><i class="fa-solid fa-file-invoice"></i>Generate Bill</a></li>
            <li><a href="order.php" class="active"><i class="fa-solid fa-receipt"></i>Orders</a></li>
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

    <main class="main-content">



        <header class="top-header">

            <button class="hamburger" onclick="toggleSidebar()">
                <i class="fa-solid fa-bars"></i>
            </button>
            <h1>Orders</h1>
            <button class="admin-btn">
                <i class="fa-regular fa-circle-user"></i>
                <span>admin</span>
            </button>
        </header>

        <div class="order-header">
            <h2>All Orders</h2>
            <span class="order-count" id="orderCount">5 Orders</span>
        </div>

        <div class="order-tools">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="searchInput" placeholder="Search order, customer or phone...">
            </div>

            <select class="filter" id="filterStatus">
                <option value="all">All Orders</option>
                <option value="Pending">Pending</option>
                <option value="Confirmed">Confirmed</option>
                <option value="Completed">Completed</option>
                <option value="Cancelled">Cancelled</option>
            </select>
        </div>

        <div class="orders-box">
            <div class="table-wrap">

                <table>

                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Phone</th>
                            <th>Customers</th>
                            <th>Items</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody id="orderTable"></tbody>

                </table>

            </div>
        </div>

    </main>

    <!-- ORDER DETAILS MODAL -->

    <div class="modal" id="orderModal">

        <div class="modal-box">

            <div class="modal-header">
                <h2><i class="fa-solid fa-receipt"></i> Order Details</h2>
                <button class="close-btn" onclick="closeModal()">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="modal-body">

                <div class="order-info">

                    <div class="info-box">
                        <small>Order ID</small>
                        <strong id="modalOrderId"></strong>
                    </div>

                    <div class="info-box">
                        <small>Customer</small>
                        <strong id="modalCustomer"></strong>
                    </div>

                    <div class="info-box">
                        <small>Phone Number</small>
                        <strong id="modalPhone"></strong>
                    </div>

                    <div class="info-box">
                        <small>Customer Count</small>
                        <strong id="modalCustomerCount"></strong>
                    </div>

                    <div class="info-box">
                        <small>Order Type</small>
                        <strong id="modalType"></strong>
                    </div>

                    <div class="info-box">
                        <small>Order Date</small>
                        <strong id="modalDate"></strong>
                    </div>

                    <div class="info-box">
                        <small>Status</small>
                        <strong id="modalStatus"></strong>
                    </div>

                </div>

                <h3 class="items-title">Order Items</h3>

                <table class="items-table">

                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody id="modalItems"></tbody>

                </table>

                <div class="billing-summary">

                    <div class="billing-row">
                        <span>Subtotal</span>
                        <strong id="modalSubtotal">₹0.00</strong>
                    </div>

                    <div class="billing-row discount-row">

                        <span>Discount</span>

                        <div class="billing-control">

                            <select id="discountType" onchange="calculateBill()">
                                <option value="0">No Discount</option>
                                <option value="10" selected>10%</option>
                                <option value="15">15%</option>
                                <option value="20">20%</option>
                            </select>

                            <strong id="modalDiscountAmount">- ₹0.00</strong>

                        </div>

                    </div>

                    <div class="billing-row">
                        <span>Amount After Discount</span>
                        <strong id="modalAfterDiscount">₹0.00</strong>
                    </div>

                    <div class="billing-row">

                        <span>GST</span>

                        <div class="billing-control">

                            <select id="gstRate" onchange="calculateBill()">
                                <option value="0">0%</option>
                                <option value="5" selected>5%</option>
                                <option value="12">12%</option>
                                <option value="18">18%</option>
                            </select>

                            <strong id="modalGSTAmount">₹0.00</strong>

                        </div>

                    </div>

                    <div class="total-row">
                        <span>Grand Total</span>
                        <span id="modalAmount">₹0.00</span>
                    </div>

                </div>

            </div>

            <div class="modal-footer">

                <button class="close-modal" onclick="closeModal()">
                    Close
                </button>

                <button class="print-btn" onclick="printBill()">
                    <i class="fa-solid fa-print"></i> Print Bill
                </button>

            </div>

        </div>

    </div>

    <script>
        const orderData = {

            ORD001: {
                customer: "Rahul Kumar",
                phone: "9876543210",
                customerCount: 2,
                type: "Dine-in",
                date: "01 Sep 2026",
                status: "Completed",
                items: [
                    ["Chicken Biryani", 1, 250],
                    ["Cold Drink", 2, 100]
                ]
            },

            ORD002: {
                customer: "Aman Singh",
                phone: "9876543211",
                customerCount: 4,
                type: "Online",
                date: "01 Sep 2026",
                status: "Confirmed",
                items: [
                    ["Mutton Biryani", 2, 300],
                    ["Cold Drink", 2, 90]
                ]
            },

            ORD003: {
                customer: "Mohammad Ali",
                phone: "9876543212",
                customerCount: 1,
                type: "Dine-in",
                date: "01 Sep 2026",
                status: "Pending",
                items: [
                    ["Veg Biryani", 1, 220]
                ]
            },

            ORD004: {
                customer: "Priya Sharma",
                phone: "9876543213",
                customerCount: 3,
                type: "Online",
                date: "31 Aug 2026",
                status: "Completed",
                items: [
                    ["Paneer Butter Masala", 1, 320],
                    ["Butter Naan", 2, 100],
                    ["Cold Drink", 1, 100]
                ]
            },

            ORD005: {
                customer: "Arif Khan",
                phone: "9876543214",
                customerCount: 2,
                type: "Online",
                date: "31 Aug 2026",
                status: "Cancelled",
                items: [
                    ["Chicken Roll", 2, 175]
                ]
            }

        };

        let currentOrderId = "";

        function renderOrders() {

            const table = document.getElementById("orderTable");

            table.innerHTML = "";

            Object.keys(orderData).forEach(id => {

                const order = orderData[id];

                let subtotal = 0;

                order.items.forEach(item => {
                    subtotal += item[1] * item[2];
                });

                const discountRate = 10;
                const gstRate = 5;

                const discount = subtotal * discountRate / 100;
                const afterDiscount = subtotal - discount;
                const gst = afterDiscount * gstRate / 100;
                const total = afterDiscount + gst;

                const tr = document.createElement("tr");

                tr.dataset.status = order.status;
                tr.dataset.search = (id + " " + order.customer + " " + order.phone).toLowerCase();

                tr.innerHTML = `

<td class="order-id">#${id}</td>

<td>
<div class="customer">
<div class="customer-icon">
<i class="fa-solid fa-user"></i>
</div>
${order.customer}
</div>
</td>

<td>
<a class="phone-link" href="tel:${order.phone}">
<i class="fa-solid fa-phone"></i> ${order.phone}
</a>
</td>

<td>
<i class="fa-solid fa-users"></i>
${order.customerCount}
</td>

<td>${order.items.length} Items</td>

<td>${order.type}</td>

<td class="amount">₹${total.toFixed(2)}</td>

<td>
<select class="status-select ${order.status.toLowerCase()}" onchange="changeStatus(this,'${id}')">

<option value="Pending" ${order.status==="Pending"?"selected":""}>Pending</option>

<option value="Confirmed" ${order.status==="Confirmed"?"selected":""}>Confirmed</option>

<option value="Completed" ${order.status==="Completed"?"selected":""}>Completed</option>

<option value="Cancelled" ${order.status==="Cancelled"?"selected":""}>Cancelled</option>

</select>
</td>

<td>${order.date}</td>

<td>
<button class="action-btn" onclick="viewOrder('${id}')">
<i class="fa-solid fa-eye"></i>
</button>
</td>

`;

                table.appendChild(tr);

            });

            filterOrders();

        }

        function viewOrder(id) {

            currentOrderId = id;

            const order = orderData[id];

            document.getElementById("modalOrderId").textContent = "#" + id;
            document.getElementById("modalCustomer").textContent = order.customer;
            document.getElementById("modalPhone").textContent = order.phone;
            document.getElementById("modalCustomerCount").textContent = order.customerCount;
            document.getElementById("modalType").textContent = order.type;
            document.getElementById("modalDate").textContent = order.date;
            document.getElementById("modalStatus").textContent = order.status;

            let html = "";

            order.items.forEach(item => {

                const total = item[1] * item[2];

                html += `
<tr>
<td>${item[0]}</td>
<td>${item[1]}</td>
<td>₹${item[2].toFixed(2)}</td>
<td>₹${total.toFixed(2)}</td>
</tr>
`;

            });

            document.getElementById("modalItems").innerHTML = html;

            document.getElementById("discountType").value = "10";
            document.getElementById("gstRate").value = "5";

            calculateBill();

            document.getElementById("orderModal").classList.add("show");

        }

        function calculateBill() {

            if (!currentOrderId) return;

            const order = orderData[currentOrderId];

            let subtotal = 0;

            order.items.forEach(item => {
                subtotal += item[1] * item[2];
            });

            const discountRate = parseFloat(document.getElementById("discountType").value);
            const gstRate = parseFloat(document.getElementById("gstRate").value);

            const discountAmount = subtotal * discountRate / 100;
            const afterDiscount = subtotal - discountAmount;
            const gstAmount = afterDiscount * gstRate / 100;
            const grandTotal = afterDiscount + gstAmount;

            document.getElementById("modalSubtotal").textContent =
                "₹" + subtotal.toFixed(2);

            document.getElementById("modalDiscountAmount").textContent =
                "- ₹" + discountAmount.toFixed(2);

            document.getElementById("modalAfterDiscount").textContent =
                "₹" + afterDiscount.toFixed(2);

            document.getElementById("modalGSTAmount").textContent =
                "₹" + gstAmount.toFixed(2);

            document.getElementById("modalAmount").textContent =
                "₹" + grandTotal.toFixed(2);

        }

        function changeStatus(select, id) {

            const status = select.value;

            orderData[id].status = status;

            select.className = "status-select " + status.toLowerCase();

            const row = select.closest("tr");

            row.dataset.status = status;

            if (currentOrderId === id) {

                document.getElementById("modalStatus").textContent = status;

            }

            filterOrders();

        }

        function closeModal() {

            document.getElementById("orderModal").classList.remove("show");

        }

        function filterOrders() {

            const filter = document.getElementById("filterStatus").value;
            const search = document.getElementById("searchInput").value.toLowerCase();

            const rows = document.querySelectorAll("#orderTable tr");

            let count = 0;

            rows.forEach(row => {

                const status = row.dataset.status;
                const text = row.dataset.search;

                const statusMatch = filter === "all" || status === filter;
                const searchMatch = text.includes(search);

                if (statusMatch && searchMatch) {

                    row.style.display = "";
                    count++;

                } else {

                    row.style.display = "none";

                }

            });

            document.getElementById("orderCount").textContent = count + " Orders";

        }

        function printBill() {

            if (!currentOrderId) return;

            const order = orderData[currentOrderId];

            let subtotal = 0;
            let items = "";

            order.items.forEach(item => {

                const itemTotal = item[1] * item[2];

                subtotal += itemTotal;

                items += `
<tr>
<td>${item[0]}</td>
<td>${item[1]}</td>
<td>₹${item[2].toFixed(2)}</td>
<td>₹${itemTotal.toFixed(2)}</td>
</tr>
`;

            });

            const discountRate = parseFloat(document.getElementById("discountType").value);
            const gstRate = parseFloat(document.getElementById("gstRate").value);

            const discountAmount = subtotal * discountRate / 100;
            const afterDiscount = subtotal - discountAmount;
            const gstAmount = afterDiscount * gstRate / 100;
            const grandTotal = afterDiscount + gstAmount;

            const printWindow = window.open("", "_blank", "width=400,height=600");

            if (!printWindow) {

                alert("Please allow pop-ups in your browser to print the bill.");

                return;

            }

            printWindow.document.write(`

<!DOCTYPE html>

<html>

<head>

<title>Bill - ${currentOrderId}</title>

<style>

@page{
size:80mm auto;
margin:0;
}

*{
box-sizing:border-box;
}

body{
width:80mm;
margin:0;
padding:10px;
font-family:Arial,sans-serif;
font-size:12px;
color:#000;
}

.center{
text-align:center;
}

.restaurant-name{
font-size:20px;
font-weight:bold;
}

.address{
font-size:11px;
line-height:16px;
margin-top:4px;
}

.line{
border-top:1px dashed #000;
margin:8px 0;
}

.info{
display:flex;
justify-content:space-between;
gap:10px;
margin:4px 0;
}

table{
width:100%;
border-collapse:collapse;
margin-top:8px;
}

th{
border-bottom:1px dashed #000;
padding:5px 2px;
text-align:left;
font-size:10px;
}

td{
padding:5px 2px;
vertical-align:top;
}

th:nth-child(2),
th:nth-child(3),
th:nth-child(4),
td:nth-child(2),
td:nth-child(3),
td:nth-child(4){
text-align:right;
}

.summary{
margin-top:8px;
border-top:1px dashed #000;
padding-top:6px;
}

.summary-row{
display:flex;
justify-content:space-between;
margin:5px 0;
}

.discount{
color:#000;
}

.grand-total{
border-top:1px dashed #000;
border-bottom:1px dashed #000;
padding:8px 0;
margin-top:7px;
display:flex;
justify-content:space-between;
font-size:16px;
font-weight:bold;
}

.thank{
text-align:center;
margin-top:15px;
font-weight:bold;
}

.small{
text-align:center;
font-size:10px;
margin-top:5px;
}

</style>

</head>

<body>

<div class="center">

<div class="restaurant-name">
YOUR RESTAURANT
</div>

<div class="address">
Restaurant Address<br>
Mau, Uttar Pradesh<br>
Phone: 9876543210
</div>

</div>

<div class="line"></div>

<div class="info">
<span>Order ID</span>
<strong>#${currentOrderId}</strong>
</div>

<div class="info">
<span>Date</span>
<span>${order.date}</span>
</div>

<div class="info">
<span>Customer</span>
<span>${order.customer}</span>
</div>

<div class="info">
<span>Phone</span>
<span>${order.phone}</span>
</div>

<div class="info">
<span>Customers</span>
<span>${order.customerCount}</span>
</div>

<div class="info">
<span>Type</span>
<span>${order.type}</span>
</div>

<div class="info">
<span>Status</span>
<span>${order.status}</span>
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
<span>₹${subtotal.toFixed(2)}</span>
</div>

<div class="summary-row discount">
<span>Discount (${discountRate}%)</span>
<span>- ₹${discountAmount.toFixed(2)}</span>
</div>

<div class="summary-row">
<span>After Discount</span>
<span>₹${afterDiscount.toFixed(2)}</span>
</div>

<div class="summary-row">
<span>GST (${gstRate}%)</span>
<span>₹${gstAmount.toFixed(2)}</span>
</div>

<div class="grand-total">
<span>GRAND TOTAL</span>
<span>₹${grandTotal.toFixed(2)}</span>
</div>

</div>

<div class="thank">
Thank You!
</div>

<div class="small">
Please Visit Again
</div>

<script>

window.onload=function(){
window.print();
};

window.onafterprint=function(){
window.close();
};

<\/script>

</body>

</html>

`);

            printWindow.document.close();

        }

        function toggleSidebar() {

            document.getElementById("sidebar").classList.toggle("show");

        }

        document.getElementById("filterStatus").addEventListener("change", filterOrders);

        document.getElementById("searchInput").addEventListener("input", filterOrders);

        document.getElementById("orderModal").addEventListener("click", function(e) {

            if (e.target === this) {

                closeModal();

            }

        });

        renderOrders();
    </script>

</body>

</html>