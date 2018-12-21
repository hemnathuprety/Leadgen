<div class="container-fluid text-center">
    <h4>Please estimate the value of the property</h4>
    <br>
    <div class="btn-option row-centered">
        <form method="post" action="<?php echo base_url("leadgen/refinance"); ?>">
            <input value="3" type="text" hidden name="form_page"/>
            <div class="form-group filter-panel col-centered">
                <input type="hidden" name="value_property" class="value_property" value="500000,1000000"/>
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
    $('.value_property').jRange({
        from: 0,
        to: 2000000,
        step: 1000,
        format: '$%s',
        width: 250,
        showLabels: true,
        isRange : true
    });
</script>

