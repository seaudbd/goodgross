@extends('Layouts.account')

@section('content')
    <div class="row mb-3">
        <div class="col">
            My Posting > <b class="primary_text_color_default ">{{ ucfirst($section) }}</b>
        </div>
    </div>
    @if(count($products) > 0)
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Item Information</th>
                <th>Price Per Unit</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                @php
                    $propertyValues = json_decode($product->property_values);
                @endphp
                <tr>
                    <td>
                        <img src="{{ asset('storage/' . $propertyValues->Image) }}" height="50" width="50" alt="{{ $propertyValues->Title }}"> {{ $propertyValues->Title }}
                    </td>
                    <td>
                        ${{ $propertyValues->{"Price Per Unit"} === null ? '---' : $propertyValues->{"Price Per Unit"} }}
                    </td>
                    <td>
                        {{ $propertyValues->Quantity }}
                    </td>
                    <td>
                        {{ $product->status }}
                    </td>
                    <td>
                        <i class="fas fa-edit fa-2x primary_text_color_default "></i>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @else
        <div class="row">
            <div class="col alert alert-info">
                No Item Found!
            </div>
        </div>
    @endif

@endsection
