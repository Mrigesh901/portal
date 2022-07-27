@extends('hr::layouts.master')
@section('content')
<div class="container" id="segments_container">
    <br>
    <br>
    <div>
        
        <div class="d-none alert alert-success fade show" role="alert" id="segmentsuccess">
            <strong>Success!!!</strong>Congratulations!!! New segment successfully created.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> 
        {{-- <div id="segmentsuccess" class="d-none" >
            <div class=" text text-success fade show" role="contentinfo" >
                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                <button type="button" class="close"  data-dismiss="text" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div><br><br> --}}
        <div class="d-flex justify-content-between">
            <h1 class="mb-0">Segments</h1>
            <div>
                <button class="btn btn-primary" data-toggle="modal" data-target="#createNewSegment">Add New</button>
            </div>
        </div>      
        <br>

        <table class="table table-striped table-bordered">
            <tr>
                <th>Name</th>
                <th>Marks</th>
                <th>Actions</th>
            </tr>
            @foreach ($segments as $segment)
            <tr>
                <td>
                    <a href="{{ route('hr.evaluation.segment-parameters', $segment->id) }}">
                        {{ $segment->name }}
                    </a>
                </td>

                <td>
                    <h5>{{ $segment->parameters->sum('marks') }}</h5>
                </td>

                <td>
                    <button v-on:click="editSegment({{ $segment }})" class="btn btn-default">Edit</button>
                </td>
            </tr>
            @endforeach
        </table>

    </div>

@include('hr::evaluation.segment.create')
@include('hr::evaluation.segment.edit')
</div>
@endsection

@section('js_scripts')
<script>
    new Vue({
    el:'#segments_container',

    data() {
        return {
            updateRoute: "{{ route('hr.evaluation.segment.update', 'SEGMENT_ID') }}",
            segmentName: ''
        }
    },

    methods: {
        editSegment(segment) {
            this.updateRoute = this.updateRoute.replace('SEGMENT_ID', segment.id);
            this.segmentName = segment.name;
            $('#editSegmentModal').modal('show');
        }
    }
});

</script>

@endsection