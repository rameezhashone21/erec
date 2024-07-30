@extends('recruterpanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content')
    <div class="col-xl-9 col-lg-8">
        <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
            <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
        </button>
        <div class="dashboard_content bg-white rounded_10 p-4">
            <div class="d-flex aling-items-center mb-3">
                <h2 class="fw-500 text_primary fs-5 align-self-center">All Job Applications</h2>
            </div>

            <div class="table-responsive table_height scrollbar">
                <table id="example" class="table table-striped table-payment display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Post</th>
                            <th>Candidate</th>
                            <th>Resume</th>
                            <th>Assign Test</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($jobApp) > 0)
                            @foreach ($jobApp as $key => $row)
                                @if (isset($row->post))
                                    <tr>
                                        <td>{{ ++$key }}. </td>
                                        <td>{{ $row->post->post }}</td>
                                        <td>
                                            <a href="{{ route('candidate.detail', $row->candidate->slug) }}" 
                                                style="color: #000;">
                                                {{ $row->candidate->first_name }} {{ $row->candidate->last_name }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ asset('public/candidateDoc/doc/' . $row->candidateDocument->document) }}"
                                                target="_blank" alt="{{ $row->candidateDocument->document }}"
                                                class="d-block text-center">
                                                <i class="fa fa-file"></i>
                                                <p>Resume</p>
                                            </a>
                                            {{-- <div class="col-xl-2 col-md-4 d-flex mb-1 text-center">
                                                <a href="{{ asset('public/candidateDoc/doc/' . $row->candidateDocument->document) }}"
                                                    target="_blank" alt="{{ $row->candidateDocument->document }}">
                                                    <div class="align-items-center">
                                                        <div class="card p-2">
                                                            <i class="fa fa-file" style="font-size:2.0rem;"></i>
                                                        </div>
                                                        <div class="align-items-center">
                                                            <p>Resume</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div> --}}
                                        </td>
                                        <td class="jopAssignSelectbox" id="td_id{{ $row->id }}">
                                            @if ($row->status == 0)
                                                {{-- {{ dd($row->test($row->class_id)) }} --}}
                                                <select name="assign_test" onchange="assign_test({{ $row->id }})"
                                                    id="assign_test{{ $row->id }}"
                                                    class="select2-multiple form-control fs-14  h-50px" required>
                                                    <option selected disabled value="">Select Test</option>
                                                    @foreach ($row->test($row->class_id) as $col)
                                                        <option value="{{ $col['number'] }}">{{ $col['name'] }}</option>
                                                        {{-- <option value="{{ $col->number }}">{{ $col->name }}</option> --}}
                                                    @endforeach
                                                </select>
                                            @else
                                                @if ($row->qst_id != '0')
                                                    <p>{{ $row->qst($row->qst_id)['name'] }}</p>
                                                @endif
                                            @endif
                                        </td>
                                        <td id="td_shortlist{{ $row->id }}">
                                            @if ($row->status == 0)
                                                <a href="javascript:void 0;" id="blue_shortlist{{ $row->id }}"
                                                    class="btn-sm mt-2"><i class="fa-solid fa-exclamation"></i> Task Not
                                                    Assigned Yet.</a>
                                            @elseif($row->status == 1)
                                                <p class="btn btn-success btn-sm"><i class="fa fa-check"
                                                        id="green_shortlist{{ $row->id }}" style="font-size:18px"></i>
                                                    Shortlist</p>
                                            @endif()
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" allign="center">No data available</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('bottom_script')
    <script>
        function assign_test(id) {
            console.log(id);
            var selectedId = document.getElementById("assign_test" + id).value;
            console.log(selectedId);
            url = "{{ route('recruiter.job.assign') }}";
            $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        'id': id,
                        'selectedId': selectedId,
                    },
                    crossDomain: true,
                    // success: function(data) {
                    //     console.log(data);
                    // }
                }).done(function(data) {
                    console.log(data);
                    // if(data == 1)
                    // {
                    //     $('#blue_shortlist'+id).hide();
                    $('#green_shortlist' + id).show();
                    $('#td_id' + id).html('');
                    $('#td_id' + id).html(data);
                    $('#td_shortlist' + id).html('');
                    $('#td_shortlist' + id).html(
                        '<p class="btn btn-success btn-sm"><i class="fa fa-check" style = "font-size:18px"></i> Shortlist</p> '
                    );
                    successModal("Your Data Has Been Successfully Updated...");
                    // }
                    // else
                    // {

                    // }
                })
                .fail(function(error) {
                    var errors = error.responseJSON;
                    console.log(errors);

                });
        }
    </script>
@endsection
