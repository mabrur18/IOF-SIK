@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "REGIST NEW CLUB";
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
                            <div class="h5 font-weight-bold text-primary">REGIST NEW CLUB IOF</div>
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
                        <form id="club_iof-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="{{ route('club_iof.store') }}" method="post">
                            @csrf
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="no_reg_club">NO REGIST CLUB </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-no_reg_club-holder" class=" ">
                                                <input id="ctrl-no_reg_club"  value="<?php echo get_value('no_reg_club') ?>" type="text" placeholder="NO REGIST CLUB" list="no_reg_club_list"  name="no_reg_club"  class="form-control " />
                                                <datalist id="no_reg_club_list">
                                                <?php
                                                    $options = Menu::no_reg_club();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    $selected = Html::get_field_selected('no_reg_club', $value);
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
                                            <label class="control-label" for="club_nama">NAMA CLUB <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-club_nama-holder" class=" ">
                                                <input id="ctrl-club_nama"  value="<?php echo get_value('club_nama') ?>" type="text" placeholder="NAMA CLUB" list="club_nama_list"  required="" name="club_nama"  data-url="componentsdata/club_iof_club_nama_value_exist/" data-loading-msg="Checking availability ..." data-available-msg="Available" data-unavailable-msg="Not available" class="form-control  ctrl-check-duplicate" />
                                                <datalist id="club_nama_list">
                                                <?php
                                                    $options = Menu::no_reg_club();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    $selected = Html::get_field_selected('club_nama', $value);
                                                ?>
                                                <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                <?php echo $label ?>
                                                </option>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                                </datalist>
                                                <div class="check-status"></div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="club_category">CATEGORY <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-club_category-holder" class=" ">
                                                <select required=""  id="ctrl-club_category" name="club_category"  placeholder="CATEGORY"    class="custom-select" >
                                                <option value="">CATEGORY</option>
                                                <?php
                                                    $options = Menu::club_category();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    $selected = Html::get_field_selected('club_category', $value);
                                                ?>
                                                <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                <?php echo $label ?>
                                                </option>                                   
                                                <?php
                                                    }
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
                                            <label class="control-label" for="alamat_club">ALAMAT CLUB <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-alamat_club-holder" class=" ">
                                                <textarea placeholder=" ALAMAT CLUB" id="ctrl-alamat_club"  required="" rows="5" name="alamat_club" class=" form-control"><?php echo get_value('alamat_club') ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="logo_club">LOGO CLUB <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-logo_club-holder" class=" ">
                                                <div class="dropzone required" input="#ctrl-logo_club" fieldname="logo_club" uploadurl="{{ url('fileuploader/upload/logo_club') }}"    data-multiple="false" dropmsg="Choose files or drop files here"    btntext="Browse" extensions=".jpg,.png,.gif,.jpeg" filesize="3" maximum="1">
                                                    <input name="logo_club" id="ctrl-logo_club" required="" class="dropzone-input form-control" value="<?php echo get_value('logo_club') ?>" type="text"  />
                                                    <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                    <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="join_date">JOIN DATE <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-join_date-holder" class="input-group ">
                                                <input id="ctrl-join_date" class="form-control datepicker  datepicker"  required="" value="<?php echo get_value('join_date') ?>" type="datetime" name="join_date" placeholder="JOIN DATE" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
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
                                            <label class="control-label" for="club_status">STATUS CLUB <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-club_status-holder" class=" ">
                                                <?php
                                                    $options = Menu::club_status();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    //check if current option is checked option
                                                    $checked = Html::get_field_checked('club_status', $value, "");
                                                ?>
                                                <label class="btn btn-sm btn-primary">
                                                <input class="" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio" required=""   name="club_status" />
                                                <span class=""><?php echo $label ?></span>
                                                </label>
                                                <?php
                                                    }
                                                    }
                                                ?>
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
