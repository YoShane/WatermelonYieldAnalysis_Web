@extends('layouts.master')
@section('title', 'Watermelon yield analysis')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="wow fadeIn">
  <div class="hero-container">
    <h1>Welcome to watermelon yield analysis</h1>
    <h2>We using object detective AI(RetinaNet) to compute watermelon in your field...</h2>
    <img src="{{ asset('img/hero-img.png') }}" alt="Hero Imgs">
    <a href="#get-started" class="btn-get-started scrollto">Get Started</a>
  </div>
</section><!-- End Hero Section -->

<main id="main">

  <!-- ======= Get Started Section ======= -->
  <section id="get-started" class="padd-section text-center wow fadeInUp">

    @guest
    <div class="container">
      <div class="section-title text-center">
        <h2>Free trai now</h2>
        <p class="separator">Watermelon field aerial photo upload</p>
      </div>
    </div>

    <div class="container">
      <div class="row justify-content-center">

        <div class="col-lg-3 col-md-4">

          <div class="info">
            <div>
              <i class="fa fa-address-book"></i>
              <p>This's a free trial,<br>To experience advanced functions, please log in.</p>
            </div>

            <div>
              <i class="fa fa-arrows"></i>
              <p>Picture auto split is disenable,<br>If your watermelon are small that will be recognition errors.</p>
            </div>

            <div>
              <i class="fa fa-file-photo-o"></i>
              <p>Picture limit 15MB,<br>Press upload to output the result in the pop-up window.</p>
            </div>

            <div>
              <i class="fa fa-crosshairs"></i>
              <p>This identification's only applicable to aerial photos and actual recent photos</p>
            </div>
          </div>

        </div>

        <div class="col-lg-5 col-md-8">
          <div class="form">
            <form action="http://163.18.42.219:5000/upload" id="uploadForm" method="post" role="form" enctype="multipart/form-data" class="php-email-form">

              <span>Click the choose file button to start</span>
              <!-- Upload image input-->
              <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                <input id="upload" type="file" name="file" onchange="readURL(this);" class="form-control border-0" required>
                <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                <div class="input-group-append">
                  <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                </div>
              </div>

              <!-- Uploaded image area-->
              <div class="image-area mt-0"><img id="imageResult" src="#" alt="" class="img-fluid rounded mx-auto d-block"></div>


              <div class="mb-3">
                <div class="loading">Analysis...</div>
                <div class="error-message"></div>
                <div class="sent-message">Analysis completed</div>
              </div>
              <input type="hidden" name="user" value="">
              <div class="text-center"><button type="submit">Upload</button></div>
            </form>
          </div>
        </div>
      </div>
    </div>
    @else
    <div class="container">
      <div class="section-title text-center">
        <h2>Try Yield analysis API</h2>
        <p class="separator">Watermelon field aerial photo upload</p>
      </div>
    </div>

    <div class="container">
      <div class="row justify-content-center">

        @if (!$isNull)
        <div class="col-lg-3 col-md-4 bg-white rounded box-shadow">
          <h6 class="border-bottom border-gray pb-2 mb-0">Recent updates</h6>
          <!-- Upload Record-->

          @isset($list3)
          <div class="media text-muted pt-3" id="list">
            <img src="http://163.18.42.219:5000/pic/{{ $list3->picName }}" alt="" class="mr-2 rounded img-fluid">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Amount：{{ $list3->count }}</strong>
              <span id="priceList">NTD$ {{ $list3->priceRange }} </span><br>
              <span id="totalTimeList">Process Time: {{ $list3->totalTime }}</span ><br>
              <span id="recTimeList" style="display:none">Recognition time: {{ $list3->processTime }}</span>
              <span id="picList" style="display:none">{{ $list3->picName }}</span ></div>
          @endisset

          @isset($list2)
          <div class="media text-muted pt-3" id="list">
            <img src="http://163.18.42.219:5000/pic/{{ $list2->picName }}" alt="" class="mr-2 rounded img-fluid">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Amount：{{ $list2->count }}</strong>
              <span id="priceList">NTD$ {{ $list2->priceRange }} </span><br>
              <span id="totalTimeList">Process Time: {{ $list2->totalTime }}</span><br>
              <span id="recTimeList" style="display:none">Recognition time: {{ $list2->processTime }}</span>
              <span id="picList" style="display:none">{{ $list2->picName }}</span></div>
          @endisset

          @isset($list1)
          <div class="media text-muted pt-3" id="list">
            <img src="http://163.18.42.219:5000/pic/{{ $list1->picName }}" alt="" class="mr-2 rounded img-fluid">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Amount：{{ $list1->count }}</strong>
              <span id="priceList">NTD$ {{ $list1->priceRange }} </span><br>
              <span id="totalTimeList">Process Time: {{ $list1->totalTime }}</span><br>
              <span id="recTimeList" style="display:none">Recognition time: {{ $list1->processTime }}</span>
              <span id="picList" style="display:none">{{ $list1->picName }}</span></div>
          @endisset

          <div id="showNew"></div>
          <small class="d-block text-right mt-3">
            <a href="{{ route('record') }}">All updates</a>
          </small>
        </div>
        @else
        <div class="col-lg-3 col-md-4" id="instruction">

          <div class="info">
            <div>
              <i class="fa fa-address-book"></i>
              <p>This's a PRO version,<br>You can experience advanced functions.</p>
            </div>

            <div>
              <i class="fa fa-arrows"></i>
              <p>Picture auto split is enable,<br>If your watermelon are small that need to set scale.</p>
            </div>

            <div>
              <i class="fa fa-file-photo-o"></i>
              <p>Picture limit 15MB,<br>Press upload to output the result in the pop-up window and DB.</p>
            </div>

            <div>
              <i class="fa fa-crosshairs"></i>
              <p>This identification's only applicable to aerial photos and actual recent photos</p>
            </div>
          </div>

        </div>
        @endif

        <div class="col-lg-5 col-md-8">
          <div class="form">
            <form action="http://163.18.42.219:5000/upload" id="uploadForm" method="post" role="form" enctype="multipart/form-data" class="php-email-form">

              <span>Click the choose file button to start</span>
              <!-- Upload image input-->
              <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                <input id="upload" type="file" name="file" onchange="readURL(this);" class="form-control border-0" required>
                <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                <div class="input-group-append">
                  <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                </div>
              </div>

              <!-- Uploaded image area-->
              <div class="image-area mt-0"><img id="imageResult" src="#" alt="" class="img-fluid rounded mx-auto d-block"></div>


              <div class="mb-3">
                <div class="loading">Analysis...</div>
                <div class="error-message"></div>
                <div class="sent-message">Analysis completed</div>
              </div>

              <input type="hidden" name="user" value="{{ Auth::user()->email }}">
              <div class="text-center"><button type="submit">Upload</button></div>
            </form>
          </div>
        </div>
      </div>
    </div>

    @endguest

  </section><!-- End Get Started Section -->

  <!-- ======= About Us Section ======= -->
  <section id="about-us" class="about-us padd-section wow fadeInUp">
    <div class="container">
      <div class="section-title text-center">
        <h2>Amazing Features</h2>
        <p class="separator">Integer cursus bibendum augue ac cursus .</p>
      </div>
    </div>

    <div class="container">
      <div class="row">

        <div class="col-xs-6 col-sm-4">
          <div class="feature-block">
            <img src="{{ asset('img/svg/object.svg') }}" alt="img" class="img-fluid">
            <h4>Object Detection</h4>
            <p>In this system, CNN is used to build a set of basic learning model, 
              and ResNet technology is used to improve the recognition 
              degree of the model by constantly raising watermelon pictures.</p>
          </div>
        </div>
        <div class="col-xs-6 col-sm-4">
          <div class="feature-block">
            <img src="{{ asset('img/svg/user.svg') }}" alt="img" class="img-fluid">
            <h4>CRM</h4>
            <p>We provide membership system, 
              so that members can not only view the history,
              but also provide high-resolution picture of watermelon field analysis</p>
          </div>
        </div>
        <div class="col-xs-6 col-sm-4">
          <div class="feature-block">
            <img src="{{ asset('img/svg/search.svg') }}" alt="img" class="img-fluid">
            <h4>Data analysis</h4>
            <p>After the user transmits the picture of the watermelon field,
               we will automatically capture the sales amount in the 
               current market in the background, and make an estimate 
               of the output value of the watermelon field in the picture.</p>
          </div>
        </div>

      </div>
      <div class="row">

        <div class="col-xs-6 col-sm-4">
          <div class="feature-block">
            <img src="{{ asset('img/svg/pencil.svg') }}" alt="img" class="img-fluid">
            <h4>Easy to use</h4>
            <p>We provide a UI that is comfortable and esay using.</p>
          </div>
        </div>
        <div class="col-xs-6 col-sm-4">
          <div class="feature-block">
            <img src="{{ asset('img/svg/database.svg') }}" alt="img" class="img-fluid">
            <h4>Server construction and maintenance</h4>
            <p>The AI detective is working on our private server. If you pay for membership that we also give warranty.</p>
          </div>
        </div>
        <div class="col-xs-6 col-sm-4">
          <div class="feature-block">
            <img src="{{ asset('img/svg/code.svg') }}" alt="img" class="img-fluid">
            <h4>Clean codes</h4>
            <p>Our coding experience are over 5 year then We know how to build a nice code and easy to maintain.</p>
          </div>
        </div>

      </div>
    </div>

  </section><!-- End About Us Section -->

 <!-- ======= Video Section ======= -->
 <section id="video" class="padd-section text-center wow fadeInUp">
      <div class="overlay">
        <div class="container-fluid container-full">

          <div class="row">
            <a href="#" class="js-modal-btn play-btn" data-video-id="LPtRBuy3dO8"></a>
          </div>

        </div>
      </div>
    </section><!-- End Video Section -->

  <!-- ======= Team Section ======= -->
  <section id="team" class="padd-section text-center wow fadeInUp">

    <div class="container">
      <div class="section-title text-center">

        <h2>Team Member</h2>
        <p class="separator">We come form KMS LAB.</p>

      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-4 col-lg-3">
          <div class="team-block bottom">
            <img src="{{ asset('img/team/1.jpg') }}" class="img-responsive" alt="img">
            <div class="team-content">
              <span>Professor</span>
              <h4>Sam/周棟祥 老師</h4>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-md-4 col-lg-3">
          <div class="team-block bottom">
            <img src="{{ asset('img/team/2.jpg') }}" class="img-responsive" alt="img">
            <div class="team-content">
              <span>Student</span>
              <h4>Shane/陳佑昇</h4>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-md-4 col-lg-3">
          <div class="team-block bottom">
            <img src="{{ asset('img/team/3.jpg') }}" class="img-responsive" alt="img">
            <div class="team-content">
              <span>Student</span>
              <h4>Lucky/陳風熏</h4>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section><!-- End Team Section -->

  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="model" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Object detection results</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="#" id="output_img" class="rounded">
          <hr>
          <div id="count"></div>
          <div id="price"></div>
          <div id="processTime"></div>
          <div id="totalProcessTime"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


</main><!-- End #main -->
@endsection