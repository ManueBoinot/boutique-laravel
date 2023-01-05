@if ($promo)

<div class="text-center py-2 sticky-top"
    style="background: rgb(255,225,64);
background: radial-gradient(circle, rgba(252,235,145,1) 0%, rgba(255,225,64,1) 100%); color: black; z-index: 1;">
    <h2>PROMOTION SPÉCIALE " <span class="text-uppercase fs-1 fw-bold">{{$promo->nom}}</span> "<span class="fst-italic">- Du {{date('d-m-Y', strtotime($promo->date_debut))}} au
            {{date('d-m-Y', strtotime($promo->date_fin))}}</span></h2>
    <h3><span class="fw-bold fs-1">-{{$promo->reduction}}%</span> sur une sélection de produits ! <button type="button" class="btn btn-warning ms-3 fs-5 fw-bold">Voir la sélection</button> </h3>

</div>
@endif