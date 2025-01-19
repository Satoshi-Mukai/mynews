@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="title">
                                    名前：{{ $lastEdited->name }}
                                </div>
                                <div class="title">
                                    性別：{{ $lastEdited->gender }}
                                </div>
                                <div class="title">
                                    趣味：{{ $lastEdited->hobby }}
                                </div>
                                <div class="title">
                                    自己紹介：
                                </div>
                                <div class="body mt-3">
                                    {{ $lastEdited->introduction }}
                                </div>

                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
            </div>
        </div>
    </div>
    </div>
@endsection
