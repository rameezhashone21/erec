@extends('adminpanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content')

  {{-- <section> --}}
  <div class="mb-5 col-md-12">
    <div class="table-responsive shadow">
      <div class="table-header-panel">
        <h2 class="title-2">All Job Applications List</h2>
      </div>
      {{-- @if (session($key ?? 'status'))
                        <div class="alert alert-success" role="alert">
                            {!! session($key ?? 'status') !!}
                        </div>
                    @endif --}}
      <div class="px-4 pb-4">
        <table id="dashboardTable2" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Post</th>
              {{-- <th>Class</th> --}}
              <th>Candidate</th>
              <th>Candidate Resume</th>
              <th>Status</th>
              {{-- <th>Action</th> --}}
            </tr>
          </thead>
          <tbody>
            @if (count($apps) > 0)
              @foreach ($apps as $key => $row)
                <tr>
                  <td>{{ $key + 1 }}. </td>
                  <td>{{ $row->post->post }}</td>
                  {{-- <td>
                                    @if ($row->getSingleClass($row->class_id) == null)
                                        Class Not Assigned
                                    @else
                                        {{ $row->getSingleClass($row->class_id)['class_name'] }}
                                    @endif
                                </td> --}}
                  <td>{{ $row->candidate->first_name }} {{ $row->candidate->last_name }}</td>
                  <td>
                    @if ($row->candidateDocument != null)
                    <a href="{{ asset('public/candidateDoc/doc/' . $row->candidateDocument->document) }}" target="_blank"
                      class='text-decoration-underline d-flex text-dark'>
                      <svg xmlns="http://www.w3.org/2000/svg" width="27.5" height="27.5" viewBox="0 0 27.5 27.5">
                        <g id="document-pdf" transform="translate(-2.25 -2.25)">
                          <path id="Path_3217" data-name="Path 3217"
                            d="M32.893,19.964V18H27v9.821h1.964V23.893h2.946V21.929H28.964V19.964Z"
                            transform="translate(-3.143 -2)" fill="#8b91a7" />
                          <path id="Path_3218" data-name="Path 3218"
                            d="M20.8,27.821H16.875V18H20.8a2.949,2.949,0,0,1,2.946,2.946v3.929A2.949,2.949,0,0,1,20.8,27.821Zm-1.964-1.964H20.8a.983.983,0,0,0,.982-.982V20.946a.983.983,0,0,0-.982-.982H18.839Z"
                            transform="translate(-1.857 -2)" fill="#8b91a7" />
                          <path id="Path_3219" data-name="Path 3219"
                            d="M11.661,18H6.75v9.821H8.714V24.875h2.946a1.967,1.967,0,0,0,1.964-1.964V19.964A1.966,1.966,0,0,0,11.661,18ZM8.714,22.911V19.964h2.946v2.946Z"
                            transform="translate(-0.571 -2)" fill="#8b91a7" />
                          <path id="Path_3220" data-name="Path 3220"
                            d="M21.893,14.036V10.107A.894.894,0,0,0,21.6,9.42L14.724,2.545a.893.893,0,0,0-.688-.3H4.214A1.97,1.97,0,0,0,2.25,4.214V27.786A1.964,1.964,0,0,0,4.214,29.75H19.929V27.786H4.214V4.214h7.857v5.893a1.97,1.97,0,0,0,1.964,1.964h5.893v1.964Zm-7.857-3.929v-5.5l5.5,5.5Z"
                            transform="translate(0)" fill="#8b91a7" />
                        </g>
                      </svg>
                      <span class='align-self-end ms-1'>
                        Click to view
                        {{-- <a class='px-4 py-2 progress_card d-block rounded-3'
                                                href="{{ asset('public/candidateDoc/doc/' . $item->document) }}"
                                                target="_blank"> --}}
                      </span>
                    </a>
                    @else
                        Candidate Document has been deleted...
                    @endif
                  </td>
                  <td>
                    @if ($row->status == 0)
                      <p class="" style="">Test not assigned yet.</p>
                    @else
                      <p class="" style="">Test Assigned</p>
                    @endif
                  </td>
                  {{-- <td>
                                        <a href="{{ route('admin.jobApplicationStatus', $row->id) }}"
                                        class="btn btn-primary btn-sm mt-2"><i class="fa fa-status" style="font-size:18px"></i>
                                        Change Status</a>
                                        <form id="delete-post-form" action="{{ route('admin.jobApplicationStatus', $row->id) }}"
                                        method="get">
                                        <button href="" class="btn btn-danger btn-sm mt-2" onclick="return false";
                                            id="delete-user"><i class="fa fa-status" style="font-size:18px"></i>
                                            Delete Application</button>
                                    </form>
                                        <a href="" class="btn btn-danger btn-sm mt-2"><i
                                            class="fa fa-trash" style="font-size:18px"></i></a>
                                    </td> --}}
                </tr>
              @endforeach
            @else
              <div>
                No data available
              </div>
            @endif

          </tbody>
        </table>
        {{-- <div class="d-flex justify-content-center pt-5">
                {{ $apps->links() }}
            </div> --}}
      </div>
    </div>
    {{-- </section> --}}

  @endsection

  @section('bottom_script')
    <script>
      $('#delete-user').on('click', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        Swal.fire({
          title: 'Are you sure ?',
          text: "You won't be able to revert this !",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $('#delete-post-form').submit();
            successModal('message');
          }
        })
      });
      // {{-- @if (session('message'))
            //     $(document).ready(function() {
            //         successModal('message');
            //     });
            // @endif --}}
    </script>
  @endsection
