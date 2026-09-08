<?php
// setting.php
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Settings | Restaurant Admin</title>

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
            background: #f8fafc;
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
   MAIN CONTENT
========================= */

        .main-content {
            margin-left: 250px;
            min-height: 100vh;
            padding-bottom: 40px;
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
            padding: 25px 30px 18px;
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
   SETTINGS CONTAINER
========================= */

        .settings-container {
            margin: 0 30px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }


        /* =========================
   SETTINGS CARD
========================= */

        .settings-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .04);
        }

        .settings-card-header {
            padding: 20px;
            border-bottom: 1px solid #e5e7eb;

            display: flex;
            align-items: center;
            gap: 12px;
        }

        .settings-icon {
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

        .settings-card-header h3 {
            font-size: 18px;
            color: #1e293b;
        }

        .settings-card-header p {
            color: #64748b;
            font-size: 12px;
            margin-top: 4px;
        }


        /* =========================
   FORM
========================= */

        .settings-form {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            color: #334155;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .input-wrapper {
            position: relative;
        }

        .form-control {
            width: 100%;
            height: 42px;

            border: 1px solid #dbe2ea;
            border-radius: 8px;

            padding: 0 42px 0 12px;

            outline: none;

            font-size: 13px;
            color: #334155;

            background: #ffffff;

            transition: .2s;
        }

        .form-control:focus {
            border-color: #f59e0b;
            box-shadow: 0 0 0 3px rgba(245, 158, 11, .10);
        }

        .password-toggle {
            position: absolute;
            right: 0;
            top: 0;

            width: 42px;
            height: 42px;

            border: none;
            background: transparent;

            color: #94a3b8;

            cursor: pointer;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .password-toggle:hover {
            color: #f59e0b;
        }


        /* =========================
   PASSWORD INFO
========================= */

        .password-info {
            background: #f8fafc;
            border: 1px solid #e2e8f0;

            border-radius: 8px;

            padding: 11px 12px;

            margin-bottom: 18px;

            display: flex;
            gap: 9px;

            color: #64748b;

            font-size: 11px;
            line-height: 1.5;
        }

        .password-info i {
            color: #f59e0b;
            margin-top: 2px;
        }


        /* =========================
   BUTTON
========================= */

        .update-btn {
            width: 100%;

            border: none;

            background: #f59e0b;
            color: #ffffff;

            padding: 12px 16px;

            border-radius: 8px;

            font-size: 13px;
            font-weight: 600;

            cursor: pointer;

            display: flex;
            align-items: center;
            justify-content: center;

            gap: 8px;

            transition: .2s;
        }

        .update-btn:hover {
            background: #d97706;
        }

        .update-btn.staff-btn {
            background: #2563eb;
        }

        .update-btn.staff-btn:hover {
            background: #1d4ed8;
        }


        /* =========================
   ROLE BADGE
========================= */

        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;

            padding: 5px 9px;

            border-radius: 20px;

            font-size: 11px;
            font-weight: 600;

            margin-left: auto;
        }

        .admin-badge {
            background: #fff7ed;
            color: #f59e0b;
        }

        .staff-badge {
            background: #eff6ff;
            color: #2563eb;
        }


        /* =========================
   SECURITY CARD
========================= */

        .security-card {
            grid-column: 1 / -1;

            background: #ffffff;

            border: 1px solid #e2e8f0;
            border-radius: 16px;

            box-shadow: 0 4px 15px rgba(0, 0, 0, .04);

            padding: 20px;
        }

        .security-content {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .security-icon {
            width: 50px;
            height: 50px;

            border-radius: 12px;

            background: #ecfdf5;
            color: #16a34a;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 20px;

            flex-shrink: 0;
        }

        .security-content h3 {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .security-content p {
            color: #64748b;
            font-size: 12px;
            line-height: 1.5;
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

        @media(max-width: 1000px) {

            .settings-container {
                grid-template-columns: 1fr;
            }

            .security-card {
                grid-column: auto;
            }
        }


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
                padding: 20px 15px 15px;
            }

            .settings-container {
                margin: 0 15px;
                gap: 18px;
            }

            .settings-card-header {
                padding: 15px;
            }

            .settings-form {
                padding: 15px;
            }

            .security-card {
                padding: 15px;
            }

            .security-content {
                align-items: flex-start;
            }

            .role-badge {
                font-size: 10px;
            }
        }
    </style>

</head>

<body>


    <!-- ========================= SIDEBAR======================== -->

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
                <a href="account-closing.php">
                    <i class="fa-solid fa-user-xmark"></i>
                    <span>Account Closing</span>
                </a>
            </li>
            <li><a href="setting.php" class="active"><i class="fa-solid fa-gear"></i>Setting</a></li>
            <li><a href="../logout.php" class="logout"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
        </ul>
    </aside>


    <div
        class="sidebar-overlay"
        id="overlay"
        onclick="closeSidebar()">
    </div>


    <!-- =========================
     MAIN
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

                    <h1>
                        Settings
                    </h1>

                    <p>
                        Manage admin and staff accounts
                    </p>

                </div>

            </div>


            <div class="admin-btn">

                <i class="fa-regular fa-circle-user"></i>

                <span>
                    admin
                </span>

            </div>

        </header>


        <!-- PAGE TITLE -->

        <div class="page-title">

            <h2>
                Account Settings
            </h2>

            <p>
                Update username and password for admin and staff.
            </p>

        </div>


        <!-- =========================
         SETTINGS CONTAINER
    ========================= --> 

        <div class="settings-container">


            <!-- =========================
             ADMIN SETTINGS
        ========================= -->

            <div class="settings-card">

                <div class="settings-card-header">

                    <div class="settings-icon">

                        <i class="fa-solid fa-user-shield"></i>

                    </div>


                    <div>

                        <h3>
                            Admin Account
                        </h3>

                        <p>
                            Update administrator credentials
                        </p>

                    </div>


                    <span class="role-badge admin-badge">

                        <i class="fa-solid fa-shield-halved"></i>

                        Admin

                    </span>

                </div>


                <form
                    class="settings-form"
                    id="adminForm"
                    onsubmit="updateAdmin(event)">


                    <!-- CURRENT USERNAME -->

                    <div class="form-group">

                        <label>
                            Current Username
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="adminCurrentUsername"
                            value="admin"
                            readonly>

                    </div>


                    <!-- NEW USERNAME -->

                    <div class="form-group">

                        <label>
                            New Username
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="adminUsername"
                            placeholder="Enter new admin username"
                            autocomplete="off"
                            required>

                    </div>


                    <!-- NEW PASSWORD -->

                    <div class="form-group">

                        <label>
                            New Password
                        </label>


                        <div class="input-wrapper">

                            <input
                                type="password"
                                class="form-control"
                                id="adminPassword"
                                placeholder="Enter new password"
                                autocomplete="new-password"
                                required>


                            <button
                                type="button"
                                class="password-toggle"
                                onclick="togglePassword('adminPassword', this)">

                                <i class="fa-solid fa-eye"></i>

                            </button>

                        </div>

                    </div>


                    <!-- CONFIRM PASSWORD -->

                    <div class="form-group">

                        <label>
                            Confirm Password
                        </label>


                        <div class="input-wrapper">

                            <input
                                type="password"
                                class="form-control"
                                id="adminConfirmPassword"
                                placeholder="Confirm new password"
                                autocomplete="new-password"
                                required>


                            <button
                                type="button"
                                class="password-toggle"
                                onclick="togglePassword('adminConfirmPassword', this)">

                                <i class="fa-solid fa-eye"></i>

                            </button>

                        </div>

                    </div>


                    <!-- INFO -->

                    <div class="password-info">

                        <i class="fa-solid fa-circle-info"></i>

                        <span>
                            Use a strong password containing letters,
                            numbers and special characters.
                        </span>

                    </div>


                    <!-- BUTTON -->

                    <button
                        type="submit"
                        class="update-btn">

                        <i class="fa-solid fa-user-gear"></i>

                        Update Admin Account

                    </button>

                </form>

            </div>


            <!-- =========================
             STAFF SETTINGS
        ========================= --> 

            <div class="settings-card">

                <div class="settings-card-header">

                    <div class="settings-icon">

                        <i class="fa-solid fa-user-tie"></i>

                    </div>


                    <div>

                        <h3>
                            Staff Account
                        </h3>

                        <p>
                            Update staff credentials
                        </p>

                    </div>


                    <span class="role-badge staff-badge">

                        <i class="fa-solid fa-user"></i>

                        Staff

                    </span>

                </div>


                <form
                    class="settings-form"
                    id="staffForm"
                    onsubmit="updateStaff(event)">


                    <!-- CURRENT USERNAME -->

                    <div class="form-group">

                        <label>
                            Current Username
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="staffCurrentUsername"
                            value="staff"
                            readonly>

                    </div>


                    <!-- NEW USERNAME -->

                    <div class="form-group">

                        <label>
                            New Username
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="staffUsername"
                            placeholder="Enter new staff username"
                            autocomplete="off"
                            required>

                    </div>


                    <!-- NEW PASSWORD -->

                    <div class="form-group">

                        <label>
                            New Password
                        </label>


                        <div class="input-wrapper">

                            <input
                                type="password"
                                class="form-control"
                                id="staffPassword"
                                placeholder="Enter new password"
                                autocomplete="new-password"
                                required>


                            <button
                                type="button"
                                class="password-toggle"
                                onclick="togglePassword('staffPassword', this)">

                                <i class="fa-solid fa-eye"></i>

                            </button>

                        </div>

                    </div>


                    <!-- CONFIRM PASSWORD -->

                    <div class="form-group">

                        <label>
                            Confirm Password
                        </label>


                        <div class="input-wrapper">

                            <input
                                type="password"
                                class="form-control"
                                id="staffConfirmPassword"
                                placeholder="Confirm new password"
                                autocomplete="new-password"
                                required>


                            <button
                                type="button"
                                class="password-toggle"
                                onclick="togglePassword('staffConfirmPassword', this)">

                                <i class="fa-solid fa-eye"></i>

                            </button>

                        </div>

                    </div>


                    <!-- INFO -->

                    <div class="password-info">

                        <i class="fa-solid fa-circle-info"></i>

                        <span>
                            Staff credentials should be shared
                            only with authorized staff members.
                        </span>

                    </div>


                    <!-- BUTTON -->

                    <button
                        type="submit"
                        class="update-btn staff-btn">

                        <i class="fa-solid fa-user-gear"></i>

                        Update Staff Account

                    </button>

                </form>

            </div>


            <!-- =========================
             SECURITY INFORMATION
        ========================= -->

            <div class="security-card">

                <div class="security-content">

                    <div class="security-icon">

                        <i class="fa-solid fa-shield-halved"></i>

                    </div>


                    <div>

                        <h3>
                            Account Security
                        </h3>

                        <p>
                            Keep your admin and staff credentials secure.
                            Never share passwords with unauthorized users.
                            For production use, passwords should be stored
                            using secure password hashing such as PHP
                            password_hash().
                        </p>

                    </div>

                </div>

            </div>


        </div>

    </main>


    <!-- =========================
     TOAST
========================= -->

    <div
        class="toast"
        id="toast">

        <i class="fa-solid fa-circle-check"></i>

        <span id="toastMessage">
            Updated successfully.
        </span>

    </div>


    <script>
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
           PASSWORD SHOW/HIDE
        ========================= */

        function togglePassword(inputId, button) {

            const input =
                document.getElementById(inputId);

            const icon =
                button.querySelector("i");


            if (input.type === "password") {

                input.type = "text";

                icon.classList.remove("fa-eye");

                icon.classList.add("fa-eye-slash");

            } else {

                input.type = "password";

                icon.classList.remove("fa-eye-slash");

                icon.classList.add("fa-eye");

            }

        }


        /* =========================
           UPDATE ADMIN
        ========================= */

        function updateAdmin(event) {

            event.preventDefault();


            const username =
                document
                .getElementById("adminUsername")
                .value
                .trim();


            const password =
                document
                .getElementById("adminPassword")
                .value;


            const confirmPassword =
                document
                .getElementById("adminConfirmPassword")
                .value;


            if (username === "") {

                showToast(
                    "Please enter admin username."
                );

                return;

            }


            if (password.length < 6) {

                showToast(
                    "Password must contain at least 6 characters."
                );

                return;

            }


            if (password !== confirmPassword) {

                showToast(
                    "Admin passwords do not match."
                );

                return;

            }


            /*
             * Frontend demonstration.
             *
             * Later this data can be sent
             * to PHP/MySQL using fetch().
             */

            console.log({
                role: "admin",
                username: username,
                password: password
            });


            showToast(
                "Admin account updated successfully."
            );


            document
                .getElementById("adminCurrentUsername")
                .value = username;


            document
                .getElementById("adminForm")
                .reset();

        }


        /* =========================
           UPDATE STAFF
        ========================= */

        function updateStaff(event) {

            event.preventDefault();


            const username =
                document
                .getElementById("staffUsername")
                .value
                .trim();


            const password =
                document
                .getElementById("staffPassword")
                .value;


            const confirmPassword =
                document
                .getElementById("staffConfirmPassword")
                .value;


            if (username === "") {

                showToast(
                    "Please enter staff username."
                );

                return;

            }


            if (password.length < 6) {

                showToast(
                    "Password must contain at least 6 characters."
                );

                return;

            }


            if (password !== confirmPassword) {

                showToast(
                    "Staff passwords do not match."
                );

                return;

            }


            /*
             * Frontend demonstration.
             */

            console.log({
                role: "staff",
                username: username,
                password: password
            });


            showToast(
                "Staff account updated successfully."
            );


            document
                .getElementById("staffCurrentUsername")
                .value = username;


            document
                .getElementById("staffForm")
                .reset();

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


            setTimeout(function() {

                toast.classList.remove("show");

            }, 3000);

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
    </script>

</body>

</html>