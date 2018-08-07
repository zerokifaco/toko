<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Export | @yield('title')</title>
	<link rel="icon" href="{!! asset('ace/images/avatars/avatar2.png') !!}"/>

    <!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="{{ asset('ace/css/bootstrap.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('ace/font-awesome/4.5.0/css/font-awesome.min.css') }}" />

		<!-- page specific plugin styles -->
		@yield('specific-style')

		<!-- text fonts -->
		<link rel="stylesheet" href="{{ asset('ace/css/fonts.googleapis.com.css') }}" />

		<!-- ace styles -->
		<link rel="stylesheet" href="{{ asset('ace/css/ace.min.css') }}" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="{{ asset('ace/css/ace-part2.min.css') }}" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="{{ asset('ace/css/ace-skins.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('ace/css/ace-rtl.min.css') }}" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="{{ asset('ace/css/ace-ie.min.css') }}" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="{{ asset('ace/js/ace-extra.min.js') }}"></script>

		@yield('style')


</head>
<body class="no-skin">

        @include('layouts.landingPage.navbar')

    <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>



        <div class="main-content">
            <div class="main-content-inner">
                <div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							@section('breadcrumb')
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="/home">Home</a>
							</li>
							@show

						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
				</div>

                <div class="page-content">
                    @include('layouts.landingPage.ace-settings')

                    <div class="page-header">
							<h1>
								@yield('header-title')

							</h1>
					</div><!-- /.page-header -->

                    <div class="row">
                        <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
						<div class="flash-message"></div>

						@yield('content')

                        <!-- END CONTENTS -->
                        </div>
                    </div>

                </div>
            </div>
        </div>

        @include('layouts.landingPage.footer')
        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>

    </div>


    <!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="{{ asset('ace/js/jquery-2.1.4.min.js') }}"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="{{ asset('ace/js/jquery-1.11.3.min.js') }}"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('ace/js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
		</script>
		<script src="{{ asset('ace/js/bootstrap.min.js') }}"></script>

		<!-- page specific plugin scripts -->


		@yield('specific-script')

		<!-- ace scripts -->
		<script src="{{ asset('ace/js/ace-elements.min.js') }}"></script>
		<script src="{{ asset('ace/js/ace.min.js') }}"></script>
		<script type="text/javascript">
            var csrfToken = $('[name="csrf_token"]').attr('content');

            setInterval(refreshToken, 3600000); // 1 hour

            function refreshToken(){
                $.get('refresh-csrf').done(function(data){
                    csrfToken = data; // the new token
                });
            }

            setInterval(refreshToken, 3600000); // 1 hour


        </script>

	@yield('script')
</body>
</html>
