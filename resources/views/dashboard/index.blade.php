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

            <div class="card-box">

                <!-- CARD 1 -->
                <div class="stat-card blue">

                    <div class="icon-box">
                        <span class="material-icons-round">
                            medication
                        </span>
                    </div>

                    <div class="card-info">
                        <h4>Total Semua Obat</h4>
                        <h2>700</h2>
                        <p>Total stok tersedia</p>
                    </div>

                </div>

                <!-- CARD 2 -->
                <div class="stat-card orange">

                    <div class="icon-box">
                        <span class="material-icons-round">
                            warning
                        </span>
                    </div>

                    <div class="card-info">
                        <h4>Obat Hampir Habis</h4>
                        <h2>16</h2>
                        <p>Stok dibawah minimum</p>
                    </div>

                </div>

                <!-- CARD 3 -->
                <div class="stat-card green">

                    <div class="icon-box">
                        <span class="material-icons-round">
                            shopping_cart
                        </span>
                    </div>

                    <div class="card-info">
                        <h4>Pengajuan Permintaan</h4>
                        <h2>16</h2>
                        <p>Menunggu persetujuan</p>
                    </div>

                </div>

                <!-- CARD 4 -->
                <div class="stat-card red">

                    <div class="icon-box">
                        <span class="material-icons-round">
                            close
                        </span>
                    </div>

                    <div class="card-info">
                        <h4>Akan Kadaluarsa</h4>
                        <h2>3</h2>
                        <p>Kurang dari 3 bulan</p>
                    </div>

                </div>

                <!-- CARD 5 -->
                <div class="stat-card cyan">

                    <div class="icon-box">
                        <span class="material-icons-round">
                            inventory_2
                        </span>
                    </div>

                    <div class="card-info">
                        <h4>Obat Keluar</h4>
                        <h2>3</h2>
                        <p>Total obat keluar bulan ini</p>
                    </div>

                </div>

            </div>


            <!-- CHART -->
            <div class="chart-card">

                <div class="chart-header">
                    <h3>Grafik Obat Keluar</h3>
                </div>

                <canvas id="myChart"></canvas>

            </div>
            <!-- CHART -->

        </div>
        <!-- MAIN -->

    </section>
    <!-- CONTENT -->


    <!-- CHART JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        // PROFILE DROPDOWN
        const profile = document.querySelector('.profile-info');
        const profileLink = document.querySelector('.profile-link');

        profile.addEventListener('click', () => {
            profileLink.classList.toggle('show');
        });


        // CHART
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {

            type: 'bar',

            data: {

                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],

                datasets: [{

                    label: 'Obat Keluar',

                    data: [12, 19, 8, 15, 10, 20],

                    backgroundColor: [
                        '#4FD1C5',
                        '#60A5FA',
                        '#F87171',
                        '#FBBF24',
                        '#34D399',
                        '#A78BFA'
                    ],

                    borderRadius: 10,
                    borderSkipped: false

                }]
            },

            options: {

                responsive: true,
                maintainAspectRatio: false,

                plugins: {
                    legend: {
                        display: false
                    }
                },

                scales: {

                    y: {

                        beginAtZero: true,

                        grid: {
                            color: '#e2e8f0'
                        },

                        ticks: {
                            color: '#64748b'
                        }
                    },

                    x: {

                        grid: {
                            display: false
                        },

                        ticks: {
                            color: '#64748c'
                        }
                    }
                }
            }
        });

    </script>

</body>
</html>