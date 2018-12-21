<footer class="container text-center ">
    <p class="col-md-12 text-center footer_text"> Call Us:
        <a href="" class="link_footer"><?php if (isset($leadgen)) echo $leadgen->contact_no; ?></a>
        <br/>
        <a href="<?php if (isset($leadgen)) echo $leadgen->privacy_policy; ?>" class="link_footer">Privacy Policy</a> |
        <a href="<?php if (isset($leadgen)) echo $leadgen->terms_of_use; ?>" class="link_footer">Terms of Use</a> |
        <a href="<?php if (isset($leadgen)) echo $leadgen->licens_disclosure; ?>" class="link_footer">License
            Disclosure</a>
    </p>
    <p class="col-md-12 text-center disclosure"><?php if (isset($leadgen)) echo $leadgen->disclosure; ?></p>
</footer>

</body>
</html>
