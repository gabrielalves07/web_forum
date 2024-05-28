@if (isset($paginator))
@php
    $queryParams = (isset($appends) && gettype($appends) === 'array' ? '&' . http_build_query($appends) : '');
@endphp
    <nav class="d-flex justify-items-center justify-content-between">
        <div class="d-flex justify-content-between flex-fill">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->isFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">@lang('pagination.previous')</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="?page={{ $paginator->getNumberPreviousPage() }}{{$queryParams}}" rel="prev">@lang('pagination.previous')</a>
                    </li>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->isLastPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">@lang('pagination.next')</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="?page={{ $paginator->getNumberNextpage() }}{{$queryParams}}" rel="next">@lang('pagination.next')</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
@endif
