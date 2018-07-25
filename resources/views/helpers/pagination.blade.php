<div id="light-pagination-1" class="pagination pagination-right light-theme simple-pagination">
    <ul class="pagination pagination-right light-theme simple-pagination ">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>{{ __('view/operator.paging.page_previous') }}</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">{{ __('view/operator.paging.page_previous') }}</a></li>
        @endif

    <!-- Pagination Elements -->
        @foreach ($elements as $element)
        <!-- "Three Dots" Separator -->
            @if (is_string($element))
                <li><span class="ellipse clickable">{{ $element }}</span></li>
            @endif

        <!-- Array Of Links -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span class="current">{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

    <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="page-link next">{{ __('view/operator.paging.page_next') }}</a></li>
        @else
            <li class="disabled"><span>{{ __('view/operator.paging.page_next') }}</span></li>
        @endif
    </ul>
</div>
