@extends('layouts.master2')

@push('css')
    <link href="{{ asset('plugins/components/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/components/icheck/skins/all.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    {{-- <link href="{{asset('plugins/components/bootstrap-datepicker/bootstrap-datepicker.min.css')}}"> --}}
    <link href="{{ asset('plugins/components/jqueryui/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css">
    <style>
        #rootwizard .nav.nav-pills {
            margin-bottom: 25px;
        }

        .nav-pills>li>a {
            cursor: default;
            ;
            background-color: inherit;
        }

        .nav-pills>li>a:focus,
        .nav-tabs>li>a:focus,
        .nav-pills>li>a:hover,
        .nav-tabs>li>a:hover {
            border: 1px solid transparent !important;
            background-color: inherit !important;
        }

        .help-block {
            display: block;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        .nav-pills>li>a {
            cursor: default;
            ;
            background-color: inherit;
        }

        .nav-pills>li>a:focus,
        .nav-tabs>li>a:focus,
        .nav-pills>li>a:hover,
        .nav-tabs>li>a:hover {
            border: 1px solid transparent !important;
            background-color: inherit !important;
        }

        .has-error .help-block {
            color: #EF6F6C;
        }

        .select2 {
            width: 100% !important;
        }

        .error-block {
            background-color: #ff9d9d;
            color: red;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create User</h3>
                    <div class="clearfix"></div>
                    <form id="commentForm" action="{{ url('user/create') }}" method="POST" enctype="multipart/form-data"
                        class="form-horizontal">
                        <!-- CSRF Token -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <div id="rootwizard">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1" data-toggle="tab">User Profile</a></li>
                                <li><a href="#tab2" data-toggle="tab">Bio</a></li>
                                <li><a href="#tab3" data-toggle="tab">Address</a></li>
                                <li><a href="#tab4" data-toggle="tab">User Role</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <h2 class="hidden">&nbsp;</h2>
                                    <div class="form-group {{ $errors->first('status', 'has-error') }}">
                                        <label for="status" class="col-sm-2 control-label">Status *</label>
                                        <div class="col-sm-10">
                                            {{-- <input id="status" name="status" type="date"
                                                placeholder="Date of Employment" class="form-control required"
                                                value="{!! old('status') !!}" />

                                            {!! $errors->first('status', '<span class="help-block">:message</span>') !!} --}}
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="1">Active</option>
                                                <option value="2">InActive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('name', 'has-error') }}">
                                        <label for="name" class="col-sm-2 control-label">Name *</label>
                                        <div class="col-sm-10">
                                            <input id="name" name="name" type="text" placeholder="Name" required
                                                class="form-control required" value="{!! old('name') !!}" />
                                            {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('surname', 'has-error') }}">
                                        <label for="surname" class="col-sm-2 control-label">Surname *</label>
                                        <div class="col-sm-10">
                                            <input id="surname" name="surname" type="text" placeholder="Surname"
                                                required class="form-control required" value="{!! old('surname') !!}" />

                                            {!! $errors->first('surname', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{$restaurant_id}}" name="restaurant_id">
                                    {{-- <div class="form-group {{ $errors->first('restaurant_id',  
                                        'has-error') }} ">
                                        <label for="restaurant_id" class="col-sm-2 control-label">Restaurant Linked
                                            To</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" aria-label="Default select example"
                                                name="restaurant_id" class="form-control required restaurant_id"
                                                value="{!! old('restaurant_id') !!}">
                                                @foreach ($restaurant as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            {!! $errors->first('restaurant_id', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div> --}}
                                    <div class="form-group {{ $errors->first('date_of_employment', 'has-error') }}">
                                        <label for="date_of_employment" class="col-sm-2 control-label">Date of Employment
                                            *</label>
                                        <div class="col-sm-10">
                                            <input id="date_of_employment" name="date_of_employment" type="date"
                                                placeholder="Date of Employment" class="form-control required"
                                                value="{!! old('date_of_employment') !!}" />

                                            {!! $errors->first('date_of_employment', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('end_of_work_date', 'has-error') }}">
                                        <label for="end_of_work_date" class="col-sm-2 control-label">End of Work Date
                                            *</label>
                                        <div class="col-sm-10">
                                            <input id="end_of_work_date" name="end_of_work_date" type="date"
                                                placeholder="Date of Employment" class="form-control required"
                                                value="{!! old('end_of_work_date') !!}" />

                                            {!! $errors->first('end_of_work_date', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('hourly_salary', 'has-error') }}">
                                        <label for="password_confirm" class="col-sm-2 control-label">Hourly Salary
                                            *</label>
                                        <div class="col-sm-10">
                                            <input id="hourly_salary" name="hourly_salary" type="number" 
                                                placeholder="Hourly Salary " class="form-control required" />
                                            {!! $errors->first('hourly_salary', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('telephone_number', 'has-error') }}">
                                        <label for="telephone_number" class="col-sm-2 control-label">Telephone number
                                            *</label>
                                        <div class="col-sm-10">
                                            <input id="telephone_number" name="telephone_number" type="text" 
                                                placeholder="Telephone number" class="form-control required"
                                                value="{!! old('telephone_number') !!}" />

                                            {!! $errors->first('telephone_number', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                        <label for="email" class="col-sm-2 control-label">Email *</label>
                                        <div class="col-sm-10">
                                            <input id="email" name="email" placeholder="E-mail" type="text"
                                                class="form-control required email" value="{!! old('email') !!}" />
                                            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>


                                    <div class="form-group {{ $errors->first('password', 'has-error') }}">
                                        <label for="password" class="col-sm-2 control-label">Password *</label>
                                        <div class="col-sm-10">
                                            <input id="password" name="password" type="password" placeholder="Password"
                                                class="form-control required" value="{!! old('password') !!}" />
                                            {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->first('password_confirmation', 'has-error') }}">
                                        <label for="password_confirm" class="col-sm-2 control-label">Confirm Password
                                            *</label>
                                        <div class="col-sm-10">
                                            <input id="password_confirmation" name="password_confirmation"
                                                type="password" placeholder="Confirm Password "
                                                class="form-control required" />
                                            {!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab2" disabled="disabled">
                                    <h2 class="hidden">&nbsp;</h2>
                                    <div class="form-group  {{ $errors->first('dob', 'has-error') }}">
                                        <label for="dob" class="col-sm-2 control-label">Date of Birth</label>
                                        <div class="col-sm-10">
                                            <input value="{{ old('dob') }}" autocomplete="off" 
                                                 name="dob" type="date" class="form-control"
                                                data-date-format="YYYY-MM-DD" placeholder="yyyy-mm-dd" />
                                            <span class="help-block">{{ $errors->first('dob', ':message') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('place_of_birth', 'has-error') }}">
                                        <label for="place_of_birth" class="col-sm-2 control-label">Place of birth
                                            *</label>
                                        <div class="col-sm-10">
                                            <input id="place_of_birth" name="place_of_birth" type="text" 
                                                placeholder="place_of_birth" class="form-control required"
                                                value="{!! old('place_of_birth') !!}" />

                                            {!! $errors->first('place_of_birth', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('PESEL ', 'has-error') }}">
                                        <label for="PESEL " class="col-sm-2 control-label">PESEL *</label>
                                        <div class="col-sm-10">
                                            <input id="PESEL " name="PESEL " type="text"
                                                placeholder="PESEL " class="form-control required"
                                                value="{!! old('PESEL ') !!}" />

                                            {!! $errors->first('PESEL ', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('id_number', 'has-error') }}">
                                        <label for="id_number" class="col-sm-2 control-label">ID number *</label>
                                        <div class="col-sm-10">
                                            <input id="id_number" name="id_number" type="text"
                                                placeholder="id_number" class="form-control required"
                                                value="{!! old('id_number') !!}" />

                                            {!! $errors->first('id_number', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('passport_number', 'has-error') }}">
                                        <label for="passport_number" class="col-sm-2 control-label">Passport number
                                            *</label>
                                        <div class="col-sm-10">
                                            <input id="passport_number" name="passport_number" type="text"
                                                placeholder="passport_number" class="form-control required"
                                                value="{!! old('passport_number') !!}" />

                                            {!! $errors->first('passport_number', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('country_of_issue', 'has-error') }}">
                                        <label for="country_of_issue" class="col-sm-2 control-label">Country of issue
                                            *</label>
                                        <div class="col-sm-10">
                                            <input id="country_of_issue" name="country_of_issue" type="text"
                                                placeholder="country_of_issue" class="form-control required"
                                                value="{!! old('country_of_issue') !!}" />
                                            {!! $errors->first('country_of_issue', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('mother_name', 'has-error') }}">
                                        <label for="mother_name" class="col-sm-2 control-label">Mother's name *</label>
                                        <div class="col-sm-10">
                                            <input id="mother_name" name="mother_name" type="text"
                                                placeholder="mother_name" class="form-control required"
                                                value="{!! old('mother_name') !!}" />

                                            {!! $errors->first('mother_name', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('father_name', 'has-error') }}">
                                        <label for="father_name" class="col-sm-2 control-label">Father's name *</label>
                                        <div class="col-sm-10">
                                            <input id="father_name" name="father_name" type="text"
                                                placeholder="father_name" class="form-control required"
                                                value="{!! old('father_name') !!}" />

                                            {!! $errors->first('father_name', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('citizenship ', 'has-error') }}">
                                        <label for="citizenship " class="col-sm-2 control-label">citizenship*</label>
                                        <div class="col-sm-10">
                                            <input id="citizenship " name="citizenship " type="text"
                                                placeholder="citizenship " class="form-control required"
                                                value="{!! old('citizenship ') !!}" />

                                            {!! $errors->first('citizenship ', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('bank_account_number  ', 'has-error') }}">
                                        <label for="bank_account_number  " class="col-sm-2 control-label">Bank account
                                            number *</label>
                                        <div class="col-sm-10">
                                            <input id="bank_account_number  " name="bank_account_number  " 
                                                type="text" placeholder="bank_account_number  "
                                                class="form-control required" value="{!! old('bank_account_number  ') !!}" />

                                            {!! $errors->first('bank_account_number  ', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('student   ', 'has-error') }}">
                                        <label for="student   " class="col-sm-2 control-label">Student *</label>
                                        <div class="col-sm-10">
                                            <input id="student   " name="student   " type="text"
                                                placeholder="student   " class="form-control required"
                                                value="{!! old('student   ') !!}" />

                                            {!! $errors->first('student   ', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div
                                        class="form-group {{ $errors->first('name_of_the_university    ', 'has-error') }}">
                                        <label for="name_of_the_university   " class="col-sm-2 control-label">Name of the
                                            University *</label>
                                        <div class="col-sm-10">
                                            <input id="name_of_the_university   " name="name_of_the_university   "
                                                type="text" placeholder="name_of_the_university   "
                                                class="form-control required" value="{!! old('name_of_the_university   ') !!}" />

                                            {!! $errors->first('name_of_the_university   ', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div
                                        class="form-group {{ $errors->first('until_when_the_student     ', 'has-error') }}">
                                        <label for="until_when_the_student   " class="col-sm-2 control-label">until when
                                            the student *</label>
                                        <div class="col-sm-10">
                                            <input id="until_when_the_student   " name="until_when_the_student   "
                                                type="date" placeholder="until_when_the_student   "
                                                class="form-control required" value="{!! old('until_when_the_student   ') !!}" />

                                            {!! $errors->first('until_when_the_student   ', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    {{-- <div class="form-group {{ $errors->first('pic_file', 'has-error') }}">
                                        <label for="pic" class="col-sm-2 control-label">Profile picture</label>
                                        <div class="col-sm-10">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                                    <img src="http://placehold.it/200x200" alt="profile pic">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"
                                                    style="max-width: 200px; max-height: 200px;"></div>
                                                <div>
                                                    <span class="btn btn-default btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input id="pic" name="pic_file" type="file"
                                                            class="form-control" />
                                                    </span>
                                                    <a href="#" class="btn btn-danger fileinput-exists"
                                                        data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                            <span class="help-block">{{ $errors->first('pic_file', ':message') }}</span>
                                        </div>
                                    </div> 
                                     <div class="form-group">
                                        <label for="bio" class="col-sm-2 control-label">Bio
                                            <small>(brief intro) *</small>
                                        </label>
                                        <div class="col-sm-10">
                                            <textarea name="bio" id="bio" class="form-control resize_vertical" rows="4">{!! old('bio') !!}</textarea>
                                        </div>
                                        {!! $errors->first('bio', '<span class="help-block">:message</span>') !!}
                                    </div> --}}

                                </div>
                                <div class="tab-pane" id="tab3" disabled="disabled">
                                    {{-- <div class="form-group {{ $errors->first('gender', 'has-error') }}">
                                        <label for="email" class="col-sm-2 control-label">Gender *</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" title="Select Gender..." name="gender">
                                                <option value="">Select</option>
                                                <option value="male"
                                                    @if (old('gender') === 'male') selected="selected" @endif>Male
                                                </option>
                                                <option value="female"
                                                    @if (old('gender') === 'female') selected="selected" @endif>
                                                    Female
                                                </option>
                                                <option value="other"
                                                    @if (old('gender') === 'other') selected="selected" @endif>Other
                                                </option>

                                            </select>
                                        </div>
                                        <span class="help-block">{{ $errors->first('gender', ':message') }}</span>
                                    </div> --}}

                                    <div class="form-group {{ $errors->first('country', 'has-error') }}">
                                        <label for="country" class="col-sm-2 control-label">Country</label>
                                        <div class="col-sm-10">
                                            <input id="countries" name="country" type="text" class="form-control"
                                                value="{!! old('country') !!}" />
                                            <span class="help-block">{{ $errors->first('country', ':message') }}</span>

                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->first('state', 'has-error') }}">
                                        <label for="state" class="col-sm-2 control-label">State</label>
                                        <div class="col-sm-10">
                                            <input id="state" name="state" type="text" class="form-control"
                                                value="{!! old('state') !!}" />
                                            <span class="help-block">{{ $errors->first('state', ':message') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->first('city', 'has-error') }}">
                                        <label for="city" class="col-sm-2 control-label">City</label>
                                        <div class="col-sm-10">
                                            <input id="city" name="city" type="text" class="form-control"
                                                value="{!! old('city') !!}" />
                                            <span class="help-block">{{ $errors->first('city', ':message') }}</span>

                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->first('address', 'has-error') }}">
                                        <label for="address" class="col-sm-2 control-label">Address</label>
                                        <div class="col-sm-10">
                                            <input id="address" name="address" type="text" class="form-control"
                                                value="{{ old('address') }}" />
                                            <span class="help-block">{{ $errors->first('address', ':message') }}</span>

                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->first('postal', 'has-error') }}">
                                        <label for="postal" class="col-sm-2 control-label">Postal/zip</label>
                                        <div class="col-sm-10">
                                            <input id="postal" name="postal" type="text" class="form-control"
                                                value="{!! old('postal') !!}" />
                                            <span class="help-block">{{ $errors->first('postal', ':message') }}</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab4" disabled="disabled">
                                    <p class="text-danger"><strong>Be careful with role selection, if you give admin
                                            access.. they can access admin section</strong></p>

                                    <div class="form-group required {{ $errors->first('role', 'has-error') }}">
                                        <label for="group" class="col-sm-2 control-label">Role *</label>
                                        <div class="col-sm-10">
                                            <select class="form-control required" title="Select role..." name="role"
                                                id="role">
                                                <option value="">Select</option>
                                                @foreach ($roles as $role)
                                                    @if ($role->name != 'developer')
                                                        <option value="{{ $role->id }}"
                                                            @if ($role->id == old('role')) selected="selected" @endif>
                                                            {{ $role->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <span class="help-block">{{ $errors->first('role', ':message') }}</span>
                                        </div>
                                    </div>

                                    {{-- <div class="form-group"> --}}
                                    {{-- <label for="activate" class="col-sm-2 control-label"> Activate User *</label> --}}
                                    {{-- <div class="col-sm-10"> --}}
                                    {{-- <input id="activate" name="activate" type="checkbox" --}}
                                    {{-- class="pos-rel p-l-30 custom-checkbox" --}}
                                    {{-- value="1" @if (old('activate')) checked="checked" @endif > --}}
                                    {{-- <span>To activate user account automatically, click the check box</span></div> --}}

                                    {{-- </div> --}}
                                </div>
                                <ul class="pager wizard">
                                    <li class="previous"><a href="#">Previous</a></li>
                                    <li class="next"><a href="#">Next</a></li>
                                    <li class="next finish" style="display:none;"><a href="javascript:;">Finish</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>


                    @if (count($errors) > 0)
                        <div class="alert alert-danger">Errors! Please fill form with proper details</div>
                    @endif

                </div>
            </div>
        </div>

        {{-- @include('layouts.partials.right-sidebar') --}}
    </div>
@endsection

@push('js')
    <script src="{{ asset('plugins/components/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/components/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('plugins/components/icheck/icheck.init.js') }}"></script>
    <script src="{{ asset('plugins/components/moment/moment.js') }}"></script>
    {{-- <script src="{{asset('plugins/components/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script> --}}
    <script src="{{ asset('plugins/components/jqueryui/jquery-ui.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap-wizard/1.2/jquery.bootstrap.wizard.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js" type="text/javascript">
    </script>
    <script src="{{ asset('plugins/components/toast-master/js/jquery.toast.js') }}"></script>
    <script src="{{ asset('/js/adduser.js') }}"></script>
    
    <script>
            var msg = '{{ Session::get('alert') }}';
                var exist = '{{ Session::has('alert') }}';
                if (exist) {
                    alert(msg);
                }
        @if (\Session::has('message'))
            $.toast({
                heading: 'Success!',
                position: 'top-center',
                text: '{{ session()->get('message') }}',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3000,
                stack: 6
            });
        @endif
    </script>
@endpush
