@inject('comp_model', 'App\Models\ComponentsData')
<?php 
    $pageTitle = "Home";
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<div>
    <div  class="card-4 bg-light mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <div class="row  q-col-gutter-sm q-px-sm">
                        <div class="col">
                            <div class="h5 font-weight-bold">IOF PENGCAB BEKASI RAYA</div>
                            <div class="text-muted text-small"> SYSTEM KEANGGOTAAN </div>
                        </div>
                    </div>
                    <q-separator class="q-my-sm"></q-separator>
                </div>
            </div>
        </div>
    </div>
    <div  class="mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <?php $rec_count = $comp_model->getcount_memberiofbekasiraya();  ?>
                    <a class="animated pulse record-count alert alert-primary"  href="<?php print_link("member_iof") ?>">
                    <div class="row gutter-sm">
                        <div class="col-auto" style="opacity: 0.7;">
                            <i class="material-icons ">people</i>
                        </div>
                        <div class="col">
                            <div class="flex-column justify-content align-center">
                                <div class="title">MEMBER IOF BEKASI RAYA</div>
                                <small class="">TOTAL ACTIVE MEMBER</small>
                            </div>
                            <h4 class="value"><?php echo $rec_count; ?></h4>
                        </div>
                    </div>
                    <div class="progress mt-2">
                        <?php 
                            $perc = ($rec_count / 100) * 100 ;
                        ?>
                        <div class="progress-bar bg-primary text-white" role="progressbar" aria-valuenow="<?php echo $rec_count; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $perc ?>%">
                        <span class="progress-label"><?php echo round($perc,2); ?>%</span>
                    </div>
                </div>
            </a>
            <?php $rec_count = $comp_model->getcount_clubiofbekasiraya();  ?>
            <a class="animated pulse record-count alert alert-primary"  href="<?php print_link("club_iof") ?>">
            <div class="row gutter-sm">
                <div class="col-auto" style="opacity: 0.7;">
                    <i class="material-icons ">group_work</i>
                </div>
                <div class="col">
                    <div class="flex-column justify-content align-center">
                        <div class="title">CLUB IOF BEKASI RAYA</div>
                        <small class="">TOTAL REGISTERED CLUB</small>
                    </div>
                    <h4 class="value"><?php echo $rec_count; ?></h4>
                </div>
            </div>
            <div class="progress mt-2">
                <?php 
                    $perc = ($rec_count / 100) * 100 ;
                ?>
                <div class="progress-bar bg-primary text-white" role="progressbar" aria-valuenow="<?php echo $rec_count; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $perc ?>%">
                <span class="progress-label"><?php echo round($perc,2); ?>%</span>
            </div>
        </div>
    </a>
</div>
</div>
</div>
</div>
</div>
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
