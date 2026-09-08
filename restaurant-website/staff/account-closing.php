<?php
// account-closing.php
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Account Closing | Restaurant Admin</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* =========================
   RESET
========================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #1e293b;
        }


        /* =========================
   SIDEBAR
========================= */

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
   MAIN
========================= */

        .main-content {
            margin-left: 260px;
            width: calc(100% - 260px);
            min-height: 100vh;
            padding: 25px 30px;
        }


        /* =========================
   HEADER
========================= */

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


        /* =========================
   PAGE TITLE
========================= */

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


        /* =========================
   FORM CARD
========================= */

        .closing-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .04);
            margin-bottom: 25px;
        }

        .form-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .form-icon {
            width: 45px;
            height: 45px;
            border-radius: 11px;
            background: #fff1f2;
            color: #ef4444;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .form-header h3 {
            font-size: 18px;
        }

        .form-header p {
            color: #64748b;
            font-size: 12px;
            margin-top: 4px;
        }


        /* =========================
   TEXTAREA
========================= */

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            color: #475569;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .form-group textarea {
            width: 100%;
            min-height: 130px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 13px;
            outline: none;
            resize: vertical;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            color: #334155;
        }

        .form-group textarea:focus {
            border-color: #f59e0b;
            box-shadow: 0 0 0 3px rgba(245, 158, 11, .08);
        }

        .char-count {
            text-align: right;
            color: #94a3b8;
            font-size: 11px;
            margin-top: 5px;
        }


        /* =========================
   SUBMIT BUTTON
========================= */

        .submit-btn {
            border: none;
            background: #ef4444;
            color: #fff;
            padding: 12px 20px;
            border-radius: 9px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: .2s;
        }

        .submit-btn:hover {
            background: #dc2626;
            transform: translateY(-1px);
        }


        /* =========================
   DATA CARD
========================= */

        .data-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .04);
        }

        .data-header {
            padding: 18px 20px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .data-header h3 {
            font-size: 17px;
        }

        .count {
            background: #fff3d6;
            color: #d97706;
            padding: 6px 10px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
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
            min-width: 650px;
        }

        th {
            background: #f8fafc;
            color: #475569;
            font-size: 12px;
            text-align: left;
            padding: 14px 16px;
            border-bottom: 1px solid #e2e8f0;
        }

        td {
            padding: 14px 16px;
            border-bottom: 1px solid #eef2f7;
            font-size: 13px;
            color: #475569;
            vertical-align: top;
        }

        tbody tr:hover {
            background: #fffbf5;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .request-id {
            font-weight: 700;
            color: #1e293b;
        }

        .message {
            max-width: 500px;
            line-height: 1.5;
        }

        .date {
            white-space: nowrap;
            color: #64748b;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 9px;
            border-radius: 7px;
            background: #fff7e6;
            color: #d97706;
            font-size: 11px;
            font-weight: 600;
        }


        /* =========================
   DELETE BUTTON
========================= */

        .delete-btn {
            width: 34px;
            height: 34px;
            border: none;
            border-radius: 8px;
            background: #fff1f2;
            color: #ef4444;
            cursor: pointer;
            transition: .2s;
        }

        .delete-btn:hover {
            background: #ef4444;
            color: #fff;
        }


        /* =========================
   NO DATA
========================= */

        .no-data {
            text-align: center;
            padding: 55px 20px;
        }

        .no-data i {
            font-size: 40px;
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


        /* =========================
   TOAST
========================= */

        .toast {
            position: fixed;
            right: 25px;
            bottom: 25px;
            background: #1e293b;
            color: #fff;
            padding: 13px 17px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 13px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .2);
            transform: translateY(100px);
            opacity: 0;
            visibility: hidden;
            transition: .3s;
            z-index: 3000;
        }

        .toast.show {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }

        .toast i {
            color: #22c55e;
        }


        /* =========================
   MOBILE
========================= */

        .sidebar-overlay {
            display: none;
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

            .admin-btn {
                width: 42px;
                height: 42px;
                justify-content: center;
                padding: 0;
            }

            .admin-btn span {
                display: none;
            }

            .closing-card {
                padding: 18px;
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

            .data-header {
                padding: 15px;
            }

            .toast {
                left: 12px;
                right: 12px;
                bottom: 12px;
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
                <a href="account-opening.php">
                    <i class="fa-solid fa-user-plus"></i>
                    <span>Account Opening</span>
                </a>
            </li>
            <li>
                <a href="account-closing.php" class="active">
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


    <!-- =========================
     MAIN CONTENT
========================= -->

    <main class="main-content">


        <!-- HEADER -->

        <header class="header">

            <div class="header-left">

                <button class="hamburger"
                    onclick="toggleSidebar()">

                    <i class="fa-solid fa-bars"></i>

                </button>

                <div>

                    <h1>Account Closing</h1>

                    <p>
                        Submit an account closing request
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

            <h2>Close Restaurant Account</h2>

            <p>
                Enter your message below to submit an account closing request.
            </p>

        </div>


        <!-- =========================
         FORM
    ========================= -->

        <div class="closing-card">

            <div class="form-header">

                <div class="form-icon">

                    <i class="fa-solid fa-user-xmark"></i>

                </div>

                <div>

                    <h3>Account Closing Request</h3>

                    <p>
                        Please provide a reason for closing the account.
                    </p>

                </div>

            </div>


            <form id="closingForm">

                <div class="form-group">

                    <label for="message">

                        Message

                    </label>

                    <textarea
                        id="message"
                        maxlength="1000"
                        placeholder="Write your account closing message..."
                        required></textarea>

                    <div class="char-count">

                        <span id="charCount">0</span>/1000

                    </div>

                </div>


                <button
                    type="submit"
                    class="submit-btn">

                    <i class="fa-solid fa-paper-plane"></i>

                    Submit Closing Request

                </button>

            </form>

        </div>


        <!-- =========================
         SUBMITTED DATA
    ========================= -->

        <div class="data-card">

            <div class="data-header">

                <h3>

                    <i class="fa-solid fa-database"
                        style="color:#f59e0b;margin-right:7px;">
                    </i>

                    Closing Requests

                </h3>

                <span class="count"
                    id="requestCount">

                    0 Requests

                </span>

            </div>


            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>
                                Request ID
                            </th>

                            <th>
                                Message
                            </th>

                            <th>
                                Date & Time
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Action
                            </th>

                        </tr>

                    </thead>

                    <tbody id="requestTable"></tbody>

                </table>


                <div class="no-data"
                    id="noData">

                    <i class="fa-regular fa-folder-open"></i>

                    <h3>
                        No Closing Requests
                    </h3>

                    <p>
                        Submitted account closing requests will appear here.
                    </p>

                </div>

            </div>

        </div>

    </main>


    <!-- =========================
     TOAST
========================= -->

    <div class="toast" id="toast">

        <i class="fa-solid fa-circle-check"></i>

        <span id="toastMessage">
            Request submitted successfully.
        </span>

    </div>


    <script>
        /* =========================
   STORAGE
========================= */

        const STORAGE_KEY = "restaurantAccountClosing";


        /* =========================
           ELEMENTS
        ========================= */

        const form =
            document.getElementById("closingForm");

        const messageInput =
            document.getElementById("message");

        const charCount =
            document.getElementById("charCount");

        const requestTable =
            document.getElementById("requestTable");

        const noData =
            document.getElementById("noData");

        const requestCount =
            document.getElementById("requestCount");


        /* =========================
           GET DATA
        ========================= */

        function getRequests() {

            return JSON.parse(
                localStorage.getItem(STORAGE_KEY)
            ) || [];

        }


        /* =========================
           SAVE DATA
        ========================= */

        function saveRequests(data) {

            localStorage.setItem(
                STORAGE_KEY,
                JSON.stringify(data)
            );

        }


        /* =========================
           CHARACTER COUNT
        ========================= */

        messageInput.addEventListener(
            "input",
            function() {

                charCount.textContent =
                    this.value.length;

            }
        );


        /* =========================
           SUBMIT FORM
        ========================= */

        form.addEventListener(
            "submit",
            function(e) {

                e.preventDefault();


                const message =
                    messageInput.value.trim();


                if (!message) {

                    alert(
                        "Please enter your message."
                    );

                    messageInput.focus();

                    return;

                }


                const data =
                    getRequests();


                const requestNumber =
                    data.length + 1;


                const requestId =
                    "AC" +
                    String(requestNumber)
                    .padStart(3, "0");


                const newRequest = {

                    requestId: requestId,

                    message: message,

                    date: new Date()
                        .toLocaleString(
                            "en-IN", {
                                dateStyle: "medium",
                                timeStyle: "short"
                            }
                        ),

                    status: "Pending"

                };


                data.unshift(newRequest);


                saveRequests(data);


                form.reset();

                charCount.textContent = "0";


                loadRequests();


                showToast(
                    "Account closing request submitted successfully."
                );

            }
        );


        /* =========================
           LOAD DATA
        ========================= */

        function loadRequests() {

            const data =
                getRequests();


            requestTable.innerHTML = "";


            requestCount.textContent =
                data.length +
                (data.length === 1 ?
                    " Request" :
                    " Requests");


            if (data.length === 0) {

                noData.style.display =
                    "block";

                return;

            }


            noData.style.display =
                "none";


            data.forEach(
                function(request, index) {

                    const row =
                        document.createElement("tr");


                    row.innerHTML = `

                <td>

                    <span class="request-id">

                        ${escapeHtml(
                            request.requestId
                        )}

                    </span>

                </td>


                <td>

                    <div class="message">

                        ${escapeHtml(
                            request.message
                        )}

                    </div>

                </td>


                <td>

                    <span class="date">

                        ${escapeHtml(
                            request.date
                        )}

                    </span>

                </td>


                <td>

                    <span class="status">

                        <i class="fa-solid fa-clock"></i>

                        ${escapeHtml(
                            request.status
                        )}

                    </span>

                </td>


                <td>

                    <button
                        class="delete-btn"
                        title="Delete"
                        onclick="deleteRequest(${index})">

                        <i class="fa-solid fa-trash"></i>

                    </button>

                </td>

            `;


                    requestTable.appendChild(row);

                }
            );

        }


        /* =========================
           DELETE
        ========================= */

        function deleteRequest(index) {

            const confirmDelete =
                confirm(
                    "Are you sure you want to delete this request?"
                );


            if (!confirmDelete) {

                return;

            }


            const data =
                getRequests();


            data.splice(index, 1);


            saveRequests(data);


            loadRequests();


            showToast(
                "Request deleted successfully."
            );

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
           TOAST
        ========================= */

        function showToast(message) {

            const toast =
                document.getElementById("toast");

            const toastMessage =
                document.getElementById("toastMessage");


            toastMessage.textContent =
                message;


            toast.classList.add("show");


            setTimeout(
                function() {

                    toast.classList.remove("show");

                },
                3000
            );

        }


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
           ESCAPE KEY
        ========================= */

        document.addEventListener(
            "keydown",
            function(e) {

                if (e.key === "Escape") {

                    closeSidebar();

                }

            }
        );


        /* =========================
           INITIAL LOAD
        ========================= */

        loadRequests();
    </script>

</body>

</html>