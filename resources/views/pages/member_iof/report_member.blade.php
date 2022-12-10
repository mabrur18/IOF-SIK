@inject('comp_model', 'App\Models\ComponentsData')
<?php
    //check if current user role is allowed access to the pages
    $can_add = $user->can("member_iof/add");
    $can_edit = $user->can("member_iof/edit");
    $can_view = $user->can("member_iof/view");
    $can_delete = $user->can("member_iof/delete");
    $field_name = request()->segment(3);
    $field_value = request()->segment(4);
    $total_records = $records->total();
    $limit = $records->perPage();
    $record_count = count($records);
    $pageTitle = "MEMBER IOF BEKASI RAYA";
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="list" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="card-4 bg-light mb-3">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <div class="col-12 col-md-auto ">
                    <div class="row  q-col-gutter-sm q-px-sm">
                        <div class="col">
                            <div class="h5 font-weight-bold text-primary">LIST MEMBER IOF PENGCAB BEKASI RAYA</div>
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
                        <div id="member_iof-report_member-records">
                            <div id="page-main-content" class="table-responsive">
                                <?php Html::page_bread_crumb("member_iof/report_member", $field_name, $field_value); ?>
                                <table class="table  table-striped table-sm text-left">
                                    <thead class="table-header ">
                                        <tr>
                                            <?php if($can_delete){ ?>
                                            <th class="td-checkbox">
                                            <label class="custom-control custom-checkbox custom-control-inline">
                                            <input class="toggle-check-all custom-control-input" type="checkbox" />
                                            <span class="custom-control-label"></span>
                                            </label>
                                            </th>
                                            <?php } ?>
                                            <th class="td-btn"></th>
                                            <th class="td-sno">#</th>
                                            <th class="td-photo" > Photo</th>
                                            <th class="td-nama" > Nama</th>
                                            <th class="td-nik" > NIK</th>
                                            <th class="td-email" > Email</th>
                                            <th class="td-alamat" > Alamat</th>
                                            <th class="td-tempat_lahir" > Tempat Lahir</th>
                                            <th class="td-tanggal_lahir" > Tanggal Lahir</th>
                                            <th class="td-handphone" > Handphone</th>
                                            <th class="td-no_kta" > No KTA</th>
                                            <th class="td-tanggal_kta" > Tanggal KTA</th>
                                            <th class="td-tanggal_kta_exp" > Tanggal KTA Exp</th>
                                            <th class="td-club_nama" > Club Nama</th>
                                            <th class="td-club_type" > Category</th>
                                            <th class="td-member_status" > Status</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        if($total_records){
                                    ?>
                                    <tbody class="page-data">
                                        <!--record-->
                                        <?php
                                            $counter = 0;
                                            foreach($records as $data){
                                            $rec_id = ($data['id'] ? urlencode($data['id']) : null);
                                            $counter++;
                                        ?>
                                        <tr>
                                            <?php if($can_delete){ ?>
                                            <td class=" td-checkbox">
                                                <label class="custom-control custom-checkbox custom-control-inline">
                                                <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['id'] ?>" type="checkbox" />
                                                <span class="custom-control-label"></span>
                                                </label>
                                            </td>
                                            <?php } ?>
                                            <th class="td-sno"><?php echo $counter; ?></th>
                                            <td class="td-btn">
                                                <div class="dropdown" >
                                                    <button data-toggle="dropdown" class="dropdown-toggle btn text-primary btn-flat btn-sm">
                                                    <i class="material-icons">menu</i> 
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <?php if($can_view){ ?>
                                                        <a class="dropdown-item "   href="<?php print_link("member_iof/view/$rec_id"); ?>">
                                                        <i class="material-icons">visibility</i> View
                                                    </a>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </td>
                                        <!--PageComponentStart-->
                                        <td class="td-photo">
                                            <?php 
                                                Html :: page_img($data['photo'],50,50, "medium", 1); 
                                            ?>
                                        </td>
                                        <td class="td-nama">
                                            <?php echo  $data['nama'] ; ?>
                                        </td>
                                        <td class="td-nik">
                                            <?php echo  $data['nik'] ; ?>
                                        </td>
                                        <td class="td-email">
                                            <a href="<?php print_link("mailto:$data[email]") ?>"><?php echo $data['email']; ?></a>
                                        </td>
                                        <td class="td-alamat">
                                            <?php echo  $data['alamat'] ; ?>
                                        </td>
                                        <td class="td-tempat_lahir">
                                            <?php echo  $data['tempat_lahir'] ; ?>
                                        </td>
                                        <td class="td-tanggal_lahir">
                                            <span title="<?php echo human_datetime($data['tanggal_lahir']); ?>" class="has-tooltip">
                                            <?php echo relative_date($data['tanggal_lahir']); ?>
                                            </span>
                                        </td>
                                        <td class="td-handphone">
                                            <a href="<?php print_link("tel:$data[handphone]") ?>"><?php echo $data['handphone']; ?></a>
                                        </td>
                                        <td class="td-no_kta">
                                            <?php echo  $data['no_kta'] ; ?>
                                        </td>
                                        <td class="td-tanggal_kta">
                                            <span title="<?php echo human_datetime($data['tanggal_kta']); ?>" class="has-tooltip">
                                            <?php echo relative_date($data['tanggal_kta']); ?>
                                            </span>
                                        </td>
                                        <td class="td-tanggal_kta_exp">
                                            <span title="<?php echo human_datetime($data['tanggal_kta_exp']); ?>" class="has-tooltip">
                                            <?php echo relative_date($data['tanggal_kta_exp']); ?>
                                            </span>
                                        </td>
                                        <td class="td-club_nama">
                                            <?php echo  $data['club_nama'] ; ?>
                                        </td>
                                        <td class="td-club_type">
                                            <?php echo  $data['club_type'] ; ?>
                                        </td>
                                        <td class="td-member_status"><?php Html :: check_button($data['member_status'], "true") ?></td>
                                        <!--PageComponentEnd-->
                                    </tr>
                                    <?php 
                                        }
                                    ?>
                                    <!--endrecord-->
                                </tbody>
                                <tbody class="search-data"></tbody>
                                <?php
                                    }
                                    else{
                                ?>
                                <tbody class="page-data">
                                    <tr>
                                        <td class="bg-light text-center text-muted animated bounce p-3" colspan="1000">
                                            <i class="material-icons">block</i> No record found
                                        </td>
                                    </tr>
                                </tbody>
                                <?php
                                    }
                                ?>
                            </table>
                        </div>
                        <?php
                            if($show_footer){
                        ?>
                        <div class="">
                            <div class="row justify-content-center">    
                                <div class="col-md-auto justify-content-center">    
                                    <div class="p-3 d-flex justify-content-between">    
                                        <?php if($can_delete){ ?>
                                        <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("member_iof/delete/{sel_ids}"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                                        <i class="material-icons">clear</i> Delete Selected
                                        </button>
                                        <?php } ?>
                                        <div class="dropup export-btn-holder mx-1">
                                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">save</i> Export
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <?php $export_pdf_link = add_query_params(['export' => 'pdf']); ?>
                                                <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                                <img src="{{ asset('images/pdf.png') }}" class="mr-2" /> PDF
                                            </a>
                                            <?php $export_excel_link = add_query_params(['export' => 'excel']); ?>
                                            <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                                            <img src="{{ asset('images/xsl.png') }}" class="mr-2" /> EXCEL
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">   
                            <?php
                                if($show_pagination == true){
                                $pager = new Pagination($total_records, $record_count);
                                $pager->no_more_content_text = "No more content to load";
                                $pager->load_more_text = "Load More";
                                $pager->loading_text = "Loading...";
                                $pager->pager_type = 'load-more';
                                $pager->render();
                                }
                            ?>
                        </div>
                    </div>
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
