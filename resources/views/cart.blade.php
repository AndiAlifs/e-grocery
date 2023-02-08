<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-center">{{__('Cart')}}</h3>
                </div>
                <div class="container">
                    @foreach ($data['items'] as $item)
                        <div class="row">
                            <div class="my-auto text-center col-2">
                                <img src="https://cdn.icon-icons.com/icons2/1678/PNG/512/wondicon-ui-free-parcel_111208.png" alt="" srcset="">
                            </div>
                            <div class="my-auto text-center col-4">
                                <h5 class="mt-4">{{$item->item_name}}</h5>
                            </div>
                            <div class="my-auto text-center col-4">
                                <h5 class="mt-4">Rp. {{$item->price}},-</h5>
                            </div>
                            <div class="my-auto text-center col-2">
                                <a href="{{route('remove_from_cart',$item->item_id)}}" class="float-right btn btn-danger">   {{__('Delete')}}  </a>
                            </div>
                        </div>
                    @endforeach
                    <div class="row text-center mb-4">
                        <div class="col-4 offset-2">
                            <h3 class="my-auto"><b>{{__('Total')}}</b></h3>
                        </div>
                        <div class="col-4">
                            <h3 class="my-auto"><b>Rp. {{$data['total']}},-</b></h3>
                        </div>
                        <div class="col-2">
                            <a href="#" class=" my-auto float-right btn btn-success">   {{__('Checkout')}}  </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
