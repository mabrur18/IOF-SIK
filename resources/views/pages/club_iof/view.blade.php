@inject('comp_model', 'App\Models\ComponentsData')
<?php
    //check if current user role is allowed access to the pages
    $can_add = $user->can("club_iof/add");
    $can_edit = $user->can("club_iof/edit");
    $can_view = $user->can("club_iof/view");
    $can_delete = $user->can("club_iof/delete");
    $pageTitle = "CLUB DETAIL";
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page ajax-page" data-page-type="view" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="card-4 bg-light mb-3">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-md-auto ">
                    <div class="row  q-col-gutter-sm q-px-sm">
                        <div class="col">
                            <div class="h5 font-weight-bold text-primary">CLUB DETAIL</div>
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
                <div class="col-md-12 comp-grid">
                    <?php Html::display_page_errors($errors); ?>
                    <div  class="card-4 page-content">
                        <?php
                            $counter = 0;
                            if($data){
                            $rec_id = ($data['id'] ? urlencode($data['id']) : null);
                            $counter++;
                        ?>
                        <div id="page-main-content" class="">
                            <div class="ajax-page-load-indicator" style="display:none">
                                <div class="text-center d-flex justify-content-center load-indicator">
                                    <span class="loader mr-3"></span>
                                    <span class="font-weight-bold">Loading...</span>
                                </div>
                            </div>
                            <!-- Table Body Start -->
                            <div class="page-data">
                                <!--PageComponentStart-->
                                <div class="border-top td-logo_club p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> Logo Club</div>
                                            <div class="font-weight-bold">
                                                <?php 
                                                    Html :: page_img($data['logo_club'],400,400, "", 1); 
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top td-club_nama p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> Club Nama</div>
                                            <div class="font-weight-bold">
                                                <?php echo  $data['club_nama'] ; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top td-no_reg_club p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> No Reg Club</div>
                                            <div class="font-weight-bold">
                                                <?php echo  $data['no_reg_club'] ; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top td-club_category p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> Club Category</div>
                                            <div class="font-weight-bold">
                                                <?php echo  $data['club_category'] ; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top td-alamat_club p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> Alamat Club</div>
                                            <div class="font-weight-bold">
                                                <?php echo  $data['alamat_club'] ; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top td-join_date p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> Join Date</div>
                                            <div class="font-weight-bold">
                                                <span title="<?php echo human_datetime($data['join_date']); ?>" class="has-tooltip">
                                                <?php echo relative_date($data['join_date']); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top td-club_status p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> Club Status</div>
                                            <div class="font-weight-bold">
                                                <?php echo  $data['club_status'] ; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--PageComponentEnd-->
                                <div class="d-flex q-col-gutter-xs justify-end">
                                    <div class="dropdown" >
                                        <button data-toggle="dropdown" class="dropdown-toggle btn text-primary btn-flat btn-sm">
                                        <i class="material-icons">menu</i> 
                                        </button>
                                        <ul class="dropdown-menu">
                                            <?php if($can_edit){ ?>
                                            <a class="dropdown-item "   href="<?php print_link("club_iof/edit/$rec_id"); ?>">
                                            <i class="material-icons">edit</i> Edit
                                        </a>
                                        <?php } ?>
                                        <?php if($can_delete){ ?>
                                        <a class="dropdown-item record-delete-btn" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal" href="<?php print_link("club_iof/delete/$rec_id"); ?>">
                                        <i class="material-icons">clear</i> Delete
                                    </a>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Table Body End -->
                </div>
                <?php
                    }
                    else{
                ?>
                <!-- Empty Record Message -->
                <div class="text-muted p-3">
                    <i class="material-icons">block</i> No Record Found
                </div>
                <?php
                    }
                ?>
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
