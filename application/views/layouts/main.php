<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="keyword" content="" />
    <meta name="author" content="flexilecode" />
    <title>AZ News || Dashboard</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>/assets/images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/vendors/css/vendors.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/vendors/css/daterangepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/theme.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

</head>

<body>
    <nav class="nxl-navigation">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="index.html" class="b-brand">
                    <h4>AZ NEWS</h4>
                </a>
            </div>
            <div class="navbar-content">
                <ul class="nxl-navbar">
                    <li class="nxl-item nxl-caption">
                        <label>Navigation</label>
                    </li>
                    <li class="nxl-item">
                        <a href="<?php echo base_url() ?>" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-airplay"></i></span>
                            <span class="nxl-mtext">Dashboard</span><span class="nxl-arrow"></span>
                        </a>

                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="fa fa-list"></i></span>
                            <span class="nxl-mtext">Kategori</span><span class="nxl-arrow"><i
                                    class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="<?php echo base_url('category') ?>"><i
                                        class="fas fa-database"></i>
                                    Data Kategori</a></li>

                        </ul>
                    </li>

                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="fas fa-newspaper"></i></span>
                            <span class="nxl-mtext">Berita</span><span class="nxl-arrow"><i
                                    class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="<?php echo base_url('news') ?>"><i
                                        class="fas fa-database"></i>
                                    Data Berita</a></li>

                        </ul>
                    </li>

                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="fas fa-comments"></i></span>
                            <span class="nxl-mtext">Komentar</span><span class="nxl-arrow"><i
                                    class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="reports-sales.html"><i
                                        class="fas fa-database"></i>
                                    Data Komentar</a></li>

                        </ul>
                    </li>

                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="fas fa-tools"></i></span>
                            <span class="nxl-mtext">Setting</span><span class="nxl-arrow"><i
                                    class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="<?php echo base_url('setting/api') ?>"><i
                                        class="fas fa-key"></i> API KEY</a></li>
                        </ul>
                    </li>


                    <li class="nxl-item">
                        <a href="<?php echo base_url('setting/logout') ?>" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-power"></i></span>
                            <span class="nxl-mtext">Logout</span><span class="nxl-arrow"></span>
                        </a>

                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <header class="nxl-header">
        <div class="header-wrapper">
            <!--! [Start] Header Left !-->
            <div class="header-left d-flex align-items-center gap-4">
                <!--! [Start] nxl-head-mobile-toggler !-->
                <a href="javascript:void(0);" class="nxl-head-mobile-toggler" id="mobile-collapse">
                    <div class="hamburger hamburger--arrowturn">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </a>
                <!--! [Start] nxl-head-mobile-toggler !-->
                <!--! [Start] nxl-navigation-toggle !-->
                <div class="nxl-navigation-toggle">
                    <a href="javascript:void(0);" id="menu-mini-button">
                        <i class="feather-align-left"></i>
                    </a>
                    <a href="javascript:void(0);" id="menu-expend-button" style="display: none">
                        <i class="feather-arrow-right"></i>
                    </a>
                </div>

            </div>
            <!--! [End] Header Left !-->

        </div>
    </header>

    <main class="nxl-container">
        <div class="nxl-content">

            <div class="main-content">
                <?php $this->load->view($content) ?>
            </div>
            <!-- [ Main Content ] end -->
        </div>
        <!-- [ Footer ] start -->
        <footer class="footer">
            <p class="fs-11 text-muted fw-medium text-uppercase mb-0 copyright">
                <span>Copyright ©</span>
                <script>
                document.write(new Date().getFullYear());
                </script>
            </p>

        </footer>
        <!-- [ Footer ] end -->
    </main>

    <script src="<?php echo base_url() ?>/assets/vendors/js/vendors.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/vendors/js/daterangepicker.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/vendors/js/apexcharts.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/vendors/js/circle-progress.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/common-init.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/dashboard-init.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/theme-customizer-init.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi Quill
        if (document.querySelector('#editor-news-add')) {
            var quill = new Quill('#editor-news-add', {
                modules: {
                    toolbar: '#toolbar-container',
                    // syntax: true, // Matikan dulu jika tidak pakai library highlight.js agar tidak error console
                },
                theme: 'snow',
                placeholder: 'Tulis deskripsi berita secara detail...'
            });

            // LOGIKA UTAMA: Sinkronisasi Real-time
            // Setiap kali ketik, langsung copy ke input hidden
            var hiddenInput = document.querySelector('#konten-news');

            // 1. Saat mengetik
            quill.on('text-change', function() {
                hiddenInput.value = quill.root.innerHTML;
            });

            // 2. Saat form disubmit (Double check / Backup)
            var myForm = document.getElementById('formNews');
            if (myForm) {
                myForm.addEventListener('submit', function(e) {
                    // Pastikan value terisi saat tombol ditekan
                    hiddenInput.value = quill.root.innerHTML;

                    // Cek jika kosong (Opsional, validasi frontend)
                    if (quill.getText().trim().length === 0) {
                        e.preventDefault();
                        alert('Isi berita tidak boleh kosong!');
                    }
                });
            }
        }
    });
    </script>


    <script>
    $(document).ready(function() {
        $(".modal").appendTo("body");
    });
    </script>
</body>

</html>