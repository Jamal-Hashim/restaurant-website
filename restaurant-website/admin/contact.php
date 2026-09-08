<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact Messages - Restaurant Admin</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
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
            height: 74px;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 22px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, .04);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header h1 {
            font-size: 23px;
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
        }

        /* ================= CARD ================= */

        .card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, .04);
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 20px;
        }

        .title-area {
            display: flex;
            align-items: center;
            gap: 12px;
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
        }

        .title-area h2 {
            font-size: 19px;
        }

        .title-area p {
            color: #64748b;
            font-size: 13px;
            margin-top: 4px;
        }

        .message-count {
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
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
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

        tr:hover td {
            background: #fafafa;
        }

        .customer-name {
            color: #1e293b;
            font-weight: 600;
        }

        .phone,
        .email {
            color: #475569;
            text-decoration: none;
        }

        .phone:hover,
        .email:hover {
            color: #f59e0b;
        }

        .subject {
            font-weight: 600;
            color: #334155;
        }

        .message {
            max-width: 280px;
            line-height: 1.5;
        }

        .date {
            white-space: nowrap;
            color: #64748b;
        }

        /* ================= STATUS ================= */

        .status {
            display: inline-flex;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status.new {
            background: #e0f2fe;
            color: #0284c7;
        }

        .status.read {
            background: #dcfce7;
            color: #16a34a;
        }

        /* ================= ACTION ================= */

        .action-buttons {
            display: flex;
            gap: 7px;
        }

        .action-btn {
            width: 34px;
            height: 34px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: .2s;
        }

        .view-btn {
            background: #e0f2fe;
            color: #0284c7;
        }

        .view-btn:hover {
            background: #0284c7;
            color: #fff;
        }

        .delete-btn {
            background: #fee2e2;
            color: #ef4444;
        }

        .delete-btn:hover {
            background: #ef4444;
            color: #fff;
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
            background: #fff;
            width: 100%;
            max-width: 600px;
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
            margin-bottom: 20px;
        }

        .modal-header h2 {
            font-size: 20px;
        }

        .close-btn {
            width: 35px;
            height: 35px;
            border: none;
            background: #f1f5f9;
            border-radius: 8px;
            cursor: pointer;
            color: #64748b;
        }

        .close-btn:hover {
            background: #fee2e2;
            color: #ef4444;
        }

        .detail {
            margin-bottom: 15px;
        }

        .detail label {
            display: block;
            color: #64748b;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .detail p {
            color: #1e293b;
            font-size: 14px;
            line-height: 1.5;
        }

        /* ================= OVERLAY ================= */

        .sidebar-overlay {
            display: none;
        }

        /* ================= RESPONSIVE ================= */

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
                padding: 20px;
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
                padding: 0 15px;
            }

            .header h1 {
                font-size: 20px;
            }

        }

        @media(max-width:550px) {

            .main-content {
                padding: 15px;
            }

            .header {
                height: 65px;
                margin-bottom: 18px;
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

            .card {
                padding: 18px;
            }

            .title-area h2 {
                font-size: 17px;
            }
        }

        @media(max-width:360px) {

            .main-content {
                padding: 10px;
            }

            .card {
                padding: 15px;
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
            <li><a href="contact.php" class="active"><i class="fa-solid fa-envelope"></i>Contact Form</a></li>
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
                    <h1>Contact Messages</h1>
                    <p>View customer contact form submissions</p>
                </div>

            </div>

            <button class="admin-btn">
                <i class="fa-regular fa-circle-user"></i>
                <span>admin</span>
            </button>

        </header>


        <!-- ================= MESSAGES ================= -->

        <section class="card">

            <div class="card-header">

                <div class="title-area">

                    <div class="title-icon">
                        <i class="fa-solid fa-envelope"></i>
                    </div>

                    <div>
                        <h2>Customer Messages</h2>
                        <p>All submitted contact messages</p>
                    </div>

                </div>

                <div class="message-count">
                    <span id="messageCount">5</span> Messages
                </div>

            </div>



            


            <!-- TABLE -->

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                    <tbody id="messageTable">

                    </tbody>

                </table>

            </div>

        </section>

    </main>


    <!-- ================= VIEW MODAL ================= -->

    <div class="modal" id="viewModal">

        <div class="modal-box">

            <div class="modal-header">

                <h2>Message Details</h2>

                <button class="close-btn"
                    onclick="closeModal()">

                    <i class="fa-solid fa-xmark"></i>

                </button>

            </div>


            <div class="detail">
                <label>Customer Name</label>
                <p id="viewName"></p>
            </div>

            <div class="detail">
                <label>Phone</label>
                <p id="viewPhone"></p>
            </div>

            <div class="detail">
                <label>Email</label>
                <p id="viewEmail"></p>
            </div>

            <div class="detail">
                <label>Subject</label>
                <p id="viewSubject"></p>
            </div>

            <div class="detail">
                <label>Message</label>
                <p id="viewMessage"></p>
            </div>

            <div class="detail">
                <label>Date</label>
                <p id="viewDate"></p>
            </div>

        </div>

    </div>


    <script>
        /* ================= SAMPLE DATA ================= */

        let messages = [

            {
                id: 1,
                name: "Rahul Kumar",
                phone: "9876543210",
                email: "rahul@gmail.com",
                subject: "Table Booking",
                message: "I want to book a table for tonight for 4 people.",
                date: "01 Sep 2026",
                status: "New"
            },

            {
                id: 2,
                name: "Aman Singh",
                phone: "9876543211",
                email: "aman@gmail.com",
                subject: "Food Inquiry",
                message: "Is chicken biryani available today?",
                date: "01 Sep 2026",
                status: "Read"
            },

            {
                id: 3,
                name: "Mohammad Ali",
                phone: "9876543212",
                email: "mohammad@gmail.com",
                subject: "Online Order",
                message: "I have a question regarding my online order.",
                date: "31 Aug 2026",
                status: "New"
            },

            {
                id: 4,
                name: "Priya Sharma",
                phone: "9876543213",
                email: "priya@gmail.com",
                subject: "Feedback",
                message: "The food was very delicious and the service was excellent.",
                date: "30 Aug 2026",
                status: "Read"
            },

            {
                id: 5,
                name: "Arif Khan",
                phone: "9876543214",
                email: "arif@gmail.com",
                subject: "Restaurant Timing",
                message: "What time does the restaurant open?",
                date: "29 Aug 2026",
                status: "New"
            }

        ];


        /* ================= DISPLAY ================= */

        function displayMessages(data = messages) {

            const table =
                document.getElementById("messageTable");

            table.innerHTML = "";

            document.getElementById("messageCount").textContent =
                data.length;


            if (data.length === 0) {

                table.innerHTML = `

                <tr>

                    <td colspan="9">

                        <div class="empty">

                            <i class="fa-regular fa-envelope-open"></i>

                            <h3>No Messages Found</h3>

                            <p>There are no contact messages to display.</p>

                        </div>

                    </td>

                </tr>

            `;

                return;
            }


            data.forEach((item, index) => {

                const row =
                    document.createElement("tr");


                row.innerHTML = `

                <td>${index + 1}</td>

                <td>
                    <span class="customer-name">
                        ${item.name}
                    </span>
                </td>

                <td>
                    <a class="phone"
                       href="tel:${item.phone}">
                       ${item.phone}
                    </a>
                </td>

                <td>
                    <a class="email"
                       href="mailto:${item.email}">
                       ${item.email}
                    </a>
                </td>


                <td>
                    <div class="message">
                        ${item.message}
                    </div>
                </td>

                <td>
                    <span class="date">
                        ${item.date}
                    </span>
                </td>


                <td>

                    <div class="action-buttons">

                        <button
                            class="action-btn view-btn"
                            onclick="viewMessage(${item.id})">

                            <i class="fa-solid fa-eye"></i>

                        </button>

                        <button
                            class="action-btn delete-btn"
                            onclick="deleteMessage(${item.id})">

                            <i class="fa-solid fa-trash"></i>

                        </button>

                    </div>

                </td>

            `;

                table.appendChild(row);

            });

        }


        /* ================= SEARCH ================= */

        function searchMessages() {

            const search =
                document
                .getElementById("searchInput")
                .value
                .toLowerCase();

            const status =
                document
                .getElementById("statusFilter")
                .value;


            const filtered =
                messages.filter(item => {

                    const matchesSearch =
                        item.name.toLowerCase().includes(search) ||
                        item.email.toLowerCase().includes(search) ||
                        item.subject.toLowerCase().includes(search) ||
                        item.message.toLowerCase().includes(search) ||
                        item.phone.includes(search);

                    const matchesStatus =
                        status === "all" ||
                        item.status === status;

                    return matchesSearch && matchesStatus;

                });


            displayMessages(filtered);

        }


        /* ================= VIEW ================= */

        function viewMessage(id) {

            const item =
                messages.find(message => message.id === id);

            if (!item) return;


            document.getElementById("viewName").textContent =
                item.name;

            document.getElementById("viewPhone").textContent =
                item.phone;

            document.getElementById("viewEmail").textContent =
                item.email;

            document.getElementById("viewSubject").textContent =
                item.subject;

            document.getElementById("viewMessage").textContent =
                item.message;

            document.getElementById("viewDate").textContent =
                item.date;


            document
                .getElementById("viewModal")
                .classList.add("show");


            /* Mark as read */

            item.status = "Read";

            searchMessages();

        }


        /* ================= CLOSE MODAL ================= */

        function closeModal() {

            document
                .getElementById("viewModal")
                .classList.remove("show");

        }


        /* ================= DELETE ================= */

        function deleteMessage(id) {

            const confirmDelete =
                confirm("Are you sure you want to delete this message?");

            if (!confirmDelete) return;


            messages =
                messages.filter(item => item.id !== id);


            searchMessages();

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

        document.addEventListener("keydown", function(e) {

            if (e.key === "Escape") {

                closeSidebar();
                closeModal();

            }

        });


        /* ================= INITIAL LOAD ================= */

        displayMessages();
    </script>

</body>

</html>