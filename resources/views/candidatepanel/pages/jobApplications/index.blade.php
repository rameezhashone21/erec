@extends('candidatepanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content')
  {{-- <section> --}}
  <div class="col-xl-9 col-lg-8 col-md-7">
    <button class="mobile_menu_trigger d-md-none btn_theme border-0 py-2 px-4 mb-3">
      <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
    </button>
    <div class="dashboard_content bg-white rounded_10 p-4">
      <div class="d-flex aling-items-center">
        <h2 class="fw-500 text_primary fs-5 align-self-center">All Job Applications List</h2>
        {{-- <a class="btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto" href="{{ route('candidates.job.create') }}">
            Add New
            Appliccation</a> --}}
        @if (session('error'))
          <div class="alert alert-danger" role="alert">
            {{ session('error') }}
          </div>
        @endif

        @if (session('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
        @endif
      </div>
      @if (session($key ?? 'status'))
        <div class="alert alert-success" role="alert">
          {!! session($key ?? 'status') !!}
        </div>
      @endif
      <div class="table table-border table-responsive">
        <table id="example" class="table table-striped table-payment display nowrap dataTable no-footer"
          style="width:100%">
          <thead>
            <tr>
              <th class="set-width-table-1">#</th>
              <th class="set-width-table-2">Title</th>
              <th class="set-width-table-2">Job Type</th>
              <th class="set-width-table-3">Experience</th>
              <th class="set-width-table-2">Status</th>
              <th class="set-width-table-3">Assigned Test</th>
              <th class="set-width-table-1">Action</th>
            </tr>
          </thead>
          <tbody>
            @if (count($apps) > 0)
              @foreach ($apps as $key => $row)
                <tr>
                  <td class="set-width-table-1">{{ ++$key }}. </td>
                  <td>{{ $row->post->post }}</td>
                  <td class="set-width-table-2">{{ $row->post->job_type }}</td>
                  <td class="set-width-table-3">{{ $row->post->experience }}</td>
                  <td class="set-width-table-2">
                    @if (isset($row->result))
                      @if ($row->result->status == 'fail')
                        <p class="text-danger" style="color:#fff;">Failed</p>
                      @else
                        <p class="text-success" style="color:#fff;">Success</p>
                      @endif

                      {{-- <p class="text-danger" style="color:#fff;">Test not Assigned Yet...</p> --}}
                    @else
                      <p class="text-danger" style="color:#fff;">Pending</p>
                    @endif
                  </td>
                  <td class="set-width-table-3">
                    {{-- {{ dd($row->qst_id) }} --}}
                    @php
                      $class = $row->getSingleClass($row->class_id);
                      $qstest = $row->qst($row->qst_id);

                    @endphp
                    @if ($row->status == 0 && $row->qst_id == '0')
                      <p class="text-danger" style="color:#fff;">Not Assigned</p>
                    @elseif ($row->status == 2 && $row->qst_id == '0')
                      <p class="text-success" style="color:#fff;">Hired</p>
                    @elseif ($row->status == 2 && $row->qst_id != '0')
                      <p class="text-success" style="color:#fff;">Hired</p>
                    @else
                      @if ($row->qstSocre($row->candidate->user->new_user_id, $row->qst_id) != null)
                        <p class="text-success" style="color:#fff;">Given</p>
                      @else
                        @if ($row->status == 0 && $row->qst_id > 0)
                          <span ID="display5" style="">
                            <table>
                              {{-- {{ dd($row->qst_id) }} --}}
                              {{-- onClick="openWindow1('{{ $row->qst_id }}','{{ $row->qst($row->qst_id)['name'] }}','{{ $row->class_id }}','Quiz/Test','0','{{ $row->qst($row->qst_id)['questions'] }}','{{ $row->qst($row->qst_id)['marks'] }}')" --}}
                              <tr>
                                <td align="center">
                                  <font class="btn btn_viewall" STYLE="cursor: pointer"
                                    @if ($row->qst_id != '0') onClick="openWindow1('{{ $key }}')" @endif
                                    size="-1">
                                    Start
                                  </font>
                                </td>
                              </TR>
                            </TABLE>
                          </span>
                          <form method="POST" name="form{{ $key }}" action="{{ route('candidate.test.start') }}"
                            id="form{{ $key }}" target="_blank">
                            @csrf
                            <input type="hidden" name="qst" value="{{ $row->qst_id }}">
                            <input type="hidden" name="jobApplication" value="{{ $row->id }}">
                          </form>
                        @else
                          <p class="text-danger" style="color:#fff;">Not Assigned</p>
                        @endif
                      @endif
                    @endif
                  </td>
                  <td class="set-width-table-1">
                    <a href="{{ route('job.listing.details', $row->post->slug) }}" data-bs-toggle="tooltip"
                      data-bs-placement="top" title="View" class="btn btn_viewall" style='font-size: 14px;'>
                      <i class="fa fa-eye"></i>
                    </a>
                    {{-- <a href="" class="btn btn_viewall"><i class="fa fa-trash"></i></a> --}}
                  </td>
                </tr>
              @endforeach
            @else
              <tr>
                <td colspan="7" align="center">No data available</td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
  {{-- </section> --}}
@endsection

@section('bottom_script')
  <script type="text/javascript">
    function openWindow1(display) {
      if (confirm("You are about to begin'. \n\nClick Submit Test when you are done.")) {
        let form = document.getElementById('form' + display);
        form.submit()
      }
    }
  </script>
@endsection
