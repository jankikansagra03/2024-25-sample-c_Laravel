@extends('admin_header')
@section('dynamic_section')
    <div class="container">
        <div class="row">
            <div class="col-12">

                <h2 class="mb-4">Manage FAQs</h2>
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ URL::to('/') }}/AddNewFAQ" class="btn btn-dark">Add New FAQ</a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>

                            <th>Message</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($faqs as $faq)
                            <tr>
                                <td>{{ $faq->id }}</td>
                                <td>{{ $faq->name }}</td>


                                <td>{{ $faq->message }}</td>
                                <td>{{ $faq->created_at }}</td>
                                <td>
                                    <a href="{{ URL::to('/') }}/EditFAQ/{{ $faq->id }}" class="btn btn-primary">Edit</a>

                                    <a href="{{ URL::to('/') }}/ViewFAQ/{{ $faq->id }}"
                                        class="btn btn-warning text-white">View</a>

                                    @if ($faq->status == 'Active')
                                        <a href="{{ URL::to('/') }}/DeleteFAQ/{{ $faq->id }}"
                                            class="btn btn-danger">Delete</a>
                                    @else
                                        <a href="{{ URL::to('/') }}/ActivateFAQ/{{ $faq->id }}"
                                            class="btn btn-info text-white">Activate</a>
                                    @endif
                                    @if ($faq->reply == '')
                                        <a href="{{ URL::to('/') }}/ReplyFAQ/{{ $faq->id }}"
                                            class="btn btn-success">Reply</a>
                                    @else
                                        <a href="{{ URL::to('/') }}/ViewReply/{{ $faq->id }}"
                                            class="btn btn-info text-white">View Reply</a>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
