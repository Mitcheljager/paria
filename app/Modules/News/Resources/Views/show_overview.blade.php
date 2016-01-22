<h1 class="page-title">Headlines</h1>

@foreach ($newsCollection as $news)
    <article class="news">
        @if ($news->newscat->image)
            <div class="image">
                <a href="{!! 'news/'.$news->id.'/'.$news->slug !!}">
                    <img src="{!! $news->newscat->uploadPath().$news->newscat->image !!}" alt="{{ $news->newscat->title }}">
                </a>
            </div>
        @endif

        <header>
            <h2>{{ $news->title }}</h2>
            <span><time>{{ $news->created_at }}</time> {!! trans('news::written_by') !!} {!! link_to('users/'.$news->creator->id.'/'.$news->creator->slug, $news->creator->username) !!} {!! trans('news::in') !!} {{ $news->newscat->title }}</span>
        </header>
        
        <div class="content">            
            <div class="summary">
                {!! $news->summary !!}
            </div>
        </div>
        <div class="meta">
            <a class="btn btn-default" href="{{ url('news/'.$news->id.'/'.$news->slug) }}">{{ trans('app.read_more') }}</a>
        </div>        
    </article>
@endforeach