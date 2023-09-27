<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Cart')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="h-100 gradient-custom">
                <div class="container py-5">
                    <div class="row d-flex justify-content-center my-4">
                        <div class="col-md-8">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            <div class="card mb-3">
                                <div class="card-header py-3">
                                    <h5 class="mb-0">Cart - 2 items</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @foreach (Cart::content() as $product)
                                            <div class="col-lg-3 col-md-12 mb-4 mb-lg-3">
                                                <div class="bg-image hover-overlay hover-zoon ripple rounded" data-mdb-ripple-color="light">
                                                    <img src="{{asset($product->options->image)}}" alt="" class="w-100">
                                                    <a href="">
                                                        <div class="mask" style="background-color:  rgba(251, 251, 251, 0.2)"></div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-6 mb-4 mb-lg-3">
                                                <p><strong>{{$product->name}}</strong></p>
                                                <p>Color: red</p>
                                                <p>Size: M</p>
                                                <a href="{{route('remove-product', $product->rowId)}}" class="btn btn-danger btn-sm mb-2 mt-3">remove</a>
                                            </div>

                                            <div class="col-lg-4 col-md-4 mb-4 mb-lg-3">
                                                <div class="d-flex mb-4" style="max-width: 300px">
                                                    <a href="{{ route('qty-decrement', $product->rowId) }}" class="btn btn-primary me-2">-</a>
                                                    <div class="form-outline">
                                                        <input type="number" class="form-control" value="{{$product->qty}}" id="form1" min="0" name="quantity">
                                                    </div>
                                                    <a href="{{ route('qty-increment', $product->rowId) }}" class="btn btn-primary me-2">+</a>
                                                </div>
                                                <p class="text-start text-md-center">
                                                    <strong>${{$product->price}}</strong>
                                                </p>
                                            </div>
                                            <hr class="my-4">
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
