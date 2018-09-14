@extends ('layouts.adminNav')

@section('content')

  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h4 class="text-themecolor">Homepage</h4>
    </div>
  </div>
  <iframe src="/admin/homepageView" class="container-fluid" style="height: 500px; padding: 0;" >
  </iframe>
@endsection
