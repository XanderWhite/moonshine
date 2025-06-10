@if ($paginator->hasPages())
<div class="pagination">
    {{-- Previous Page Link --}}
    @if (!$paginator->onFirstPage())
    <a href="{{ route('news.page', $paginator->currentPage() - 1) }}" class="pagination__link pagination__link_arrow reverse">
        <svg class="pagination__link__svg" viewBox="0 0 16.763 13.322">
            <path d="M13.34 5.66 9.39 1.71a.99.99 0 0 1 0-1.42.996.996 0 0 1 1.41 0l5.66 5.66c.4.39.4 1.02 0 1.41l-5.66 5.66c-.39.4-1.01.4-1.41 0-.4-.4-.4-1.02 0-1.41l3.95-3.95H1c-.57 0-1-.44-1-1s.43-1 1-1h12.34Z" />
        </svg>
    </a>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    @if (is_string($element))
    <span class="pagination__link disabled">{{ $element }}</span>
    @endif

    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <span class="pagination__link active">{{ $page }}</span>
    @else
    <a href="{{ route('news.page', $page) }}" class="pagination__link">
        {{ $page }}
    </a>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <a href="{{ route('news.page', $paginator->currentPage() + 1) }}" class="pagination__link pagination__link_arrow">
        <svg class="pagination__link__svg" viewBox="0 0 16.763 13.322">
            <path d="M3.42 5.66l3.95-3.95a.99.99 0 0 1 0-1.42.996.996 0 0 1 1.41 0l5.66 5.66c.4.39.4 1.02 0 1.41l-5.66 5.66c-.39.4-1.01.4-1.41 0-.4-.4-.4-1.02 0-1.41l3.95-3.95H1c-.57 0-1-.44-1-1s.43-1 1-1h12.34Z" />
        </svg>
    </a>
    @endif
</div>
@endif