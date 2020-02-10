@if ($paginator->hasPages())
    <nav  >
       
        <ul class="pagination" style="justify-content: center; font-family: Vegur, 'PT Sans', Verdana, sans-serif;" >
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true"  aria-label="@lang('pagination.previous')" style="background-color:#5c2583; border-radius: 10px; color: white;">
                    <span class="page-link" aria-hidden="true" style="background-color:#5c2583; border-radius: 10px; color: white;">&lsaquo;</span>
                </li>
            @else
                <li class="page-item" style="background-color:#5c2583; border-radius: 10px; color: white;">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" style="background-color:#5c2583; border-radius: 10px; color: white;">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link" style="background-color:#5c2583; border-radius: 10px; color: white;">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item" aria-current="page"><span class="page-link" style="background-color:#C63491 !important; border-radius: 10px; color: white;" >{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}" style="background-color:#5c2583; border-radius: 10px; color: white;">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item" >
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" style="background-color:#5c2583; border-radius: 10px; color: white;">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')" style="background-color:#5c2583; border-radius: 10px; color: white;">
                    <span class="page-link" aria-hidden="true" style="background-color:#5c2583; border-radius: 10px; color: white;">&rsaquo;</span>
                </li>
            @endif
        </ul>
   
    </nav>
@endif
