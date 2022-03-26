<div class="row p-3" style="max-height:500px; overflow:auto;border-top: 1px solid #dee2e6;">
    <div class="col-md-12">
        @foreach($sales as $sale)
            <div class="n-chk">
                <label class="new-control new-radio square-radio new-radio-text radio-success">
                  <input type="radio" class="new-control-input selected_item" name="selected_sale" data-sale_id="{{$sale->id}}" 
                    @if($course->has_sale($sale->id)) checked @endif
                  >
                  <span class="new-control-indicator"></span>
                  <span class="new-radio-content"><span class="px-2">{{ $sale->name }}</span><span class="px-2">{{$sale->discount}}%</span></span>
                </label>
            </div>
        @endforeach
        
    </div>
</div>