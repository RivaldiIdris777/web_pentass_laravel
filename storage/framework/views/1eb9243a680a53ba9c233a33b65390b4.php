<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
            <h1 class="text-light"><a href="<?php echo e(route('home.depan')); ?>">
                <img src="<?php echo e(asset('templates/assets/img/pentaslogo2.png')); ?>" alt="">
            </a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="" href="<?php echo e(route('home.depan')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('lomba.depan')); ?>">Lomba</a></li>
                <li><a href="<?php echo e(route('pendaftaran.pencarianpendaftar')); ?>">Pencarian</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
<?php /**PATH C:\laragon\www\Laravel_Project\web_pentass_laravel\resources\views/frontend/navigation.blade.php ENDPATH**/ ?>