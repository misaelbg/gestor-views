@extends('layouts.gym-merchant.gymbasic')

@section('CSS')
    {!! HTML::style('front/js/cropper/cropper.min.css?v=1.0')!!}
    {!! HTML::style('admin/global/plugins/bootstrap-datepicker/css/datepicker.css') !!}
    {!! HTML::style('admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') !!}
    {!! HTML::style('admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') !!}
    {!! HTML::style('admin/global/plugins/ladda/ladda-themeless.min.css') !!}
@stop

@{ $STEP_NUMBER = 5; }}

@section('content')

    @extends('layouts.partials.account_setup.form_header')

    {!! Form::open(['route'=>'gym-admin.profile.store','id'=>'clients_details','class'=>'ajax-form ','method'=>'POST','files' => true]) !!}

    @extends('layouts.partials.account_setup.form_steps')

                                    <div class="col-md-6">

                                        <div class="col-md-11">
                                            <div class="form-group form-md-line-input">
                                                <input type="text" class="form-control" id="first_name"
                                                       name="first_name" @if(!is_null($client) && isset($client->first_name)) value="{{ $client->first_name }}" @endif>
                                                <input type="hidden" id="img_name" name="img_name">
                                                <label for="first_name">Nome <span class="required"
                                                                                         aria-required="true"> * </span></label>
                                                <span class="help-block">Por favor, insira o primeiro nome dos clientes.</span>
                                            </div>

                                            <div class="form-group form-md-line-input ">
                                                <input type="text" class="form-control" id="last_name" name="last_name" @if(!is_null($client) && isset($client->last_name)) value="{{ $client->last_name }}" @endif>
                                                <label for="last_name">Sobrenome <span class="required" aria-required="true"> * </span></label>
                                                <span class="help-block">Insira o sobrenome do cliente.</span>
                                            </div>

                                            <div class="form-group form-md-line-input">
                                                <select class="bs-select form-control" data-live-search="true"
                                                        data-size="8" id="gender" name="gender">
                                                    <option value="">Selecionar Gênero</option>
                                                    <option @if(!is_null($client) && $client->gender == 'male') selected @endif value="male">Homem</option>
                                                    <option @if(!is_null($client) && $client->gender == 'female') selected @endif value="female">Mulher</option>
                                                </select>
                                                <label for="gender">Gender <span class="required" aria-required="true"> * </span></label>
                                            </div>
                                            <div class="form-group form-md-radios">
                                                <label>Estado Civil</label>

                                                <div class="md-radio-inline">
                                                    <div class="md-radio">
                                                        <input type="radio" value="yes" id="yes_radio" @if(!is_null($client) && $client->marital_status == 'yes') checked @endif
                                                               name="marital_status" class="md-radiobtn">
                                                        <label for="yes_radio">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Casado(a) </label>
                                                    </div>
                                                    <div class="md-radio ">
                                                        <input type="radio" value="no" id="no_radio"
                                                               name="marital_status" @if(!is_null($client) && $client->marital_status == 'yes') checked @else checked @endif  class="md-radiobtn">
                                                        <label for="no_radio">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Solteiro(a) </label>
                                                    </div>
                                                </div>

                                                <span class="help-block"></span>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control form-control-inline input-small date-picker"
                                                               placeholder="Data de nascimento" size="16" type="text"
                                                               readonly @if(!is_null($client) && isset($client->dob)) value="{{ $client->dob->format('m/d/Y') }}" @endif id="dob" name="dob"/>
                                                        <span class="help-block"> </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" id="anniversaryDiv">
                                                    <div class="form-group">
                                                        <input class="form-control form-control-inline input-small date-picker"
                                                               placeholder="Aniversário" size="16" type="text" @if(!is_null($client) && isset($client->anniversary)) value="{{ $client->anniversary->format('m/d/Y') }}" @endif
                                                               id="anniversary" readonly name="anniversary"/>
                                                        <span class="help-block"> </span>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group form-md-line-input">
                                                <input type="number" class="form-control" id="age" name="age" readonly @if(!is_null($client) && isset($client->age)) value="{{ $client->age }}" @endif>
                                                <span class="help-block">Por favor, insira a idade dos clientes.</span>
                                                <label>Idade</label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <input type="email" class="form-control" id="email" name="email" @if(!is_null($client) && isset($client->email)) value="{{ $client->email }}" @endif>
                                            <span class="help-block">Por favor insira o e-mail dos clientes.</span>
                                            <label>Email <span class="required" aria-required="true"> * </span></label>
                                        </div>

                                        <div class="form-group form-md-line-input">
                                            <input type="tel" class="form-control" id="mobile" name="mobile" @if(!is_null($client) && isset($client->mobile)) value="{{ $client->mobile }}" @endif>
                                            <span class="help-block">Por favor, insira o número de telefone do cliente.</span>
                                            <label>Phone <span class="required" aria-required="true"> * </span></label>
                                        </div>

                                        <div class="form-group form-md-line-input">
                                            <textarea class="form-control" rows="3" name="address"
                                                      id="address">@if(!is_null($client) && isset($client->address)) {{ $client->address }} @endif</textarea>
                                            <label>Endereco</label>

                                        </div>


                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label class="form-group">Altura</label>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-md-line-input ">
                                                    <input type="number" class="form-control" id="height_feet"
                                                           name="height_feet" placeholder="feet" @if(!is_null($client) && isset($client->height_feet)) value="{{ $client->height_feet }}" @endif>
                                                    <span class="help-block">Altura.</span>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-md-line-input ">
                                                    <input type="number" class="form-control" id="height_inches"
                                                           name="height_inches" placeholder="inches" @if(!is_null($client) && isset($client->height_inches)) value="{{ $client->height_inches }}" @endif>
                                                    <span class="help-block">Cintura.</span>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group form-md-line-input">
                                            <input type="number" class="form-control" id="weight" name="weight" @if(!is_null($client) && isset($client->weight)) value="{{ $client->weight }}" @endif>
                                            <span class="help-block">Por favor, insira o peso dos clientes.</span>
                                            <label>Peso (em Kgs)</label>
                                        </div>
                                        <input type="hidden" name="source" id="source" value="direct">
                                    </div>

                                    <hr>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-5 col-md-7">
                                            <button type="submit" class="btn green mt-ladda-btn ladda-button"
                                                    data-style="zoom-in" id="upload_clients">
                                            <span class="ladda-label">
                                                Salvar</span>
                                                <span class="ladda-spinner"></span>

                                                <div class="ladda-progress" style="width: 0px;"></div>
                                            </button>
                                            <button type="reset" class="btn default">Resetar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT INNER -->

        <!--Start For Upload Image-->
        <div class="modal fade" id="uploadImage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="text-align: left">Upload Profile Image</h4>
                    </div>
                    <div id="imageUploadDiv">
                        <div class="modal-body">
                            <div id="choose">
                                <form method="post" role="form" enctype="multipart/form-data" class="avatar-form"
                                      action="{{ route('gym-admin.gymclient.uploadimage') }}">
                                    <input class="avatar-src" name="avatar_src" type="hidden">
                                    <input class="avatar-data" name="avatar_data" type="hidden">
                                    <input class="avatar-task" type="hidden" id="task">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                   <span style="left: 40%" class="btn green btn-file">
                           Browse <input type="file" name="file" id="image" class="avatar-input">

                       </span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End For Upload Image-->
        {{--!-- Cropping modal -->--}}
        <div class="modal" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog"
             tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <button class="close" data-dismiss="modal" type="button">&times;</button>
                        <h4 class="modal-title" id="avatar-modal-label">Alterar Avatar</h4>
                    </div>
                    <div class="modal-body">
                        <div class="avatar-body">
                            <!-- Crop and preview -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="avatar-wrapper"></div>
                                </div>
                                <!--<div class="col-md-3">
                                    <div class="avatar-preview preview-lg"></div>
                                    <div class="avatar-preview preview-md"></div>
                                    <div class="avatar-preview preview-sm"></div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal" type="button">Fechar</button>
                        <button class="btn green avatar-save" onclick="formSubmit();">Salvar</button>
                    </div>

                </div>
            </div>
        </div><!-- /.modal -->

    </div>
