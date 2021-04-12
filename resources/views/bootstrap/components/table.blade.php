<div class="table-responsive">
    @include(CACHelper('styleless')->component('table'), [
        'head' => $head ?? null,
        'body' => $body ?? null,
        'pagination' => $pagination ?? null,
        'count' => $count ?? null,
        'tableClass' => 'table',
        'headClass' => null,
        'trClass' => null,
        'tdClass' => null,
        'paginationClass' => 'pagination',
    ])
</div>