@extends('Layouts.frontend')
@section('content')
    <style type="text/css">
        .page_identity_line {
            color: #333333;
        }
        .page_identity_line a {
            color: #999999;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto">


                <div class="row mt-4">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 border-bottom pb-2" style="border-color: #e8f3ed !important;">
                        <div class="page_identity_line">
                            <a href="{{ url('/') }}">Home</a> . Delivery Address
                        </div>
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-4">
                        <div class="text-secondary fw-bold p-2 mb-4" style="background-color: #efefef;">Where to deliver your order?</div>


                        <form id="delivery_address_form">
                            @if($userAccount->type === 'Personal')
                                <div class="row mb-4">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-floating mb-4 mb-sm-0">
                                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{ $userAccountDetails->first_name }}">
                                            <label for="first_name">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="{{ $userAccountDetails->last_name }}">
                                            <label for="last_name">Last Name</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-4">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-floating mb-4 mb-sm-0">
                                            <select class="form-select" name="country_id" id="country_id">
                                                <option value="">Select Country</option>
                                                @foreach($countries as $country)
                                                    @if($country->country === $userCountry)
                                                        <option value="{{ $country->id }}" selected>{{ $country->country }}</option>
                                                    @else
                                                        <option value="{{ $country->id }}">{{ $country->country }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <label for="country_id">Country</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div id="state_field_holder">
                                            <div class="form-floating">
                                                @if($userCountry === 'United States')
                                                    <select class="form-select" name="state" id="state">
                                                        <option value="">Select State</option>
                                                        @foreach($states as $state)
                                                            @if($state->state === $userState)
                                                                <option value="{{ $state->state }}" selected>{{ $state->state }}</option>
                                                            @else
                                                                <option value="{{ $state->state }}">{{ $state->state }}</option>
                                                            @endif
                                                        @endforeach

                                                    </select>
                                                @else
                                                    <input type="text" class="form-control" name="state" id="state" placeholder="State">
                                                @endif
                                                <label for="state">State</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-floating mb-4 mb-sm-0">
                                            <input type="text" class="form-control" name="city" id="city" placeholder="City">
                                            <label for="city">City</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="Postal Code">
                                            <label for="postal_code">Postal Code</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-floating mb-4 mb-sm-0">
                                            <textarea class="form-control" id="address_line_1" name="address_line_1" placeholder="Address Line 1"></textarea>
                                            <label for="address_line_1">Address Line 1</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-floating">
                                            <textarea class="form-control" id="address_line_2" name="address_line_2" placeholder="Address Line 2"></textarea>
                                            <label for="address_line_2">Address Line 2</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-floating mb-4 mb-sm-0">
                                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="{{ $userAccountDetails->phone }}">
                                            <label for="phone">Phone</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{ $userAccountDetails->email }}">
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                </div>


                            @elseif($userAccount->type === 'Business')
                                <div class="row mb-4">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-floating mb-4 mb-sm-0">
                                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                                            <label for="first_name">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                                            <label for="last_name">Last Name</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-4">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-floating mb-4 mb-sm-0">
                                            <select class="form-select" name="country_id" id="country_id">
                                                <option value="">Select Country</option>
                                                @foreach($countries as $country)
                                                    @if($country->country === $userAccountDetails->country)
                                                        <option value="{{ $country->id }}" selected>{{ $country->country }}</option>
                                                    @else
                                                        <option value="{{ $country->id }}">{{ $country->country }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <label for="country_id">Country</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div id="state_field_holder">
                                            <div class="form-floating">
                                                @if($userCountry === 'United States')
                                                    <select class="form-select" name="state" id="state">
                                                        <option value="">Select State</option>
                                                        @foreach($states as $state)
                                                            @if($state->state === $userAccountDetails->state)
                                                                <option value="{{ $state->state }}" selected>{{ $state->state }}</option>
                                                            @else
                                                                <option value="{{ $state->state }}">{{ $state->state }}</option>
                                                            @endif
                                                        @endforeach

                                                    </select>
                                                @else
                                                    <input type="text" class="form-control" name="state" id="state" placeholder="State" value="{{ $userAccountDetails->state }}">
                                                @endif
                                                <label for="state">State</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-floating mb-4 mb-sm-0">
                                            <input type="text" class="form-control" name="city" id="city" placeholder="City">
                                            <label for="city">City</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="Postal Code">
                                            <label for="postal_code">Postal Code</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-floating mb-4 mb-sm-0">
                                            <textarea class="form-control" id="address_line_1" name="address_line_1" placeholder="Address Line 1"></textarea>
                                            <label for="address_line_1">Address Line 1</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-floating">
                                            <textarea class="form-control" id="address_line_2" name="address_line_2" placeholder="Address Line 2"></textarea>
                                            <label for="address_line_2">Address Line 2</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-floating mb-4 mb-sm-0">
                                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="{{ $userAccountDetails->phone }}">
                                            <label for="phone">Phone</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{ $userAccountDetails->email }}">
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                </div>



                            @else


                            @endif


                            <div class="row mb-4">
                                <div class="col d-grid">
                                    <button type="submit" class="btn primary_btn_default" id="delivery_address_form_button">
                                        <span id="delivery_address_form_button_text">Go to Checkout</span>
                                        <span id="delivery_address_form_button_processing" class="sr-only"><span class="spinner-grow spinner-grow-sm text-info" role="status" aria-hidden="true"></span> Processing...</span>
                                    </button>
                                </div>
                            </div>
                        </form>






















                    </div>

                </div>


            </div>
        </div>


    </div>
    <div class="mt-3"></div>
    <script type="text/javascript">


        $(document).on('change', '#country_id', function () {
            $.ajax({
                method: 'get',
                url: '{{ url('get/states/by/country/id') }}',
                data: {
                    country_id: $(this).val()
                },
                cache: false,
                success: function (result) {
                    console.log(result);

                    $('#state_field_holder').empty();
                    if (result.length > 0) {
                        $('#state_field_holder').append('<div class="form-floating"><select class="form-select" name="state" id="state"><option value="">Select State</option></select><label for="state">State</label></div>');
                        $.each(result, function (key, state) {
                            $('#state').append('<option value="' + state.state + '">' + state.state + '</option>');
                        });
                    } else {
                        $('#state_field_holder').append('<div class="form-floating"><input type="text" class="form-control" name="state" id="state" placeholder="State"><label for="state">State</label></div>');
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
        });


        $(document).on('submit', '#delivery_address_form', function (event) {
            event.preventDefault();
            $('#delivery_address_form_button').addClass('disabled');
            $('#delivery_address_form_button_text').addClass('sr-only');
            $('#delivery_address_form_button_processing').removeClass('sr-only');
            let formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('is_primary', '1');
            formData.append('is_selected', '1');
            $.ajax({
                method: 'post',
                url: '{{ url('delivery/address/save') }}',
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                global: false,
                success: function (result) {
                    console.log(result);
                    $('#delivery_address_form_button').removeClass('disabled');
                    $('#delivery_address_form_button_text').removeClass('sr-only');
                    $('#delivery_address_form_button_processing').addClass('sr-only');

                    location = '{{ url('checkout') }}';

                },
                error: function (xhr) {
                    console.log(xhr);
                    $('#delivery_address_form_button').removeClass('disabled');
                    $('#delivery_address_form_button_text').removeClass('sr-only');
                    $('#delivery_address_form_button_processing').addClass('sr-only');
                    if (xhr.responseJSON.hasOwnProperty('errors')) {

                        $.each(xhr.responseJSON.errors, function (key, value) {
                            $('#' + key).after('<div class="invalid-feedback"></div>');
                            $('#' + key).addClass('is-invalid');
                            $.each(value, function (k, v) {
                                $('#' + key).parent().find('.invalid-feedback').append('<div>' + v + '</div>');
                            });
                        })
                    }
                }
            });

        });




    </script>



@endsection
