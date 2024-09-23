@extends('admin_header')

@section('dynamic_section')
    <script>
        $(document).ready(function() {
            $("#form1").validate({
                rules: {
                    image: {
                        required: true,
                        extension: "jpg|jpeg|png|webp"
                    }
                },
                messages: {
                    image: {
                        required: "Please select a slider image",
                        extension: "Please select a valid image file with jpg, jpeg, or png extension"
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
                <h1>Add New Slider</h1>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-2"></div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-8 col-xs-12 col-sm-12">
                <br>
                <form action="{{ URL::to('/') }}/AddSliderAction" method="post" id="form1" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="image"><b>Choose SliderImage</b></label>

                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-dark">Add Slider</button>
                </form>
            </div>
        </div>
    </div>
@endsection
