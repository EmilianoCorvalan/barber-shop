<?php
session_start();
include 'header.php';
?>

<article class="first px-4 text-white main-font responsive-font container-fluid">
    <section class="container">
    <h1 class="text-center p-2">Servicios mas populares</h1><br>

    <div class="row g-4 py-3 row-cols-1 row-cols-lg-3 text-white first mx-4">
        <div class="feature col border rounded border-white p-4">
            <h3 class="fs-2">Corte de cabello</h3>
            <p class="fs-8 text-secondary">($2900 abonando en efectivo .) Corte de cabello con lavado incluido y productos para el cuidado del cabello. Todos nuestros servicios incluyen café expreso Segafredo o cerveza de cortesía.</p>
            <a href="turnos.php" class="icon-link">
            Reservar turno
            </a>
        </div>

        <div class="feature col border rounded border-white p-4">
            <h3 class="fs-2">Corte de cabello y arreglo de barba</h3>
            <p class="fs-8 text-secondary">($5200 abonando en efectivo.) Corte con lavado incluido y terminaciones a navaja. Arreglo de barba con toalla caliente y afeitado tradicional. Productos para el Cuidado del cabello y de la barba. Todos nuestros servicios incluyen café expreso segafredo o cerveza de cortesía.</p>
            <a href="turnos.php" class="icon-link">
            Reservar turno
            </a>
        </div>

        <div class="feature col border rounded border-white p-4">
            <h3 class="fs-2">Arreglo de barba</h3>
            <p class="fs-8 text-secondary">($2500 abonando en efectivo.) Arreglo de barba con toalla caliente, afeitado a navaja y productos para el cuidado de piel y barba. Todos nuestros servicios incluyen café expreso Segafredo o cerveza de cortesía.</p>
            <a href="turnos.php" class="icon-link">
            Reservar turno
            </a>
        </div>
    </div>

    <div class="row g-4 py-3 row-cols-1 row-cols-lg-3 text-white first mx-4">
        <div class="feature col border rounded border-white p-4">
            <h3 class="fs-2">Rapado y arreglo de barba</h3>
            <p class="fs-8 text-secondary">($2900 abonando en efectivo.) Rapado de maquina todo al mismo nivel. Arreglo de barba con toalla caliente, afeitado a navaja y productos para el cuidado de piel y barba. Todos nuestros servicios incluyen café expreso Segafredo o cerveza de cortesía.</p>
            <a href="turnos.php" class="icon-link">
            Reservar turno
            </a>
        </div>

        <div class="feature col border rounded border-white p-4">
            <h3 class="fs-2">Afeitado tradicional italiano</h3>
            <p class="fs-8 text-secondary">($2900 abonando en efectivo.) Afeitado clásico tradicional a cero con navaja, toallas calientes, frías, cremas para el cuidado de la piel. Todos nuestros servicios incluyen café expreso o cerveza de cortesía.</p>
            <a href="turnos.php" class="icon-link">
            Reservar turno
            </a>
        </div>

        <div class="feature col border rounded border-white p-4">
            <h3 class="fs-2">Corte de cabello y afeitado tradicional italiano</h3>
            <p class="fs-8 text-secondary">($5800 abonando en efectivo.) Corte de cabello con lavado incluido y productos para el cuidado del cabello. Afeitado clásico tradicional a navaja (rasurado completo) toallas calientes,frías, cremas para el cuidado de la piel. todos nuestros servicios incluyen café expreso Segrafredo o cerveza de cortesía.</p>
            <a href="turnos.php" class="icon-link">
            Reservar turno
            </a>
        </div>
    </div>
    </section>
</article>



<?php
include 'footer.php';
?>