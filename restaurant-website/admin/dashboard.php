<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Restaurant Dashboard</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
            overflow-x: hidden;
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
            background: #f5f7fb;
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
            text-align: center;
        }

        .menu a:hover,
        .menu a.active {
            background: #fff4db;
            color: #f59e0b;
            transform: translateX(4px);
        }

        /* ================= LOGOUT ================= */

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

        /* ================= MAIN CONTENT ================= */

        .main-content {
            flex: 1;
            min-width: 0;
            margin-left: 260px;
            padding: 25px 30px;
        }

        /* ================= HEADER ================= */

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
            margin-bottom: 30px;
            box-shadow: 0 2px 8px rgba(15, 23, 42, .03);
            animation: fadeDown .7s ease;
        }

        .top-header h1 {
            font-size: 24px;
            font-weight: 700;
            color: #1e293b;
        }

        /* ================= ADMIN BUTTON ================= */

        .admin-button {
            height: 43px;
            min-width: 115px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            background: #f8fafc;
            color: #334155;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-size: 15px;
            font-weight: 600;
            transition: all .25s ease;
        }

        .admin-button i {
            font-size: 17px;
            color: #64748b;
            transition: transform .3s ease;
        }

        .admin-button:hover {
            background: #fff7df;
            border-color: #fcd34d;
            color: #f59e0b;
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(245, 158, 11, .12);
        }

        .admin-button:hover i {
            transform: scale(1.1);
        }

        /* ================= STATISTICS ================= */

        .stats-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .stat-card {
            min-height: 195px;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 25px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            box-shadow: 0 2px 8px rgba(15, 23, 42, .03);
            animation: cardAppear .7s ease both;
            transition:
                transform .3s ease,
                box-shadow .3s ease,
                border-color .3s ease;
        }

        .stat-card:nth-child(1) {
            animation-delay: .1s;
        }

        .stat-card:nth-child(2) {
            animation-delay: .2s;
        }

        .stat-card:nth-child(3) {
            animation-delay: .3s;
        }

        .stat-card:nth-child(4) {
            animation-delay: .4s;
        }

        .stat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(15, 23, 42, .08);
            border-color: #d5dce5;
        }

        /* ================= STAT ICON ================= */

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            font-size: 25px;
            transition: transform .3s ease;
        }

        .stat-card:hover .stat-icon {
            transform: scale(1.08) rotate(2deg);
        }

        .stat-icon.orange,
        .stat-icon.yellow {
            background: #fff4d6;
            color: #f59e0b;
        }

        .stat-icon.blue {
            background: #e8f4ff;
            color: #009dff;
        }

        .stat-icon.red {
            background: #ffe9e9;
            color: #ef4444;
        }

        /* ================= STAT TEXT ================= */

        .stat-number {
            font-size: 24px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 7px;
        }

        .stat-title {
            font-size: 15px;
            color: #64748b;
            line-height: 1.35;
            font-weight: 400;
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
        }

        .hamburger:hover {
            color: #f59e0b;
            border-color: #fcd34d;
            background: #fffaf0;
            transform: scale(1.03);
        }

        /* ================= OVERLAY ================= */

        .sidebar-overlay {
            display: none;
        }

        /* ================= ANIMATIONS ================= */

        @keyframes fadeDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes cardAppear {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 1100px) {

            .stats-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {

            .dashboard {
                display: block;
                position: relative;
            }

            .sidebar {
                position: fixed;
                left: 0;
                top: 0;
                width: 260px;
                height: 100vh;
                min-height: 100vh;
                z-index: 1000;
                transform: translateX(-100%);
                transition: transform .3s ease;
                box-shadow: 5px 0 20px rgba(0, 0, 0, .08);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .sidebar-overlay {
                display: block;
                position: fixed;
                inset: 0;
                background: rgba(15, 23, 42, .35);
                z-index: 999;
                opacity: 0;
                visibility: hidden;
                transition: all .3s ease;
            }

            .sidebar-overlay.show {
                opacity: 1;
                visibility: visible;
            }

            .hamburger {
                display: flex;
            }

            .main-content {
                width: 100%;
                margin-left: 0;
                padding: 20px;
            }

            .stats-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 550px) {

            .main-content {
                padding: 15px;
            }

            .top-header {
                height: auto;
                min-height: 70px;
                padding: 12px 15px;
                margin-bottom: 20px;
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

            .stats-container {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .stat-card {
                min-height: 180px;
            }
        }

        @media (max-width: 360px) {

            .main-content {
                padding: 10px;
            }

            .top-header {
                padding: 10px;
            }

            .top-header h1 {
                font-size: 17px;
            }

            .hamburger {
                width: 40px;
                height: 40px;
            }

            .stat-card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="dashboard">

        <!-- ================= SIDEBAR ================= -->

        <aside class="sidebar" id="sidebar">

            <div class="restaurant-logo">
                <i class="fa-regular fa-circle-user"></i>
                <h2>Admin</h2>
            </div>

            <ul class="menu">

                <li>
                    <a href="dashboard.php" class="active">
                        <i class="fa-solid fa-chart-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="bill_generate.php">
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

        <!-- ================= MOBILE OVERLAY ================= -->

        <div class="sidebar-overlay"
            id="overlay"
            onclick="closeSidebar()">
        </div>

        <!-- ================= MAIN CONTENT ================= -->

        <main class="main-content">

            <!-- HEADER -->

            <header class="top-header">

                <button class="hamburger"
                    onclick="toggleSidebar()"
                    aria-label="Open Menu">

                    <i class="fa-solid fa-bars"></i>

                </button>

                <h1>Restaurant Dashboard</h1>

                <div class="admin-button">

                    <i class="fa-regular fa-circle-user"></i>

                    <span>admin</span>

                </div>

            </header>

            <!-- ================= STATISTICS ================= -->

            <section class="stats-container">

                <!-- TOTAL ORDERS -->

                <div class="stat-card">

                    <div class="stat-icon orange">

                        <i class="fa-solid fa-cart-shopping"></i>

                    </div>

                    <div class="stat-number">
                        0
                    </div>

                    <div class="stat-title">
                        Today's Total Orders
                    </div>

                </div>

                <!-- TOTAL REVENUE -->

                <div class="stat-card">

                    <div class="stat-icon yellow">

                        <i class="fa-solid fa-indian-rupee-sign"></i>

                    </div>

                    <div class="stat-number">
                        ₹0.00
                    </div>

                    <div class="stat-title">
                        Today's Total Revenue
                    </div>

                </div>

                <!-- OFFLINE REVENUE -->

                <div class="stat-card">

                    <div class="stat-icon blue">

                        <i class="fa-solid fa-store"></i>

                    </div>

                    <div class="stat-number">
                        ₹0.00
                    </div>

                    <div class="stat-title">
                        Today's Offline / Dine-in
                        <br>
                        Revenue
                    </div>

                </div>

                <!-- CANCELLED ORDERS -->

                <div class="stat-card">

                    <div class="stat-icon red">

                        <i class="fa-solid fa-circle-xmark"></i>

                    </div>

                    <div class="stat-number">
                        0
                    </div>

                    <div class="stat-title">
                        Today Cancelled Orders
                    </div>

                </div>

            </section>

        </main>

    </div>

    <!-- ================= JAVASCRIPT ================= -->

    <script>

        function toggleSidebar() {

            const sidebar = document.getElementById("sidebar");
            const overlay = document.getElementById("overlay");

            sidebar.classList.toggle("show");
            overlay.classList.toggle("show");

        }

        function closeSidebar() {

            const sidebar = document.getElementById("sidebar");
            const overlay = document.getElementById("overlay");

            sidebar.classList.remove("show");
            overlay.classList.remove("show");

        }

        /* Close sidebar with ESC key */

        document.addEventListener("keydown", function (e) {

            if (e.key === "Escape") {

                closeSidebar();

            }

        });

        /* Close sidebar after clicking a menu item on mobile */

        document.querySelectorAll(".menu a").forEach(function (link) {

            link.addEventListener("click", function () {

                if (window.innerWidth <= 768) {

                    closeSidebar();

                }

            });

        });

    </script>

</body>

</html>