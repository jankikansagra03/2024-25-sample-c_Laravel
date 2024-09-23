@extends('admin_header')
@section('dynamic_section')
    <script>
        $(document).ready(function() {
            $('#reply').attr('required', true);

            $('#form1').validate({
                rules: {
                    reply: {
                        required: true,
                        minlength: 10
                    }
                },
                messages: {
                    reply: {
                        required: "Please enter your reply",
                        minlength: "Your reply must be at least 10 characters long"
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
                <h1>
                    Reply FAQ
                </h1>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h3 class="mb-0">FAQ Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Query:</strong>
                            <p>{{ $faq->message }}</p>
                        </div>
                        <form action="{{ URL::to('/') }}/SubmitFAQReply/{{ $faq->id }}" method="POST" id="form1">
                            @csrf
                            <div class="mb-3">
                                <label for="reply" class="form-label">Your Reply:</label>
                                <textarea class="form-control" id="reply" name="reply" rows="5" required></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit Reply</button>
                                <a href="{{ URL::to('/') }}/ManageFAQ" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
