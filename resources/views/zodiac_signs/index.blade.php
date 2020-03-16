@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($zodiacSigns->chunk(3) as $chunk)
        <div class="row">
            @foreach ($chunk as $zodiacSign)
                <a href="{{ url('zodiac-signs/' . $zodiacSign->id) }}" title="{{ $zodiacSign->name }}">
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ $zodiacSign->name }}</div>

                            <!-- <div class="panel-body"></div> -->
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @endforeach
</div>
@endsection
