@extends('layouts.admin')

@section('header')
  <a class="navbar-brand">Products Sorting</a>
@endsection

@section('content')

<div class="container-fluid">

    <div class="card p-3 mt-0">
        <div class="card-header card-header-rose card-header-icon pb-3">
            <div class="card-icon">
                <i class="material-icons">assignment</i>
            </div>
            <button class="btn btn-success btn-sm btn-round" onclick="window.location.reload()">
                Refresh
            </button>
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="table" class="table table-shopping hover">
                    <thead class="thead">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Created At</th>
                        </tr>
                    </thead>
                    <tbody id="tablecontents">
                        @foreach($products as $product)
                            <tr class="row1" data-id="{{ $product->id }}" style="cursor: pointer;">
                                <td class="pl-3"><i class="fa fa-sort"></i></td>
                                <td>{{ $product->order }}</td>
                                <td>{{ $product->title }}</td>
                                <td><img src="{{url('/uploads/Products/'.$product->image)}}" class="img-fluid" style="max-height:60px"></td>
                                <td>{{ date('Y/m/d',strtotime($product->created_at)) }}</td>
                            </tr>
                        @endforeach
                    </tbody>                  
                    </table>
                </div>
            </div>
        </div>
    </div>

</div> <!-- container-fluid -->

<script type="text/javascript">
    $(function () {
        $("#table").DataTable();

        // Move order according to user
        $( "#tablecontents" ).sortable({
            items: "tr",
            cursor: 'move',
            opacity: 0.6,
            update: function() {
                sendOrderToServer();
            }
        });

        function sendOrderToServer() {
            var order = [];

            //User can update orders by moving to top or under
            $('tr.row1').each(function(index,element) {
                order.push({
                    id: $(this).attr('data-id'),
                    position: index+1
                });
            });

            // Ajax POST update
            $.ajax({
                type: "POST", 
                dataType: "json", 
                url: "{{ route('updateProductsOrder') }}",
                data: {
                    order: order,
                    _token: '{{csrf_token()}}'
                },
                success: function(response) {
                    if (response.status == "success") {
                    console.log(response);
                    } else {
                    console.log(response);
                    }
                }
            });
        }
    });
</script>

@endsection