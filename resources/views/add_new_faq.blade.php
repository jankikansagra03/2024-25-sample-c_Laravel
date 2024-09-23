@extends('admin_header')
@section('dynamic_section')
    <script>
        $(document).ready(function() {
            $("#form1").validate({
                rules: {
                    fn: {
                        required: true,
                        minlength: 3
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    mobile: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    msg: {
                        required: true,
                        minlength: 10
                    }
                },
                messages: {
                    fn: {
                        required: "Please enter your full name",
                        minlength: "Full name must be at least 3 characters long"
                    },
                    email: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address"
                    },
                    mobile: {
                        required: "Please enter your mobile number",
                        digits: "Please enter only digits",
                        minlength: "Mobile number must be exactly 10 digits long",
                        maxlength: "Mobile number must be exactly 10 digits long"
                    },
                    msg: {
                        required: "Please enter your message",
                        minlength: "Message must be at least 10 characters long"
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
    <div class="container">
        <div class="row text-center">
            <div class="col-12 bg-dark text-white p-4 align-center">
                <h1>Add Inquiry</h1>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-2"></div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-8 col-xs-12 col-sm-12">
                <br>
                <form action="{{ URL::to('/') }}/AddFAQAction" method="post" enctype="multipart/form-data" id="form1">
                    @csrf
                    <div class="form-group">
                        <label for="fn1"><b>Fullname:</b></label>
                        <input type="text" class="form-control" id="fn1" placeholder="Enter Name" name="fn">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="email1"><b>Email:</b></label>
                        <input type="email" class="form-control" id="email1" placeholder="Enter email" name="email">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="mn1"><b>Mobile Number:</b></label>
                        <input type="text" class="form-control" id="mn1" placeholder="Enter Mobile Number"
                            name="mobile">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="msg1"><b>Enter Message:</b></label>
                        <textarea class="form-control" name="msg" id="msg1" cols="30" rows="5"></textarea>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-dark" value="Submit" name="btn">
                </form>
            </div>
        </div>
    </div>
@endsection
