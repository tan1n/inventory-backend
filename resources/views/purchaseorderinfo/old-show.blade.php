<div class="col-lg-12 card-header mt-n4">
     <form action="{{ route('purchaseorderinfo.show', $purchase_order_info->id) }}" method="GET">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="form-group row align-items-center">
                <label for="row" class="col-auto">Row:</label>
                <div class="col-auto">
                    <select class="form-control" name="row">
                        <option value="10" @if(request('row') == '10')selected="selected"@endif>10</option>
                        <option value="25" @if(request('row') == '25')selected="selected"@endif>25</option>
                        <option value="50" @if(request('row') == '50')selected="selected"@endif>50</option>
                        <option value="100" @if(request('row') == '100')selected="selected"@endif>100</option>
                    </select>
                </div>
            </div> 

            <div class="form-group row align-items-center justify-content-between">
                <label class="control-label col-sm-3" for="search">Search:</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="text" id="search" class="form-control me-1" name="search" placeholder="Search Purchase Order Infos" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text bg-primary"><i class="fa-solid fa-magnifying-glass font-size-20 text-white"></i></button>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </form>
</div>
<th scope="col">Product Id</th>
<td>{{ $purchase_order_item->product_id }}</td>
@php
    $unit = $total_price/$unit_price
@endphp
<td>{{ number_format($unit , 4)}}</td>
<table class="table table-striped align-middle">
    <thead class="thead-light">
        <tr>
            <th scope="col">No.</th>
            <th scope="col">@sortablelink('product_id', 'Product Id')</th>
            <th scope="col">@sortablelink('item', 'Item')</th>
            <th scope="col">@sortablelink('shade', 'Shade')</th>
            <th scope="col">@sortablelink('dimension', 'Dimension')</th>
            <th scope="col">@sortablelink('uom', 'UOM')</th>
            <th scope="col">@sortablelink('color', 'Color')</th>
            <th scope="col">@sortablelink('size', 'Size')</th>
            <th scope="col">@sortablelink('quantity', 'Quantity')</th>
            <th scope="col">@sortablelink('value', 'Value')</th>
            <th scope="col">@sortablelink('style_name', 'Style Name')</th>
            <th scope="col">@sortablelink('count', 'Count')</th>
            <th scope="col">@sortablelink('meter', 'Meter')</th>
            <th scope="col">@sortablelink('quantity_cone', 'Quantity Cone')</th>
            <th scope="col">@sortablelink('unit_price', 'Unit Price')</th>
            <th scope="col">@sortablelink('total_price', 'Total Price')</th>
            <th scope="col">@sortablelink('status', 'Status')</th>
            <th scope="col">@sortablelink('remarks', 'Remarks')</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($purchase_order_items as $purchase_order_item)
        <tr>
            <th scope="row">{{ (($purchase_order_items->currentPage() * (request('row') ? request('row') : 10)) - (request('row') ? request('row') : 10)) + $loop->iteration  }}</th>
            <td>{{ $purchase_order_item->product_id }}</td>
            <td>{{ $purchase_order_item->item}}</td>
            <td>{{ $purchase_order_item->shade  }}</td>
            <td>{{ $purchase_order_item->dimension }}</td>
            <td>{{ $purchase_order_item->uom }}</td>
            <td>{{ $purchase_order_item->color}}</td>
            <td>{{ $purchase_order_item->size}}</td>
            @php
                $quantity =$purchase_order_item->quantity;
            @endphp
            <td>{{$quantity }}</td>
            @php
                $value= $purchase_order_item->value
            @endphp
            <td>{{ number_format($value , 4) }}</td>
            <td>{{ $purchase_order_item->style_name}}</td>
            <td>{{ $purchase_order_item->count}}</td>
            <td>{{ $purchase_order_item->meter}}</td>
            @php
                $quantity_cone= $purchase_order_item->quantity_cone
            @endphp
            <td>{{ number_format($quantity_cone , 4)}}</td>
            @php
                $unit_price= $purchase_order_item->unit_price
            @endphp
            <td>{{ number_format($unit_price , 4)}}</td>
            @php
                $total_price= $purchase_order_item->total_price
            @endphp
            <td>{{ number_format($total_price , 4)}}</td>
            <td>{{ $purchase_order_item->status}}</td>
            <td>{{ $purchase_order_item->remarks}}</td>
            @php
                $unit = $total_price/$unit_price
            @endphp
            <td>{{ number_format($unit , 4)}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $purchase_order_items->links() }}