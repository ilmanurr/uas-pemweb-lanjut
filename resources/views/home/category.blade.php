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
                                        href="{{ route('detail.post', $post->id) }}">{{ Str::limit($post->title, 30) }}</a>
                                    <a class="mn-date" href=""><i
                                            class="far fa-clock"></i>{{ $post->created_at->format('d-M-Y') }}</a>
                                    <p>{{ Str::limit($post->content, 50) }} <a
                                            href="{{ route('detail.post', $post->id) }}">Baca Selengkapnya</a></p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-12 text-center mt-3">
                                {{ $allPosts->links() }}
                                <!-- Pagination -->
                            </div>
                        </div>
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
                                    <h3><a class="pp-title"
                                            href="{{ route('detail.post', $post->id) }}">{{ $post->title }}</a></h3>
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