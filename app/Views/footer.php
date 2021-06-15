
</div>
<script type="text/javascript">
    $(document).ready(function () {
<?php if (session()->has('message')) { ?>
            alertify.set('notifier', 'position', 'top-right');
            alertify.<?php echo session()->getFlashdata('alert') ?>('<?php echo session()->getFlashdata('message') ?>');
<?php } ?>
    });

    function confirmAction(message, action) {
        alertify.confirm('Delete Confirmation', message, function (e) {
            window.location.href = "<?php echo base_url(); ?>" + action;
        }
        ,function () {
            
        });
    }
</script>
</body>

</html>