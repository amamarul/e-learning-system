@extends('shell')

@section('content')

<div class="container">
    <div class="categories">
        <div class="col-sm-4">
            <div class="category-list">
                <h4>Selecteer een categorie</h4>
                <h5>Categorieën</h5>
                <hr>
                <ul>
                    @foreach ($subjects as $subject)
                    <li>
                        <a href="{{ url('/onderwerpen' , $subject->id) }}">{{ $subject->title }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-sm-8 column">
            <div class="courses">
                @if ($selectedSubject)
                @if (count($selectedSubject->courses) > 0)
                <h1>{{ $selectedSubject->title }}</h1>
                <div class="selected-category">
                    <div class="course-list">
                        <ul>
                            @foreach ($selectedSubject->courses as $course)
                            <li class="course-item col">
                                <a href="/{{ str_slug($selectedSubject->title) }}/{{ $course->id }}/{{ str_slug($course->title) }}">
                                    <div class="card">
                                        <h6>Training | {{ $course->completed }}</h6>
                                        <h4 class="line-attr">{{ $course->title }}</h4>
                                        <p>Training over signalering, diagnostiek. begeleiding en (medicatie) behandeling van dwangstoornissen (OCS)</p>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @else
                <h1> </h1>

                Geen training gevonden
                @endif

                @endif
            </div>
        </div>
    </div>
</div>


@endsection
