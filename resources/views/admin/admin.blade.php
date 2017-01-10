@extends('angular')

@section('content')

<div class="admin">
    <div class="container">

        <div class="col-sm-12">
            <br>
            @include('partials.flash')
        </div>

        <div class="categories col-sm-6">
            <div class="col-sm-12 card">
                <h2>Nieuws</h2>

                @foreach ($news as $category)
                <div>Nieuws</div>
                @endforeach

                @foreach ($category->children as $child)
                <div>{{ $child->title }}</div>
                @endforeach

                <hr>

                <a class="button" type="button" class="btn" href="/admin/page/edit/{{ $category->id }}">
                    Nieuws beheren
                </a>
            </div>

            <div class="col-sm-12 card">
                <h2>Content</h2>


                @foreach ($content as $item)
                <form id="questions-form" action="/rest/content/update" method="post">

                    <input type="hidden" name="position" value="{{ $item->position }}">
                    <input type="hidden" name="_method" value="put" />

                    <div class="form-group">
                        <label for="sel1">Titel {{ $item->position }}:</label>
                        <input type="text" name="child[title]"class="form-control" value="{{ $item->title }}">
                    </div>

                    <div class="form-group">
                        <label for="sel1">Content top:</label>
                        <textarea name="child[content]"class="form-control">{{ $item->content }}</textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>

                <hr>
                @endforeach


            </div>
        </div>
        <div class="categories col-sm-6">
            <div class="col-sm-12 card">

                <h4>Categorieën</h4>
                <ul>
                    @foreach ($categories as $category)
                    <li>
                        <form id="delete-category-form" action="/rest/categories/delete" method="post">
                            {{ $category->title }}
                            <input type="hidden" name="delete" value="{{ $category->id }}"/>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <button type="submit" class="btn btn-danger btn-xs">Verwijderen</button>
                        </form>

                        <ul>
                            @foreach ($category->courses as $course)
                            <li>
                                <a href="/admin/course/{{ $course->id }}">{{ $course->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>

                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#subject-modal">
                    Categorie toevoegen
                </button>
                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#add-course-modal">
                    Training toevoegen
                </button>
            </div>
        </div>

        <div class="courses hide">
            <h2>Trainingen</h2>
            <ul>
                @foreach ($courses as $course)
                <li>{{ $course->title }}</li>
                @endforeach
            </ul>

            <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#course-modal">
                Toevoegen
            </button>
        </div>

        <div class="questions hide">
            <h2>Vragen</h2>
            <ul>
                @foreach ($questions as $question)
                <li>{{ $question->title }}</li>
                @endforeach
            </ul>

            <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#questions-modal">
                Toevoegen
            </button>
        </div>
    </div>
</div>


@include('shared.add-course-modal')
@include('shared.add-category-modal')
@endsection
