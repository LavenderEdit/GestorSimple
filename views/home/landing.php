<?php include __DIR__ . '/../../includes/carousel.php'; ?>

<!-- Contenido principal actualizado -->
<!-- CAMBIO: Añadida clase 'bg-light' para el fondo principal del contenido -->
<div class="main-content bg-light"> 
    <!-- CAMBIO: Texto a 'text-dark' -->
    <h1 class="text-center mb-5 text-dark pt-5" id="info">Información de nuestra empresa</h1>
    <div class="container" id="hero">
        <!-- CAMBIO: Tarjeta a 'bg-white' y header a 'bg-light' -->
        <div class="card mb-5 border-0 shadow-lg bg-white">
            <div class="card-header bg-light text-dark py-4">
                <h2 class="mb-0 d-flex align-items-center">
                    <i class="fas fa-building fa-shake me-3"></i>
                    <?= $empresa['razon_social'] ?>
                </h2>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <!-- CAMBIO: Tarjeta interna a 'bg-white', icono a 'text-warning', badge a 'text-dark' -->
                        <div class="info-card p-4 shadow-sm rounded-3 bg-white border">
                            <h4 class="text-warning mb-3">
                                <i class="fas fa-fingerprint me-2"></i>
                                Identidad Legal
                            </h4>
                            <dl class="row">
                                <dt class="col-sm-5 text-dark">RUC:</dt>
                                <dd class="col-sm-7">
                                    <span class="badge bg-warning text-dark"><?= $empresa['ruc'] ?></span>
                                </dd>

                                <dt class="col-sm-5 text-dark">Dirección:</dt>
                                <dd class="col-sm-7 text-dark"><?= $empresa['direccion'] ?></dd>
                            </dl>
                        </div>
                    </div>

                    <div class="col-md-6">
                         <!-- CAMBIO: Tarjeta interna a 'bg-white', iconos a colores cálidos, texto a 'text-dark' -->
                        <div class="info-card p-4 shadow-sm rounded-3 bg-white border">
                            <h4 class="text-danger mb-3">
                                <i class="fas fa-chart-pie me-2"></i>
                                Especialización
                            </h4>
                            <div class="d-flex flex-column gap-2">
                                <div class="d-flex align-items-center text-dark">
                                    <i class="fas fa-store me-3 text-danger"></i>
                                    <?= $empresa['rubro_principal'] ?>
                                </div>
                                <div class="d-flex align-items-center text-dark">
                                    <i class="fas fa-store me-3 text-warning"></i>
                                    <?= $empresa['rubro_secundario'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="objectives"></div>
        <!-- Sección Misión/Visión mejorada -->
        <div class="row g-4 mb-5">
            <div class="col-md-6">
                 <!-- CAMBIO: Header a 'bg-light', body a 'bg-white', texto a 'text-dark' -->
                <div class="card h-100 border-start-danger border-4 shadow-sm">
                    <div class="card-header bg-light">
                        <h3 class="mb-0 text-danger">
                            <i class="<?= $mision_vision['mision']['icono'] ?> me-2"></i>
                            Misión Corporativa
                        </h3>
                    </div>
                    <div class="card-body bg-white">
                        <p class="lead text-dark"><?= $mision_vision['mision']['contenido'] ?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                 <!-- CAMBIO: Header a 'bg-light', body a 'bg-white', texto a 'text-dark' -->
                <div class="card h-100 border-start-warning border-4 shadow-sm">
                    <div class="card-header bg-light">
                        <h3 class="mb-0 text-warning">
                            <i class="<?= $mision_vision['vision']['icono'] ?> me-2"></i>
                            Visión Estratégica
                        </h3>
                    </div>
                    <div class="card-body bg-white">
                        <p class="lead text-dark"><?= $mision_vision['vision']['contenido'] ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección de Productos rediseñada -->
        <div class="mb-5" id="services">
            <div class="d-flex justify-content-between align-items-center mb-4">
                 <!-- CAMBIO: Título a 'text-warning' -->
                <h3 class="mb-0 display-6 text-warning">
                    <i class="fas fa-boxes-stacked fa-bounce me-2"></i>
                    Nuestras Soluciones Digitales
                </h3>
                 <!-- CAMBIO: Botón a 'btn-warning' -->
                <a href="index.php#contact" class="btn btn-warning btn-sm text-dark fw-bold">
                    <i class="fas fa-arrow-right me-2"></i>Ver todos
                </a>
            </div>

            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 g-4">
                <?php foreach ($productos as $producto): ?>
                    <div class="col">
                         <!-- CAMBIO: Tarjeta a 'bg-white', header a 'bg-light', texto a 'text-dark' -->
                        <div class="card tarjeta-funcionalidad bg-white text-dark shadow-sm h-100">
                            <div class="card-header bg-light text-dark py-3">
                                <h5 class="mb-0 d-flex align-items-center">
                                    <i class="<?= $producto['icono'] ?> me-3 text-warning"></i>
                                    <?= $producto['titulo'] ?>
                                </h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-muted"><?= $producto['descripcion'] ?></p>
                                <!-- CAMBIO: Badges a colores cálidos/neutros -->
                                <div class="badge bg-secondary">Nuevo</div>
                                <div class="badge bg-danger ms-2">Popular</div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Sección de Valores Empresariales -->
<div class="mb-5" id="valores">
    <!-- CAMBIO: Tarjeta a 'bg-white', header a 'bg-light' -->
    <div class="card border-0 shadow-lg bg-white">
        <div class="card-header bg-light text-dark py-4">
            <h3 class="mb-0 d-flex align-items-center">
                <i class="fas fa-heart me-3 text-danger"></i>
                Nuestros Valores
            </h3>
        </div>
        <div class="card-body">
            <div class="row g-4">
                <?php 
                    $valores = ['Integridad', 'Servicio', 'Compromiso', 'Respeto', 'Responsabilidad'];
                    $iconos = ['fas fa-handshake', 'fas fa-concierge-bell', 'fas fa-hands-helping', 'fas fa-users', 'fas fa-balance-scale'];
                    // CAMBIO: Colores a paleta cálida
                    $colores = ['text-warning', 'text-danger', 'text-warning', 'text-danger', 'text-warning'];
                ?>
                <?php foreach ($valores as $i => $valor): ?>
                    <div class="col-md-6 col-xl-4">
                        <!-- CAMBIO: Tarjeta interna a 'bg-white', texto a 'text-dark'/'text-muted' -->
                        <div class="info-card p-4 shadow-sm rounded-3 bg-white border h-100">
                            <div class="d-flex align-items-center <?= $colores[$i] ?> mb-3">
                                <i class="<?= $iconos[$i] ?> fa-lg me-3"></i>
                                <h5 class="mb-0 text-dark"><?= $valor ?></h5>
                            </div>
                            <p class="text-muted">Valor fundamental que guía nuestras acciones y decisiones como empresa.</p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
    </div>
</div>