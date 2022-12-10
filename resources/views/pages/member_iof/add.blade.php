@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "REGIST ANGGOTA BARU";
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="add" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="card-4 bg-light mb-3">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-md-auto ">
                    <div class="row  q-col-gutter-sm q-px-sm">
                        <div class="col">
                            <div class="h5 font-weight-bold text-primary">NEW MEMBER IOF</div>
                            <div class="text-muted text-small"> INDONESIA OFF-ROAD FEDERATION </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <div  class="mb-3">
        <div class="container">
            <div class="row ">
                <div class="col-md-9 comp-grid">
                    <?php Html::display_page_errors($errors); ?>
                    <div  class="card-4 page-content">
                        <!--[form-start]-->
                        <form id="member_iof-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="{{ route('member_iof.store') }}" method="post">
                            @csrf
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="nama">NAMA <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-nama-holder" class=" ">
                                                <input id="ctrl-nama"  value="<?php echo get_value('nama') ?>" type="text" placeholder="NAMA" list="nama_list"  required="" name="nama"  class="form-control " />
                                                <datalist id="nama_list">
                                                <?php
                                                    $options = Menu::no_reg_club();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    $selected = Html::get_field_selected('nama', $value);
                                                ?>
                                                <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                <?php echo $label ?>
                                                </option>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                                </datalist>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="nik">NIK <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-nik-holder" class=" ">
                                                <input id="ctrl-nik"  value="<?php echo get_value('nik') ?>" type="text" placeholder="NIK" list="nik_list"  required="" name="nik"  class="form-control " />
                                                <datalist id="nik_list">
                                                <?php
                                                    $options = Menu::no_reg_club();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    $selected = Html::get_field_selected('nik', $value);
                                                ?>
                                                <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                <?php echo $label ?>
                                                </option>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                                </datalist>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="email">EMAIL <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-email-holder" class=" ">
                                                <input id="ctrl-email"  value="<?php echo get_value('email') ?>" type="email" placeholder="EMAIL" list="email_list"  required="" name="email"  class="form-control " />
                                                <datalist id="email_list">
                                                <?php
                                                    $options = Menu::no_reg_club();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    $selected = Html::get_field_selected('email', $value);
                                                ?>
                                                <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                <?php echo $label ?>
                                                </option>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                                </datalist>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="alamat">ALAMAT <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-alamat-holder" class=" ">
                                                <textarea placeholder="ALAMAT" id="ctrl-alamat"  required="" rows="5" name="alamat" class=" form-control"><?php echo get_value('alamat') ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="tempat_lahir">TEMPAT LAHIR <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-tempat_lahir-holder" class=" ">
                                                <input id="ctrl-tempat_lahir"  value="<?php echo get_value('tempat_lahir') ?>" type="text" placeholder="TEMPAT LAHIR" list="tempat_lahir_list"  required="" name="tempat_lahir"  class="form-control " />
                                                <datalist id="tempat_lahir_list">
                                                <?php
                                                    $options = Menu::no_reg_club();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    $selected = Html::get_field_selected('tempat_lahir', $value);
                                                ?>
                                                <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                <?php echo $label ?>
                                                </option>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                                </datalist>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="tanggal_lahir">TANGGAL LAHIR <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-tanggal_lahir-holder" class="input-group ">
                                                <input id="ctrl-tanggal_lahir" class="form-control datepicker  datepicker"  required="" value="<?php echo get_value('tanggal_lahir') ?>" type="datetime" name="tanggal_lahir" placeholder="TANGGAL LAHIR" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="handphone">PHONE <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-handphone-holder" class=" ">
                                                <input id="ctrl-handphone"  value="<?php echo get_value('handphone') ?>" type="text" placeholder="PHONE" list="handphone_list"  required="" name="handphone"  class="form-control " />
                                                <datalist id="handphone_list">
                                                <?php
                                                    $options = Menu::no_reg_club();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    $selected = Html::get_field_selected('handphone', $value);
                                                ?>
                                                <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                <?php echo $label ?>
                                                </option>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                                </datalist>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="no_kta">NO KTA </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-no_kta-holder" class=" ">
                                                <input id="ctrl-no_kta"  value="<?php echo get_value('no_kta') ?>" type="text" placeholder="NO KTA" list="no_kta_list"  name="no_kta"  class="form-control " />
                                                <datalist id="no_kta_list">
                                                <?php
                                                    $options = Menu::no_reg_club();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    $selected = Html::get_field_selected('no_kta', $value);
                                                ?>
                                                <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                <?php echo $label ?>
                                                </option>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                                </datalist>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="tanggal_kta">TANGGAL KTA </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-tanggal_kta-holder" class="input-group ">
                                                <input id="ctrl-tanggal_kta" class="form-control datepicker  datepicker"  value="<?php echo get_value('tanggal_kta') ?>" type="datetime" name="tanggal_kta" placeholder="TANGGAL KTA" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="tanggal_kta_exp">KTA EXPIRED </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-tanggal_kta_exp-holder" class="input-group ">
                                                <input id="ctrl-tanggal_kta_exp" class="form-control datepicker  datepicker"  value="<?php echo get_value('tanggal_kta_exp') ?>" type="datetime" name="tanggal_kta_exp" placeholder="KTA EXPIRED" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="club_nama">CLUB <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-club_nama-holder" class=" ">
                                                <select required=""  id="ctrl-club_nama" name="club_nama"  placeholder="Select a value ..."    class="selectize" >
                                                <option value="">Select a value ...</option>
                                                <?php 
                                                    $options = $comp_model->club_nama_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('club_nama', $value);
                                                ?>
                                                <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                <?php echo $label; ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="club_type">CATEGORY <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-club_type-holder" class=" ">
                                                <select required=""  id="ctrl-club_type" name="club_type"  placeholder="CATEGORY"    class="custom-select" >
                                                <option value="">CATEGORY</option>
                                                <?php 
                                                    $options = $comp_model->club_type_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('club_type', $value);
                                                ?>
                                                <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                <?php echo $label; ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="member_status">MEMBER STATUS <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-member_status-holder" class=" ">
                                                <?php $checked = Html::get_field_checked('member_status', 'true', 'true'); ?>
                                                <label class="custom-control custom-switch custom-control-inline">
                                                <input type="checkbox" <?php echo $checked; ?> id="ctrl-member_status" class="custom-control-input single-switch" data-on="true" data-off="false" /><input type="hidden" name="member_status"  value="<?php echo get_value('member_status', 'false') ?>" />
                                                <span class="custom-control-label">MEMBER STATUS</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="photo">PHOTO <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-photo-holder" class=" ">
                                                <div class="dropzone required" input="#ctrl-photo" fieldname="photo" uploadurl="{{ url('fileuploader/upload/photo') }}"    data-multiple="false" dropmsg="Choose files or drop files here"    btntext="Browse" extensions=".jpg,.png,.gif,.jpeg" filesize="3" maximum="1">
                                                    <input name="photo" id="ctrl-photo" required="" class="dropzone-input form-control" value="<?php echo get_value('photo') ?>" type="text"  />
                                                    <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                    <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ajax-status"></div>
                            <!--[form-button-start]-->
                            <div class="form-group form-submit-btn-holder text-center mt-3">
                                <button class="btn btn-primary" type="submit">
                                Submit
                                <i class="material-icons">send</i>
                                </button>
                            </div>
                            <!--[form-button-end]-->
                        </form>
                        <!--[form-end]-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('pagecss')
<style>
	body{
			
	}
</style>
@endsection
@section('pagejs')
<script>
	$(document).ready(function(){
			
	});
</script>

@endsection
