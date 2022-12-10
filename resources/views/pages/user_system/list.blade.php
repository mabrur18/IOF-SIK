@inject('comp_model', 'App\Models\ComponentsData')
<?php
    //check if current user role is allowed access to the pages
    $can_add = $user->can("user_system/add");
    $can_edit = $user->can("user_system/edit");
    $can_view = $user->can("user_system/view");
    $can_delete = $user->can("user_system/delete");
    $field_name = request()->segment(3);
    $field_value = request()->segment(4);
    $total_records = $records->total();
    $limit = $records->perPage();
    $record_count = count($records);
    $pageTitle = "USER SYSTEM";
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page ajax-page" data-page-type="list" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="card-4 bg-light mb-3">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <div class="col-12 col-md-auto ">
                    <div class="row  q-col-gutter-sm q-px-sm">
                        <div class="col">
                            <div class="h5 font-weight-bold text-primary">USER SYSTEM</div>
                            <div class="text-muted text-small"> INDONESIA OFF-ROAD FEDERATION </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <form  class="search" action="{{ url()->current() }}" method="get">
                        <input type="hidden" name="page" value="1" />
                        <div class="input-group">
                            <input value="<?php echo get_value('search'); ?>" class="form-control page-search" type="text" name="search"  placeholder="Search" />
                            <div class="input-group-append">
                                <button class="btn btn-primary"><i class="material-icons">search</i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <div  class="mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <?php Html::display_page_errors($errors); ?>
                    <div  class=" page-content">
                        <div id="user_system-list-records">
                            <?php
                                if($total_records){
                            ?>
                            <div id="page-main-content">
                                <div class="ajax-page-load-indicator" style="display:none">
                                    <div class="text-center d-flex justify-content-center load-indicator">
                                        <span class="loader mr-3"></span>
                                        <span class="font-weight-bold">Loading...</span>
                                    </div>
                                </div>
                                <?php Html::page_bread_crumb("user_system/", $field_name, $field_value); ?>
                                <div class="row gutter-lg page-data">
                                    <!--record-->
                                    <?php
                                        $counter = 0;
                                        foreach($records as $data){
                                        $rec_id = ($data['id'] ? urlencode($data['id']) : null);
                                        $counter++;
                                    ?>
                                    <!--PageComponentStart-->
                                    <div class="col-sm-4 col-md-3">
                                        <div class="card-4 mb-3">
                                            <div class="row gutter-sm justify-content-between">
                                                <div class="col-3">
                                                    <a href="<?php print_link("user_system/view/$rec_id"); ?>" class="d-block card-link ">
                                                    <img style="height: 60px; width: 100px" src="{{ getImgSizePath($data['user_photo'], 'medium') }}" class="img-fluid" />
                                                </a>
                                            </div>
                                            <div class="col-7">
                                                <div class="font-weight-bold">
                                                    <a href="<?php print_link("user_system/view/$rec_id"); ?>" class="d-block card-link ">
                                                    <?php echo ($data['email']); ?>
                                                </a>
                                            </div>
                                            <small class="text-muted"><?php echo ($data['username']); ?></small>
                                        </div>
                                        <div class="col-2">
                                            <div class="d-flex justify-content-between">
                                                <div class="dropdown" >
                                                    <button data-toggle="dropdown" class="dropdown-toggle btn text-primary btn-flat btn-sm">
                                                    <i class="material-icons">menu</i> 
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <?php if($can_view){ ?>
                                                        <a class="dropdown-item "   href="<?php print_link("user_system/view/$rec_id"); ?>">
                                                        <i class="material-icons">visibility</i> View
                                                    </a>
                                                    <?php } ?>
                                                    <?php if($can_edit){ ?>
                                                    <a class="dropdown-item "   href="<?php print_link("user_system/edit/$rec_id"); ?>">
                                                    <i class="material-icons">edit</i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="dropdown-item record-delete-btn" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal" href="<?php print_link("user_system/delete/$rec_id"); ?>">
                                                <i class="material-icons">clear</i> Delete
                                            </a>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--PageComponentEnd-->
                <?php 
                    }
                ?>
                <!--endrecord-->
            </div>
            <div class="row gutter-lg search-data"></div>
            <div>
            </div>
        </div>
        <?php
            if($show_footer){
        ?>
        <div class="">
            <div class="row justify-content-center">    
                <div class="col-md-auto">   
                </div>
                <div class="col">   
                    <?php
                        if($show_pagination == true){
                        $pager = new Pagination($total_records, $record_count);
                        $pager->show_page_count = false;
                        $pager->show_record_count = true;
                        $pager->show_page_limit =false;
                        $pager->limit = $limit;
                        $pager->show_page_number_list = true;
                        $pager->pager_link_range=5;
                        $pager->ajax_page = true;
                        $pager->render();
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php
            }
            }
            else{
        ?>
        <div class="text-muted  animated bounce p-3">
            <h4><i class="material-icons">block</i> NO USER</h4>
        </div>
        <?php
            }
        ?>
    </div>
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
