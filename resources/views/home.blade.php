<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @php
                        $j=1;
                    @endphp
                    @for ($i = 1;$i <= $data['row'];$i++)
                        <div class="row d-flex justify-content-between">
                            @for ($k = $j;$k<=$j+4;$k++)
                                <div class="col-2 text-center">
                                    <img src="https://cdn.icon-icons.com/icons2/1678/PNG/512/wondicon-ui-free-parcel_111208.png" alt="" srcset="">
                                    <p class="mb-1">{{$data['items'][$k-1]->item_name}}</p>
                                    <a href="{{route('item_detail',$data['items'][$k-1]->item_id)}}">Detail</a>
                                </div>
                            @endfor
                            @php
                                $j+=5;
                            @endphp
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
