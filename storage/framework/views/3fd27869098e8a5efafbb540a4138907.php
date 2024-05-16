<div class="nav">
    <div class="sb-sidenav-menu-heading">Main Menu</div>
    <a class="nav-link" href="<?php echo e(route('dashboard.index')); ?>">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
        Dashboard
    </a>
    <div class="sb-sidenav-menu-heading">Interface</div>
    <a class="nav-link" href="<?php echo e(route('slider.index')); ?>">
        <div class="sb-nav-link-icon"><i class="fas fa-image"></i></div>
        Slider
    </a>
    <a class="nav-link" href="<?php echo e(route('qrcode.index')); ?>">
        <div class="sb-nav-link-icon"><i class="fa-solid fa-qrcode"></i></div>
        Buat QrCode
    </a>
    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
        aria-expanded="false" aria-controls="collapseLayouts">
        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
        Auth Manage
        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
    </a>
    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="<?php echo e(route('users.index')); ?>">User Management</a>
        </nav>
    </div>
    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="<?php echo e(route('manage-roles.index')); ?>">Role Management</a>
        </nav>
    </div>
    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
        aria-expanded="false" aria-controls="collapsePages">
        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
        List Pendaftar
        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
    </a>    
    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="<?php echo e(route('lomba.index')); ?>">Lomba</a>
        </nav>
    </div>
    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
        <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="<?php echo e(route('peserta.index')); ?>">Peserta</a>
        </nav>
    </div>
</div>
<?php /**PATH C:\laragon\www\Laravel_Project\Laravel_Project\Laravel_pentaseni\resources\views/layouts2/navigation.blade.php ENDPATH**/ ?>