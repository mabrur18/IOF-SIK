@inject('comp_model', 'App\Models\ComponentsData')
<?php
    //check if current user role is allowed access to the pages
    $can_add = $user->can("member_iof/add");
    $can_edit = $user->can("member_iof/edit");
    $can_view = $user->can("member_iof/view");
    $can_delete = $user->can("member_iof/delete");
    $pageTitle = "MEMBER IOF DETAIL";
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="view" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="card-4 bg-light mb-3">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-md-auto ">
                    <div class="row  q-col-gutter-sm q-px-sm">
                        <div class="col">
                            <div class="h5 font-weight-bold text-primary">ANGGOTA IOF DETAIL</div>
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
                            <!-- Table Body Start -->
                            <div class="page-data">
                                <!--PageComponentStart-->
                                <div class="border-top td-photo p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> Photo</div>
                                            <div class="font-weight-bold">
                                                <?php 
                                                    Html :: page_img($data['photo'],400,400, "", 1); 
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top td-nama p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> Nama</div>
                                            <div class="font-weight-bold">
                                                <?php echo  $data['nama'] ; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top td-nik p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> Nik</div>
                                            <div class="font-weight-bold">
                                                <?php echo  $data['nik'] ; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top td-email p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> Email</div>
                                            <div class="font-weight-bold">
                                                <?php echo  $data['email'] ; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top td-alamat p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> Alamat</div>
                                            <div class="font-weight-bold">
                                                <?php echo  $data['alamat'] ; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top td-tempat_lahir p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> Tempat Lahir</div>
                                            <div class="font-weight-bold">
                                                <?php echo  $data['tempat_lahir'] ; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top td-tanggal_lahir p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> Tanggal Lahir</div>
                                            <div class="font-weight-bold">
                                                <span title="<?php echo human_datetime($data['tanggal_lahir']); ?>" class="has-tooltip">
                                                <?php echo relative_date($data['tanggal_lahir']); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top td-handphone p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> Handphone</div>
                                            <div class="font-weight-bold">
                                                <?php echo  $data['handphone'] ; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top td-no_kta p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> No Kta</div>
                                            <div class="font-weight-bold">
                                                <?php echo  $data['no_kta'] ; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top td-tanggal_kta p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> Tanggal Kta</div>
                                            <div class="font-weight-bold">
                                                <span title="<?php echo human_datetime($data['tanggal_kta']); ?>" class="has-tooltip">
                                                <?php echo relative_date($data['tanggal_kta']); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top td-tanggal_kta_exp p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> Tanggal Kta Exp</div>
                                            <div class="font-weight-bold">
                                                <span title="<?php echo human_datetime($data['tanggal_kta_exp']); ?>" class="has-tooltip">
                                                <?php echo relative_date($data['tanggal_kta_exp']); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top td-id_club p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> Id Club</div>
                                            <div class="font-weight-bold">
                                                <?php echo  $data['id_club'] ; ?>
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
                                <div class="border-top td-club_type p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> Club Type</div>
                                            <div class="font-weight-bold">
                                                <?php echo  $data['club_type'] ; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top td-member_status p-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="text-muted"> Member Status</div>
                                            <div class="font-weight-bold"><?php Html :: check_button($data['member_status'], "true") ?></div>
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
                                            <a class="dropdown-item "   href="<?php print_link("member_iof/edit/$rec_id"); ?>">
                                            <i class="material-icons">edit</i> Edit
                                        </a>
                                        <?php } ?>
                                        <?php if($can_delete){ ?>
                                        <a class="dropdown-item record-delete-btn" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal" href="<?php print_link("member_iof/delete/$rec_id"); ?>">
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
