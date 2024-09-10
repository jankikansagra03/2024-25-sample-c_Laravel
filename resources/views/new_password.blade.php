@extends('guest_header')
@section('dynamic_section')
    <script>
        $(document).ready(function() {
            $("#form1").validate({
                rules: {
                    pswd: {
                        required: true,
                        minlength: 8,
                        maxlength: 25,
                        pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,25}$/
                    },
                    repswd: {
                        required: true,
                        minlength: 6,
                        equalTo: "#pwd"
                    },
                },
                messages: {
                    pswd: {
                        required: "Please provide a password",
                        minlength: "Password must be at least 8 characters long",
                        maxlength: "Password must not be greater than 25 characters",
                        pattern: "Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character"
                    },
                    repswd: {
                        required: "Please confirm your password",
                        minlength: "Password must be at least 6 characters long",
                        equalTo: "Password and Confirm Passwords do not match"
                    },
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
                    $(element).addClass('is-valid').removeClass('is-invalid');
                }
            });
        });
    </script>
    <!-- Forgot Password Page -->
    <div class="conatiner">
        <div class="row text-center">
            <div class="col-12 bg-dark text-white p-4 align-center">
                <h1>Reset Password</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-2"></div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-8 col-xs-12 col-sm-12">
                <br>
                <form action="{{ URL::to('/') }}/UpdateNewPassword" method="POST" id="form1">
                    @csrf
                    <div class="form-group">
                        <label for="password"><b>New Password:</b></label>
                        <input type="password" class="form-control" id="pwd" name="pswd"
                            value="{{ old('password') }}">

                    </div>
                    <br>
                    <div class="form-group">
                        <label for="password_confirmation12"><b>Confirm New Password:</b></label>
                        <input type="password" class="form-control" id="password_confirmation12" name="repswd"
                            value="{{ old('password_confirmation') }}">

                    </div>
                    <br>
                    <input type="submit" class="btn btn-success" value="Change Password" />
                </form>
            </div>
        </div>
    </div>
@endsection
