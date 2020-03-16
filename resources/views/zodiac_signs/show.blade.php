@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $zodiacSign->name }}</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th width="120px" class="text-center">運勢名稱</th>
                                <th width="60px" class="text-center">分數</th>
                                <th>描述</th>
                                <th>日期</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contents as $content)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td class="text-center">{{ $content->horoscope->name }}</td>
                                    <td class="text-center">{{ $content->score }}</td>
                                    <td>{{ $content->description }}</td>
                                    <td>{{ $content->created_at }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $contents->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
