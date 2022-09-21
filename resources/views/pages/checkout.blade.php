@extends('layouts.pages')

@section('title', $title)

@section('content')
<section id="about" class="about">
    <header class="section-header">
        <h3>Checkout</h3>
    </header>
    <hr>
    <div class="container">
        @foreach ($lents as $lent)
        <div class="row mb-3">
            <div class="col-4 col-sm-2 col-md-4 col-lg-3">
                <img src="{{ asset('images/' . $lent->book->image) }}" class="img-fluid">
            </div>
            <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                <h4>{{ $lent->book->title }}</h4>
                <span>Lent {{ $lent->lent_at }}</span><br>
                <span>Due {{ $lent->due_at }}</span><br><br>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-8 col-md-8 col-sm-6 col-lg-3">
                @if ($lent->payment_status == 'pending')
                <form action="/payment/confirm" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $lent->id }}">
                    <button id="pay-button" class="btn btn-sm btn-info">CHECK PAYMENT</button>
                    <button type="submit" class="btn btn-sm btn-primary d-inline-block">CONFIRM</button>
                </form>
                @else
                    <button id="pay-button" class="btn btn-sm btn-primary">PAY</button>
                @endif
            </div>
        </div>
        <hr>
        <form action="/payment" id="submit_form" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $lent->id }}">
            <input type="hidden" name="json" id="json_callback">
        </form>
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ $midtransClient }}"></script>
        <script type="text/javascript">
            const payButton = document.querySelector('#pay-button');
            payButton.addEventListener('click', function(e) {
                e.preventDefault();
                snap.pay('{{ $lent->snap_token }}', {
                    // Optional
                    onSuccess: function(result) {
                        document.getElementById('json_callback').value = JSON.stringify(result);
                        $('#submit_form').submit();
                    },
                    // Optional
                    onPending: function(result) {
                        document.getElementById('json_callback').value = JSON.stringify(result);
                        $('#submit_form').submit();
                    },
                    // Optional
                    onError: function(result) {
                        /* You may add your own js here, this is just example */
                        // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                        // console.log(result)
                        document.getElementById('json_callback').value = JSON.stringify(result);
                        $('#submit_form').submit();
                    }
                });
            });
        </script>
        @endforeach
    </div>
</section>
@endsection
