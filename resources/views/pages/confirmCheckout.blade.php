@extends('layouts.pages')

@section('title', $title)

@section('content')
    <section id="about" class="about">
        <header class="section-header">
            <h3>Confirm Address</h3>
            <hr>
        </header>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <form action="/checkout" method="POST">
                        @csrf
                        <input type="hidden" name="lent_at" value="{{ $cart->lent_at }}">
                        <input type="hidden" name="due_at" value="{{ $cart->due_at }}">
                        <input type="hidden" name="price" value="{{ $cart->book->price }}">
                        <input type="hidden" name="donatur_id" value="{{ $cart->book->user->id }}">
                        <input type="hidden" name="user_id" value="{{ $cart->user_id }}">
                        <input type="hidden" name="book_id" value="{{ $cart->book->id }}">
                        <div class="mb-3">
                          <label for="province" class="col-form-label">Province:</label>
                          <input type="text" name="province" class="form-control" id="province">
                        </div>
                        <div class="mb-3">
                          <label for="city" class="col-form-label">City:</label>
                          <input type="text" name="city" class="form-control" id="province">
                        </div>
                        <div class="mb-3">
                          <label for="postal_code" class="col-form-label">Postal Code:</label>
                          <input type="text" name="postal_code" class="form-control" id="postal_code">
                        </div>
                        <div class="mb-3">
                          <label for="street" class="col-form-label">Street:</label>
                          <input type="text" name="street" class="form-control" id="street">
                        </div>
                        <hr>
                        <div class="row justify-content-end">
                            <div class="col-4">
                                <button type="submit" class="btn btn-sm btn-primary">Checkout</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
