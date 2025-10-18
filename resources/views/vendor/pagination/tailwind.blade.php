@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between mt-4">
        {{-- Showing items info --}}
        <p class="text-sm text-gray-700">
            Showing {{ $paginator->firstItem() }}–{{ $paginator->lastItem() }} of {{ $paginator->total() }} results
        </p>

        {{-- Pagination links --}}
        <div class="inline-flex -space-x-px">
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <span class="px-3 py-2 text-gray-400 border border-gray-300 rounded-l-md cursor-default">&laquo;</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-2 text-gray-700 border border-gray-300 rounded-l-md hover:bg-gray-100">&laquo;</a>
            @endif

            {{-- Page Numbers --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="px-3 py-2 text-gray-500 border border-gray-300 cursor-default">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-3 py-2 bg-indigo-600 text-white border border-indigo-600">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="px-3 py-2 text-gray-700 border border-gray-300 hover:bg-gray-100">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-2 text-gray-700 border border-gray-300 rounded-r-md hover:bg-gray-100">&raquo;</a>
            @else
                <span class="px-3 py-2 text-gray-400 border border-gray-300 rounded-r-md cursor-default">&raquo;</span>
            @endif
        </div>
    </nav>
@endif
