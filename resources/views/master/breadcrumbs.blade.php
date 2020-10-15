<div class="container">
    @dd($test)
    <div class="bread-crumbs">
        <ul>
            <li><a href="{{url('/')}}">Главная</a></li>
{{--            @foreach($breadcrumbs as $breadcrumb)--}}
{{--                <li>|</li>--}}
{{--                <li>--}}
{{--                    @empty($breadcrumb['href'])--}}
{{--                        <span>{{$breadcrumb['title']}}</span>--}}
{{--                    @else--}}
{{--                        <a href="{{$breadcrumb['href']}}">{{$breadcrumb['title']}}</a>--}}
{{--                    @endempty--}}
{{--                </li>--}}
{{--            @endforeach--}}
        </ul>
    </div>
</div>