@stop

@section('footer')
    {!! HTML::script('admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') !!}
    {!! HTML::style('admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') !!}
    {!! HTML::script('admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') !!}
    {!! HTML::script('admin/global/plugins/ladda/spin.min.js') !!}
    {!! HTML::script('admin/global/plugins/ladda/ladda.min.js') !!}
    {!! HTML::script('admin/pages/scripts/ui-buttons.min.js') !!}
    {!! HTML::script("front/js/cropper/crop-avatar.js?v=1.0")!!}
    {!! HTML::script("front/js/cropper/cropper.min.js?v=1.0")!!}
    <script>
        $('#dob').datepicker({
            rtl: App.isRTL(),
            orientation: "left",
            autoclose: true,
            endDate: '+0d',
            startView: 'decades'
        });
        $('#anniversary').datepicker({
            rtl: App.isRTL(),
            orientation: "left",
            autoclose: true
        });
        $('#joining_date').datepicker({
            rtl: App.isRTL(),
            orientation: "left",
            autoclose: true,
            endDate: '+0d'
        });
        $(function() {
            var value = $('input[name=marital_status]:checked').val();
            if (value == 'no') {
                $('#anniversaryDiv').css('display', 'none');
            } else {
                $('#anniversaryDiv').css('display', 'block');
            }

            var lre = /^\s*/;
            var inputDate = document.getElementById('dob').value;
            inputDate = inputDate.replace(lre, "");
            age = get_age(new Date(inputDate));
            $('#age').val(age);

        });
    </script>
    <script>
        $('#upload_clients').click(function () {
            $.easyAjax({
                url: '{{route('gym-admin.account-setup.clientStore')}}',
                container: '#clients_details',
                type: "POST",
                file: true,
                redirect: true
            })
        });
    </script>
    <script>

        $('#dob').change(function () {
            var lre = /^\s*/;

            var inputDate = document.getElementById('dob').value;
            inputDate = inputDate.replace(lre, "");

            age = get_age(new Date(inputDate));

            $('#age').val(age);

        });

        function get_age(birth) {
            var today = new Date();
            var nowyear = today.getFullYear();
            var nowmonth = today.getMonth();
            var nowday = today.getDate();

            var birthyear = birth.getFullYear();
            var birthmonth = birth.getMonth();
            var birthday = birth.getDate();

            var age = nowyear - birthyear;
            var age_month = nowmonth - birthmonth;
            var age_day = nowday - birthday;

            if (age_month < 0 || (age_month == 0 && age_day < 0)) {
                age = parseInt(age) - 1;
            }
            return age;


        }

        $('input[name=marital_status]').on('change', function () {
            var value = $('input[name=marital_status]:checked').val();
            if (value == 'no') {
                $('#anniversaryDiv').css('display', 'none');
            } else {
                $('#anniversaryDiv').css('display', 'block');
            }
        });

        function forImage(task) {

            $('#task').val($(task).attr('rel'));
            $('#image').val('');
            if ($('#task').val() == "upload") {
                $("#deleteProfileImage").hide();
            }
            else {
                $("#deleteProfileImage").removeAttr('style');
            }
            $('#uploadImage').modal('show');
        }


        function imageUpload(data, task) {
            var obj = jQuery.parseJSON(data);
            if (task == "upload") {
                $(".profile-img-container_before").hide();
                $("#img_name").val(obj.image);
                $('.profile-img-container').removeAttr('style');
                $(".profile-img-container").wrap("<div class='imageDelete'></div>");
                $('#uploadImage').modal('hide');
                $('#changeProfile').attr('src', "{{ asset('admin/uploads/gym_clients/img/master/') }}/" + obj.image);
                var data = '<div class="profile-big-container"> <img src="{{ asset('admin/uploads/gym_clients/img/master/') }}/' + obj.image + '" class="profile-img-big"><span rel="change" class="change-photo" onclick="forImage(this)">Change Photo</span></div>';
                $('.profile-img-container').find('a').attr('data-content', data).data('bs.popover').setContent();
                $('.changeAfterProfile').attr('src', "{{ asset('admin/uploads/gym_clients/img/thumb/') }}/" + obj.image);
                profile = '<img src="{{ asset('admin/uploads/gym_clients/img/thumb/') }}/' + obj.image + '">';
                $('.popover ').hide();
            }
            if (task == "change") {
                $('#uploadImage').modal('hide');
                $("#img_name").val(obj.image);
                $('#changeProfile').attr('src', "{{ asset('admin/uploads/gym_clients/img/master/') }}/" + obj.image);
                var data = '<div class="profile-big-container"> <img src="{{ asset('admin/uploads/gym_clients/img/master/') }}/' + obj.image + '" class="profile-img-big"><span rel="change" class="change-photo" onclick="forImage(this)">Change Photo</span></div>';
                $('.profile-img-container').find('a').attr('data-content', data).data('bs.popover').setContent();
                $('.changeAfterProfile').attr('src', "{{ asset('admin/uploads/gym_clients/img/thumb/') }}/" + obj.image);
                profile = '<img src="{{ asset('admin/uploads/gym_clients/img/thumb/') }}/' + obj.image + '">';
                $(".profile-img-container").wrap("<div class='imageDelete'></div>");
                $('.popover ').hide();
            }

        }
    </script>
@stop