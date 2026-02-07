 <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">Jl.Cilisung,Bandung</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">Email@Example.com</a></small>
                    </div>
                    <div class="top-link pe-2">
                        <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                        <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                        <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="<?= base_url()?>" class="navbar-brand"><h1 class="text-primary display-6">Dimsum2Putri</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="<?= base_url();?>" class="nav-item nav-link active">Home</a>
        
                            <a href="<?= base_url ('cart')?>" class="nav-item nav-link">Shop Cart</a>
                            <a href="<?= base_url ('checkout')?>" class="nav-item nav-link">Checkout</a>
                            <a href="<?= base_url ('contact'); ?>" class="nav-item nav-link">Contact </a>
                    
                        </div>
                        <div class="d-flex m-3 me-0">
                            <a href="#" class="position-relative me-4 my-auto">
                                <div class="navbar-nav ml-auto py-0">
<?php
if (session()->get('username') == ''){
    echo "<a href='/login' class='nav-item nav-link btn btn-primary me-2'><i class='fas fa-sign-in-alt'></i> Login</a>";
    echo "<a href='/register' class='nav-item nav-link btn btn-success'><i class='fas fa-user-plus'></i> Register</a>";
} else {
    echo "<a href='#' class='nav-item nav-link'>Halo, " . session()->get('username') . "</a>";
    echo "<a href='logout' class='nav-item nav-link'>[ Logout ]</a>";
}
?>
</div>
                            <a href="#" class="my-auto">
                                
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->
      