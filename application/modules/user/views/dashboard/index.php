<div class="dashboard-right">
    <div class="welcome-dashboard">
        <h3>Selamat Datang <?= $this->session->userdata('namalengkap'); ?> !</h3>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="widget_card_page grid_flex widget_bg_blue">
                <div class="widget-icon">
                    <i class="fa fa-rocket"></i>
                </div>
                <div class="widget-page-text">
                    <h4><?= $skill ?></h4>
                    <h2>Skill</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="widget_card_page grid_flex  widget_bg_purple">
                <div class="widget-icon">
                    <i class="fa fa-gavel"></i>
                </div>
                <div class="widget-page-text">
                    <h4><?= $job ?></h4>
                    <h2>Job</h2>
                </div>
            </div>
        </div>
        <!-- <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="widget_card_page grid_flex widget_bg_dark_red">
                <div class="widget-icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="widget-page-text">
                    <h4>45</h4>
                    <h2>Jobs Applied</h2>
                </div>
            </div>
        </div> -->
    </div>
</div>