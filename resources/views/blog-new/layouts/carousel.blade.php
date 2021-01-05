<div id="focusslide" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @for($i = 0 ; $i< $rotaryMaps->count(); $i++ )
        <li data-target="#focusslide" data-slide-to="{{$i}}"
            @if($i == 0) class="active" @endif></li>
        @endfor
    </ol>
    <div class="carousel-inner" role="listbox">
        @foreach($rotaryMaps as $k => $item)
        <div class="item @if($k == 0) active @endif">
            <a href="{{$item['url']}}" target="_blank">
                <img
                    src="{{$storage->url($item->thumbnail('small','image'))}}"
                    alt="{{$item['name']}}"
                    class="img-responsive"/>
            </a>
            <div class="carousel-caption"></div>
        </div>
        @endforeach
    </div>
</div>
