{{-- AFFICHAGE DU BANDEAU PROMO SI PROMO EN COURS SINON MASQUÉ --}}
@if (isset($promo))
    <div class="d-flex text-center justify-content-center gap-5 align-items-center p-2"
        style="background: rgb(255,225,64);
background: radial-gradient(circle, rgba(252,235,145,1) 0%, rgba(255,225,64,1) 100%); color: black; z-index: 1;">

        <h4 class="m-0">Du <span class="fs-3 fw-bold">{{ date('d-m-Y', strtotime($promo->date_debut)) }}</span> au
            <span class="fs-3 fw-bold">{{ date('d-m-Y', strtotime($promo->date_fin)) }}</span>
        </h4>
        <h4 class="m-0">PROMOTION SPÉCIALE " <span class="text-uppercase fs-3 fw-bold">{{ $promo->nom }}</span> "</h4>
        <h4 class="m-0"><span class="fw-bold fs-3">-{{ $promo->reduction }}%</span> sur une sélection de produits !</h4>
        <a href="/campagne" type="button" class="btn btn-warning fs-5 fw-bold">Voir la sélection</a>

    </div>
@endif