
@if ($paginator->hasPages())
    <div class="wptb-pagination-wrap text-center">
        <ul class="pagination">
            @if (!$paginator->onFirstPage())
                <li><a class="disabled page-number previous" href="{{ $paginator->previousPageUrl() }}"><i class="bi bi-chevron-left"></i></a></li>
            @endif

                @foreach ($elements as $element)
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li><span class="page-number current">{{ $page }}</span></li>
                            @else
                                <li><a class="page-number" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li><a class="{{ $paginator->nextPageUrl() }}" href="#"><i class="bi bi-chevron-right"></i></a></li>
                @endif
        </ul>
    </div>

@endif

