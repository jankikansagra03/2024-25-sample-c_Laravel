@extends('guest_header')
@section('dynamic_section')
    <script>
        $(document).ready(function() {
            $("#form1").validate({
                rules: {
                    otp: {
                        required: true,
                        minlength: 6,
                        maxlength: 6,
                        digits: true,
                    },
                },
                messages: {
                    otp: {
                        required: "Please enter OTP",
                        minlength: "OTP should be 6 digits",
                        maxlength: "OTP should be 6 digits",
                        digits: "OTP should only contain digits"
                    }

                },
                errorElement: "div",
                errorPlacement: function(error, element) {
                    error.addClass("invalid-feedback");
                    error.insertAfter(element);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                }
            });
        });
    </script>
    <div class="conatiner">
        <div class="row text-center">
            <div class="col-12 bg-dark text-white p-4 align-center">
                <h1>OTP Verifcation</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-2"></div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-8 col-xs-12 col-sm-12">
                <br>
                <form action="{{ URL::to('/') }}/OTPVerification" method="POST" id="form1">
                    @csrf
                    <div class="form-group">
                        <label for="otp1"><b>Enter OTP:</b></label>
                        <input type="number" class="form-control" id="otp1" name="otp">
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success" value="Verify OTP" />
                </form>
            </div>
        </div>
    </div>
@endsection
