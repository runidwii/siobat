<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SiObat</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <!-- SIDEBAR -->
    <section id="sidebar">

        <a href="#" class="brand">
            <img src="{{ asset('img/logo.png') }}" alt="Logo">

            <div class="brand-text">
                <h2>SiOBAT</h2>
                <p>Sistem Informasi Manajemen Obatt</p>
            </div>
        </a>

        <div class="divider-side"></div>

        <ul class="side-menu">

            <li>
                <a href="#">
                    <i class="material-icons-round">home</i>
                    Beranda
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="material-icons-round">bar_chart</i>
                    Persediaan Obat
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="material-icons-round">edit</i>
                    Input Data
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="material-icons-round">text_snippet</i>
                    Laporan
                </a>
            </li>

        </ul>

    </section>
    <!-- SIDEBAR -->


    <!-- CONTENT -->
    <section id="content">

        <!-- NAVBAR -->
        <nav class="topbar">

            <div class="left">
                <h2>Beranda</h2>
            </div>

            <div class="right">

                <form action="#">
                    <div class="search-container">

                        <span class="material-icons-round search-icon">
                            search
                        </span>

                        <input type="text" placeholder="Ketik nama obat disini...">

                    </div>
                </form>

                <a href="#" class="nav-link">

                    <i class="material-icons-round">
                        notifications
                    </i>

                    <span class="badge">5</span>

                </a>

                <span class="divider"></span>

                <!-- PROFILE -->
                <div class="profile">

                    <div class="profile-info">

                        <img src="{{ asset('img/fotoprofil.jpg') }}" alt="User">

                        <div class="user-text">
                            <h4>Runi</h4>
                            <p>Apoteker</p>
                        </div>

                    </div>

                    <ul class="profile-link">

                        <li>
                            <a href="#">
                                <i class="material-icons-round">person</i>
                                Profile
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="material-icons-round">settings</i>
                                Settings
                            </a>
                        </li>

                        <li>
                            <form action="/logout" method="POST">
                                @csrf

                                <button type="submit" class="logout-btn">
                                    <i class="material-icons-round">logout</i>
                                    Logout
                                </button>
                            </form>
                        </li>

                    </ul>

                </div>
                <!-- PROFILE -->

            </div>

        </nav>
        <!-- NAVBAR -->


        <!-- MAIN -->
        <div class="main">
