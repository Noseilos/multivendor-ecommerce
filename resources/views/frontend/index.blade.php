@extends('frontend.master_dashboard')
@section('main')


@include('frontend.home.slider')
        <!--End TV Category -->

@include('frontend.home.featured_category')

@include('frontend.home.banner')

@include('frontend.home.new_product')

@include('frontend.home.featured_product')

<!--Vendor List -->
@include('frontend.home.vendor_list')
<!--End Vendor List -->

@endsection