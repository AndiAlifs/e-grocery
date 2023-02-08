<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-center">{{$item->item_name}}</h3>
                </div>
                <div class="row">
                    <div class="col-4">
                        <img src="https://cdn.icon-icons.com/icons2/1678/PNG/512/wondicon-ui-free-parcel_111208.png" alt="" srcset="">
                    </div>
                    <div class="col-8 p-3">
                        <h5 class="mt-4">Price : <b>Rp.  {{$item->price}},-</b> </h5>
                        <p>LIMITED ITEM</p>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium in unde vel officia nobis voluptatum, suscipit quaerat, repudiandae temporibus voluptatem eum voluptas voluptatibus. In aperiam voluptate eius ipsa asperiores explicabo!</p>
                        <p>Notes : Limited Item Sangat Limited</p>
                        <div class="d-flex justify-content-end">
                            <a href="{{route('add_to_cart',$item->item_id)}}" class="float-right btn btn-warning">   BUY  </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
