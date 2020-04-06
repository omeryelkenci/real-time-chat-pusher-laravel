<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet"


	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<style>
		.chat {
			list-style: none;
			margin: 0;
			padding: 0;
		}

		.chat li {
			margin-bottom: 10px;
			padding-bottom: 5px;
			border-bottom: 1px dotted #B3A9A9;
		}

		.chat li .chat-body p {
			margin: 0;
			color: #777777;
		}

		.panel-body {
			overflow-y: scroll;
			height: 350px;
		}

		::-webkit-scrollbar-track {
			-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
			background-color: #F5F5F5;
		}

		::-webkit-scrollbar {
			width: 12px;
			background-color: #F5F5F5;
		}

		::-webkit-scrollbar-thumb {
			-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
			background-color: #555;
		}
	</style>

	<style>
		.container{max-width:1170px; margin:auto;}
		img{ max-width:100%;}
		.inbox_people {
			background: #f8f8f8 none repeat scroll 0 0;
			float: left;
			overflow: hidden;
			width: 40%; border-right:1px solid #c4c4c4;
		}
		.inbox_msg {
			border: 1px solid #c4c4c4;
			clear: both;
			overflow: hidden;
		}
		.top_spac{ margin: 20px 0 0;}


		.recent_heading {float: left; width:40%;}
		.srch_bar {
			display: inline-block;
			text-align: right;
			width: 60%; padding:
		}
		.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

		.recent_heading h4 {
			color: #05728f;
			font-size: 21px;
			margin: auto;
		}
		.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
		.srch_bar .input-group-addon button {
			background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
			border: medium none;
			padding: 0;
			color: #707070;
			font-size: 18px;
		}
		.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

		.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
		.chat_ib h5 span{ font-size:13px; float:right;}
		.chat_ib p{ font-size:14px; color:#989898; margin:auto}
		.chat_img {
			float: left;
			width: 11%;
		}
		.chat_ib {
			float: left;
			padding: 0 0 0 15px;
			width: 88%;
		}

		.chat_people{ overflow:hidden; clear:both;}
		.chat_list {
			border-bottom: 1px solid #c4c4c4;
			margin: 0;
			padding: 18px 16px 10px;
		}
		.inbox_chat { height: 550px; overflow-y: scroll;}

		.active_chat{ background:#ebebeb;}

		.incoming_msg_img {
			display: inline-block;
			width: 6%;
		}
		.received_msg {
			display: inline-block;
			padding: 0 0 0 10px;
			vertical-align: top;
			width: 92%;
		}
		.received_withd_msg p {
			background: #ebebeb none repeat scroll 0 0;
			border-radius: 3px;
			color: #646464;
			font-size: 14px;
			margin: 0;
			padding: 5px 10px 5px 12px;
			width: 100%;
		}
		.time_date {
			color: #747474;
			display: block;
			font-size: 12px;
			margin: 8px 0 0;
		}
		.received_withd_msg { width: 57%;}
		.mesgs {
			float: left;
			padding: 30px 15px 0 25px;
			width: 60%;
		}

		.sent_msg p {
			background: #05728f none repeat scroll 0 0;
			border-radius: 3px;
			font-size: 14px;
			margin: 0; color:#fff;
			padding: 5px 10px 5px 12px;
			width:100%;
		}
		.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
		.sent_msg {
			float: right;
			width: 46%;
		}
		.input_msg_write input {
			background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
			border: medium none;
			color: #4c4c4c;
			font-size: 15px;
			min-height: 48px;
			width: 100%;
		}

		.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
		.msg_send_btn {
			background: #05728f none repeat scroll 0 0;
			border: medium none;
			border-radius: 50%;
			color: #fff;
			cursor: pointer;
			font-size: 17px;
			height: 33px;
			position: absolute;
			right: 0;
			top: 11px;
			width: 33px;
		}
		.messaging { padding: 0 0 50px 0;}
		.msg_history {
			height: 516px;
			overflow-y: auto;
		}
	</style>
</head>
<body>
	<div id="app">
		<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
			<div class="container">
				<a class="navbar-brand" href="{{ url('/') }}">
					{{ config('app.name', 'Laravel') }}
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav mr-auto">

					</ul>

					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav ml-auto">
						<!-- Authentication Links -->
						@guest
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
						</li>
						@if (Route::has('register'))
						<li class="nav-item">
							<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
						</li>
						@endif
						@else
						<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								{{ Auth::user()->name }} <span class="caret"></span>
							</a>

							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ route('logout') }}"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</div>
					</li>
					@endguest
				</ul>
			</div>
		</div>
	</nav>

	<main class="py-4">
		@yield('content')
	</main>
</div>
</body>
</html>
