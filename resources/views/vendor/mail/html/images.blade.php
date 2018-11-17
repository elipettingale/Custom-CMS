<table class="images" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        @foreach($images as $image)
            <td class="image">
                @if(isset($image['href']))
                    <a href="{{ $image['href'] }}">
                        <img src="{{ $image['src'] }}">
                    </a>
                @else
                    <img src="{{ $image['src'] }}">
                @endif
            </td>
        @endforeach
    </tr>
</table>