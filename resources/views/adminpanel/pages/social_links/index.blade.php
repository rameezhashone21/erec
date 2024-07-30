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
                <div class="d-flex justify-content-between align-items-center align-items-center">
                    <h3 class="title-2">Social Link</h3>
                    <div>
                        <a class="btn btn-primary btn_panel" href="{{ route('create.social_links') }}"> Add New Links </a>
                    </div>
                </div>
            </div>
            <div class="px-4 pb-4">
                <table id="dashboardTable2" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>facbooklink</th>
                            <th>linkedIn_link</th>
                            <th>Insat_link</th>
                            <th>Youtube_link</th>
                            {{-- <th>Description</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($socials) > 0)
                            @foreach ($socials as $social)
                                <tr>
                                    <td></td>
                                    <td>{{ $social->facebook_link }}</td>
                                    <td>{{ $social->insta_link }}</td>
                                    <td>{{ $social->linkedin_link }}</td>
                                    <td>{{ $social->youtube_link }}</td>

                                    {{-- <td>{{ $row->description }}</td> --}}
                                    <td>
                                        <div class="d-flex align-items-center" style="gap: 0 6px;">
                                            <a href="" class="btn btn_viewall">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            {{-- <a href="{{ route('social.delete', $social->id) }}"
                        onclick="return confirm('Are you sure you want to delete?');" class="btn btn_viewall delete">
                        <i class="fa fa-trash"></i>
                      </a> --}}
                                            <a href="" data-toggle="modal" data-target="#deleteModal-job"
                                                class="btn btn_viewall delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <div class="modal fade" id="deleteModal-job" tabindex="-1" role="dialog"
                                                aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body text-center pb-0">
                                                            Are you sure you want to delete?
                                                        </div>
                                                        <div class="modal-footer border-0 justify-content-center">
                                                            <a href="#" class="btn btn_viewall delete"
                                                                style=" padding: 8px 30px !important; font-size: 16px;">
                                                                Yes
                                                            </a>
                                                            <button type="button" class="btn btn_viewall"
                                                                data-dismiss="modal"
                                                                style="padding: 8px 30px !important; font-size: 16px;">
                                                                No
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" allign="center">No data available</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{-- <div class="d-flex justify-content-center pt-5">
                {{ $skills->links() }}
    </div> --}}
            </div>
        </div>
    </div>
    {{-- </section> --}}

@endsection

@section('bottom_script')
@endsection
