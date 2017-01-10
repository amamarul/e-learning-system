@extends('shell')

@section('content')

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <header>
        <div class="header-image bg" style="background-image: url('/img/header.png')">
            <div class="container">

                <div class="table">
                    <div class="table-cell">
                        @if (Auth::guest())
                        <div class="login-wrapper col-md-4">

                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}
                                <div class="col-md-12">
                                    <h4>inloggen</h4>
                                </div>
                                <div class="col-md-12">
                                    <label>E-mailadres <br>
                                        <input type="email" name="email">
                                    </label>
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label>Wachtwoord <br>
                                        <input id="pasword" type="password" name="password">
                                    </label>
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <input id="remember" type="checkbox">
                                    <label id="remember" for="remember">Onthouden</label>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i> Inloggen
                                    </button>
                                </div>
                            </form>
                        </div>

                        @else

                        <h1>Hallo, {{ Auth::user()->name }}</h1>

                        <a class="btn btn-primary" href="{{ url('/profile') }}">Beginnen</a>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>

<div class="info-top-row">
    <div class="container">
        <div class="col-md-8 col">
            <div class="table">
                <div class="table-cell">
                    <div class="col-md-12">
                        <h1>{{ $content[0]->title }}</h1>
                        <p class="big">
                            {{ $content[0]->content }}
                        </p>
                    </div>

                    <div>
                        @foreach ($news[0]->children->reverse() as $key=>$child)

                            @if ($key < 2)
                                <div class="col-md-6">
                                    <strong>{{ $child->title }}</strong>
                                    <p>
                                        {{ str_limit($child->content, 175) }}
                                    </p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col">
            <div class="table">
                <div class="table-cell">
                    <img src="/img/brains.svg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="info-bottom-row">
    <div class="container">
        <div class="col-md-4 col">
            <div class="table">
                <div class="table-cell">
                    <img src="/img/books.svg" alt="">
                </div>
            </div>
        </div>

        <div class="col-md-8 col">
            <div class="table">
                <div class="table-cell">
                    <div class="col-md-12">
                        <h1>{{ $content[1]->title }}</h1>
                        <p class="big">
                            {{ str_limit($content[1]->content, 300) }}
                        </p>

                        <a href="/onderwerpen" class="btn btn-primary">Begin direct</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
