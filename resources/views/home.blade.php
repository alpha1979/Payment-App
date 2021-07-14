@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Make a Payment</div>

                <div class="card-body">
                    <form action="#" method="POST" id= "paymentForm">
                        @csrf
                        <div class="row">
                            <div class="col-auto">
                                <label>How Much are you paying ? </label>
                                <input type="number"
                                        min="5"
                                        step="0.01"
                                        name="value"
                                        class="form-control"
                                        value="{{mt_rand(500,10000)/100}}">
                                        
                            </div>
                            <div class="col-auto">
                                <label>Currency</label>
                                <select class="custom-select" name="currency" required>
                                   @foreach ($currencies as $currency)
                                   <option value="{{$currency->iso}}">{{strtoupper($currency->iso)}}</option>
                                       
                                   @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label>Select the Payment Method</label>
                                <div class="form-group" id="toggler">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            @foreach ($paymentPlatforms as $paymentPlatform)
                                                <label class="btn btn-outline-secondary rounded m-2 p-1"
                                                        data-target="#{{$paymentPlatform->name}}Collapse"
                                                        data-toggle="collapse">

                                                    <input type="radio"
                                                            name="payment_platform"
                                                            value="{{$paymentPlatform->id}}" required>
                                                            <img src="{{asset($paymentPlatform->image)}}" alt="{{$paymentPlatform->name}}" class="img-thumbnail">
                                                </label>
                                            @endforeach
                                    </div>
                                    @foreach ($paymentPlatforms as $paymentPlatform)
                                            <div 
                                                id="{{$paymentPlatform->name}}Collapse"
                                                class="collapse"
                                                data-parent="#toggler">
                                              @includeif ('components.'.strtolower($paymentPlatform->name) .'-collapse')
                                            </div>
                                            @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" id="payBtn" class="btn btn-primary btn-lg">Pay Now</button>
                        </div>
                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
