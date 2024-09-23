@extends('admin_header')
@section('dynamic_section')
    <div class="row">
        <div class="col-12 bg-dark text-white p-4 align-center">
            <h1>
                View FAQ
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2 mt-4">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h3 class="mb-0">FAQ Details</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Name:</div>
                        <div class="col-md-8">{{ $faq->name }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Email:</div>
                        <div class="col-md-8">{{ $faq->email }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Mobile:</div>
                        <div class="col-md-8">{{ $faq->mobile }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Message:</div>
                        <div class="col-md-8">{{ $faq->message }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Status:</div>
                        <div class="col-md-8">
                            <span class="badge {{ $faq->status == 'Active' ? 'bg-success' : 'bg-danger' }}">
                                {{ $faq->status }}
                            </span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Created At:</div>
                        <div class="col-md-8">{{ $faq->created_at->format('d M Y, h:i A') }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Reply:</div>
                        <div class="col-md-8">{{ $faq->reply }}</div>
                    </div>
                </div>
            </div>
            <div class="mt-4 text-center">
                <a href="{{ URL::to('/') }}/ManageFAQ" class="btn btn-dark">Back to FAQ List</a>
                <a href="{{ URL::to('/') }}/EditFAQ/{{ $faq->id }}" class="btn btn-primary">Edit FAQ</a>

            </div>
            <br>
        </div>
    @endsection
