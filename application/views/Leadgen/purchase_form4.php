<div class="container-fluid text-center">
    <h4>What are the estimated purchase price?</h4>
    <br>
    <div class="btn-option row-centered">
        <form method="post" action="<?php echo base_url("leadgen/purchase"); ?>">
            <input value="4" type="text" hidden name="form_page"/>
            <div class="form-group filter-panel col-centered">
                <input type="hidden" name="price_range" class="price_range" value="500000,1000000"/>
            </div>
            <div class="form-group">
                <button type="submit" name="submitForm" class="btn btn-success">
                    Continue
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    $('.price_range').jRange({
        from: 0,
        to: 2000000,
        step: 1000,
        format: '$%s',
        width: 250,
        showLabels: true,
        isRange : true
    });
</script>

