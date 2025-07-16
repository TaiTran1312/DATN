@extends('user')

@section('body')
<style>
.zoom-img {
    transition: transform 0.3s ease;
}


   .zoom-img:hover {
    transform: scale(1.1);
   }
    .pagination {
        justify-content: center;
    }
.pagination .page-link {
        border-radius: 50px !important;
        margin: 0 4px;
        color: #333;
    }

    .pagination .active .page-link {
        background-color: #f58020;
        border-color: #f58020;
        color: white;
    }


</style>

<!-- Booking Form -->
<div class="container text-center py-4 bg-dark text-white">
    <form class="row g-2 justify-content-center">
        <div class="col-md-2">
            <input type="date" class="form-control" placeholder="Check-in">
        </div>
        <div class="col-md-2">
            <input type="date" class="form-control" placeholder="Check-out">
        </div>
        <div class="col-md-2">
            <select class="form-control">
                <option selected>Guests</option>
                <option>1</option>
                <option>2</option>
                <option>3+</option>
            </select>
        </div>
        <div class="col-md-2">
            <button class="btn btn-light w-100">SEARCH ROOM</button>
        </div>
    </form>
</div>

<!-- Discover the Legend -->
<div class="container my-5">
    <div class="row align-items-center">
        <div class="col-md-6 text-center text-md-start">
            <h2 class="fw-bold">DISCOVER THE LEGEND</h2>
            <p class="text-warning fs-5 fw-semibold">Creating A Meaningful Journey With Us</p>
            <p>
                The Reverie is a 5-star hotel and dedicated service to help you write a wonderful journey.
                Located in the heart of Saigon with elegant architecture, modern amenities, and top-tier service.
            </p>
        </div>
        <div class="col-md-6 text-center">
            <img src="{{ asset('img/1.png') }}" class="img-fluid rounded" alt="Model 1">
        </div>
    </div>
</div>

<!-- Room Types -->
<div class="container my-5">
    <h3 class="section-title text-center">Explore Our Rooms</h3>
    <div class="row text-center g-4">
        @foreach ($rooms as $room)
            <div class="col-md-3">
                <a href="{{ route('room.show', $room->room_id) }}">
                    <img src="{{ asset('img/' . $room->image) }}" alt="{{ $room->name }}" class="img-fluid rounded shadow-sm zoom-img">
                </a>
                <h5 class="mt-3">{{ $room->name }}</h5>
                <p class="text-muted">{{ number_format($room->price, 0, ',', '.') }}đ/đêm</p>
            </div>
        @endforeach
    </div>

    <!-- Phân trang -->
    <div class="mt-4 d-flex justify-content-center">
        {{ $rooms->links() }}
    </div>
</div>

<!-- Experiences -->
<div class="container my-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <img src="{{ asset('img/2.jpg') }}" class="img-fluid rounded" alt="">
        </div>
        <div class="col-md-6">
            <h4>A pleasant stay</h4>
            <p>All rooms are fully equipped with top-class amenities, giving you a comfortable and elegant stay in Saigon.</p>
            <a href="#" class="btn btn-outline-dark">See more</a>
        </div>
    </div>
    <div class="row align-items-center mt-5">
        <div class="col-md-6 order-md-2">
            <img src="{{ asset('img/3.jpg') }}" class="img-fluid rounded" alt="">
        </div>
        <div class="col-md-6 order-md-1">
            <h4>An exquisite of flavor</h4>
            <p>Enjoy delicious cuisine from international chefs in a luxurious and romantic setting.</p>
            <a href="#" class="btn btn-outline-dark">See more</a>
        </div>
    </div>
</div>

<!-- Hotel Room Slider -->
<div class="container-fluid py-5" style="background: url('{{ asset('img/mountain.jpg') }}') center/cover no-repeat;">
    <h3 class="text-center text-white fw-bold mb-4">HOTEL ROOM</h3>

    <div id="hotelRoomCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row justify-content-center">
                    @php
                        $sliderRooms = [
                            ['img' => '2.jpg', 'title' => 'SUPERIOR ROOM', 'desc' => 'A spacious room with comfortable bed, work station, and elegant modern furnishings. Ideal for solo or couple travelers.'],
                            ['img' => '3.jpg', 'title' => 'DELUXE ROOM', 'desc' => 'Enjoy spacious space and convenience in this well-designed room for up to 3 guests. Includes desk, minibar, and private balcony.'],
                            ['img' => '2.jpg', 'title' => 'PREMIER ROOM', 'desc' => 'Fully soundproofed, this room is ideal for both productivity and relaxation, with plush seating area and modern bathroom.'],
                        ];
                    @endphp
                    @foreach ($sliderRooms as $room)
                    <div class="col-md-3">
                        <div class="card">
                            <img src="{{ asset('img/' . $room['img']) }}" class="card-img-top" alt="{{ $room['title'] }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $room['title'] }}</h5>
                                <p class="card-text">{{ $room['desc'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#hotelRoomCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#hotelRoomCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>

@endsection
