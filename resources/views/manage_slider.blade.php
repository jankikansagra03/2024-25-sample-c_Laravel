@extends('admin_header')
@section('dynamic_section')
    <div class="container">
        <div class="row">
            <div class="col-12">

                <h2 class="mb-4">Manage Slider Images</h2>
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ URL::to('/') }}/AddSlider" class="btn btn-dark">Add New Slider</a>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                            <tr>
                                <td>{{ $slider->id }}</td>
                                <td>
                                    <img src="{{ URL::to('/') }}/images/sliders/{{ $slider->image }}"
                                        style="width: 300px; height: 120px;">
                                </td>


                                <td>{{ $slider->status }}</td>
                                <td>{{ $slider->created_at }}</td>
                                <td>

                                    @if ($slider->status == 'Active')
                                        <a href="{{ URL::to('/') }}/DeleteFAQ/{{ $slider->id }}"
                                            class="btn btn-danger">Delete</a>
                                    @else
                                        <a href="{{ URL::to('/') }}/ActivateFAQ/{{ $slider->id }}"
                                            class="btn btn-info text-white">Activate</a>
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
