<!-- Left Side Of Navbar -->
<ul>
    @php
        function buildMenu($items, $parent = '')
        {
            foreach ($items as $item) {
                if (isset($item->children)) {
    @endphp
    <li>
        @if($parent)
            <a href="{{ url($parent, $item->url) }}" class="dropdown">
                {{ $item->name }}
            </a>
        @else
            <a href="{{ url($item->url) }}" class="dropdown">
                {{ $item->name }}
            </a>
        @endif
        <ul>
            @php buildMenu($item->children, $item->url) @endphp
        </ul>
    </li>
    @php
        } else {
    @endphp
    <li>
        @if($parent)
            <a href="{{ url($parent, $item->url) }}">{{ $item->name }}</a>
        @else
            <a href="{{ url($item->url) }}">{{ $item->name }}</a>
        @endif
    </li>
    @php
        }
    }
}

buildMenu($menus)
    @endphp
</ul>