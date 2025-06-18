<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Shop') }} --}} Shop
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Lorem, ipsum dolor.</strong>
            </div> --}}
            <div class="row">
                    <div class="col-md-4 mt-2">
                        <div class="card" style="width: 18rem;">

                            <img src="{{asset('uploads/product1.png')}}" class="card-img-top" alt="...">

                            <div class="card-body">
                                <h1 class="card-title" style="font-size: 20px;">Lorem, ipsum.</h1>

                                <h1 class="card-title text-primary" style="font-size: 20px;">Lorem, ipsum dolor.</h1>

                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Id, numquam.</p>
                                
                                <a href="" class="btn btn-danger mt-3">Add to Cart</a>
                            </div>

                        </div>
                    </div>
            </div>
        </div>
    </div>

</x-app-layout>