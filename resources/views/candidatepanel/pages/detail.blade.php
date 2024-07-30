@extends('candidatepanel.layout.app')

@section('page_title', 'E-Rec')

@section('content')

  <div class="col-xl-9 col-lg-8">
    <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
      <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
    </button>
    <div class="dashboard_content bg-white rounded_10 p-md-4 p-2">
      <form id="firstform">
        @csrf
        <div class="border-bottom pb-3" id="aboutme">
          <div class="d-flex aling-items-center mb-4">
            <h2 class="fw-500 text_primary fs-5 me-auto">About Me</h2>
            {{-- <a href="javascript:;" class="text_grey_999 editName" role="button" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Edit Info">
                            <i class="fa-solid fa-pencil "></i>
                        </a>
                        <div class="" style='display: none;' id='btn-save-aboutme'>
                            <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubdate"
                                class="text_grey_999 border-0 bg-transparent p-0 me-2"><i class="fas fa-check"></i></button>
                        </div>
                        <div class="" style='display: none;' id='about-me-cancel'>
                            <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel"
                                class="text_grey_999 border-0 bg-transparent p-0"><i class="fa-solid fa-xmark"></i></button>
                        </div> --}}
          </div>
          <p class="fs-14 mb-3 text">
            @if (isset(auth()->user()->candidate))
              {{ $user->candidate->head_line }}
            @endif
          </p>
          <textarea name="head_line" class="txt-editor form-control">{{ $user->candidate->head_line }}</textarea>
          <input type="hidden" name="source" value="api" />

          {{-- <div class="text-center mt-4">
                        <button type="submit" class="btn_theme_3 fs-14 px-4 py-2 d-inline-block "><i class="fas fa-check"></i></button>
                    </div> --}}

          {{-- <button type="submit" class="btn_theme_3 fs-14 px-4 py-2 d-inline-block "><i
                            class="fas fa-check"></i></button> --}}
        </div>
      </form>
      <form id="secondform">
        @csrf
        <div class="py-4 border-bottom" id="skills">
          <div class="d-flex aling-items-center mb-4">
            <h2 class="fw-500 text_primary fs-5 align-self-center me-auto">Skills</h2>
            {{-- <a href="javascript:;" class="text_grey_999 editSkill" role="button" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Edit Info">
                            <i class="fa-solid fa-pencil "></i>
                        </a>
                        <div class="" style='display: none' id='skills-save'>
                            <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubdate"
                                class="text_grey_999 border-0 bg-transparent p-0 me-2"><i class="fas fa-check"></i></button>
                        </div>
                        <div class="" style='display: none;' id='skills-cancel'>
                            <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel"
                                class="text_grey_999 border-0 bg-transparent p-0"><i class="fa-solid fa-xmark"></i></button>
                        </div> --}}
          </div>
          <input type="hidden" name="source" value="api" />
          <ul class="tags text">
            @if (isset(auth()->user()->skills))
              @foreach ($user->skills as $row)
                <li>
                  <a href="javascript:void 0;" return false;>{{ $row->name }}</a>
                </li>
              @endforeach
            @endif
          </ul>
          <div class="txt-editor">
            <select name="skills[]" class="select2-multiple form-control skilled-select" id="select2" multiple>
              @foreach ($skill as $item)
                <option value="{{ $item->id }}"
                  @foreach ($user->skills as $row) @if ($item->id == $row->id)
                            selected @endif @endforeach>
                  {{ $item->name }}</option>
              @endforeach
            </select>
          </div>
          {{-- <div class="text-center mt-4">
                        <button type="submit" class="btn_theme_3 fs-14 px-4 py-2 d-inline-block "><i class="fas fa-check"></i></button>
                    </div> --}}
          {{-- <button type="submit" class="btn_theme_3 fs-14 px-4 py-2 d-inline-block "><i
                            class="fas fa-check"></i></button> --}}
        </div>
      </form>
      <div id="experience">
        <div class="mt-3">
          <h2 class="fw-500 text_primary fs-5 align-self-center">Job Experience</h2>
        </div>
        @if (isset(auth()->user()->candidatePro))
          @foreach ($user->candidatePro as $key => $row)
            <div class="border-bottom py-3">
              <div class="d-flex">
                <div class="me-3">
                  <img src="{{ asset('/dashboard/images/suitcase_new.svg') }}" alt="" class="">
                </div>
                <div class="flex-grow-1">
                  <h3 class="fw-500 fs-5 mb-1">{{ $row->designation }}</h3>
                  <h4 class="fw-500">{{ $row->company_name }}</h4>
                  <div class="text_grey_999 fs-14 mt-3 d-flex align-items-center" style="gap: 0 8px;">
                    {{-- <i class="fa-solid fa-calendar fs-5 me-2"></i> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                      <path id="Shape"
                        d="M12.75,15H2.25A2.252,2.252,0,0,1,0,12.75V2.775A1.427,1.427,0,0,1,1.425,1.35h1.95V.75a.75.75,0,0,1,1.5,0v.6H10.8V.75a.75.75,0,0,1,1.5,0v.6h1.275A1.427,1.427,0,0,1,15,2.775V12.75A2.252,2.252,0,0,1,12.75,15ZM1.5,5.55v7.2a.751.751,0,0,0,.75.75h10.5a.751.751,0,0,0,.75-.75V5.55Zm0-2.7v1.2h12V2.85H12.3a.75.75,0,0,1-1.493,0H4.872a.75.75,0,0,1-1.493,0Zm7.35,8.1H3.45a.75.75,0,0,1,0-1.5h5.4a.75.75,0,0,1,0,1.5Zm-2.7-2.7H3.45a.75.75,0,0,1,0-1.5h2.7a.75.75,0,0,1,0,1.5Z"
                        fill="#92929d" />
                    </svg>
                    <span>
                      Experience:
                      {{-- @if ($row->year_exp != 0)
                                                @if (date_diff(date_create($row->month_exp), date_create($row->year_exp))->format('%m months') == '0 months')
                                                    {{ date_diff(date_create($row->month_exp), date_create($row->year_exp))->format('%y years') }}
                                @else
                                @if (date_diff(date_create($row->month_exp), date_create($row->year_exp))->format('%y
                                years, %m months') < 1)
                                    {{ date_diff(date_create($row->month_exp), date_create($row->year_exp))->format('%m months') }}
                                    @elseif (date_diff(date_create($row->month_exp),
                                    date_create($row->year_exp))->format('%y years, %m months') < 2)
                                        {{ date_diff(date_create($row->month_exp), date_create($row->year_exp))->format('%y year, %m months') }}
                                        @else
                                        {{ date_diff(date_create($row->month_exp), date_create($row->year_exp))->format('%y years, %m months') }}
                                        @endif @endif @else <p>
                                        {{ \Carbon\Carbon::parse($row->month_exp)->isoFormat('MMM YY') }} -
                                        Currently work here.</p>
                                        @endif --}}
                      @if ($row->year_exp != 0)
                        @if (date_diff(date_create($row->month_exp), date_create($row->year_exp))->format('%y years, %m months') < 1)
                          {{-- {{ date_diff(date_create($row->month_exp), date_create($row->year_exp))->format('%m months') }}
                                            --}} <p>Less than a month</p>
                        @elseif (date_diff(date_create($row->month_exp), date_create($row->year_exp))->format('%y years, %m months') < 2)
                          {{ date_diff(date_create($row->month_exp), date_create($row->year_exp))->format('%y year, %m months') }}
                        @else
                          {{ date_diff(date_create($row->month_exp), date_create($row->year_exp))->format('%y years, %m months') }}
                        @endif
                      @else
                        <p>
                          {{ \Carbon\Carbon::parse($row->month_exp)->isoFormat('MMM YY') }}
                          - Currently work here.</p>
                      @endif
                    </span>
                  </div>
                  <div class="text_grey_999 fs-14 mt-1 d-flex align-items-center" style="gap: 0 8px;">
                    {{-- <i class="fa-solid fa-building-columns fs-5 me-2"></i> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="14.239" height="16.958" viewBox="0 0 14.239 16.958">
                      <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin" transform="translate(1 1)">
                        <path id="Path_3207" data-name="Path 3207"
                          d="M16.739,7.619c0,4.759-6.119,8.839-6.119,8.839S4.5,12.379,4.5,7.619a6.119,6.119,0,1,1,12.239,0Z"
                          transform="translate(-4.5 -1.5)" fill="none" stroke="#92929d" stroke-linecap="round"
                          stroke-linejoin="round" stroke-width="2" />
                        <path id="Path_3208" data-name="Path 3208"
                          d="M17.707,12.6a2.1,2.1,0,1,1-2.1-2.1,2.1,2.1,0,0,1,2.1,2.1Z"
                          transform="translate(-9.484 -6.468)" fill="none" stroke="#92929d" stroke-linecap="round"
                          stroke-linejoin="round" stroke-width="2" />
                      </g>
                    </svg>
                    <span>
                      Located:
                      {{ $row->comp_loc }}
                    </span>
                  </div>
                  <p class="text_grey_999 fs-14 mt-3">
                    {!! $row->description !!}
                  </p>
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>

      <div id="education">
        <div class="mt-3">
          <h2 class="fw-500 text_primary fs-5 align-self-center">Education</h2>
        </div>
        @if (isset(auth()->user()->candidateEdu))
          @foreach ($user->candidateEdu as $row)
            <div class="border-bottom py-3">
              <div class="d-flex">
                <div class="me-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="38.963" height="29.514" viewBox="0 0 38.963 29.514">
                    <path id="graduation"
                      d="M43.888,40.959a.6.6,0,0,0-.024-.119,2.847,2.847,0,0,0-1.022-1.833,2.826,2.826,0,0,0-1.161-4.92V25.166l1.746-.617a.653.653,0,0,0,0-1.23l-18.3-6.6a.653.653,0,0,0-.442,0l-18.43,6.6a.653.653,0,0,0,0,1.231l6.665,2.337.926,11.382C13.9,40.849,19.407,42.2,24.847,42.2s10.941-1.349,10.987-3.928l1.04-11.408,3.5-1.237v8.46a2.826,2.826,0,0,0-1.162,4.92,2.848,2.848,0,0,0-1.022,1.83.7.7,0,0,0-.024.122l-.4,4.019a.653.653,0,0,0,.65.718h5.225a.653.653,0,0,0,.65-.718ZM24.913,18.031l16.354,5.9L24.913,29.7,8.44,23.927ZM34.53,38.179c0,.02,0,.04,0,.059,0,1.082-3.771,2.655-9.681,2.655s-9.681-1.572-9.681-2.655c0-.018,0-.035,0-.053l-.88-10.826L24.7,31.012a.657.657,0,0,0,.434,0l10.387-3.669ZM39.5,36.837a1.524,1.524,0,1,1,1.524,1.524A1.526,1.526,0,0,1,39.5,36.837Zm-.367,7.553.319-3.187a.709.709,0,0,0,.022-.12,1.556,1.556,0,0,1,3.1,0,.621.621,0,0,0,.022.118l.319,3.189H39.137Z"
                      transform="translate(-5.581 -16.432)" fill="#92929d" stroke="#92929d" stroke-width="0.5" />
                  </svg>
                </div>
                <div>
                  <h3 class="fw-500 fs-5 mb-1">{{ $row->institute }}</h3>
                  <h4 class="fw-500">{{ $row->education }} - {{ $row->course }}</h4>
                  <div class="text_grey_999 fs-14 mt-3 d-flex align-items-center" style="gap: 0 8px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                      <path id="Shape"
                        d="M12.75,15H2.25A2.252,2.252,0,0,1,0,12.75V2.775A1.427,1.427,0,0,1,1.425,1.35h1.95V.75a.75.75,0,0,1,1.5,0v.6H10.8V.75a.75.75,0,0,1,1.5,0v.6h1.275A1.427,1.427,0,0,1,15,2.775V12.75A2.252,2.252,0,0,1,12.75,15ZM1.5,5.55v7.2a.751.751,0,0,0,.75.75h10.5a.751.751,0,0,0,.75-.75V5.55Zm0-2.7v1.2h12V2.85H12.3a.75.75,0,0,1-1.493,0H4.872a.75.75,0,0,1-1.493,0Zm7.35,8.1H3.45a.75.75,0,0,1,0-1.5h5.4a.75.75,0,0,1,0,1.5Zm-2.7-2.7H3.45a.75.75,0,0,1,0-1.5h2.7a.75.75,0,0,1,0,1.5Z"
                        fill="#92929d" />
                    </svg>
                    {{-- <span>Passing year - {{ \Carbon\Carbon::parse($row->passing_year)->format('YYYY')}}</span>
                            --}}
                    <span>Passing year -
                      {{ \Carbon\Carbon::parse($row->passing_year)->isoFormat('YYYY') }}</span>
                  </div>
                  <div class="text_grey_999 fs-14 mt-1 d-flex align-items-center" style="gap: 0 8px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14.239" height="16.958"
                      viewBox="0 0 14.239 16.958">
                      <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin" transform="translate(1 1)">
                        <path id="Path_3207" data-name="Path 3207"
                          d="M16.739,7.619c0,4.759-6.119,8.839-6.119,8.839S4.5,12.379,4.5,7.619a6.119,6.119,0,1,1,12.239,0Z"
                          transform="translate(-4.5 -1.5)" fill="none" stroke="#92929d" stroke-linecap="round"
                          stroke-linejoin="round" stroke-width="2" />
                        <path id="Path_3208" data-name="Path 3208"
                          d="M17.707,12.6a2.1,2.1,0,1,1-2.1-2.1,2.1,2.1,0,0,1,2.1,2.1Z"
                          transform="translate(-9.484 -6.468)" fill="none" stroke="#92929d" stroke-linecap="round"
                          stroke-linejoin="round" stroke-width="2" />
                      </g>
                    </svg>
                    <span>{{ $row->institute_loc }}</span>
                  </div>
                  @if ($row->grade != null && $row->grade != 'Choose')
                    <div class="mt-3 fw-500">
                      Grade: {{ $row->grade }}
                    </div>
                  @endif
                  <p class="text_grey_999 fs-14 mt-3">
                    {!! $row->description !!}
                  </p>
                  {{-- <div class="text-end">
                                        <a href="" class="text-decoration-underline text_primary fs-14">See more</a>
                                    </div> --}}
                </div>
              </div>
            </div>
          @endforeach
        @endif
        {{-- <div class="border-bottom py-3">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{ asset('/dashboard/images/towers.png') }}" alt="" class="university_thumb">
        </div>
        <div class="col-md-10">
            <h3 class="fw-500 fs-5 mb-1">{{ $row->institute }}</h3>
            <h4 class="fw-500">Issued By University Of Melbourne</h4>
            <div class="text_grey_999 fs-14 mt-3">
                <i class="fa-solid fa-calendar fs-5 me-2"></i>
                <span>Aug 2018 - June 2020 . 2 yrs</span>
            </div>
            <div class="text_grey_999 fs-14 mt-3">
                <i class="fa-solid fa-building-columns fs-5 me-2"></i>
                <span>Melbourne, Austrailia</span>
            </div>
            <div class="mt-3 fw-500">Grade: A+</div>
            <p class="text_grey_999 fs-14 mt-3">
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua...
            </p>
            <div class="text-end">
                <a href="" class="text-decoration-underline text_primary fs-14">See more</a>
            </div>
        </div>
    </div>
</div> --}}
        {{-- <div class="border-bottom py-3">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{ asset('/dashboard/images/towers.png') }}" alt="" class="university_thumb">
</div>
<div class="col-md-10">
    <h3 class="fw-500 fs-5 mb-1">Winner Of UX Competition</h3>
    <h4 class="fw-500">Issued By University Of Melbourne</h4>
    <div class="text_grey_999 fs-14 mt-3">
        <i class="fa-solid fa-calendar fs-5 me-2"></i>
        <span>Aug 2018 - June 2020 . 2 yrs</span>
    </div>
    <div class="text_grey_999 fs-14 mt-3">
        <i class="fa-solid fa-building-columns fs-5 me-2"></i>
        <span>Melbourne, Austrailia</span>
    </div>
    <div class="mt-3 fw-500">Grade: A+</div>
    <p class="text_grey_999 fs-14 mt-3">
        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
        invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua...
    </p>
    <div class="text-end">
        <a href="" class="text-decoration-underline text_primary fs-14">See more</a>
    </div>
</div>
</div>
</div> --}}
        {{-- <div class="text-center py-5 border-bottom">
                    <a href=" " class="btn_theme_3 fs-14 px-4 py-2 d-inline-block ">Show all 6 education <i
                            class="fa-solid fa-arrow-right-long "></i></a>
                </div> --}}
      </div>
      {{-- <div id="achievements">
                <div class="mt-5">
                    <h2 class="fw-500 text_primary fs-5 align-self-center">Achievements & Awards</h2>
                </div>
                <div class="border-bottom py-3">
                    <h3 class="fw-500 fs-5 mb-1">Winner Of UX Competition</h3>
                    <h4 class="fw-500">Issued By University Of Melbourne</h4>
                    <div class="my-3 ">
                        <div class="text_grey_999 d-inline-block fs-14 me-5">
                            <i class="fa-solid fa-building-columns fs-5 me-2"></i>
                            <span>Associated with University Of Melbourne</span>
                        </div>
                        <div class="text_grey_999 d-inline-block fs-14">
                            <i class="fa-solid fa-calendar fs-5 me-2"></i>
                            <span>Feb 2014</span>
                        </div>
                    </div>
                    <p class="text_grey_999 fs-14">
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                        labore et dolore magna aliquyam erat, sed diam voluptua...
                    </p>
                    <div class="text-end">
                        <a href="" class="text-decoration-underline text_primary fs-14">See more</a>
                    </div>
                </div>
                <div class="border-bottom py-3">
                    <h3 class="fw-500 fs-5 mb-1">Winner Of UX Competition</h3>
                    <h4 class="fw-500">Issued By University Of Melbourne</h4>
                    <div class="my-3 ">
                        <div class="text_grey_999 d-inline-block fs-14 me-5">
                            <i class="fa-solid fa-building-columns fs-5 me-2"></i>
                            <span>Associated with University Of Melbourne</span>
                        </div>
                        <div class="text_grey_999 d-inline-block fs-14">
                            <i class="fa-solid fa-calendar fs-5 me-2"></i>
                            <span>Feb 2014</span>
                        </div>
                    </div>
                    <p class="text_grey_999 fs-14">
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                        labore et dolore magna aliquyam erat, sed diam voluptua...
                    </p>
                    <div class="text-end">
                        <a href="" class="text-decoration-underline text_primary fs-14">See more</a>
                    </div>
                </div>
                <div class="border-bottom py-3">
                    <h3 class="fw-500 fs-5 mb-1">Winner Of UX Competition</h3>
                    <h4 class="fw-500">Issued By University Of Melbourne</h4>
                    <div class="my-3 ">
                        <div class="text_grey_999 d-inline-block fs-14 me-5">
                            <i class="fa-solid fa-building-columns fs-5 me-2"></i>
                            <span>Associated with University Of Melbourne</span>
                        </div>
                        <div class="text_grey_999 d-inline-block fs-14">
                            <i class="fa-solid fa-calendar fs-5 me-2"></i>
                            <span>Feb 2014</span>
                        </div>
                    </div>
                    <p class="text_grey_999 fs-14">
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                        labore et dolore magna aliquyam erat, sed diam voluptua...
                    </p>
                    <div class="text-end">
                        <a href="" class="text-decoration-underline text_primary fs-14">See more</a>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href=" " class="btn_theme_3 fs-14 px-4 py-2 d-inline-block ">Show all 6 education <i
                            class="fa-solid fa-arrow-right-long "></i></a>
                </div>
            </div> --}}
    </div>
  </div>
  {{-- <div class="col-xl-3 col-lg-4 col-md-7 offset-lg-0 offset-md-5 mt-3 mt-xl-0">
        <div class="dashboard_content bg-white rounded_10 ">
            <div class="border-bottom p-3 ">
                <div class="d-flex aling-items-center ">
                    <h2 class="fw-500 fs-14 align-self-center ">Contact Details</h2>
                    <a href="javascript:;" role="button" data-bs-toggle="modal" data-bs-target="#editContactInfo"
                        class="d-inline-block ms-auto text_grey_999 ">
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    <div class="modal fade" id="editContactInfo" tabindex="-1" aria-labelledby="editContactInfoLabel"
                        style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Contact Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <input type="hidden" name="_token"
                                            value="aeKWcObGiCSGubIPzO0OJFDu9t67ELqzLcPNSANo">
                                        <div class="row gy-3">
                                            <form action="{{ route('candidates.profile.update') }}" method="POST">
@csrf
<div class="col-12">
    <label for="address" class="form-label ">Address</label>
    <input type="text" class="form-control" name="headQuarter" value="{{ $user->candidate->head_line }}">
</div>
<div class="col-12">
    <label for="address" class="form-label ">Website</label>
    <input type="text" class="form-control" name="website" value="{{ $user->candidate->head_line }}">
</div>
<div class="col-12">
    <label for="address" class="form-label ">Date</label>
    <input type="date" class="form-control" name="dob" value="{{ $user->candidate->dob }}">
</div>

<div class="col-12">
    <label for="address" class="form-label ">Facebook Link</label>
    <input type="text" class="form-control" name="facebook" value="{{ $user->candidate->head_line }}">
</div>
<div class="col-12">
    <label for="address" class="form-label ">Twitter Link</label>
    <input type="text" class="form-control" name="twitter" value="{{ $user->candidate->head_line }}">
</div>

<div class="col-12">
    <label for="address" class="form-label ">LinkedIn Link</label>
    <input type="text" class="form-control" name="linkedIn" value="{{ $user->candidate->head_line }}">
</div>
<div class="col-12">
    <button type="submit" class="btn_viewall fw-500 px-4 py-2 d-inline-block">Save
        changes</button>
</div>
</form>
</div>
</form>
</div>

</div>
</div>
</div>
</div>
</div>
<div class="border-bottom p-3 ">
    <ul class="row row-cols-1 gy-3 ">
        <li>
            <i class="fa-solid fa-location-dot text_grey_999 me-2 "></i>Yogyakarta, ID
        </li>
        <li>
            <i class="fa-solid fa-globe text_grey_999 me-2 "></i>dribbble.com/fawait
        </li>
        <li>
            <i class="fa-solid fa-calendar text_grey_999 me-2 "></i>Since May 26, 1998
        </li>
        <li>
            <i class="fa-solid fa-building text_grey_999 me-2 "></i>Software House
        </li>
    </ul>
</div>
<ul class="d-flex justify-content-between px-5 py-3 ">
    <li>
        <a href=" "><i class="fa-brands fa-facebook-f text_primary "></i></a>
    </li>
    <li>
        <a href=" "><i class="fa-brands fa-instagram text_primary "></i></a>
    </li>
    <li>
        <a href=" "><i class="fa-brands fa-youtube text_primary "></i></a>
    </li>
    <li>
        <a href=" "><i class="fa-brands fa-linkedin-in text_primary "></i></a>
    </li>
</ul>
</div>
<div class="dashboard_content bg-white rounded_10 mt-3 px-3 pt-3 ">
    <ul class="d-flex justify-content-between ">
        <li class="text-center border-bottom-blue ">
            <p class="text_grey_999 fs-14 ">Applied for</p>
            <p class="fw-bold pt-2 pb-3 ">10,3K</p>
        </li>
        <li class="text-center ">
            <p class="text_grey_999 fs-14 ">Recuited</p>
            <p class="fw-bold pt-2 pb-3 ">2,564</p>
        </li>
        <li class="text-center ">
            <p class="text_grey_999 fs-14 ">Views</p>
            <p class="fw-bold pt-2 pb-3 ">3,154</p>
        </li>
    </ul>
</div>
</div> --}}

@endsection

@section('bottom_script')
  <script>
    $(document).ready(function() {

      $('#firstform').on('submit', function(e) {
        e.preventDefault();
        var userFormData = $(this).serialize();
        // console.log(userFormData);
        $.ajax({
            url: "{{ route('candidates.profile.update') }}",
            type: "POST",
            data: userFormData,
            dataType: "json",
            encode: true,
          }).done(function(data) {
            successModal("Your Data Has Been Successfully Updated...");
            let aboutval = $('#aboutme .txt-editor').val();
            console.log(aboutval);
            $('#aboutme .text').text(aboutval);
            $('#aboutme .editName').show();
            $('#about-me-cancel').hide();
            $('#aboutme .text').show();
            $('#btn-save-aboutme').hide();
            $('#aboutme .txt-editor').hide();
          })
          .fail(function(error) {
            console.log(error);
            var errors = error.responseJSON;
            console.log(errors);

            // if (errors.errors.phone) {
            //     errorModal(errors.errors.phone);
            // } else if (errors.errors.address) {

            //     errorModal(errors.errors.address);

            // } else if (errors.errors.bio) {

            //     errorModal(errors.errors.bio);

            // }

          });


      });

      $('#secondform').on('submit', function(e) {
        e.preventDefault();
        var userFormData = $(this).serialize();
        // console.log(userFormData);
        $.ajax({
            type: "POST",
            url: "{{ route('candidates.profile.update') }}",
            data: userFormData,
            dataType: "json",
            encode: true,
          }).done(function(data) {
            successModal("Your Data Has Been Successfully Updated...");
          })
          .fail(function(error) {
            var errors = error.responseJSON;
            console.log(errors);

          });
      });
    });
  </script>
@endsection
