<nav class="text-gray-100 text-md mb-4" aria-label="Breadcrumb">
    <ol class="list-reset flex items-center space-x-2">
        @foreach($links as $label => $url)
            <li>
                @if($loop->last)
                    <span class="text-gray-100 font-semibold">{{ $label }}</span>
                @else
                    <a href="{{ $url }}" class="text-gray-100 hover:text-gray-800 font-medium">{{ $label }}</a>
                    <span class="text-gray-100">›</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>