@extends('layouts.layout')
@section('content')
<div>
    <figure class="highcharts-figure">
        <div id="container"></div>
        <p class="highcharts-description">
            A basic column chart compares rainfall values between four cities.
            Tokyo has the overall highest amount of rainfall, followed by New York.
            The chart is making use of the axis crosshair feature, to highlight
            months as they are hovered over.
        </p>
    </figure>
</div>
<script type="text/javascript">

</script>
@endsection