<div class="modal fade" id="modal-receive-{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="received_quantityLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="received_quantityLabel">Update Stock</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('purchaseitemstatus.update', $purchase_order_item->id)}}" method="POST">                    
                    @csrf
                    @method('PUT')
                    <div class="col-md-12 d-flex justify-content-center">
                        <label class="small mt-2 col-md-6"><h6>Current Quantity</h6></label>
                        <input class="small form-control" type="text" placeholder="{{ $purchase_order_item->product->stock }}" readonly>
                    </div>
                    <div class="col-md-12 d-flex justify-content-center my-3">
                        <label class="small mt-2 col-md-6" for="received_quantity"><h6>Received Quantity<span class="text-danger">*</span></h6></label>
                        <input class="small form-control @error('received_quantity') is-invalid @enderror" id="received_quantity" name="received_quantity" type="text" placeholder="Received Quantity" value="{{ old('received_quantity') }}" autocomplete="off" required/>
                        @error('received_quantity')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="button" class="btn btn-outline-danger mx-2 mt-2 px-5" data-dismiss="modal" data-toggle="modal" data-target="#modal-reject-{{$loop->iteration}}">
                        Reject
                    </button>
                    <button type="submit" class="btn btn-primary mt-2 px-5">Receive</button>
                </form>
            </div>
        </div>
    </div>
</div>
