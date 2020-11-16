 <!-- start page title -->
 <div class="row">
    <div class="col-12">
      <div class="page-title-box">
        <div class="page-title-right">
          <form class="form-inline">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb bg-light-lighten p-2 mb-0">
                <li class="breadcrumb-item"><a href="/"><i class="uil-home-alt"></i> Home</a></li>
                  <li {{ $attributes->merge(['class' => 'breadcrumb-item ']) }} aria-current="page">{{ $title }}</li>
                  {{ $slot }}
                  </ol>
                </nav>
              </form>
            </div>
            <h4 class="page-title">{{ $pageTitle }}</h4>
          </div>
        </div>
      </div> <!-- end page title -->
      