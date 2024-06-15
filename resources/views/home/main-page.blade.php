@extends('home.app')

@section('title', 'IENEWS')

@section('content')
<!-- Top News Start -->
<div class="top-news">
    <div class="container-fluid">
        <div class="row">
            @foreach($topPosts->take(3) as $post)
            <!-- Menampilkan hanya 3 berita terbaru -->
            <div class="col-md-4 tn-left">
                <div class="tn-img">
                    <img src="{{ asset('storage/img/' . $post->image) }}" class="img-fluid" alt="{{ $post->title }}" />
                    <div class="tn-content">
                        <div class="tn-content-inner">
                            <a class="tn-date" href=""><i class="far fa-clock"></i>
                                {{ $post->created_at->format('d-M-Y') }}</a>
                            <a class="tn-title"
                                href="{{ route('detail.post', $post->id) }}">{{ Str::limit($post->title, 20) }}</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Top News End -->

<!-- Category News Start -->
<div class="cat-news">
    <div class="container-fluid">
        <div class="row">
            @foreach($categories as $category)
            <div class="col-md-6">
                <h2><i class="fas fa-align-justify"></i> {{ $category->title }}</h2>
                <div class="row">
                    @foreach($category->publishedPosts->take(3) as $post)
                    <div class="col-md-4">
                        <div class="cn-img">
                            <img src="{{ asset('storage/img/' . $post->image) }}" class="img-fluid"
                                alt="{{ $post->title }}" />
                            <div class="cn-content">
                                <div class="cn-content-inner">
                                    <a class="cn-date" href=""><i class="far fa-clock"></i>
                                        {{ $post->created_at->format('d-M-Y') }}</a>
                                    <a class="cn-title"
                                        href="{{ route('detail.post', $post->id) }}">{{ Str::limit($post->title, 20) }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Category News End -->

<!-- Main News Start -->
<div class="main-news">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="row align-items-center mb-3">
                    <div class="col">
                        <h2><i class="fas fa-align-justify"></i> Berita Terbaru</h2>
                    </div>
                    <div class="col text-right">
                        <a href="{{ route('all.posts') }}" class="btn btn-primary btn-orange">Semua Berita</a>
                    </div>
                </div>
                <div class="row">
                    @foreach($latestPosts->take(6) as $post)
                    <div class="col-lg-6 mb-4">
                        <div class="mn-img">
                            <img src="{{ asset('storage/img/' . $post->image) }}" class="img-fluid"
                                alt="{{ $post->title }}" />
                        </div>
                        <div class="mn-content">
                            <a class="mn-title"
                                href="{{ route('detail.post', $post->id) }}">{{ Str::limit($post->title, 50) }}</a>
                            <a class="mn-date" href=""><i class="far fa-clock"></i>
                                {{ $post->created_at->format('d-M-Y') }}</a>
                            <p>{{ Str::limit($post->content, 100) }} <a
                                    href="{{ route('detail.post', $post->id) }}">Baca Selengkapnya</a></p>
                        </div>
                    </div>
                    @endforeach
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
                        <h2><i class="fas fa-align-justify"></i> Kategori Berita</h2>
                        <div class="category">
                            <ul class="fa-ul">
                                @foreach($categories as $category)
                                <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a
                                        href="{{ route('category.posts', $category->id) }}"
                                        id="nav-category-{{ $category->id }}">{{ $category->title }}</a></li>
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