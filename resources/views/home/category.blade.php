@extends('home.app')

@section('title', 'IENEWS - Category News')

@section('content')
<!-- Main News Start -->
<div class="main-news-category">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <h2><i class="fas fa-align-justify"></i> Berita {{ $category->title }}</h2>
                        <div class="row">
                            @foreach($posts as $post)
                            <div class="col-lg-4 mb-4">
                                <div class="mn-img">
                                    <img src="{{ asset('storage/img/' . $post->image) }}" class="img-fluid"
                                        alt="{{ $post->title }}">
                                </div>
                                <div class="mn-content">
                                    <a class="mn-title"
                                        href="{{ route('detail.post', $post->id) }}">{{ Str::limit($post->title, 35) }}</a>
                                    <a class="mn-date" href=""><i class="far fa-clock"></i>
                                        {{ $post->created_at->format('d-M-Y') }}</a>
                                    <p>{{ Str::limit($post->content, 50) }} <a
                                            href="{{ route('detail.post', $post->id) }}">Baca Selengkapnya</a></p>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        @if ($posts instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        <div class="pagination">
                            <ul class="pagination-list">
                                {{-- Previous Page Link --}}
                                @if ($posts->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                                @else
                                <li class="page-item"><a href="{{ $posts->previousPageUrl() }}" class="page-link"
                                        rel="prev">&laquo;</a></li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($posts->links()->elements[0] as $page => $url)
                                @if ($page == $posts->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                @else
                                <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                                @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($posts->hasMorePages())
                                <li class="page-item"><a href="{{ $posts->nextPageUrl() }}" class="page-link"
                                        rel="next">&raquo;</a></li>
                                @else
                                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                                @endif
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="sidebar">
                    <!-- Popular Posts Widget Start -->
                    <div class="sidebar-widget">
                        <h2><i class="fas fa-fire"></i> Berita Populer</h2>
                        <div class="category">
                            @foreach($popularPosts as $post)
                            <div class="popular-post">
                                <div class="pp-img">
                                    <img src="{{ asset('storage/img/' . $post->image) }}" class="img-fluid"
                                        alt="{{ $post->title }}">
                                </div>
                                <div class="pp-content">
                                    <p>{{ Str::limit($post->title, 35) }} </p>
                                    <a class="pp-date" href=""><i class="far fa-clock"></i>
                                        {{ $post->created_at->format('d-M-Y') }}</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Popular Posts Widget End -->

                    <!-- Categories Widget Start -->
                    <div class="sidebar-widget">
                        <h2><i class="fas fa-align-justify"></i> Kategori</h2>
                        <div class="category">
                            <ul class="fa-ul">
                                @foreach($categories as $cat)
                                <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a
                                        href="{{ route('category.posts', $cat->id) }}"
                                        id="nav-category-{{ $cat->id }}">{{ $cat->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- Categories Widget End -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main News End -->
@endsection