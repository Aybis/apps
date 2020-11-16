    <!-- 
    * Component Layout App
    * title and subTitle can't be null 
    * title | subTitle | Apps
    -->

    <x-layouts.app title="SPPH |" subTitle="{{ $page }}">

        <!-- css or link --> 
       @push('styling')
         
       @endpush
    
       <!-- 
        * Components Page Title and Breadcrumb
        * attribute tittle and pageTitle can't be null
        * if breadcrumb not active just give it null value class=""
        * inside tag can add tags breadcumb 
        <li class="breadcumb-item active" aria-current="page">Name</li>
        -->
       <x-includes.content-header class="" title="SPPH" pageTitle="SPPH">
        <li class="breadcrumb-item active" aria-current="">{{ $page }}</li>
       </x-includes.content-header>
    
    
       <!-- Section Filter Date -->
    
       <!-- End Section Filter Date -->
    
    
        <!--* Section Main Content  -->        
            {{ $slot }}
        <!-- End Main Content -->
    
        <!-- script or extenal js --> 
        @push('scripts')
          
        @endpush
    
    </x-layouts.app>
    