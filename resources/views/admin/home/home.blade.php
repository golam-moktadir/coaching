@extends('admin.master')
@section('main-content')
<!--Slider Start-->
<section class="container-fluid">
    <div class="row">
        <div class="col-12 pl-0 pr-0">
            <div class="owl-carousel">
                @foreach($slides as $slide)
                 <div class="item"><img src="{{url('admin/assets/slider/'.$slide->slide_image)}}" alt=""></div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!--Slider End-->
@endsection