<div id="main-wrapper" class="auth-customizer-none">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
        <div class="position-relative z-index-5">
            <div class="row">
                <div class="col-xl-5 col-xxl-4">
                    <div class="authentication-login min-vh-100 bg-body row justify-content-center">
                        <div class="col-12">
                            <a href="https://bootstrapdemos.wrappixel.com/materialpro/dist/main/index.html"
                                class="text-nowrap logo-img d-flex align-items-center gap-2 px-4 py-9 w-100">
                                <b class="logo-icon">
                                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                    <!-- Dark Logo icon -->
                                    <img src="vistas/img/logo/easytask-slim-black.png" alt="homepage" class="dark-logo" />
                                    <!-- Light Logo icon -->
                                    <img src="vistas/img/logo/easytask-slim-black.png" alt="homepage" class="light-logo" />
                                </b>
                                <!--End Logo icon -->
                                <!-- Logo text -->
                                <span class="logo-text">
                                    <!-- dark Logo text -->
                                    <img src="vistas/img/logo/easytask-black.png" alt="homepage" class="dark-logo ps-2" />
                                    <!-- Light Logo text -->
                                    <img src="vistas/img/logo/easytask-black.png" class="light-logo ps-2" alt="homepage" />
                                </span>
                            </a>
                        </div>
                        <div class="auth-max-width col-sm-8 col-md-6 col-xl-7 px-4">
                            <h2 class="mb-1 fs-7 fw-bolder">Bienvenido a EasyTask</h2>
                            <p class="mb-7">Gestor de tareas</p>

                            <div class="position-relative text-center my-4">
                                <p class="mb-0 fs-4 px-3 d-inline-block bg-white text-dark z-index-5 position-relative">
                                    or sign
                                    in
                                    with</p>
                                <span
                                    class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                            </div>
                            <form method="post">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Usuario</label>
                                    <input type="text"  name="ingUsuario" class="form-control" >
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                                    <input type="password" name="ingPassword" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-4">

                                    <a class="text-primary fw-medium fs-3"
                                        href=""></a>
                                </div>
                                
                                    <button type="submit" class="btn btn-primary w-100 py-8 mb-4 ">Sign In</button>
                                    <?php

                                        $login = new ControladorUsuarios();
                                        $login -> ctrIngresoUsuario();

                                    ?>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-xxl-8 d-none d-xl-block">
                    <div class="d-none d-xl-flex align-items-center justify-content-center h-100">
                        <img src="https://bootstrapdemos.wrappixel.com/materialpro/dist/assets/images/backgrounds/user-login.png"
                            alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>