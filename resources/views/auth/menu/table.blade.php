@php
    function buildMenu($items, $parent = 1) {
            foreach ($items as $item) {
@endphp
<tr>
    <th scope="row">
        {{$item->id}}
        @if($item->parent_id)
        &rarr;
        {{$item->parent_id}}
        @endif
    </th>
    <td>
        @if($parent > 1)
            {!! str_repeat('&ndash;', $parent - 1) !!}
        @endif
        {{$item->name}}
    </td>
    <td>{{$item->url}}</td>
    <td>{{$item->sort_order}}</td>
    <td>{{$item->status ? 'on' : 'off'}}</td>
    <td>
        <a href="{{route('menu.edit', $item->id)}}"
           class="btn btn-sm btn-primary">Редактировать</a>
        <button type="button"
                onclick="$('#form-delete').attr('action', '{{route('menu.destroy', $item->id)}}').submit();"
                class="btn btn-sm btn-danger">Удалить
        </button>
    </td>
</tr>
@php
    if (isset($item->children)) {
        buildMenu($item->children, $parent + 1);
    }
}
}
buildMenu($menus);
@endphp
