@extends('layouts.app')

@section('title', 'Swimming Pool | The Reverie Saigon')

@section('content')
<style>
  .banner img {
    width: 100%;
    height: auto;
  }
  .service-detail {
    max-width: 1000px;
    margin: auto;
    padding: 40px 20px;
  }
  .service-detail img {
    width: 100%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 30px;
  }
  .service-detail h2 {
    font-size: 24px;
    margin-bottom: 10px;
    color: #222;
  }
  .service-detail p {
    font-size: 15px;
    line-height: 1.6;
    margin-bottom: 15px;
  }
  .service-detail .time {
    font-weight: bold;
    color: #444;
    margin-top: 10px;
  }
</style>

<!-- Banner -->
<div class="banner">
  <img src="{{ asset('images/banner-swimming.jpg') }}" alt="Banner dịch vụ">
</div>

<!-- Nội dung chi tiết dịch vụ -->
<section class="service-detail">
  <img src="{{ asset('images/pool.jpg') }}" alt="Swimming Pool">
  <h2>🏊 Swimming Pool</h2>
  <p>Our luxurious pool is spacious and beautifully designed, providing the perfect escape for guests looking to unwind after a long day. The infinity-edge pool offers a breathtaking view of the city skyline, enhancing your relaxation experience.</p>
  <p>Enjoy crystal-clear water, comfortable lounge chairs, and professional poolside service. Whether you're swimming laps or soaking up the sun, our pool area ensures comfort and tranquility.</p>
  <p class="time">Opening Time: 6:00 AM – 10:00 PM (Daily)</p>
</section>
@endsection
