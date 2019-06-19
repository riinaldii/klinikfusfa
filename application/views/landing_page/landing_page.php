<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Klinik Fusfa</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/bootstrap.min.css">
    <!-- css -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/style.css">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
</head>

<body>
    <!-- menu -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#"> <img src="<?= base_url('assets/'); ?>dist/img/logo_kf.png" alt="" width="200px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#service">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#price">Daftar Harga</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-login" href="<?= base_url('Auth') ?>">Login</a>
                    </li>
                    <div class="nav-item">
                        <a class="btn btn-codia btn-reg" href="<?= base_url('Auth/registrationMember') ?>">
                        Register
                        </a>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end of menu -->

    <!-- header -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Selamat Datang di klinikfusfa.com</h1>
            <p class="lead align-left"> Klinik dan Pusat Terapi Psikologi FUSFA</p>
            <p class="lead align-left"> Jl. Panglima Batur Timur No.17
                Banjarbaru
                70711
            </p>
            <p class="lead align-left"> Telp/WA : 081250713236 </br>
                Email : info@klinikfusfa.com
            </p>
        </div>
    </div>
    <!-- end of header -->

    <div id="about">
        <div class="container">
            <h1>Tentang</h1>
            <div class="row">
                <div class="col-md-7">
                    <p class="about-desc">
                        Klinik dan Pusat Terapi Psikologi FUSFA memberikan pelayanan psikologi yang dibutuhkan oleh
                        individu di berbagai usia.
                        beberapa pelayanan yang diberikan adalah adanya sesi konsultasi dan layanan psikoterapi yang
                        diberikan saat ada individu
                        yang mengalami suatu persoalan dan ingin mendapatkan bantuan dati tenaga profesional yang
                        berkompeten dibidangnya. <br>
                        Selain itu, ada juga pemeriksaan atau screening yang dilakukan untuk mengetahui tumbuh
                        kembang anak dan memberikan
                        layanan terapi untuk membantu memaksimalkan potensi yang dimiliki oleh anak. beberapa
                        pemeriksaan psikologis yang
                        tersedia adalah pemeriksaan IQ, kesiapan masuk sekolah, dan juga pemeriksaan kepribadian.
                    </p>
                </div>
                <div class="col-md-5">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Alamat</h5>
                            </div>
                            <p class="mb-1">Jl. Panglima Batur Timur No.17 <br>
                                Banjarbaru <br>
                                70711</p>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Kontak</h5>
                            </div>
                            <p class="mb-1">Telp/WA : 081250713236 </br>
                                Email : info@klinikfusfa.com</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of facilities -->

    <!-- feature -->
    <div id="service">
        <div class="container">
            <h1>Layanan</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="codia-list">
                        <img src="<?= base_url('assets/'); ?>dist/img/mentor.png" alt="" width="100px;">
                        <h4 class="list-title">Konseling</h4>
                        <p>
                            Layanan psikologi yang dilakukan oleh konselor kepada individu yang mengalami permasalahan dalam kehidupannya dan
                            bermuara pada teratasinya permasalahan yang dihadapi <br><br>
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="codia-list">
                        <img src="<?= base_url('assets/'); ?>dist/img/connection.png" alt="" width="100px;">
                        <h4 class="list-title">Psikoterapi</h4>
                        <p>
                            Penanganan psikologis yang sifatnya lebih mendalam terkait dengan permasalahan / gangguan psikologis yang terjadi pada
                            diri individu <br><br><br>
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="codia-list">
                        <img src="<?= base_url('assets/'); ?>dist/img/update.png" alt="" width="100px;">
                        <h4 class="list-title">Terapi</h4>
                        <p>
                            Penanganan yang diberikan pada anak, terutama ABK (anak berkebutuhan khusus) yang diberikan sesuai dengan kebutuhannya,
                            yang dilakukan rutin setiap minggu agar anak dapat memaksimalkan fungsi-fungsi kehidupannya
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of feature -->

    <!-- lastest course -->
    <div id="price">
        <div class="container">
            <h1>Daftar Harga
            </h1>
            <div class="row">
                <div class="col-md-3">
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><b>Konseling</b></h5>
                        </div>
                        <h6>Rp 125.000/pertemuan/perjam
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                        </h6>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><b>Tes Psikologi</b></h5>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h6 class="mb-1">
                                    • Pemeriksaan IQ <br>
                                    • Bakat Minat <br>
                                    • Rekruitmen <br>
                                    • Kepribadian <br>
                                    • Tumbuh Kembang <br>
                                    • Screening Gangguan Psikologis <br>
                                    Rp 450.000
                                </h6>
                            </div>
                            <div class="col-sm-6">
                                <h6>
                                    • Kesiapan sekolah <br>
                                    Rp 100.000
                                </h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><b>Terapi Harian</b></h5>
                        </div>
                        <h6 class="mb-1">Rp. 50.000/pertemuan/jam <br>
                            *dibayarkan di awal bulan</h6>
                        <br>
                        <br>
                        <br>
                    </a>
                </div>
            </div>
            <small class="text">*harga bisa berubah sewaktu-waktu</small>
        </div>
    </div>

    <!-- end of lastest course -->

    <!-- footer -->
    <div id="footer">
        <h6>Copyright &copy; 2019 klinikfusfa.com.</h6>
    </div>
    <!-- end of footer -->

    <!-- javascript -->
    <!-- <script src="assets/js/jquery-3.3.1.slim.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>dist/js/bootstrap.min.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {
        $('.list').hide();
        $('#loadmore').on('click', function(e) {
            e.preventDefault();
            $('#loadmore').hide();
            $('.list').show(450);
        });
    });
</script>