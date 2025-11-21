@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Botón anterior --}}
        @if ($paginator->onFirstPage())
            <li class="disabled">
                <span class="page-circle prev">&lt;</span>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" class="page-circle prev">&lt;</a>
            </li>
        @endif

        {{-- Botón siguiente --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" class="page-circle next">&gt;</a>
            </li>
        @else
            <li class="disabled">
                <span class="page-circle next">&gt;</span>
            </li>
        @endif
    </ul>
@endif
