@foreach($localities as $locality)
    <div class="item">
        <a href="{{url(route('front_area',['name' => $locality->name,'id' => $locality->id]))}}" style="color: #0a7db0">
            <img width="100%" height="208"
                 src="{{url('asset/front/SP/imageSlider/'.$locality->image)}}" alt="{{$locality->name}}">
        </a>
        <p style="margin-left: 10px">
            <strong>Vùng:</strong>
            <a href="#" style="color: #0a7db0">{{$locality->name}}</a>
        </p>
    </div>
@endforeach