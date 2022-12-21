@extends('base.kerangka_panggil')
@section('list_content')
    <div class="container">
        <h1 class="center">Dual sidebars</h1>
        <p class="flow-text">Don't forget to hit the like button if you found this useful.</p>
        <p>
            On an ultra wide screen (21:9), you may want to have the second sidebar of a dual sidebar setup in
            Materialize
            become visible automatically. This method will allow you to do that. The second sidebar behaves like a
            mobile
            sidebar until the window is wide enough that it could obviously safely accomodate it in it's fixed
            state. The
            class <strong>.sidebar-fixed</strong> is added via Javascript.
        </p>
        <p>
            To see this in action resize your window on a very wide screeen. (The breakpoint is set for 1925px).
        </p>
    </div>
@endsection
