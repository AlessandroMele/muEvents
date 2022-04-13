@if ($paginator->lastPage() != 1)
<div id="pagination">
    <p>{{ $paginator->firstItem() }} - {{ $paginator->lastItem() }} di {{ $paginator->total() }} --- </p>

    <!-- Link alla prima pagina -->
    @if (!$paginator->onFirstPage())
        <a href="{{ $paginator->url(1) }}"> Inizio </a> |
    @else
        <p class="inactive"> Inizio | </p>
    @endif

    <!-- Link alla pagina precedente -->
    @if ($paginator->currentPage() != 1)
        <a href="{{ $paginator->previousPageUrl() }}"> &lt; Precedente </a> |
    @else
    <p class="inactive"> &lt; Precedente | </p>
    @endif

    <!-- Link alla pagina successiva -->
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}"> Successivo &gt; </a> |
    @else
        <p class="inactive"> Successivo &gt; | </p>
    @endif

    <!-- Link all'ultima pagina -->
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->url($paginator->lastPage()) }}"> Fine </a>
    @else
       <p class="inactive"> Fine </p>
    @endif
</div>
@endif