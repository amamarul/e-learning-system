@extends('angular')

@section('content')


<div class="course-edit">
    <div class="container">

        <div class="col-sm-4 side-bar">
            <a class="back" href="/admin">« terug</a>
            <h1>{{ $news[0]->title }}</h1>

            <div class="course-description">
                <p>{{ $news[0]->description }}</p>
            </div>

        </div>

        <div class="col-sm-8">
            <div class="course-questions">
                @include('partials.flash')
                <ul>
                    @foreach ($news[0]->children->reverse() as $idx => $child)
                    <li>
                        <a href="/admin/news/{{$child->id}}">
                            <div class="col-sm-12">
                                {{ $child->title }}
                            </div>
                            <div class="col-sm-12">
                                {{ $child->content }}
                            </div>
                        </a>

                    </li>
                    @endforeach
                </ul>

                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#news-item-modal">
                    Bericht toevoegen
                </button>
            </div>
        </div>
    </div>
</div>

@include('shared.add-news-item-modal')
@endsection
