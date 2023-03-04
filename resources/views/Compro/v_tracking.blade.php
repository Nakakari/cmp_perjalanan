@extends('Compro.v_main')

@section('konten')
    <section id="content">
        <div class="container">
            <iframe src="{{ route('get-tracking') }}" width="100%" height="500"></iframe>
        </div>
    </section>
@endsection
