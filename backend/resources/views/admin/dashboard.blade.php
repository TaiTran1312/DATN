@extends('template.admin')

@section('body')
 <!-- Stats Boxes -->
 <div class="row">
    <div class="col-md-3 mb-3">
      <div class="card-box text-success">
        <h6><i class="fas fa-eye"></i> Total Visits</h6>
        <h4>+10%</h4>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card-box text-danger">
        <h6><i class="fas fa-file-alt"></i> Page Views</h6>
        <h4>-7%</h4>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card-box text-primary">
        <h6><i class="fas fa-user-friends"></i> Unique Visitors</h6>
        <h4>~12%</h4>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card-box text-warning">
        <h6><i class="fas fa-sign-out-alt"></i> Bounce Rate</h6>
        <h4>33%</h4>
      </div>
    </div>
  </div>

  <!-- Map & Visitors -->
  <div class="row">
    <!-- Map -->
    <div class="col-md-8 mb-3">
      <div class="card-box">
        <h6><i class="fas fa-globe-americas"></i> Site Visits by Region</h6>
        <img src="https://upload.wikimedia.org/wikipedia/commons/8/80/World_map_-_low_resolution.svg" alt="World Map" class="map-img">
      </div>
    </div>

    <!-- Visitors Stats -->
    <div class="col-md-4 mb-3">
      <div class="card-box">
        <h6><i class="fas fa-user"></i> Visitors Overview</h6>
        <p><strong>USA</strong>: 100k (50%)</p>
        <div class="progress mb-2">
          <div class="progress-bar bg-info" style="width: 50%"></div>
        </div>

        <p><strong>Europe</strong>: 1M (80%)</p>
        <div class="progress mb-2">
          <div class="progress-bar bg-success" style="width: 80%"></div>
        </div>

        <p><strong>Australia</strong>: 450k (40%)</p>
        <div class="progress mb-2">
          <div class="progress-bar bg-warning" style="width: 40%"></div>
        </div>

        <p><strong>India</strong>: 1B (90%)</p>
        <div class="progress mb-3">
          <div class="progress-bar bg-danger" style="width: 90%"></div>
        </div>

        <hr>
        <p><strong>New Users:</strong> 75%</p>
        <div class="progress mb-2">
          <div class="progress-bar bg-primary" style="width: 75%"></div>
        </div>

        <p><strong>New Purchases:</strong> 50%</p>
        <div class="progress mb-2">
          <div class="progress-bar bg-secondary" style="width: 50%"></div>
        </div>

        <p><strong>Bounce Rate:</strong> 90%</p>
        <div class="progress">
          <div class="progress-bar bg-danger" style="width: 90%"></div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- End Main -->
</div>
</div>
</body>
</html>

@endsection
