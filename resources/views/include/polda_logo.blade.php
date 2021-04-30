<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    @foreach ($poldaAtas as $key => $val)
        <a href="{{ route('korlantas_open_polda', $val->short_name) }}">
            <div class="cols-sm-1">
                <div class="grid-polda line @if (empty($val->dailyInput)) glowred @else glowblue @endif">
                    <p>{{ $val->short_name }}</p>
                    <img src="{{ asset('/img/polda/'.$val->logo) }}">
                </div>
            </div>
        </a>
    @endforeach
</div>

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing mt-1 mb-n2">
    @foreach ($poldaBawah as $key => $val)
        <a href="{{ route('korlantas_open_polda', $val->short_name) }}">
            <div class="cols-sm-1">
                <div class="grid-polda line @if (empty($val->dailyInput)) glowred @else glowblue @endif">
                    <p>{{ $val->short_name }}</p>
                    <img src="{{ asset('/img/polda/'.$val->logo) }}">
                </div>
            </div>
        </a>
    @endforeach
</div>