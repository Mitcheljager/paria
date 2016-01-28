<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Running with Contentify CMS -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="Contentify">
    <meta name="base-url" content="{!! url('/') !!}">
    <meta name="asset-url" content="{!! asset('') !!}">
    <meta name="csrf-token" content="{!! Session::get('_token') !!}">
    <meta name="locale" content="{!! Config::get('app.locale') !!}">
    <meta name="date-format" content="{!! trans('app.date_format') !!}">
    {!! HTML::metaTags($metaTags) !!}
    @if ($openGraph)
        {!! HTML::openGraphTags($openGraph) !!}
    @endif

    @if ($title)
        {!! HTML::title($title) !!}
    @else
        {!! HTML::title(trans_object($controllerName, $moduleName)) !!}
    @endif

    <link rel="icon" type="image/png" href="{!! asset('img/favicon_180.png') !!}"><!-- Opera Speed Dial Icon -->
    <link rel="shortcut icon" type="picture/x-icon" href="{!! asset('favicon.png') !!}">
    <link rel="alternate" type="application/rss+xml" title="RSS News" href="{!! asset('rss/news.xml') !!}">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,800italic,400,600,700,800,300|Amatic+SC:400,700' rel='stylesheet' type='text/css'>

    {!! HTML::style('vendor/font-awesome/css/font-awesome.min.css') !!}
    {!! HTML::style('css/frontend.css') !!}
    {!! HTML::style('css/style.css') !!}


    {!! HTML::jsTranslations() !!}
    <!--[if lt IE 9]>
        {!! HTML::script('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') !!}
        {!! HTML::script('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') !!}
    <![endif]-->
    {!! HTML::script('vendor/jquery/jquery-1.11.3.min.js') !!}
    {!! HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js') !!}
    {!! HTML::script('vendor/contentify/contentify.js') !!}
    {!! HTML::script('vendor/contentify/frontend.js') !!}
</head>
<body>
  <div class="header">
    <div class="wrapper">

      <div class="login">
        @widget('Auth::Login')
      </div>

      <div class="sponsors">
        <img src="/img/budgetSlotsLogo.png" />
        <img src="/img/surgeNetworkLogo.png" />
      </div>

      <div class="logo">
        <a href="{!! route('home') !!}">{!! HTML::image(asset('/img/teamPariaLogo.png')) !!}</a>
      </div>

      <a href="#" class="mobileMenuSelector">Menu</a>

      <ul class="nav">
        <li class="navItem">{!! link_to('/', trans('app.home'), ['class' => 'active']) !!}</li>
        <li class="navItem">{!! link_to('teams', trans('app.object_teams')) !!}</li>
        <li class="navItem">{!! link_to('partners', trans('app.object_partners')) !!}</li>
        <li class="navItem">{!! link_to('matches', trans('app.object_matches')) !!}</li>
        <li class="navItem">{!! link_to('streams', trans('app.object_streams')) !!}</li>
        <li class="navItem">{!! link_to('videos', trans('app.object_videos')) !!}</li>
      </ul>

    </div>
  </div>

    <div class="divider"></div>
    <div class="container">
        <div id="mid-container" class="row">
            <div id="content" class="col-md-8">
                @if (Session::get('_alert'))
                    @include('alert', ['type' => 'info', 'title' => Session::get('_alert')])
                @endif

                <!-- Render JavaScript alerts here -->
                <div class="alert-area"></div>

                <section class="page page-{!! strtolower($controllerName) !!} {!! $templateClass !!}">
                    @if (isset($page))
                        {!! $page !!}
                    @endif
                </section>
            </div>

            <aside id="sidebar" class="col-md-4">
                <div class="border">
                    <h3>
                        {{ trans('app.object_partners') }}
                        <a href="{{ url('partners') }}">{!! HTML::fontIcon('plus') !!}</a>
                    </h3>
                    @widget('Partners::Partners')

                    <br>
                    <h3>
                        {{ trans('app.latest') }} {{ trans('app.object_matches') }}
                        <a href="{{ url('matches') }}" title="{{ trans('app.read_more') }}">{!! HTML::fontIcon('plus') !!}</a>
                    </h3>
                    @widget('Matches::Matches')

                    <br>
                    <h3>
                        {{ trans('app.object_streams') }}
                        <a href="{{ url('streams') }}" title="{{ trans('app.read_more') }}">{!! HTML::fontIcon('plus') !!}</a>
                    </h3>
                    @widget('Streams::Streams')
                </div>
            </aside>
        </div>
    </div>

    <div class="footer">
      <div class="wrapper">
        {!! HTML::image(asset('/img/teamPariaLogoFooter.png')) !!}
        <span><b>Team Paria</b><br/>Copyright &copy; 2016 <br />All rights reserved.</span>
        <ul class="footerNav">
          <li>{!! link_to('/', trans('app.home'), ['class' => 'active']) !!}</li>

          <li>{!! link_to('search', trans('app.object_search')) !!}</li>
          <li>{!! link_to('servers', trans('app.object_servers')) !!}</li>
          <li>{!! link_to('galleries', trans('app.object_galleries')) !!}</li>
          <li>{!! link_to('awards', trans('app.object_awards')) !!}</li>
          <li>{!! link_to('events', trans('app.object_events')) !!}</li>
          <li>{!! link_to('downloads', trans('app.object_downloads')) !!}</li>
          <li>{!! link_to('contact', trans('app.object_contact')) !!}</li>
          <li>{!! link_to('impressum', 'Impressum') !!}</li>
        </ul>
      </div>
    </div>

    {!! Config::get('app.analytics') !!}
</body>
</html>
