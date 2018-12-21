<div class="container-fluid text-center">
    <form method="post" action="<?php if ($this->session->userdata('purchase_type') == 'purchase') echo base_url("leadgen/purchase"); else echo base_url("leadgen/refinance"); ?>">
        <input value="14" type="text" hidden name="form_page"/>
        <?php $bankruptcy_foreclosure = $this->session->userdata('bankruptcy_foreclosure');
        if ($bankruptcy_foreclosure == 'bankruptcy' || $bankruptcy_foreclosure == 'both') { ?>
            <div class="container text-center">
                <h4>How long ago was the bankruptcy?</h4>
                <div class="btn-option row-centered">
                    <div class="form-group filter-panel col-centered">
                        <input type="hidden" name="bankruptcy" class="bankruptcy form-control" value="2"/>
                    </div>
                </div>
            </div>
            <br/>
        <?php }
        if ($bankruptcy_foreclosure == 'foreclosure' || $bankruptcy_foreclosure == 'both') { ?>
            <div class="container text-center">
                <h4>How long ago was the foreclosure?</h4>
                <div class="btn-option row-centered">
                    <div class="form-group filter-panel col-centered">
                        <input type="hidden" name="foreclosure" class="foreclosure form-control" value="2"/>
                    </div>
                </div>
            </div>
        <?php } ?>
        <br/>
        <div class="container text-center">
            <div class="btn-option row-centered">
                <div class="form-group">
                    <button type="submit" name="submitForm" class="btn btn-success">
                        Continue
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $('.bankruptcy').jRange({
        from: 0,
        to: 7,
        step: 1,
        format: '%s years',
        width: 250,
        showLabels: true,
        snap: true
    });

    $('.foreclosure').jRange({
        from: 0,
        to: 7,
        step: 1,
        format: '%s years',
        width: 250,
        showLabels: true,
        snap: true
    });
</script>

